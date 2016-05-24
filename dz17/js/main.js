function Notifications() {
    this.id = '#notice-';
    that = this;
    
    this.initialization = function(id) {
        $('#container').prepend('<div hidden id="notice-' + id + '"></div>');
    };
    
    this.addAlert = function(id, alert) {
        $(that.id + id).addClass('alert alert-' + alert);
    };
    
    this.addMessage = function(id, message) {
        $(that.id + id).html(message);
    };
    
    this.Run = function(id) {
        $(that.id + id).fadeIn('slow');
            setTimeout(function() {
                $(that.id + id).fadeOut('slow', function(){
                    $(this).remove();
                });
            }, 3000);
    };
    
}

function notFound() {
    if(!$('#tbody_list').children('tr').length) {
        $('#tbody_list').append('<tr colspan="5"><td>Объявлений не найдено</td></tr>');
    }
}

function clear_form() {
    $(':input','#ad_form')
        .removeAttr('checked')
        .removeAttr('selected')
        .not(':button, :submit, :reset, :checkbox, :radio')
        .val('');
        
}

function add_to_form(response) {
    $.each(response, function(key, value){
                    var path = '#ad_form [name = ' + key + ']';
                    if (key == 'private_id') {
                        $(path + '[value = ' + value + ']').prop('checked', true);
                    } else if (key == 'allow_mail_id') {
                        $('#ad_form [name ^= ' + key + '][value = ' + value + ']').prop('checked', true);
                    } else if (key == 'ad_category_id' || key == 'city_id') {
                        $(path + ' [value = ' + value + ']').prop('selected', true);
                    } else {
                        $(path).val(value);
                    }
                });
}

function showResponse(response) {
    console.log(response);
    var data = $('#ad_form').serializeArray();
    var tdata = [];
    $.each(data, function(key, value){
        if (value.name == 'name' || value.name == 'id' || value.name == 'price' || value.name == 'title') {
            tdata[value.name] = value.value;
        } 
    });
    
    if (response.status == 'success') {
        $.each(response.all_fields, function(key, value) {
            $('#ad_form [name = ' + value + '] + font').remove();
        });
        block = $('table.table tr td.ad_id:contains(' + tdata.id + '):first');
        if (block.html() == tdata.id) {
            block.parent().after('\n\
                        <tr>\n\
                            <td class="ad_id">'+tdata.id+'</td>\n\
                            <td class="ad_titl">'+tdata.title+'</td>\n\
                            <td>'+tdata.price+'</td>\n\
                            <td>'+tdata.name+'</td>\n\
                            <td>\n\
                                <a class="edit btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a>\n\
                                <a class="delete btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>\n\
                            </td>\n\
                        </tr>\n\
                ');
            block.parent().remove();
        }else {
            $('table.table tbody').append('\n\
                    <tr>\n\
                        <td class="ad_id">'+response.ad_id+'</td>\n\
                        <td class="ad_titl">'+tdata.title+'</td>\n\
                        <td>'+tdata.price+'</td>\n\
                        <td>'+tdata.name+'</td>\n\
                        <td>\n\
                            <a class="edit btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a>\n\
                            <a class="delete btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>\n\
                        </td>\n\
                    </tr>\n\
            ');
        }
        clear_form();
    } else if(response.status == 'error') {
        $.each(response.all_fields, function(key, value) {
            $('#ad_form [name = ' + value + '] + font').remove();
        });
        $.each(response.fields, function(key, value) {
            $('#ad_form [name = ' + value + ']').after('<font color="red">'+response.message+'</font>');
        });
    }
}

$('document').ready(function(){
    $('table.table').delegate('a.delete', 'click', function(){
        var id = $(this).closest('tr').children('td:first').html();
        var tr = $(this).closest('tr');
        
        var data = {'id': id};
        
        var notice = new Notifications();
        notice.initialization(id);

        $.getJSON('ajax.php?action=delete', 
        data,
        function(response){
            if (response.status == 'success') {
                notice.addAlert(id, 'success');
                tr.fadeOut('slow', function(){
                    $(this).remove();
                    notFound();
                });
            } else if (response.status == 'error'){
                notice.addAlert(id, 'danger');
            }
            notice.addMessage(id, response.message);
            notice.Run(id);
        });
    });
    
    $('#search_field').on('input', function(){
        var s = $(this).val();
        $('table.table tr td.ad_titl:not(:contains(' + s + '))').parent().hide();
        $('table.table tr td.ad_titl:contains(' + s + ')').parent().show();
    });
    
    $('#search_button').on('click', function(){
        var s = $(this).prev().val();
        $('table.table tr td.ad_titl:not(:contains(' + s + '))').parent().hide();
        $('table.table tr td.ad_titl:contains(' + s + ')').parent().show();
    });
    
    $.ajaxSetup({
        type: 'POST',
        timeout: 5000,
        dataType: 'json'
    });
    
    $('table.table').delegate('a.edit', 'click', function() {
        var id = $(this).closest('tr').children('td:first').html();
        
        var data = {'id': id};
        
        $.ajax({
            url: 'ajax.php?action=edit',
            data: data,
            success: function(response){
                clear_form();
                add_to_form(response);
            },
            error: function(response){
                console.log(response);
            }
        });
    });
    
    var options = {
        success:   showResponse,
        url:       'ajax.php?action=submit',
        dataType:  'json',
        resetForm: true
    }; 
    
    $('#ad_form').ajaxForm(options);
}); 