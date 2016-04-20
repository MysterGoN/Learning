<?php
    $currentFile = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    $currentPage = $currentFile . '?' . $_SERVER['QUERY_STRING'];
    $smarty->assign('currentFile', $currentFile);
    
    $smarty->assign('citys', $db->takeData('city'));
    $smarty->assign('privates', $db->takeData('private'));
    $smarty->assign('allow_mails', $db->takeData('allow_mail'));
    $smarty->assign('ad_categorys', $db->takeCategorys());
    $smarty->assign('search', $_SESSION['search']);