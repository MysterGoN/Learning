<?php /* Smarty version 2.6.25-dev, created on 2016-05-18 13:37:22
         compiled from form.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_radios', 'form.tpl', 11, false),array('function', 'html_checkboxes', 'form.tpl', 31, false),array('function', 'html_options', 'form.tpl', 47, false),)), $this); ?>
<div class="col-md-4">
    <form id="ad_form" class="form-horizontal" method="post">  
        <div class="form-group">
            <div class="col-md-offset-5 col-md-7">
                <input type="text" readonly hidden name="id" value="<?php echo $this->_tpl_vars['ad']->get_id(); ?>
">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-5 col-md-7">
                <div class="radio">
                    <?php echo smarty_function_html_radios(array('name' => 'private_id','options' => $this->_tpl_vars['privates'],'selected' => $this->_tpl_vars['ad']->get_private_id()), $this);?>

                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-md-5 control-label">Ваше имя</label>
            <div class="col-md-7">
                <input type="text" class="form-control" maxlength="40" value="<?php echo $this->_tpl_vars['ad']->get_name(); ?>
" name="name" id="name">
                <?php if ($this->_tpl_vars['error_name']): ?><font color="red"><?php echo $this->_tpl_vars['error']; ?>
</font><?php endif; ?>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-md-5 control-label">Электронная почта</label>
            <div class="col-md-7">
                <input type="text" class="form-control" value="<?php echo $this->_tpl_vars['ad']->get_email(); ?>
" name="email" id="email">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-5 col-md-7">
                <div class="checkbox">
                    <?php echo smarty_function_html_checkboxes(array('name' => 'allow_mail_id','options' => $this->_tpl_vars['allow_mails'],'selected' => $this->_tpl_vars['ad']->get_allow_mail_id()), $this);?>

                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="phone" class="col-md-5 control-label">Номер телефона</label>
            <div class="col-md-7">
                <input type="text" class="form-control" value="<?php echo $this->_tpl_vars['ad']->get_phone(); ?>
" name="phone" id="phone">
            </div>
        </div>
        <div class="form-group">
            <label for="city_id" class="col-md-5 control-label">Город</label>
            <div class="col-md-7">
                <select class="form-control" title="Выберите Ваш город" name="city_id" id="city_id"> 
                    <option value="">-- Выберите город --</option>
                    <option disabled="disabled">-- Города --</option>
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['citys'],'selected' => $this->_tpl_vars['ad']->get_city_id()), $this);?>

                </select> 
            </div>
        </div>
        <div class="form-group">
            <label for="ad_category_id" class="col-md-5 control-label">Категория</label>
            <div class="col-md-7">
                <select class="form-control" title="Выберите категорию объявления" name="ad_category_id" id="ad_category_id"> 
                    <option value="">-- Выберите категорию --</option>
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ad_categorys'],'selected' => $this->_tpl_vars['ad']->get_ad_category_id()), $this);?>

                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-md-5 control-label">Название объявления</label>
            <div class="col-md-7">
                <input type="text" class="form-control" maxlength="50" value="<?php echo $this->_tpl_vars['ad']->get_title(); ?>
" name="title" id="title">
                <?php if ($this->_tpl_vars['error_title']): ?><font color="red"><?php echo $this->_tpl_vars['error']; ?>
</font><?php endif; ?>
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="col-md-5 control-label">Описание объявления</label>
            <div class="col-md-7">
                <textarea class="form-control" maxlength="3000" name="description" id="description"><?php echo $this->_tpl_vars['ad']->get_description(); ?>
</textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="col-md-5 control-label">Цена</label>
            <div class="col-md-7">
                <input type="text" class="form-control" maxlength="9" value="<?php echo $this->_tpl_vars['ad']->get_price(); ?>
" name="price">
                <?php if ($this->_tpl_vars['error_price']): ?><font color="red"><?php echo $this->_tpl_vars['error']; ?>
</font><?php endif; ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-5 col-md-7">
                <button type="submit" class="submit btn btn-success" name='submit'><span class="glyphicon glyphicon-ok"></span></button>
                <button type="button" class="btn btn-default" name="reset" onclick="location.href='<?php echo $this->_tpl_vars['currentFile']; ?>
'">Очистить</button>
            </div>
        </div>
        
    </form>
</div>