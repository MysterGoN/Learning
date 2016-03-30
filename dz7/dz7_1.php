<?php
if (isset($_GET['delete'])) {   
    setcookie($_GET['delete'], serialize($cook), time() - 1000);
    unset($_GET['delete']);
    header('Location: dz7_1.php');
}
    $private = htmlentities($_POST['private']);
    $name = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    $allow_mails = htmlentities($_POST['allow_mails']);
    $phone = htmlentities($_POST['phone']);
    $city = htmlentities($_POST['city']);
    $title = htmlentities($_POST['title']);
    $description = htmlentities($_POST['description']);
    $price = (int)htmlentities($_POST['price']);
    
    
    
    if (empty($_COOKIE['count'])) {
       setcookie('count', 1, time() + 3600*60*7);
    } else {
        if (isset($_POST['submit'])) {
            setcookie('count', ++$_COOKIE['count'], time() + 3600*60*7);
        }
    }
    
    if (isset($_POST['submit'])) {
        if (isset($_GET['id'])) {
            $cook = array('private' => $private, 'name' => $name, 'email' => $email, 'allow_mails' => $allow_mails, 'phone' => $phone, 'city' => $city, 'title' => $title, 'description' => $description, 'price' => $price);
            setcookie($_GET['id'], serialize($cook), time() + 3600*60*7);
            header('Location: dz7_1.php');
        }else{
            $cook = array('private' => $private, 'name' => $name, 'email' => $email, 'allow_mails' => $allow_mails, 'phone' => $phone, 'city' => $city, 'title' => $title, 'description' => $description, 'price' => $price);
            setcookie('list_' . $_COOKIE['count'], serialize($cook), time() + 3600*60*7);
            header('Location: dz7_1.php');
        }
    }
    
    
    
    $citys = array('641780' => 'Новосибирск', 
                   '641490' => 'Барабинск', 
                   '641510' => 'Бердск',
                   '641600' => 'Искитим');
    
    $privates = array('0' => 'Частное лицо', '1' => 'Компания');
    
    $allow_mails = array('1' => ' не хочу получать вопросы по объявлению по e-mail');
    
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
    if (isset($_GET['id'])) {
        $cook = unserialize($_COOKIE[$_GET['id']]);
    }
?>
<form  method="post">  
    <table>
        <tr>
            <td></td>
            <td>
                <?addPrivates($privates, $cook['private'])?>
            </td>
        </tr>
        <tr>
            <td><label>Ваше имя</label></td>
            <td><input type="text" maxlength="40" value="<?=$cook['name']?>" name="name"></td>
        </tr>
        <tr>
            <td><label>Электронная почта</label></td>
            <td><input type="text" value="<?=$cook['email']?>" name="email"></td>
        </tr>
        <tr>
            <td></td>
            <td><?addAllowMails($allow_mails, $cook['allow_mails'])?></td>
        </tr>
        <tr>
            <td><label>Номер телефона</label></td>
            <td><input type="text" value="<?=$cook['phone']?>" name="phone"></td>
        </tr>
        <tr>
            <td><label>Город</label></td>
            <td>
                <select title="Выберите Ваш город" name="city"> 
                    <option value="">-- Выберите город --</option>
                    <option disabled="disabled">-- Города --</option>
                    <? addCitys($citys, $cook['city']) ?>
                </select> 
            </td>
        </tr>
        <tr>
            <td><label>Название объявления</label></td>
            <td><input type="text" maxlength="50" value="<?=$cook['title']?>" name="title"></td>
        </tr>
        <tr>
            <td><label>Описание объявления</label></td>
            <td><textarea maxlength="3000" name="description"><?=$cook['description']?></textarea></td>
        </tr>
        <tr>
            <td><label>Цена</label></td>
            <td><input type="text" maxlength="9" value="<?=$cook['price']?>" name="price">&nbsp;<span>руб.</span> </td>
        </tr>
    </table>
    <input type="submit" value="Подтвердить" name="submit">
    <button type="button" name="reset" onclick="location.href='dz7_1.php'">Очистить</button>
</form>
<br>
<br>
<?php
    foreach ($_COOKIE as $key => $value1) {
        if ($key == 'PHPSESSID' || $key == 'count') {
            continue;
        }
        $value = unserialize($value1);
        echo "<a  href='?id=" . $key . "'>" . $value['title']. "</a>" . ' | ' . $value['price'] . ' | ' . $value['name']. ' | ' . "<a  href='?delete=". $key ."'>удалить</a><br>";
    }
    
        
?>