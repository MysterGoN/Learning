<?php
    session_start();

    $smarty_dir = 'smarty/';

    require($smarty_dir . 'libs/Smarty.class.php');
    $smarty = new Smarty();

    $smarty->compile_check = true;
    $smarty->debugging = false;

    $smarty->template_dir = $smarty_dir . 'templates';
    $smarty->compile_dir = $smarty_dir . 'templates_c';
    $smarty->cache_dir = $smarty_dir . 'cache';
    $smarty->config_dir = $smarty_dir . 'configs';
    
    
    
    include 'dbscripts.php';
    include 'data_connection.php';
    connectToDb($server_name, $user_name, $password, $database);
    include 'data.php';

    
    
    if (isset($_GET['delete'])) {   
        deleteAd($_GET['delete']);
        header('Location: ' . $currentFile);
    }

    if (isset($_POST['submit'])) {
        $arr = array('private' => $private, 
                     'name' => $name, 
                     'email' => $email, 
                     'allow_mail' => $allow_mail,
                     'phone' => $phone, 
                     'city' => $city, 
                     'ad' => $ad, 
                     'title' => $title, 
                     'description' => $description, 
                     'price' => $price);
        
        if (empty($name) || empty($title) || empty($price)) {
            if (empty($name)){$smarty->assign('error_name', true);}
            if (empty($title)) {$smarty->assign('error_title', true);}
            if (empty($price)) {$smarty->assign('error_price', true);}
            $smarty->assign('error', 'Пожалуйста заполните поле');
            $smarty->assign('arr', $arr);
        }else{
            if (isset($_GET['id'])) {
                editAd($arr, $_GET['id']);
            }else{
                addAd($arr);
            }
            header('Location: ' . $currentFile);
        }     
    }
    
    if (isset($_GET['id'])) {
        $smarty->assign('arr', takeAd($_GET['id']));
    }
    
    $smarty->assign('data_list', takeAdList());

    if (condition) {
        # code...
    }

    $smarty->display('index.tpl');