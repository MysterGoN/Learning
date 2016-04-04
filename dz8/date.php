<?php
    $currentFile = 'http://' . $_SERVER['HTTP_HOST']. $_SERVER['PHP_SELF'];
    $smarty->assign('currentFile', $currentFile);

    $filename = 'list.txt';
    $private = htmlentities($_POST['private']);
    $name = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    $allow_mail = htmlentities($_POST['allow_mails'][0]);
    $phone = htmlentities($_POST['phone']);
    $city = htmlentities($_POST['city']);
    $ad = htmlentities($_POST['ad_category']);
    $title = htmlentities($_POST['title']);
    $description = htmlentities($_POST['description']);
    $price = (int)htmlentities($_POST['price']);

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