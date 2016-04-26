<?php /* Smarty version 2.6.25-dev, created on 2016-04-26 22:44:33
         compiled from ads.tpl */ ?>
<div class="col-xs-offset-1 col-xs-6">
    <h2 class="sub-header">Объявления</h2>
    <form class="form-inline" method="post">
            <input type="text" class="form-control" name="text" value='<?php echo $this->_tpl_vars['search']; ?>
'>
            <input type="submit" class="btn btn-default" name="search" value="search">
    </form>
    <div class="table-condensed">
        <table class="table table-condensed">
            <thead>
                <th>#id</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Имя</th>
                <th>Действия</th>
            </thead>
            <tbody>
                <?php echo $this->_tpl_vars['ads_rows']; ?>

            </tbody>
        </table>
    </div>
</div>