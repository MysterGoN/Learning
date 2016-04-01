<?php
    $currentFile = 'http://' . $_SERVER['HTTP_HOST']. $_SERVER['PHP_SELF'];

    include 'date.php';
    
    if (isset($_GET['delete'])) {   
        setcookie($_GET['delete'], serialize($cook), time() - 1000);
        unset($_GET['delete']);
        header('Location: ' . $currentFile);;
    }

    if (empty($_COOKIE['count'])) {
        setcookie('count', 1, time() + 3600*60*7);
    } else {
        if (isset($_POST['submit'])) {
            setcookie('count', ++$_COOKIE['count'], time() + 3600*60*7);
        }
    }
    
    if (isset($_POST['submit'])) {
        $cook = array('private' => $private, 'name' => $name, 'email' => $email, 'allow_mails' => $allow_mail, 'phone' => $phone, 'city' => $city, 'ad' => $ad, 'title' => $title, 'description' => $description, 'price' => $price);
        if (isset($_GET['id'])) {
            setcookie($_GET['id'], serialize($cook), time() + 3600*60*7);
        }else{
            setcookie('list_' . $_COOKIE['count'], serialize($cook), time() + 3600*60*7);
        }
        header('Location: ' . $currentFile);
    }
    
    if (isset($_GET['id'])) {
        $arr = unserialize($_COOKIE[$_GET['id']]);
    }
    
    include 'form.php';
    
    foreach ($_COOKIE as $key => $value1) {
        if ($key == 'PHPSESSID' || $key == 'count' || $key == 'XDEBUG_SESSION') {
            continue;
        }
        $value = unserialize($value1);
        echo $value['title'] . ' | ' . $value['price'] . ' | ' . $value['name']. ' | ' . "<a  href='?id=" . $key . "'>редактировать</a> " . "<a  href='?delete=". $key ."'>удалить</a><br>" ;
    }  
?>
