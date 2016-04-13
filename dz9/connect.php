<?php
    $conn = mysql_connect($_SESSION['server_name'], $_SESSION['username'], $_SESSION['password']) 
            or die('Невозможно установить соединение: '. mysql_error());
    
    mysql_select_db($_SESSION['database']) 
        or die('Не удалось выбрать базу данных');
    
    mysql_query("SET NAMES utf8");
    