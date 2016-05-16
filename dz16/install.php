<?php
    session_start();

    if (isset($_POST['install'])) {
        if (!$conn = mysql_connect($_POST['server_name'], $_POST['user_name'], $_POST['password'])) {
            die('Невозможно установить соединение!');
        }
        if(mysql_select_db($_POST['database'])){
            mysql_query('drop database ' . $_POST['database']);
        }
        mysql_query('create database ' . $_POST['database']);
        mysql_select_db($_POST['database']) or die('не была выбрана база данных');
       
        $templine = '';
        $lines = file("db/dz9_db.sql");
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

        mysql_close();
        $f = fopen('data_connection.php', 'w');
        fwrite($f, "<?php\n");
        foreach ($_POST as $key => $value) {
            if ($key == 'install') {
                continue;
            }
            fwrite($f, '$' . $key . " = '" . $value . "';\n");
        }
        fclose($f);
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
        <input type="text" name='user_name'></p>
        <p><label>Password:</label><br>
        <input type="password" name='password'></p>
        <p><label>Database:</label><br>
        <input type="text" name='database'></p>
        <p><input type="submit" value='install' name="install"></p>
    </form>
</body>
</html>
