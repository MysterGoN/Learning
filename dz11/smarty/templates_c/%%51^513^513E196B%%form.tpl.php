<?php /* Smarty version 2.6.25-dev, created on 2016-04-22 20:16:58
         compiled from form.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_radios', 'form.tpl', 9, false),array('function', 'html_checkboxes', 'form.tpl', 24, false),array('function', 'html_options', 'form.tpl', 36, false),)), $this); ?>
<form  method="post">  
    <table>
        <tr>
            <td></td>
            <td><input type="text" readonly hidden="true" name="id" value="<?php echo $this->_tpl_vars['ad']->get_id(); ?>
"></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo smarty_function_html_radios(array('name' => 'private_id','options' => $this->_tpl_vars['privates'],'selected' => $this->_tpl_vars['ad']->get_private_id()), $this);?>
</td>
        </tr>
        <tr>
            <td><label>Ваше имя</label></td>
            <td>
                <input type="text" maxlength="40" value="<?php echo $this->_tpl_vars['ad']->get_name(); ?>
" name="name">
                <?php if ($this->_tpl_vars['error_name']): ?><font color="red"><?php echo $this->_tpl_vars['error']; ?>
</font><?php endif; ?>
            </td>
        </tr>
        <tr>
            <td><label>Электронная почта</label></td>
            <td><input type="text" value="<?php echo $this->_tpl_vars['ad']->get_email(); ?>
" name="email"></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo smarty_function_html_checkboxes(array('name' => 'allow_mail_id','options' => $this->_tpl_vars['allow_mails'],'selected' => $this->_tpl_vars['ad']->get_allow_mail_id()), $this);?>
</td>
        </tr>
        <tr>
            <td><label>Номер телефона</label></td>
            <td><input type="text" value="<?php echo $this->_tpl_vars['ad']->get_phone(); ?>
" name="phone"></td>
        </tr>
        <tr>
            <td><label>Город</label></td>
            <td>
                <select title="Выберите Ваш город" name="city_id"> 
                    <option value="">-- Выберите город --</option>
                    <option disabled="disabled">-- Города --</option>
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['citys'],'selected' => $this->_tpl_vars['ad']->get_city_id()), $this);?>

                </select> 
            </td>
        </tr>
        <tr>
            <td><label>Категория</label></td>
            <td>
                <select title="Выберите категорию объявления" name="ad_category_id"> 
                    <option value="">-- Выберите категорию --</option>
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ad_categorys'],'selected' => $this->_tpl_vars['ad']->get_ad_category_id()), $this);?>

                </select>
            </td>
        </tr>
        <tr>
            <td><label>Название объявления</label></td>
            <td>
                <input type="text" maxlength="50" value="<?php echo $this->_tpl_vars['ad']->get_title(); ?>
" name="title">
                <?php if ($this->_tpl_vars['error_title']): ?><font color="red"><?php echo $this->_tpl_vars['error']; ?>
</font><?php endif; ?>
            </td>
        </tr>
        <tr>
            <td><label>Описание объявления</label></td>
            <td><textarea maxlength="3000" name="description"><?php echo $this->_tpl_vars['ad']->get_description(); ?>
</textarea></td>
        </tr>
        <tr>
            <td><label>Цена</label></td>
            <td>
                <input type="text" maxlength="9" value="<?php echo $this->_tpl_vars['ad']->get_price(); ?>
" name="price">&nbsp;<span>руб.</span>
                <?php if ($this->_tpl_vars['error_price']): ?><font color="red"><?php echo $this->_tpl_vars['error']; ?>
</font><?php endif; ?>
            </td>
        </tr>
    </table>
    <input type="submit" value="Подтвердить" name="submit">
    <button type="button" name="reset" onclick="location.href='<?php echo $this->_tpl_vars['currentFile']; ?>
'">Очистить</button>
</form>
<br>
<br>