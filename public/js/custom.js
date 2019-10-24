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
    $('#checkall').click(function(){
        $('.table-responsive .uniform-checker').children('span').toggleClass('checked');
        Btndelete();
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
});