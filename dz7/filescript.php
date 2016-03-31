<?php
    $filename = 'list.txt';
    
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
        $f[$key] = serialize($array);
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
        foreach ($f as $key => $value1) {
            $value = unserialize($value1);
            echo "<a  href='?id=" . $key . "'>" . $value['title']. "</a>" . ' | ' . $value['price'] . ' | ' . $value['name']. ' | ' . "<a  href='?delete=". $key ."'>удалить</a><br>";
        }
    }
