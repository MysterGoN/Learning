<?php
session_start();
    
if (isset($_GET['delete'])) {
    unset($_SESSION[$_GET['did']]);
    unset($_GET['delete']);
    unset($_GET['did']);
}
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    
    $session = array('name' => $name, 'email' => $email, 'phone' => $phone, 'city' => $city, 'title' => $title, 'description' => $description, 'price' => $price);
    if (empty($_SESSION['count'])) {
       $_SESSION['count'] = 1;
    } else {
        if (isset($_POST['submit'])) {
            $_SESSION['count']++;
        }
    }
    if (isset($_POST['submit'])) {
        $_SESSION['ball' . $_SESSION['count']] = array('name' => $name, 'email' => $email, 'phone' => $phone, 'city' => $city, 'title' => $title, 'description' => $description, 'price' => $price);
    }
    
?>
<form  method="post">  
    <table>
        <tr>
            <td><label>Ваше имя</label></td>
            <td><input type="text" maxlength="40" value="<?=$_SESSION[$_GET['id']]['name']?>" name="name"></td>
        </tr>
        <tr>
            <td><label>Электронная почта</label></td>
            <td><input type="text" value="<?=$_SESSION[$_GET['id']]['email']?>" name="email"></td>
        </tr>
        <tr>
            <td><label>Номер телефона</label></td>
            <td><input type="text" value="<?=$_SESSION[$_GET['id']]['phone']?>" name="phone"></td>
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
</form>
<?php
    echo "<pre>";
    //print_r($_SESSION);
    echo "</pre>";
    echo  "<br>";
    echo  "<br>";
    foreach ($_SESSION as $key => $value) {
        if ($key == 'ball1' || $key == 'count') {
            continue;
        }
        echo "<a  href='?id=" . $key . "'>" . $value['title']. "</a>" . ' | ' . $value['price'] . ' | ' . $value['name']. ' | ' . "<a  href='?delete=true&did=". $key ."'>удалить</a><br>";
    }

?>
    