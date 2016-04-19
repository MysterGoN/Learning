<?php
    $currentFile = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    $currentPage = $currentFile . '?' . $_SERVER['QUERY_STRING'];
    $smarty->assign('currentFile', $currentFile);
    
    $smarty->assign('citys', takeData('city', $db));
    $smarty->assign('privates', takeData('private', $db));
    $smarty->assign('allow_mails', takeData('allow_mail', $db));
    $smarty->assign('ad_categorys', takeCategorys($db));
    $smarty->assign('search', $_SESSION['search']);