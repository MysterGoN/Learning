<?php
    $currentFile = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    $currentPage = $currentFile . '?' . $_SERVER['QUERY_STRING'];
    $smarty->assign('currentFile', $currentFile);
    
    $smarty->assign('citys', takeData('city'));
    $smarty->assign('privates', takeData('private'));
    $smarty->assign('allow_mails', takeData('allow_mail'));
    $smarty->assign('ad_categorys', takeCategorys());
    $smarty->assign('search', $_SESSION['search']);