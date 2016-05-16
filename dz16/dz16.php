<?php
    require_once 'initialization.php';
     
    if (isset($_GET['id'])) {
        $smarty->assign('ad', $ads->getAd($_GET['id']));
    } else {
        $ad = new ad();
        $smarty->assign('ad', $ad);
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
    
    $ads->display();