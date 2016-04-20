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
    
    
    require_once 'dbsimple/config.php';
    require_once 'dbsimple/DbSimple/Generic.php';
    
    
    require_once 'firephp/FirePHP.class.php';
    
    $firePHP = FirePHP::getInstance(true);
    $firePHP->setEnabled(true);
    
    
    include 'list_class.php';
    include 'db_class.php';
    include 'data_connection.php';    
    
    $db = new database($server_name, $user_name, $password, $database);
    $db->connect();
    
    include 'data.php';
    include 'datascripts.php';
    include 'search.php';
    include 'debugging.php';
    
    
    if (isset($_GET['delete'])) {   
        $db->deleteAd($_GET['delete']);
        header('Location: ' . $currentFile);
    }

    if (isset($_POST['submit'])) {
        $arr = dataForm();
        
        if (empty($arr['name']) || empty($arr['title']) || empty($arr['price'])) {
            if (empty($arr['name'])){$smarty->assign('error_name', true);}
            if (empty($arr['title'])) {$smarty->assign('error_title', true);}
            if (empty($arr['price'])) {$smarty->assign('error_price', true);}
            $smarty->assign('error', 'Пожалуйста заполните поле');
            $smarty->assign('arr', $arr);
        }else{
            if (isset($_GET['id'])) {
                $db->editAd($arr, $_GET['id']);
            }else{
                $db->addAd($arr);
            }
            header('Location: ' . $currentFile);
        }     
    }
    
    if (isset($_GET['id'])) {
        $smarty->assign('arr', $db->takeAd($_GET['id']));
    }
    
    if (isset($_POST['search'])) {
        $_SESSION['search'] = $_POST['text'];
        header('Location: ' . $currentPage);
    }
    

    $smarty->assign('data_list', $db->takeAdList($_SESSION['search']));
    
    
    $smarty->display('index.tpl');