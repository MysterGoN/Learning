<div class="col-md-offset-1 col-md-5">
    <h2 class="sub-header">Объявления</h2>
    <form class="form-inline" method="post">
            <input type="text" id="search_field" class="form-control" name="text">
            <button type="button" id="search_button" class="btn btn-info" name="search" value="search"><span class="glyphicon glyphicon-search"></span></button>
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
                {$ads_rows}
                {literal}
                    <script>
                        notFound();
                    </script>
                {/literal}
                
            </tbody>
        </table>
    </div>
    <div id="container"></div>
</div>