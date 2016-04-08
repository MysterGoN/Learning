<?php
    $currentFile = 'http://' . $_SERVER['HTTP_HOST']. $_SERVER['PHP_SELF'];
    $smarty->assign('currentFile', $currentFile);

    //
    //СДЕЛАТЬ ЧЕРЕЗ foreach
    //
    
    $filename = 'list.txt';
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

    $smarty->assign('citys', array('641780' => 'Новосибирск', 
                                   '641490' => 'Барабинск', 
                                   '641510' => 'Бердск',
                                   '641600' => 'Искитим'));
    
    $smarty->assign('privates', array('0' => 'Частное лицо', 
                                      '1' => 'Компания'));
    
    $smarty->assign('allow_mails', array('1' => ' не хочу получать вопросы по объявлению по e-mail'));
    
    $smarty->assign('ad_category', array('Транспорт' => array('9' => 'Автомобили с пробегом', 
                                                        '109' => 'Новые автомобили', 
                                                        '14' => 'Мотоциклы и мототехника'),
                                   'Недвижимость' => array('24' => 'Квартиры', 
                                                           '23' => 'Комнаты', 
                                                           '25' => 'Дома, дачи, коттеджи'),
                                   'Работа' => array('111' => 'Вакансии (поиск сотрудников)', 
                                                     '112' => 'Резюме (поиск работы)')));