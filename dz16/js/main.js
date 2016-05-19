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

function clear_form(response) {
    $.each(response, function(key, value){
                var path = '#ad_form [name = ' + key + ']';
                if (key == 'private_id') {
                    $(path + ':checked').prop('checked', false);
                } else if (key == 'allow_mail_id') {
                    $('#ad_form [name ^= ' + key + ']:checked').prop('checked', false);
                } else if (key == 'ad_category_id' || key == 'city_id') {
                    $(path + ' :selected').prop('selected', false);
                } else if (key == 'description') {
                    $(path).html('');
                } else {
                    $(path).attr('value', '');
                }
            });
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
                    } else if (key == 'description') {
                        $(path).html(value);
                    } else {
                        $(path).attr('value', value);
                    }
                });
}

$('document').ready(function(){
    $('a.delete').on('click', function(){
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
    

    
    $.ajaxSetup({
        type: 'POST',
        timeout: 5000,
        dataType: 'json'
    });
    
    $('a.edit').on('click', function() {
        var id = $(this).closest('tr').children('td:first').html();
        
        var data = {'id': id};
        
        $.ajax({
            url: 'ajax.php?action=edit',
            data: data,
            success: function(response){
                clear_form(response);
                add_to_form(response);
            }  
        });
    });
    
    $('#submit').on('click', function(){
        var data = $('#ad_form').serializeArray();
        var tdata = [];
        $.each(data, function(key, value){
            if (value.name == 'name' || value.name == 'id' || value.name == 'price' || value.name == 'title') {
                tdata[value.name] = value.value;
            } 
        });
        console.log(data);
        console.log(tdata);
        $.ajax({
            url: 'ajax.php?action=submit',
            data: data,
            success: function(response){
                if (response.status == 'success') {
                    $.each(response.all_fields, function(key, value) {
                        $('#ad_form [name = ' + value + '] + font').remove();
                    });
                    $('table.table tbody').append('\n\
                            <tr>\n\
                                <td>'+tdata.id+'</td>\n\
                                <td>'+tdata.title+'</td>\n\
                                <td>'+tdata.price+'</td>\n\
                                <td>'+tdata.name+'</td>\n\
                                <td>\n\
                                    <a class="edit btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a>\n\
                                    <a class="delete btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>\n\
                                </td>\n\
                            </tr>\n\
                    ');
                } else if(response.status == 'error') {
                    $.each(response.all_fields, function(key, value) {
                        $('#ad_form [name = ' + value + '] + font').remove();
                    });
                    $.each(response.fields, function(key, value) {
                        $('#ad_form [name = ' + value + ']').after('<font color="red">'+response.message+'</font>');
                    });
                }
            }  
        });
    });
        
    
});