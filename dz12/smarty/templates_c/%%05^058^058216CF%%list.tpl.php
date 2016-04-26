<?php /* Smarty version 2.6.25-dev, created on 2016-04-26 22:19:46
         compiled from list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_table', 'list.tpl', 6, false),)), $this); ?>
<div class="col-xs-offset-1 col-xs-6">
    <form method="post">
        <input type="text" name="text" value='<?php echo $this->_tpl_vars['search']; ?>
'>
        <input type="submit" name="search" value="search">
    </form>
    <?php echo smarty_function_html_table(array('loop' => $this->_tpl_vars['data_list'],'cols' => "Название, Цена, Имя, , ",'table_attr' => 'border="0"'), $this);?>

</div>