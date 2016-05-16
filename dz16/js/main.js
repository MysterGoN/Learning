function notFound() {
    if(!$('#tbody_list').children('tr').length) {
        $('#tbody_list').append('<tr colspan="5"><td>Объявлений не найдено</td></tr>');
    }
}

$('document').ready(function(){
    $('a.delete').on('click', function(){
        var id = $(this).closest('tr').children('td:first').html();
        var tr = $(this).closest('tr');
        
       
        $('#container').clone().prependTo('#container:first');
        childConteiner = $('#container:first').children(':first');
        childConteiner.hide();
        childConteiner.load('ajax.php?action=delete&id='+id, 
                        function(){
                            $(this).addClass('alert alert-success');
                            $(this).fadeIn('slow');
                            tr.fadeOut('slow', function(){
                                $(this).remove();
                                notFound();
                            });
                            setTimeout(function() {
                                $('#container').fadeOut('slow', function(){
                                    $(this).remove();
                                });
                            }, 3000);
                        });
    });
    
    
});