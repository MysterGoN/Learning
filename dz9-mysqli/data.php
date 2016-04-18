<?php
    $currentFile = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    $currentPage = $currentFile . '?' . $_SERVER['QUERY_STRING'];
    $smarty->assign('currentFile', $currentFile);
    
    $smarty->assign('citys', takeDate('citys', $db));
    $smarty->assign('privates', takeDate('privates', $db));
    $smarty->assign('allow_mails', takeDate('allow_mails', $db));
    $smarty->assign('ad_categorys', takeCategorys($db));
    $smarty->assign('search', $_SESSION['search']);