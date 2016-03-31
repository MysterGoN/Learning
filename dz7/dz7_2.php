<?php
    
    $currentFile = 'http://' . $_SERVER['HTTP_HOST']. $_SERVER['PHP_SELF'];
    
    include 'filescript.php';
    include 'date.php';
    

    if (isset($_GET['delete'])) {   
        deleteFileLine($filename, $_GET['delete']);
        unset($_GET['delete']);
        header('Location: ' . $currentFile);;
    }

    if (isset($_POST['submit'])) {
        $arr = array('private' => $private, 'name' => $name, 'email' => $email, 'allow_mails' => $allow_mails, 'phone' => $phone, 'city' => $city, 'ad' => $ad, 'title' => $title, 'description' => $description, 'price' => $price);
        if (isset($_GET['id'])) {
            editFileLine($filename, $arr, $_GET['id']);
        }else{
            addToEndFile($filename, $arr);
        }
        header('Location: ' . $currentFile);;
    }
    
    if (isset($_GET['id'])) {
        $arr = readFileLine($filename, $_GET['id']);
    }
    
    include 'form.php';
    
    readMyFile($filename);
?>