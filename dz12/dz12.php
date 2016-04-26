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
    require_once 'data_connection.php';
        
    spl_autoload_register(function ($class) {
        $class_path = 'lib/' . $class . '.class.php';
        if (file_exists($class_path)) {
            include $class_path;
        }
    });
    
    $conn = new database($server_name, $user_name, $password, $database);
    $db = $conn->connect();
    $errors = new errors(array('title', 'name', 'price'));
    
    require_once 'contentscripts.php';
    require_once 'data.php';

    
    $ads = ads::instance();
    $ads->getAdsFromDB($_SESSION['search']);
    $ads->display();
    
    if (isset($_GET['id'])) {
        $smarty->assign('ad', $ads->getAd($_GET['id']));
    } else {
        $ad = new ad();
        $smarty->assign('ad', $ad);
    }
    
    if (isset($_GET['delete'])) {   
        $ads->deleteAd($_GET['delete']);
        header('Location: ' . $currentFile);
    }    
    
    if (isset($_POST['submit'])) {
        $ad = new ad(dataForm());      
        if ($errors->ad_error_check($ad, $smarty)) {
            $smarty->assign('ad', $ad);
        } else {
            $ads->addAd($ad);
            header('Location: ' . $currentFile);
        } 
    }
    
    if (isset($_POST['search'])) {
        $_SESSION['search'] = $_POST['text'];
        header('Location: ' . $currentPage);
    }
    
    $smarty->display('index.tpl');