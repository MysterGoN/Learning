<?php
    include('debugging.php');
    //pre($_POST);

    if (isset($_POST['install'])) {
        if (!$conn = mysql_connect($_POST['server_name'], $_POST['username'], $_POST['password'])) {
            die('Невозможно установить соединение!');
        }

        if(mysql_select_db($_POST['database'])){
            mysql_close();
            mysql_query('drop database ' . $_POST['database']);
        }
        mysql_query('create database ' . $_POST['database']);
        mysql_select_db($_POST['database']);
        if (file_exists('databases/' . $_POST['database'] . 'sql')) {
            mysql_query('source databases/' . $_POST['database'] . 'sql');
        } else {
            die('Нет')
        }
        
    }
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Install</title>
</head>
<body>
    <form method="post">
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
