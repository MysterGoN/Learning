<?php /* Smarty version 2.6.25-dev, created on 2016-04-04 12:57:56
         compiled from list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_table', 'list.tpl', 1, false),)), $this); ?>
<?php echo smarty_function_html_table(array('loop' => $this->_tpl_vars['data_list'],'cols' => 5,'table_attr' => 'border="0"'), $this);?>