<?php
    session_start();

    
    $smarty_dir = 'smarty/';

    require_once($smarty_dir . 'libs/Smarty.class.php');
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
    
    require_once 'datascripts.php';
    
    spl_autoload_register(function ($class) {
        $class_path = 'lib/' . $class . '.class.php';
        if (file_exists($class_path)) {
            include $class_path;
        }
    });

    require_once 'data_connection.php';    
    
    $connection = new database($server_name, $user_name, $password, $database);
    $db = new adSet($connection->connect());
    $errors = new errors(array('title', 'name', 'price'));
    
    require_once 'data.php';
    require_once 'search.php';
    require_once 'debugging.php';
    
    
    if (isset($_GET['delete'])) {   
        $db->deleteAd($_GET['delete']);
        header('Location: ' . $currentFile);
    }

    $ad = new ad($db->takeAd($_GET['id']));
    $smarty->assign('ad', $ad);
    
    if (isset($_POST['submit'])) {
        $ad = new ad(dataForm());       
        if ($errors->ad_error_check($ad, $smarty)) {
            $smarty->assign('ad', $ad);
        } else {
            $db->saveAD($ad);
            header('Location: ' . $currentFile);
        } 
    }
    

    
    if (isset($_POST['search'])) {
        $_SESSION['search'] = $_POST['text'];
        header('Location: ' . $currentPage);
    }
    
    $lists = new adLists($db->takeAdList($_SESSION['search']));
    $smarty->assign('data_list', $lists->showLists());
    
    
    $smarty->display('index.tpl');