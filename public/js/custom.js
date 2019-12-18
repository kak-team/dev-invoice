$(document).ready(function(){

    
	

    // click one-by-all
    $('.table-responsive').on('click','#btnCheck_all',function(){
        $(this).toggleClass('check_false');
        check_all('.table-responsive');
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

    function clickGet(val) {
        $("#c_name").val(val);
        $("#suggesstion-box").hide();
    }
    $(".card-body").on("click",".customer",function(){
        var location = $(this).attr("location");
        $("#place").val(location);
        $('#place').siblings().addClass('active');
        $('#cus-id').val($(this).attr('autocus-id'));
    });
});