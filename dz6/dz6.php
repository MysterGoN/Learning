<?php
session_start();
    
if (isset($_GET['delete'])) {
    unset($_SESSION[$_GET['delete']]);
    unset($_GET['delete']);
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
    
    if (empty($_SESSION['count'])) {
       $_SESSION['count'] = 1;
    } else {
        if (isset($_POST['submit'])) {
            $_SESSION['count']++;
        }
    }
    if (isset($_POST['submit'])) {
        if (isset($_GET['id'])) {
            $_SESSION[$_GET['id']] = array('private' => $private, 'name' => $name, 'email' => $email, 'allow_mails' => $allow_mails, 'phone' => $phone, 'city' => $city, 'title' => $title, 'description' => $description, 'price' => $price);
        }else{
            $_SESSION['ball' . $_SESSION['count']] = array('private' => $private, 'name' => $name, 'email' => $email, 'allow_mails' => $allow_mails, 'phone' => $phone, 'city' => $city, 'title' => $title, 'description' => $description, 'price' => $price);
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
?>
<form  method="post">  
    <table>
        <tr>
            <td></td>
            <td>
                <?addPrivates($privates, $_SESSION[$_GET['id']]['private'])?>
            </td>
        </tr>
        <tr>
            <td><label>Ваше имя</label></td>
            <td><input type="text" maxlength="40" value="<?=$_SESSION[$_GET['id']]['name']?>" name="name"></td>
        </tr>
        <tr>
            <td><label>Электронная почта</label></td>
            <td><input type="text" value="<?=$_SESSION[$_GET['id']]['email']?>" name="email"></td>
        </tr>
        <tr>
            <td></td>
            <td><?addAllowMails($allow_mails, $_SESSION[$_GET['id']]['allow_mails'])?></td>
        </tr>
        <tr>
            <td><label>Номер телефона</label></td>
            <td><input type="text" value="<?=$_SESSION[$_GET['id']]['phone']?>" name="phone"></td>
        </tr>
        <tr>
            <td><label>Город</label></td>
            <td>
                <select title="Выберите Ваш город" name="city"> 
                    <option value="">-- Выберите город --</option>
                    <option disabled="disabled">-- Города --</option>
                    <? addCitys($citys, $_SESSION[$_GET['id']]['city']) ?>
                </select> 
            </td>
        </tr>
        <tr>
            <td><label>Название объявления</label></td>
            <td><input type="text" maxlength="50" value="<?=$_SESSION[$_GET['id']]['title']?>" name="title"></td>
        </tr>
        <tr>
            <td><label>Описание объявления</label></td>
            <td><textarea maxlength="3000" name="description"><?=$_SESSION[$_GET['id']]['description']?></textarea></td>
        </tr>
        <tr>
            <td><label>Цена</label></td>
            <td><input type="text" maxlength="9" value="<?=$_SESSION[$_GET['id']]['price']?>" name="price">&nbsp;<span>руб.</span> </td>
        </tr>
    </table>
    <input type="submit" value="Подтвердить" name="submit">
    <button type="button" name="reset" onclick="location.href='dz6.php'">Очистить</button>
</form>
<br>
<br>
<?php
    foreach ($_SESSION as $key => $value) {
        if ($key == 'ball1' || $key == 'count') {
            continue;
        }
        echo "<a  href='?id=" . $key . "'>" . $value['title']. "</a>" . ' | ' . $value['price'] . ' | ' . $value['name']. ' | ' . "<a  href='?delete=". $key ."'>удалить</a><br>";
    }
        
?>