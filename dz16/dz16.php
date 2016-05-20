<?php
    require_once 'initialization.php';

    $ad = new ad();
    $smarty->assign('ad', $ad);
    
    $ads->display();