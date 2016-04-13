<?php
    session_start();
//    include('debugging.php');
//    pre($_POST);
//    pre($_FILES);

    if (isset($_POST['install'])) {
        
        if (!$conn = mysql_connect($_POST['server_name'], $_POST['username'], $_POST['password'])) {
            die('Невозможно установить соединение!');
        }
        if(mysql_select_db($_POST['database'])){
            mysql_query('drop database ' . $_POST['database']);
        }
        mysql_query('create database ' . $_POST['database']);
        mysql_select_db($_POST['database']) or die('не была выбрана база данных');
        if(is_uploaded_file($_FILES["dbfile"]["tmp_name"]))
        {
            move_uploaded_file($_FILES["dbfile"]["tmp_name"], "../db/" . $_FILES["dbfile"]["name"]);
        } else {
            die("Ошибка загрузки файла");
        }
        
        if (isset($_FILES['dbfile'])) {
            $templine = '';
            $lines = file("../db/" . $_FILES["dbfile"]["name"]);
            foreach ($lines as $line)
            {
                if (substr($line, 0, 2) == '--' || $line == '')
                    continue;
                $templine .= $line;
                if (substr(trim($line), -1, 1) == ';')
                {
                    mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
                    $templine = '';
                }
            }
        } else {
            die('Не был выбран файл дампа базы данных');
        }
        mysql_close();
        $_SESSION['dbinstall'] = true;
        foreach ($_POST as $key => $value) {
            if ($key == 'install') {
                continue;
            }
            $_SESSION[$key] = $value; 
        }
        header('Location: index.php');
    }
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Install</title>
</head>
<body>
    <form enctype="multipart/form-data" action="install.php" method="post">
        <p><label>Server name:</label><br>
        <input type="text" name='server_name'></p>
        <p><label>User name</label><br>
        <input type="text" name='username'></p>
        <p><label>Password:</label><br>
        <input type="password" name='password'></p>
        <p><label>Database:</label><br>
        <input type="text" name='database'></p>
        <p><label>Database file:</label><br>
        <input type="file" name='dbfile'></p>
        <p><input type="submit" value='install' name="install"></p>
    </form>
</body>
</html>
