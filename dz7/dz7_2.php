<?php
$filename = 'list.txt';

if (!file_exists($filename)) {
    $f = fopen($filename, 'w');
    fclose($f);
}

function addToEndFile($file, $array) {
        if (!$f = fopen($file, 'a')) {
            echo 'Не могу открыть файл для записи';
            exit;
        }
        fwrite($f, serialize($array) . "\n");
        fclose($f);
    }
    
     function addToFile($file, $array) {
        if (!$f = fopen($file, 'w')) {
            echo 'Не могу открыть файл для записи';
            exit;
        }
        foreach ($array as $value) {
            fwrite($f, $value);
        }
        fclose($f);
    }
    
    function editFileLine($file, $array, $key) {;
        $f = file($file);
        $f[$key] = serialize($array);
        addToFile($file, $f);
    }
    
    function readFileLine($file, $key) {;
        $f = file($file);
        return unserialize($f[$key]);
    }
    
    function deleteFileLine($file, $key) {;
        $f = file($file);
        unset($f[$key]);
        addToFile($file, $f);
    }
    
    function readMyFile($file) {
        $f = file($file);
        foreach ($f as $key => $value1) {
            $value = unserialize($value1);
            echo "<a  href='?id=" . $key . "'>" . $value['title']. "</a>" . ' | ' . $value['price'] . ' | ' . $value['name']. ' | ' . "<a  href='?delete=". $key ."'>удалить</a><br>";
        }
    }
    
if (isset($_GET['delete'])) {   
    deleteFileLine($filename, $_GET['delete']);
    unset($_GET['delete']);
    header('Location: dz7_2.php');
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
    
    if (isset($_POST['submit'])) {
        if (isset($_GET['id'])) {
            $arr = array('private' => $private, 'name' => $name, 'email' => $email, 'allow_mails' => $allow_mails, 'phone' => $phone, 'city' => $city, 'title' => $title, 'description' => $description, 'price' => $price);
            editFileLine($filename, $arr, $_GET['id']);
            header('Location: dz7_2.php');
        }else{
            $arr = array('private' => $private, 'name' => $name, 'email' => $email, 'allow_mails' => $allow_mails, 'phone' => $phone, 'city' => $city, 'title' => $title, 'description' => $description, 'price' => $price);
            addToEndFile($filename, $arr);
            header('Location: dz7_2.php');
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
        $arr = readFileLine($filename, $_GET['id']);
    }
?>
<form  method="post">  
    <table>
        <tr>
            <td></td>
            <td>
                <?addPrivates($privates, $arr['private'])?>
            </td>
        </tr>
        <tr>
            <td><label>Ваше имя</label></td>
            <td><input type="text" maxlength="40" value="<?=$arr['name']?>" name="name"></td>
        </tr>
        <tr>
            <td><label>Электронная почта</label></td>
            <td><input type="text" value="<?=$arr['email']?>" name="email"></td>
        </tr>
        <tr>
            <td></td>
            <td><?addAllowMails($allow_mails, $arr['allow_mails'])?></td>
        </tr>
        <tr>
            <td><label>Номер телефона</label></td>
            <td><input type="text" value="<?=$arr['phone']?>" name="phone"></td>
        </tr>
        <tr>
            <td><label>Город</label></td>
            <td>
                <select title="Выберите Ваш город" name="city"> 
                    <option value="">-- Выберите город --</option>
                    <option disabled="disabled">-- Города --</option>
                    <? addCitys($citys, $arr['city']) ?>
                </select> 
            </td>
        </tr>
        <tr>
            <td><label>Название объявления</label></td>
            <td><input type="text" maxlength="50" value="<?=$arr['title']?>" name="title"></td>
        </tr>
        <tr>
            <td><label>Описание объявления</label></td>
            <td><textarea maxlength="3000" name="description"><?=$arr['description']?></textarea></td>
        </tr>
        <tr>
            <td><label>Цена</label></td>
            <td><input type="text" maxlength="9" value="<?=$arr['price']?>" name="price">&nbsp;<span>руб.</span> </td>
        </tr>
    </table>
    <input type="submit" value="Подтвердить" name="submit">
    <button type="button" name="reset" onclick="location.href='dz7_2.php'">Очистить</button>
</form>
<br>
<br>
<?php
    readMyFile($filename);
?>