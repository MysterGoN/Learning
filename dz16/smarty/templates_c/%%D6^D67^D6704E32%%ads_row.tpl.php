<?php /* Smarty version 2.6.25-dev, created on 2016-05-20 15:12:43
         compiled from ads_row.tpl */ ?>
<tr>
    <td class="ad_id"><?php echo $this->_tpl_vars['ad']->get_id(); ?>
</td>
    <td><?php echo $this->_tpl_vars['ad']->get_title(); ?>
</td>
    <td><?php echo $this->_tpl_vars['ad']->get_price(); ?>
</td>
    <td><?php echo $this->_tpl_vars['ad']->get_name(); ?>
</td>
    <td>
        <a class="edit btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a>
        <a class="delete btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
    </td>
</tr>