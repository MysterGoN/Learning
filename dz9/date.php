<?php
    $currentFile = 'http://' . $_SERVER['HTTP_HOST']. $_SERVER['PHP_SELF'];
    $smarty->assign('currentFile', $currentFile);

    $private = htmlentities(ltrim($_POST['private']));
    $name = htmlentities(ltrim($_POST['name']));
    $email = htmlentities(ltrim($_POST['email']));
    $allow_mail = htmlentities(ltrim($_POST['allow_mails'][0]));
    $phone = htmlentities(ltrim($_POST['phone']));
    $city = htmlentities(ltrim($_POST['city']));
    $ad = htmlentities(ltrim($_POST['ad_category']));
    $title = htmlentities(ltrim($_POST['title']));
    $description = htmlentities(ltrim($_POST['description']));
    $price = (int)htmlentities(ltrim($_POST['price']));

    $smarty->assign('citys', takeDate('citys'));
    $smarty->assign('privates', takeDate('privates'));
    $smarty->assign('allow_mails', takeDate('allow_mails'));
    $smarty->assign('ad_category', takeCategorys());