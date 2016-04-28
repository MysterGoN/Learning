<?php /* Smarty version 2.6.25-dev, created on 2016-04-29 00:09:25
         compiled from ads_row.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'ads_row.tpl', 7, false),)), $this); ?>
<tr>
    <td><?php echo $this->_tpl_vars['ad']->get_id(); ?>
</td>
    <td><?php echo $this->_tpl_vars['ad']->get_title(); ?>
</td>
    <td><?php echo $this->_tpl_vars['ad']->get_price(); ?>
</td>
    <td><?php echo $this->_tpl_vars['ad']->get_name(); ?>
</td>
    <td>
        <a  href='?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['ad']->get_id())) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '') : smarty_modifier_replace($_tmp, '"', '')); ?>
'>редактировать</a> |
        <a  href='?delete=<?php echo ((is_array($_tmp=$this->_tpl_vars['ad']->get_id())) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '') : smarty_modifier_replace($_tmp, '"', '')); ?>
'>удалить</a>
    </td>
</tr>