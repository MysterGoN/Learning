function notFound() {
    if(!$('#tbody_list').children('tr').length) {
        $('#tbody_list').append('<tr colspan="5"><td>Объявлений не найдено</td></tr>');
    }
}

$('document').ready(function(){
    $('a.delete').on('click', function(){
        var id = $(this).closest('tr').children('td:first').html();
        var tr = $(this).closest('tr');
        
        var data = {'id': id};
        
        $('#container').clone().prependTo('#container:first');
        notice = $('#container:first').children(':first');
        notice.attr('id', 'notice-'+id);
        notice.hide();
        var notice_id = '#notice-'+id;
        $.getJSON('ajax.php?action=delete', 
        data,
        function(response){
            if (response.status == 'success') {
                $(notice_id).addClass('alert alert-success');
                tr.fadeOut('slow', function(){
                    $(this).remove();
                    notFound();
                });
            } else if (response.status == 'error'){
                $(notice_id).addClass('alert alert-danger');
            }
            $(notice_id).html(response.message);
            $(notice_id).fadeIn('slow');
            setTimeout(function() {
                $(notice_id).fadeOut('slow', function(){
                    $(this).remove();
                });
            }, 3000);
        });
        
    });
    
    
});