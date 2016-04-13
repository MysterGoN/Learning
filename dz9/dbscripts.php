<?php
    
    function connectToDb($server_name, $user_name, $password, $database) {
        $conn = mysql_connect($server_name, $user_name, $password) 
            or die('Невозможно установить соединение: '. mysql_error());
    
        mysql_select_db($database) 
            or die('Не удалось выбрать базу данных');
    
        mysql_query("SET NAMES utf8");
    }
    
    function takeAd($id) {
        $result = mysql_query('select * from ads where ads.id = ' . $id);
        $row = mysql_fetch_assoc($result);
        $date = array('private' => $row['private_id'], 
                      'name' => $row['name'], 
                      'email' => $row['email'], 
                      'allow_mails' => $row['allow_mail_id'], 
                      'phone' => $row['phone'], 
                      'city' => $row['city_id'], 
                      'ad' => $row['ad_category_id'], 
                      'title' => $row['title'], 
                      'description' => $row['description'], 
                      'price' => $row['price']);        
        return $date;
    }

    function takeAdList() {
        $result = mysql_query('select * from ads');
        $date = array();
        while ($row = mysql_fetch_assoc($result)){
            $edit = "<a  href='?id=" . $row[id] . "'>редактировать</a> ";
            $delete = "<a  href='?delete=". $row[id] ."'>удалить</a><br>";
            $date[] = $row[title];
            $date[] = $row[price];
            $date[] = $row[name];
            $date[] = $edit;
            $date[] = $delete;
        }
        return $date;
    }

    function addAd($array) {
        mysql_query("insert into ads set "
                . "private_id = '" . $array['private']
                . "', name = '" . $array['name']
                . "', email = '" . $array['email']
                . "', allow_mail_id = '" . $array['allow_mails']
                . "', phone = '" . $array['phone']
                . "', city_id = '" . $array['city']
                . "', ad_category_id = '" . $array['ad']
                . "', title = '" . $array['title']
                . "', description = '" . $array['description']
                . "', price = '" . $array['price'] . "';");
    }
    
    function editAd($array, $id) {
        mysql_query("update ads set "
                . "private_id = '" . $array['private']
                . "', name = '" . $array['name']
                . "', email = '" . $array['email']
                . "', allow_mail_id = '" . $array['allow_mails']
                . "', phone = '" . $array['phone']
                . "', city_id = '" . $array['city']
                . "', ad_category_id = '" . $array['ad']
                . "', title = '" . $array['title']
                . "', description = '" . $array['description']
                . "', price = '" . $array['price']
                . "' where ads.id = " . $id . ";");
    }
    
    function deleteAd($id) {
        mysql_query("delete from ads where ads.id = " . $id . ";");
    }
    
    function takeDate($name) {
        $result = mysql_query('select * from ' . $name );
        $date = array();
        while ($row = mysql_fetch_array($result)){
            $date[$row[0]] = $row[1];
        }
        return $date;
    }
    
    function takeCategorys() {
        $result = mysql_query('select category, subcategorys.id, subcategory '
                            . 'from categorys '
                            . 'left join subcategorys '
                            . 'on (categorys.id = subcategorys.category_id)');
        $date = array();
        while ($row = mysql_fetch_array($result)){
            $date[$row[0]][$row[1]] = $row[2];
        }
        return $date;
    }