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
    
    
    include 'dbscripts.php';
    include 'data_connection.php';    
    
    $db = connectToDb($server_name, $user_name, $password, $database);
    
    //include 'data.php';
    include 'datascripts.php';
    include 'search.php';
    include 'debugging.php';
    
    pre(takeAdList('', $db));
    
    
//    if (isset($_GET['delete'])) {   
//        deleteAd($_GET['delete'], $db);
//        header('Location: ' . $currentFile);
//    }
//
//    if (isset($_POST['submit'])) {
//        $arr = dataForm();
//        
//        if (empty($arr['name']) || empty($arr['title']) || empty($arr['price'])) {
//            if (empty($arr['name'])){$smarty->assign('error_name', true);}
//            if (empty($arr['title'])) {$smarty->assign('error_title', true);}
//            if (empty($arr['price'])) {$smarty->assign('error_price', true);}
//            $smarty->assign('error', 'Пожалуйста заполните поле');
//            $smarty->assign('arr', $arr);
//        }else{
//            if (isset($_GET['id'])) {
//                editAd($arr, $_GET['id'], $db);
//            }else{
//                addAd($arr, $db);
//            }
//            header('Location: ' . $currentFile);
//        }     
//    }
//    
//    if (isset($_GET['id'])) {
//        $smarty->assign('arr', takeAd($_GET['id'], $db));
//    }
//    
//    if (isset($_POST['search'])) {
//        $_SESSION['search'] = $_POST['text'];
//        header('Location: ' . $currentPage);
//    }
//    
//
//    $smarty->assign('data_list', takeAdList($_SESSION['search'], $db));
//    
//    
//    $smarty->display('index.tpl');