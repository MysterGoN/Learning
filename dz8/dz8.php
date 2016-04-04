<?php
    $smarty_dir = 'smarty/';

    require($smarty_dir . 'libs/Smarty.class.php');
    $smarty = new Smarty();

    $smarty->compile_check = true;
    $smarty->debugging = false;

    $smarty->template_dir = $smarty_dir . 'templates';
    $smarty->compile_dir = $smarty_dir . 'templates_c';
    $smarty->cache_dir = $smarty_dir . 'cache';
    $smarty->config_dir = $smarty_dir . 'configs';

    include 'date.php';
    include 'filescript.php';

    if (isset($_GET['delete'])) {   
        deleteFileLine($filename, $_GET['delete']);
        unset($_GET['delete']);
        header('Location: ' . $currentFile);
    }

    if (isset($_POST['submit'])) {
        $arr = array('private' => $private, 
                     'name' => $name, 
                     'email' => $email, 
                     'allow_mails' => $allow_mail, 
                     'phone' => $phone, 
                     'city' => $city, 
                     'ad' => $ad, 
                     'title' => $title, 
                     'description' => $description, 
                     'price' => $price);
        
        if (isset($_GET['id'])) {
            editFileLine($filename, $arr, $_GET['id']);
        }else{
            addToEndFile($filename, $arr);
        }
        header('Location: ' . $currentFile);
    }
    
    if (isset($_GET['id'])) {
        $smarty->assign('arr', readFileLine($filename, $_GET['id']));
    }
    
    $smarty->assign('data_list', readMyFile($filename));

    $smarty->display('index.tpl');