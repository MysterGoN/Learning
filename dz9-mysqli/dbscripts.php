<?php
    function connectToDb($server_name, $user_name, $password, $database) {
        $error = "<br>Пожалуйста перейдите "
                . "по ссылке для устранения неполадок: "
                . "<a href='install.php'>Устранить!</a>";
        $mysqli = mysqli_connect($server_name, $user_name, $password, $database) 
            or die('Невозможно установить соединение ' . $error);
    
        $mysqli->query("SET NAMES utf8");
        
        return $mysqli;
    }
    
    function takeAd($id, $mysqli) {
        $result = $mysqli->query('select * from ads where ads.id = ' . $id);
        $row = $result->fetch_assoc();
        foreach ($row as $key => $value) {
            $date[$key] = $value;
        }
        return $date;
    }

    function takeAdList($search = '', $mysqli) {
        $result = $mysqli->query('select id, title, price, name from ads' . $search);
        $date = array();
        while ($row = $result->fetch_assoc()){
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
