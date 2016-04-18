<?php
    function connectToDb($server_name, $user_name, $password, $database) {
        $error = "<br>Пожалуйста перейдите "
                . "по ссылке для устранения неполадок: "
                . "<a href='install.php'>Устранить!</a>";
        $conn = mysqli_connect($server_name, $user_name, $password) 
            or die('Невозможно установить соединение ' . $error);
        
        mysqli_select_db($database) 
            or die('Не удалось выбрать базу данных' . $error);
    
        mysqli_query("SET NAMES utf8");
    }
    
    function takeAd($id) {
        $result = mysql_query('select * from ads where ads.id = ' . $id);
        $row = mysql_fetch_assoc($result);
        foreach ($row as $key => $value) {
            $date[$key] = $value;
        }
        return $date;
    }

    function takeAdList($search = '') {
        $result = mysql_query('select id, title, price, name from ads' . $search);
        $date = array();
        while ($row = mysql_fetch_assoc($result)){
            $edit = "<a  href='?id=" . $row[id] . "'>редактировать</a> ";
            $delete = "<a  href='?delete=". $row[id] ."'>удалить</a><br>";
            foreach ($row as $key => $value) {
                if ($key == 'id') {continue;}
                $date[] = $value;
            }
            $date[] = $edit;
            $date[] = $delete;
        }
        return $date;
    }

    function addAd($array) {
        $arr = '';
        $end = "', ";
        foreach ($array as $key => $value) {
            if ($key == 'price') {$end = "';";}
            $arr .= $key . " = '" . $value . $end;
        }
        mysql_query("insert into ads set " . $arr);
    }
    
    function editAd($array, $id) {
        $arr = '';
        $end = "', ";
        foreach ($array as $key => $value) {
            if ($key == 'price') {$end = "' ";}
            $arr .= $key . " = '" . $value . $end;
        }
        $arr .= "where ads.id = " . $id . ";";
        mysql_query("update ads set " . $arr);
    }
    
    function deleteAd($id) {
        mysql_query("delete from ads where ads.id = " . $id . ";");
    }
    
    function takeDate($name) {
        $result = mysql_query('select * from ' . $name );
        $date = array();
        while ($row = mysql_fetch_array($result)){
            $date[$row[0]] = $row[1];
        }
        return $date;
    }
    
    function takeCategorys() {
        $result = mysql_query('select category, subcategorys.id, subcategory '
                            . 'from categorys '
                            . 'left join subcategorys '
                            . 'on (categorys.id = subcategorys.category_id)');
        $date = array();
        while ($row = mysql_fetch_array($result)){
            $date[$row[0]][$row[1]] = $row[2];
        }
        return $date;
    }