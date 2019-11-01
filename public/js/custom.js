$(document).ready(function(){

    

    // click one-by-all
    $('#btnCheck_all').click(function(){
        $(this).toggleClass('check_false');
        var self = $(this);
        if($(self).hasClass('check_false')){
            $('#btnCheck_all #defaultUnchecked').prop('checked', false);
            $('.table-responsive #btnCheck_single input').prop('checked', false);
        }else{
            $('#btnCheck_all #defaultUnchecked').prop('checked', true);
            $('.table-responsive #btnCheck_single input').prop('checked', true);
        }
        Btndelete();
    });


    // delete tr table by checkboxes
    $("#modal_theme_success,#modal_theme_info").on('click','#delete',function(){
        $(this).parents("tr").remove();
      });

    // status
    $('.table-responsive').on('click','#btn-status',function(){
        $(this).toggleClass('active');
        if( $(this).hasClass('active')){
            $(this).html('<span class="badge bg-blue">Active</span>');
            
        }else{
            $(this).html('<span class="badge bg-warning">Disabled</span>');
        }
    });
});