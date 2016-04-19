<?php
    function connectToDb($server_name, $user_name, $password, $database) {
        $db = DbSimple_Generic::connect('mysqli://' . $user_name . ':' . $password . '@' . $server_name . '/' . $database);
    
        $db->setErrorHandler('databaseErrorHandler');
        
        function databaseErrorHandler($message, $info) {
            if (!error_reporting()) return;
            echo "Не удалось установить соединение"
               . "<br>Пожалуйста перейдите "
               . "по ссылке для устранения неполадок: "
               . "<a href='install.php'>Устранить!</a>";
            exit();
        }
        
        $db->query("SET NAMES utf8");
        
        return $db;
    }
    
    function takeAd($id, $db) {
        $result = $db->selectRow('select * from ads where ads.id = ?', $id);
        return $result;
    }

    function takeAdList($search, $db) {
        $result = $db->select('select id, title, price, name from ads where title like ?', '%' . $search . '%');
        $data = array();
        foreach ($result as $value) {
            $edit = "<a  href='?id=" . $value[id] . "'>редактировать</a> ";
            $delete = "<a  href='?delete=". $value[id] ."'>удалить</a><br>";
            foreach ($value as $key => $value1) {
                if ($key == 'id') {continue;}
                $data[] = $value1;
            }
            $data[] = $edit;
            $data[] = $delete;
        }
        return $data;
    }

    function addAd($array, $mysqli) {
        $arr = '';
        $end = "', ";
        foreach ($array as $key => $value) {
            if ($key == 'price') {$end = "';";}
            $arr .= $key . " = '" . $value . $end;
        }
        $mysqli->query("insert into ads set " . $arr);
    }
    
    function editAd($array, $id, $mysqli) {
        $arr = '';
        $end = "', ";
        foreach ($array as $key => $value) {
            if ($key == 'price') {$end = "' ";}
            $arr .= $key . " = '" . $value . $end;
        }
        $arr .= "where ads.id = " . $id . ";";
        $mysqli->query("update ads set " . $arr);
    }
    
    function deleteAd($id, $mysqli) {
        $mysqli->query("delete from ads where ads.id = " . $id . ";");
    }
    
    function takeDate($name, $mysqli) {
        $result = $mysqli->query('select * from ' . $name );
        $date = array();
        while ($row = $result->fetch_array(MYSQLI_NUM)){
            $date[$row[0]] = $row[1];
        }
        return $date;
    }
    
    function takeCategorys($mysqli) {
        $result = $mysqli->query('select category, subcategorys.id, subcategory '
                            . 'from categorys '
                            . 'left join subcategorys '
                            . 'on (categorys.id = subcategorys.category_id)');
        $date = array();
        while ($row = $result->fetch_array(MYSQLI_NUM)){
            $date[$row[0]][$row[1]] = $row[2];
        }
        return $date;
    }
