<?php
    $currentFile = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    $currentPage = $currentFile . '?' . $_SERVER['QUERY_STRING'];
    $smarty->assign('currentFile', $currentFile);
    
    $smarty->assign('citys', takeDate('citys'));
    $smarty->assign('privates', takeDate('privates'));
    $smarty->assign('allow_mails', takeDate('allow_mails'));
    $smarty->assign('ad_categorys', takeCategorys());
    $smarty->assign('search', $_SESSION['search']);