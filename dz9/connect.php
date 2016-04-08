<?php
    $conn = mysql_connect('localhost', 'root', '') 
            or die('Невозможно установить соединение: '. mysql_error());
    
    mysql_select_db('dz9_db') 
        or die('Не удалось выбрать базу данных');
    
    mysql_query("SET NAMES utf8");
    