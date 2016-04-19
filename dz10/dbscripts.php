<?php
    function myLogger($db, $sql, $caller) {
        global $firePHP;
        if (isset($caller['file'])){
            $firePHP->group("at ".@$caller['file'].' line '.@$caller['line']);
        }
        $firePHP->log($sql);
        if (isset($caller['file'])){
            $firePHP->groupEnd();
        }
    }
    
    function tableLogger($table) {
        global $firePHP;
        $firePHP->table('Table Label', $table);
    }
    
    function databaseErrorHandler($message, $info) {
            if (!error_reporting()) return;
            echo "Не удалось установить соединение"
               . "<br>Пожалуйста перейдите "
               . "по ссылке для устранения неполадок: "
               . "<a href='install.php'>Устранить!</a>";
            exit();
        }
    
    function connectToDb($server_name, $user_name, $password, $database) {
        $db = DbSimple_Generic::connect('mysqli://' . $user_name . ':' . $password . '@' . $server_name . '/' . $database);
    
        $db->setErrorHandler('databaseErrorHandler');
        
        $db->setLogger('myLogger');
        
        $db->query("SET NAMES utf8");
        
        return $db;
    }
    
    function takeAd($id, $db) {        
        $result = $db->selectRow('select * from ads where ads.id = ?', $id);
        tableLogger($result);
        return $result;
    }

    function takeAdList($search, $db) {
        $result = $db->select('select id, title, price, name from ads where title like ?', '%' . $search . '%');
        tableLogger($result);
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

    function addAd($array, $db) {
        $db->query("insert into ads set ?a", $array);
    }
    
    function editAd($array, $id, $db) {
        $db->query("update ads set ?a where id = ?", $array, $id);
    }
    
    function deleteAd($id, $db) {
        $db->query("delete from ads where ads.id = ?", $id);
    }
    
    function takeData($name, $db) {
        $result = $db->selectCol('select id as array_key, ?# from ?#', $name, $name . 's');
        tableLogger($result);
        return $result;
    }
    
    function takeCategorys($db) {
        $result = $db->selectCol('select category as array_key_1, '
                            . 'subcategorys.id as array_key_2, '
                            . 'subcategory '
                            . 'from categorys '
                            . 'left join subcategorys '
                            . 'on (categorys.id = subcategorys.category_id)');
        tableLogger($result);
        return $result;
    }
