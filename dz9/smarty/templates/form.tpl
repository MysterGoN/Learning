<form  method="post">  
    <table>
        <tr>
            <td></td>
            <td>{html_radios name="private_id" options=$privates selected=$arr.private_id}</td>
        </tr>
        <tr>
            <td><label>Ваше имя</label></td>
            <td>
                <input type="text" maxlength="40" value="{$arr.name}" name="name">
                {if $error_name}<font color="red">{$error}</font>{/if}
            </td>
        </tr>
        <tr>
            <td><label>Электронная почта</label></td>
            <td><input type="text" value="{$arr.email}" name="email"></td>
        </tr>
        <tr>
            <td></td>
            <td>{html_checkboxes name="allow_mail_id" options=$allow_mails selected=$arr.allow_mail_id}</td>
        </tr>
        <tr>
            <td><label>Номер телефона</label></td>
            <td><input type="text" value="{$arr.phone}" name="phone"></td>
        </tr>
        <tr>
            <td><label>Город</label></td>
            <td>
                <select title="Выберите Ваш город" name="city_id"> 
                    <option value="">-- Выберите город --</option>
                    <option disabled="disabled">-- Города --</option>
                    {html_options options=$citys selected=$arr.city_id}
                </select> 
            </td>
        </tr>
        <tr>
            <td><label>Категория</label></td>
            <td>
                <select title="Выберите категорию объявления" name="ad_category_id"> 
                    <option value="">-- Выберите категорию --</option>
                    {html_options options=$ad_categorys selected=$arr.ad_category_id}
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Название объявления</label></td>
            <td>
                <input type="text" maxlength="50" value="{$arr.title}" name="title">
                {if $error_title}<font color="red">{$error}</font>{/if}
            </td>
        </tr>
        <tr>
            <td><label>Описание объявления</label></td>
            <td><textarea maxlength="3000" name="description">{$arr.description}</textarea></td>
        </tr>
        <tr>
            <td><label>Цена</label></td>
            <td>
                <input type="text" maxlength="9" value="{$arr.price}" name="price">&nbsp;<span>руб.</span>
                {if $error_price}<font color="red">{$error}</font>{/if}
            </td>
        </tr>
    </table>
    <input type="submit" value="Подтвердить" name="submit">
    <button type="button" name="reset" onclick="location.href='{$currentFile}'">Очистить</button>
</form>
<br>
<br>