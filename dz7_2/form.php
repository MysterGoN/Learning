<form  method="post">  
    <table>
        <tr>
            <td></td>
            <td>
                <?php addPrivates($privates, $arr['private'])?>
            </td>
        </tr>
        <tr>
            <td><label>Ваше имя</label></td>
            <td><input type="text" maxlength="40" value="<?php echo $arr['name']?>" name="name"></td>
        </tr>
        <tr>
            <td><label>Электронная почта</label></td>
            <td><input type="text" value="<?php echo $arr['email']?>" name="email"></td>
        </tr>
        <tr>
            <td></td>
            <td><?php addAllowMails($allow_mails, $arr['allow_mails'])?></td>
        </tr>
        <tr>
            <td><label>Номер телефона</label></td>
            <td><input type="text" value="<?php echo $arr['phone']?>" name="phone"></td>
        </tr>
        <tr>
            <td><label>Город</label></td>
            <td>
                <select title="Выберите Ваш город" name="city"> 
                    <option value="">-- Выберите город --</option>
                    <option disabled="disabled">-- Города --</option>
                    <?php addCitys($citys, $arr['city']) ?>
                </select> 
            </td>
        </tr>
        <tr>
            <td><label>Категория</label></td>
            <td>
                <select title="Выберите категорию объявления" name="ad_category"> 
                    <option value="">-- Выберите категорию --</option>
                    <?php addAdCategory($ad_category, $arr['ad'])?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Название объявления</label></td>
            <td><input type="text" maxlength="50" value="<?php echo $arr['title']?>" name="title"></td>
        </tr>
        <tr>
            <td><label>Описание объявления</label></td>
            <td><textarea maxlength="3000" name="description"><?php echo $arr['description']?></textarea></td>
        </tr>
        <tr>
            <td><label>Цена</label></td>
            <td><input type="text" maxlength="9" value="<?php echo $arr['price']?>" name="price">&nbsp;<span>руб.</span> </td>
        </tr>
    </table>
    <input type="submit" value="Подтвердить" name="submit">
    <button type="button" name="reset" onclick="location.href='<?php echo $currentFile?>'">Очистить</button>
</form>
<br>
<br>