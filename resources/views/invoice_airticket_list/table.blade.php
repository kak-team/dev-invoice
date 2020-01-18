
<table class="table text-nowrap">
    <tbody>
        <tr class="table-active table-border-double">
            <!-- <td>
                                              
                <div class="custom-control custom-checkbox check_false" id="btnCheck_all" >
                    <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                    <span class="custom-control-label" for="defaultUnchecked"></span>
                </div>                            
            </td> -->
            <td class="text-blue-800 font-weight-bold">INVOICE No</td>
            <td class="text-blue-800 font-weight-bold">CUSTOMERS</td>
            <td class="text-blue-800 font-weight-bold">ISSUE DATE</td>
            <td class="text-blue-800 font-weight-bold">TOTAL AMOUNT</td>
            <td class="text-blue-800 font-weight-bold">PAYMENT STAUTS</td>
            <td class="text-blue-800 font-weight-bold">INVOICE STAUTS</td>
            @if($user_status == 'no_vat')
                <td class="text-blue-800 font-weight-bold">INVOICE TYPE</td>
            @endif
            <td class="text-blue-800 font-weight-bold">SETTING</td>
        </tr>
                    
        @if(!$invoices->isEmpty())
            @foreach($invoices as $value)
                <tr role="row" class="odd">
                    <!-- <td> 
                        <div class="custom-control custom-checkbox" id="btnCheck_single">
                            <input type="checkbox" class="custom-control-input" id="defaultUnchecked1" value="4" name="checkbox">
                            <label class="custom-control-label" for="defaultUnchecked1"></label>
                        </div> 
                        
                    </td>-->
                    <td class="sorting_1">{{ $value->invoice_number }}</td>
                    
                    <td>
                        <h6 class="mb-0">
                            <a href="#">{{ $value->customers->name_en }}</a>
                            <span class="d-block font-size-sm text-muted">{{ $value->customers->full_name.'/ Tel: '. $value->contact_phone }}</span>
                        </h6>
                    </td>
                    
                    <td>
                        {{ date('d M Y',strtotime($value->issue_date)) }}
                    </td>
                    
                    <td>
                        <h6 class="mb-0 font-weight-bold">$ {{ number_format($value->total_amount,2) }} </h6>
                    </td>
                    
                    <td class="text-center">
                    @php
                        $total_payment = $value->invoice_incomes->sum('new_payment');
                    @endphp
                        @if($total_payment == $value->total_amount)
                            <button class="btn bg-success legitRipple btn-sm badge" data-invoice-number="{{ $value->invoice_number }}" data-toggle="modal" data-target="#modalOne" id="btn-payment" value="{{ $value->id }}" data-amount= "{{ $value->total_amount }}">
                                PAID
                            </button>
                        @else
                            <button class="btn bg-orange legitRipple btn-sm badge" data-invoice-number="{{ $value->invoice_number }}" data-toggle="modal" data-target="#modalOne" id="btn-payment" value="{{ $value->id }}" data-amount= "{{ $value->total_amount }}">
                                UNPAID
                            </button>
                        @endif
                    
                    </td>

                    <td class="text-center">                        
                        @if($value->status_invoice == 'active')
                            <span class="badge badge-success">{{ $value->status_invoice }}</span>
                        @else
                            <span class="badge badge-danger">{{ $value->status_invoice }}</span>
                        @endif                                
                    </td>
                    @if($user_status == 'no_vat')
                    <td>
                        @if($value->status_vat == 'vat')
                            <span class="badge badge-success">{{ $value->status_vat }}</span>
                        @else
                            <span class="badge badge-danger">{{ $value->status_vat }}</span>
                        @endif 
                    </td>
                    @endif
                    <td class="text-center">
                    @if($value->status_invoice == 'active')
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Edit Invoice">
                            <button type="button" class="btn btn-outline bg-info-400 border-info-400 text-info-800 btn-icon rounded-round legitRipple mr-1 waves-effect waves-light" data-toggle="modal" data-target="#modalOne" id="btn-edit" data-status-vat="{{ $value->status_vat }}" value="{{ $value->id }}" >
                                <i class="icon-quill4"></i>
                            </button>
                        </span>
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Print Invoice">
                            <button type="button" class="btn btn-outline bg-teal-400 border-teal-400 text-teal-800 btn-icon rounded-round legitRipple mr-1 waves-effect waves-light" data-toggle="modal" data-target="#modalOne" id="btn-print" value="{{ $value->id }}">
                                <i class="icon-printer2"></i>
                            </button>  
                        </span>
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Cancel Invoice">    
                            <button type="button" class="btn btn-outline bg-orange-400 border-orange-400 text-orange-800 btn-icon rounded-round legitRipple mr-1 waves-effect waves-light" data-toggle="modal" data-target="#modalOne" id="btn-cancel-invoice" value="{{ $value->id }}">
                                <i class="icon-notification2"></i>
                            </button>  
                        </span>
                    @else
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Cancel Invoice">    
                            <button type="button" class="btn btn-outline bg-success-400 border-success-400 text-success-800 btn-icon rounded-round legitRipple mr-1 waves-effect waves-light" data-toggle="modal" data-target="#modalOne" id="btn-cancel-invoice" value="{{ $value->id }}">
                                <i class="icon-notification2"></i>
                            </button>  
                        </span>
                    @endif   
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan=8 class="text-center p-5">No Data...</td>
            </tr>
        @endif 
    </tbody>
</table>

                