$(document).ready(function(){

    // check for popup modal delete
    function Btndelete(){
        if( $('.table-responsive .uniform-checker #b4-check').hasClass('checked') ){
            $('#deleteRow').removeClass('disabled');
            $('#deleteRow').attr('data-toggle','modal');
        }else{
            $('#deleteRow').addClass('disabled');           
            $('#deleteRow').removeAttr('data-toggle');            
        }
    }

    // click one-by-all
    //alert(1);
    $('.table-responsive').on('click','#checkall',function(){
        
        $(this).parent('span').toggleClass('checked');
        if($(this).parent('span').hasClass('checked')){
            $('.table-responsive .uniform-checker').children('span#b4-check').addClass('checked');
            Btndelete();
        }else{
            $('.table-responsive .uniform-checker').children('span#b4-check').removeClass('checked');
            Btndelete();
        }
    });

    // click one-by-one
    $('.table-responsive').on('click','#checkself',function(){
        $(this).parent().toggleClass('checked');
        Btndelete();
    });

    // delete tr table by checkboxes
    $("#modal_theme_success").on('click','#delete',function(){
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