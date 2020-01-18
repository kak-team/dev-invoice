$(document).ready(function(){
    // New Invoice List
    var loop = 2;   

    parent_private = '#modalOne';
    
    $(parent_private).on('click','.new-row',function(){
        status_vat = $(this).val();
        if(status_vat == 'no_vat'){
            
            var html = '<tr>';
                html += '<td class="position-relative text-center"><div class="custom-control custom-checkbox" id="btnCheck_single"><input type="checkbox" class="custom-control-input Bchk" id="c_'+loop+'"><label class="custom-control-label" for="c_'+loop+'"></label></div></td>';
                html += '<td class="position-relative text-center"><div class="Dtdisabled"></div><span>'+loop+'</span></td>';
                html += '<td class="text-center"> <div class="md-form m-0"> <input type="text" id="fullname_'+loop+'" name="full_name[]" class="fullname_'+loop+' form-control m-0" required placeholder="Full Name" autocomplete="off"></span> </div> </td>';
                html += '<td> <div class="md-form m-0"> <input type="text" id="nationality_'+loop+'" name="nationality[]" placeholder="Passport Number" required="" class="form-control m-0" autocomplete="off"> </div></td>';
                html += '<td> <div class="md-form m-0"> <input type="text" id="passport_number_'+loop+'" name="passport_number[]" placeholder="Passport Number" required="" class="form-control m-0" autocomplete="off"> </div> </td>';
                html += '<td class="position-relative"><div class="Tddisabled"></div><div class="md-form m-0"><input type="number" name="qty[]" id="qty_'+loop+'" class="form-control m-0 text-center qty" readonly value="1"></div></td>';
                html += '<td><div class="md-form m-0"><input type="number" class="form-control m-0" name="n_p[]" autocomplete="off"></div></td>';
                html += '<td><div class="md-form m-0"><input type="number" name="price[]" id="price_'+loop+'" step="0.01" class="form-control m-0 text-center price" value="0"></div></td>';
                html += '</tr>'; 
        }
        else{
            var html = '<tr>';
                html += '<td class="position-relative text-center"><div class="custom-control custom-checkbox" id="btnCheck_single"><input type="checkbox" class="custom-control-input Bchk" id="c_'+loop+'"><label class="custom-control-label" for="c_'+loop+'"></label></div></td>';
                html += '<td class="position-relative text-center" id="hidMode_'+loop+'"><div class="Dtdisabled"></div><input type="hidden" name="n_p[]" id="np_'+loop+'" ><span>'+loop+'</span></td>';
                html += '<td class="text-center"> <div class="md-form m-0"> <input type="text" id="fullname_'+loop+'" name="full_name[]" class="fullname_'+loop+' form-control m-0" required placeholder="Full Name" autocomplete="off"></span> </div> </td>';
                html += '<td> <div class="md-form m-0"> <input type="text" id="nationality_'+loop+'" name="nationality[]" placeholder="Passport Number" required="" class="form-control m-0" autocomplete="off"> </div></td>';
                html += '<td> <div class="md-form m-0"> <input type="text" id="passport_number_'+loop+'" name="passport_number[]" placeholder="Passport Number" required="" class="form-control m-0" autocomplete="off"> </div> </td>';
                html += '<td class="position-relative"><div class="Tddisabled"></div><div class="md-form m-0"><input type="number" name="qty[]" id="qty_'+loop+'" class="form-control m-0 text-center qty" readonly value="1"></div></td>';
                html += '<td><div class="md-form m-0"><input type="number" name="price[]" id="price_'+loop+'" step="0.01" class="form-control m-0 text-center price" value="0"></div></td>';
                html += '</tr>'; 
        }  
        $(parent_private+' .table-create').append(html);
        $(parent_private+' .mdb-select_'+loop).materialSelect();
        loop++;           

        // service fee
        servicefee      = $(parent_private+' #SerFee_price').val();
        count_passenger = $(parent_private+' .price').length;
        servicefee_total = parseFloat(servicefee) * parseFloat(count_passenger);
        vat_total        = parseFloat(servicefee_total)/parseFloat(vat);
        $(parent_private+ ' #vat_total').val(vat_total.toFixed(2));
        $(parent_private+ ' #SerFee_total').val(servicefee_total.toFixed(2));
    });

});