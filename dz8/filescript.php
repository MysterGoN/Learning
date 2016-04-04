<?php    
    if (!file_exists($filename)) {
        $f = fopen($filename, 'w');
        fclose($f);
    }
    
    function addToEndFile($file, $array) {
        if (!$f = fopen($file, 'a')) {
            echo 'Не могу открыть файл для записи';
            exit;
        }
        fwrite($f, serialize($array) . "\n");
        fclose($f);
    }
    
     function addToFile($file, $array) {
        if (!$f = fopen($file, 'w')) {
            echo 'Не могу открыть файл для записи';
            exit;
        }
        foreach ($array as $value) {
            fwrite($f, $value);
        }
        fclose($f);
    }
    
    function editFileLine($file, $array, $key) {;
        $f = file($file);
        $f[$key] = serialize($array) . "\n";
        addToFile($file, $f);
    }
    
    function readFileLine($file, $key) {;
        $f = file($file);
        return unserialize($f[$key]);
    }
    
    function deleteFileLine($file, $key) {;
        $f = file($file);
        unset($f[$key]);
        addToFile($file, $f);
    }
    
    function readMyFile($file) {
        $f = file($file);
        $arr = array();
        foreach ($f as $key => $value1) {
            $value = unserialize($value1);
            $edit = "<a  href='?id=" . $key . "'>редактировать</a> ";
            $delete = "<a  href='?delete=". $key ."'>удалить</a><br>";
            $arr[] = $value['title'];
            $arr[] = $value['price'];
            $arr[] = $value['name'];
            $arr[] = $edit;
            $arr[] =  $delete;
        }
        return $arr;
    }
