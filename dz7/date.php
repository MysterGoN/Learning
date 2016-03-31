<?php
    $private = htmlentities($_POST['private']);
    $name = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    $allow_mails = htmlentities($_POST['allow_mails']);
    $phone = htmlentities($_POST['phone']);
    $city = htmlentities($_POST['city']);
    $ad = htmlentities($_POST['ad_category']);
    $title = htmlentities($_POST['title']);
    $description = htmlentities($_POST['description']);
    $price = (int)htmlentities($_POST['price']);

    $citys = array('641780' => 'Новосибирск', 
                    '641490' => 'Барабинск', 
                    '641510' => 'Бердск',
                    '641600' => 'Искитим');

     $privates = array('0' => 'Частное лицо', '1' => 'Компания');

     $allow_mails = array('1' => ' не хочу получать вопросы по объявлению по e-mail');

     $ad_category = array('Транспорт' => array('9' => 'Автомобили с пробегом', 
                                               '109' => 'Новые автомобили', 
                                               '14' => 'Мотоциклы и мототехника'),
                          'Недвижимость' => array('24' => 'Квартиры', 
                                                  '23' => 'Комнаты', 
                                                  '25' => 'Дома, дачи, коттеджи'),
                          'Работа' => array('111' => 'Вакансии (поиск сотрудников)', 
                                            '112' => 'Резюме (поиск работы)'));

     function addCitys ($citys = '', $gorod = '') {
         foreach($citys as $number => $city){
             $selected = ($number == $gorod) ? 'selected=""' : '';
             echo '<option '.$selected.' value="'.$number.'">'.$city.'</option>';
         }
     }

     function addPrivates($privates, $checked = '') {
         foreach ($privates as $check => $company) {
             $selected = ($checked == $check) ? 'checked=""' : '';
             echo '<label><input type="radio" ' . $selected . 'value="' . $check . '" name="private">' . $company . '<label>';
         }
     }

      function addAllowMails ($allow_mails = '', $checked = '') {
         foreach($allow_mails as $check => $note){
             $selected = ($checked == $check) ? 'checked=""' : '';
             echo '<label><input type="checkbox" '.$selected.' value="'.$check.'" name="allow_mails">'.$note.'</label></td>';
         }
     }

     function addAdCategory ($category = '', $ad = '') {
         foreach($category as $categ => $value){
             echo '<optgroup label="' . $categ . '">';
             foreach ($value as $number => $value1) {
                 $selected = ($ad == $number) ? 'selected=""' : '';
                 echo '<option '.$selected.' value="'.$number.'">'.$value1.'</option>';
             }
             echo '</optgroup>';
         }
     }