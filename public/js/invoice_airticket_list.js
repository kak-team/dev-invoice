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
                html += '<td class="text-center"> <div class="d-flex"> <div class="md-form m-0"> <input type="text" class="airlineId_'+loop+' form-control m-0" id="airlineName_'+loop+'" required placeholder="airline name" autocomplete="off"></span> <input type="hidden" name="airline_id[]" id="airlineId_'+loop+'" > <div id="autoDisplay_airlineName_'+loop+'"></div></div><i class="icon-notification2 text-warning align-self-center pl-1" id="iconAirline_'+loop+'"></i> </div></td>';
                html += '<td> <div class="d-flex"> <div class="md-form m-0"> <input type="text" id="ticketNo_'+loop+'" name="ticket_no[]" autocomplete="off" placeholder="ticket no" required class="form-control m-0"> </div><i class="icon-notification2 text-warning align-self-center pl-1" id="iconTicketNo_'+loop+'" autocomplete="off"></i> </div></td>';
                html += '<td><div class="md-form m-0"><input type="text" id="guestName_'+loop+'" name="guest_name[]" class="form-control m-0"></div></td>';
                html += '<td><select class="mdb-select_'+loop+' md-form m-0" name="type[]"><option value="Adult">Adult</option><option value="Child">Child</option><option value="Infant">Infant</option></select></td>';
                html += '<td class="position-relative"><div class="Tddisabled"></div><div class="md-form m-0"><input type="number" name="qty[]" id="qty_'+loop+'" class="form-control m-0 text-center qty" readonly value="1"></div></td>';
                html += '<td><div class="md-form m-0"><input type="number" class="form-control m-0" name="n_p[]" autocomplete="off"></div></td>';
                html += '<td><div class="md-form m-0"><input type="number" name="price[]" id="price_'+loop+'" step="0.01" class="form-control m-0 text-center price" value="0"></div></td>';
                html += '</tr>'; 
        }
        else{
            var html = '<tr>';
                html += '<td class="position-relative text-center"><div class="custom-control custom-checkbox" id="btnCheck_single"><input type="checkbox" class="custom-control-input Bchk" id="c_'+loop+'"><label class="custom-control-label" for="c_'+loop+'"></label></div></td>';
                html += '<td class="position-relative text-center" id="hidMode_'+loop+'"><div class="Dtdisabled"></div><input type="hidden" name="n_p[]" id="np_'+loop+'" ><span>'+loop+'</span></td>';
                html += '<td class="text-center"> <div class="d-flex"> <div class="md-form m-0"> <input type="text" class="airlineId_'+loop+' form-control m-0" id="airlineName_'+loop+'" required placeholder="airline name" autocomplete="off"></span> <input type="hidden" name="airline_id[]" id="airlineId_'+loop+'" > <div id="autoDisplay_airlineName_'+loop+'"></div></div><i class="icon-notification2 text-warning align-self-center pl-1" id="iconAirline_'+loop+'"></i> </div></td>';
                html += '<td> <div class="d-flex"> <div class="md-form m-0"> <input type="text" id="ticketNo_'+loop+'" name="ticket_no[]" autocomplete="off" placeholder="ticket no" required class="form-control m-0"> </div><i class="icon-notification2 text-warning align-self-center pl-1" id="iconTicketNo_'+loop+'" autocomplete="off"></i> </div></td>';
                html += '<td><div class="md-form m-0"><input type="text" id="guestName_'+loop+'" name="guest_name[]" class="form-control m-0"></div></td>';
                html += '<td><select class="mdb-select_'+loop+' md-form m-0" name="type[]"><option value="Adult">Adult</option><option value="Child">Child</option><option value="Infant">Infant</option></select></td>';
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

    // AutoComplete AirTicket No
    $(parent_private).on('keyup','input[id^="ticketNo_"]',function(){
        var name  = $(this).val();
        Tid = $(this).attr("id").replace ( /[^\d.]/g, '' );
        
        // Clear
        $(parent_private+' #airlineName_'+Tid).val('');
        $(parent_private+' #airlineId_'+Tid).val('');
        $(parent_private+' #iconAirline_'+Tid).attr('class','icon-notification2 text-warning align-self-center pl-1');
        $(parent_private+' #iconTicketNo_'+Tid).attr('class','icon-notification2 text-warning align-self-center pl-1');

        // ajax
        $.ajax({
            type : 'post',
            data : {name : name},
            url  : 'invoice/auto_ticket',
            success : function(respond){    
                json  = jQuery.parseJSON(respond);
                if (json.length != 0) {
                    $(parent_private+' #airlineName_'+Tid).val(json[0].name);
                    $(parent_private+' #airlineId_'+Tid).val(json[0].id);
                    $(parent_private+' #iconTicketNo_'+Tid).attr('class','icon-checkmark3 text-success align-self-center pl-1');
                    $(parent_private+' #iconAirline_'+Tid).attr('class','icon-checkmark3 text-success align-self-center pl-1');

                }                     
            }
        });
    });

    // AutoComplete Airline name
    $(parent_private).on('keyup','input[id^="airlineName_"]',function(){
        name            = $(this).val();
        Aid             = $(this).attr("id").replace ( /[^\d.]/g, '' );
        json            = [];
        
        // clear data
        $(parent_private+' airlineId_'+Aid).val('');
        $(parent_private+' #iconAirline_'+Aid).attr('class','icon-notification2 text-warning align-self-center pl-1');
        
        // Ajax
        $.ajax({
            type : 'post',
            data : {name : name},
            url  : 'invoice/auto_airline',
            success : function(respond){  
                json  = jQuery.parseJSON(respond);
                var html = '<div class="list-group bg-white"><ul class="mdb-autocomplete-wrap">';
                if ( json.length != 0 ) {
                    $.each(json, function (i, obj) {                            
                        html += '<li class="customer list-group-item list-group-item-action" id="acceptAirtiket" airline_id="'+obj.id+'" >'+obj.name+'</li>';                         
                    });  
                }
                html += '</ul></div>';
                $(parent_private+' #autoDisplay_airlineName_'+Aid).html(html);                    
            }
        });

        // Accept Airline name
        $(parent_private).on('click','#acceptAirtiket',function(){
            var airline_id = $(this).attr('airline_id');
            var text = $(this).text();
            $(parent_private+' #airlineName_'+Aid).val(text);
            console.log(Aid);
            $(parent_private+' #airlineId_'+Aid).val(airline_id);
            $(parent_private+' #autoDisplay_airlineName_'+Aid).html('');
            $(parent_private+' #iconAirline_'+Aid).attr('class','icon-checkmark3 text-success align-self-center pl-1');
            $(parent_private+' #iconTicketNo_'+Aid).attr('class','icon-checkmark3 text-success align-self-center pl-1');

        });
    });



});