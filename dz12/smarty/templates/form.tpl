<div class="col-xs-4">
    <form class="form-horizontal" method="post">  
        <div class="form-group">
            <div class="col-xs-offset-5 col-xs-7">
                <input type="text" readonly hidden name="id" value="{$ad->get_id()}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-5 col-xs-7">
                <div class="radio">
                    {html_radios name="private_id" options=$privates selected=$ad->get_private_id()}
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-xs-5 control-label">Ваше имя</label>
            <div class="col-xs-7">
                <input type="text" class="form-control" maxlength="40" value="{$ad->get_name()}" name="name" id="name">
                {if $error_name}<font color="red">{$error}</font>{/if}
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-xs-5 control-label">Электронная почта</label>
            <div class="col-xs-7">
                <input type="text" class="form-control" value="{$ad->get_email()}" name="email" id="email">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-5 col-xs-7">
                <div class="checkbox">
                    {html_checkboxes name="allow_mail_id" options=$allow_mails selected=$ad->get_allow_mail_id()}
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="phone" class="col-xs-5 control-label">Номер телефона</label>
            <div class="col-xs-7">
                <input type="text" class="form-control" value="{$ad->get_phone()}" name="phone" id="phone">
            </div>
        </div>
        <div class="form-group">
            <label for="city_id" class="col-xs-5 control-label">Город</label>
            <div class="col-xs-7">
                <select class="form-control" title="Выберите Ваш город" name="city_id" id="city_id"> 
                    <option value="">-- Выберите город --</option>
                    <option disabled="disabled">-- Города --</option>
                    {html_options options=$citys selected=$ad->get_city_id()}
                </select> 
            </div>
        </div>
        <div class="form-group">
            <label for="ad_category_id" class="col-xs-5 control-label">Категория</label>
            <div class="col-xs-7">
                <select class="form-control" title="Выберите категорию объявления" name="ad_category_id" id="ad_category_id"> 
                    <option value="">-- Выберите категорию --</option>
                    {html_options options=$ad_categorys selected=$ad->get_ad_category_id()}
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-xs-5 control-label">Название объявления</label>
            <div class="col-xs-7">
                <input type="text" class="form-control" maxlength="50" value="{$ad->get_title()}" name="title" id="title">
                {if $error_title}<font color="red">{$error}</font>{/if}
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="col-xs-5 control-label">Описание объявления</label>
            <div class="col-xs-7">
                <textarea class="form-control" maxlength="3000" name="description" id="description">{$ad->get_description()}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="col-xs-5 control-label">Цена</label>
            <div class="col-xs-7">
                <input type="text" class="form-control" maxlength="9" value="{$ad->get_price()}" name="price">
                {if $error_price}<font color="red">{$error}</font>{/if}
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-5 col-xs-7">
                <input type="submit" class="btn btn-default" value="Подтвердить" name="submit">
                <button type="button" class="btn btn-default" name="reset" onclick="location.href='{$currentFile}'">Очистить</button>
            </div>
        </div>
        
    </form>
</div>