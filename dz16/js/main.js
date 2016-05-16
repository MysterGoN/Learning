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
        notice.hide();
        
        $.getJSON('ajax.php?action=delete', 
        data,
        function(response){
            if (response.status == 'success') {
                notice.addClass('alert alert-success');
                tr.fadeOut('slow', function(){
                    $(this).remove();
                    notFound();
                });
            } else if (response.status == 'error'){
                notice.addClass('alert alert-danger');
            }
            notice.html(response.message);
            notice.fadeIn('slow');
            setTimeout(function() {
                notice.fadeOut('slow', function(){
                    $(this).remove();
                });
            }, 3000);
        });
        
    });
    
    
});