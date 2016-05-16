<?php /* Smarty version 2.6.25-dev, created on 2016-05-11 19:34:06
         compiled from ads_row.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'ads_row.tpl', 3, false),)), $this); ?>
<tr>
    <td><?php echo $this->_tpl_vars['ad']->get_id(); ?>
</td>
    <td><a  href='?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['ad']->get_id())) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '') : smarty_modifier_replace($_tmp, '"', '')); ?>
'><?php echo $this->_tpl_vars['ad']->get_title(); ?>
</a></td>
    <td><?php echo $this->_tpl_vars['ad']->get_price(); ?>
</td>
    <td><?php echo $this->_tpl_vars['ad']->get_name(); ?>
</td>
    <td>
        <a class="delete btn btn-warning">удалить</a>
    </td>
</tr>