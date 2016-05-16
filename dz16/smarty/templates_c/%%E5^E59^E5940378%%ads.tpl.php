<?php /* Smarty version 2.6.25-dev, created on 2016-05-12 16:15:28
         compiled from ads.tpl */ ?>
<div class="col-md-offset-1 col-md-5">
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
            <tbody id='tbody_list'>
                <?php echo $this->_tpl_vars['ads_rows']; ?>

                <?php echo '
                    <script>
                        notFound();
                    </script>
                '; ?>

                
            </tbody>
        </table>
    </div>
    <div id="container"></div>
</div>