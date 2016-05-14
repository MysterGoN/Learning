<?php

    function dataForm() {
        $arr = array();
        if (!isset($_POST['allow_mail_id'])) {
            $arr['allow_mail_id'] = 0;
        }
        foreach ($_POST as $key => $value) {
            $temp = $value;
            if ($key == 'submit') {continue;}
            if ($key == 'allow_mail_id') {
                $temp = $temp[0];
            }
            if ($key == 'price' || $key == 'phone') {
                $temp = (int)$temp;
            }
            $arr[$key] = htmlentities(ltrim($temp), ENT_QUOTES, 'UTF-8');
        }
        return $arr;
    }

    function treeToArray($tree) {
        $array = array();
        $cat = '';
        foreach ($tree as $category) {
            foreach ($category as $key => $value) {
                if($key == 'category') {
                    $cat = $value;
                } else {
                    foreach ($value as $key1 => $value1) {
                        $array[$cat][$key1] = $value1['category'];
                    }
                }
            }
        }
        return $array;
    }
    
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
            die("Не удалось установить соединение"
               . "<br>Пожалуйста перейдите "
               . "по ссылке для устранения неполадок: "
               . "<a href='install.php'>Устранить!</a><br>");
            exit();
    }