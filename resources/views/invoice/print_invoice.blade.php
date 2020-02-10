<style>
#modalOne .modal-default{max-width: 110px!important;min-width: 90%!important;}
.font {
    font-family: battambang, Roboto,-apple-system,BlinkMacSystemFont;
}
.fixed-sn main {
    padding-top: 2.5rem;
}
.company-name {
    font-family: "Khmer OS Moul";
   
}
.company-en-name {
    font-family:Roboto;
    font-weight: 600;
}

/* testing */
</style>
<div class="fixed-sn white-skin js-focus-visible">
    <main class="pt-0">
        <div class="container-fluid">
            <section class="invoice font row mb-r">
            @foreach($company as $value)
                <div class="col-md-12">
                
                    <!-- company logo-->
                    <div class="row p-1 d-flex align-items-center">
                        <div class="col p-3">
                            <img class="img-fluid" src="{{ URL::asset('/images/'. $value->logo) }}"/>
                        </div>
                        <div class="col col-md-7 text-left">
                            <h2 class="company-name"> {{ $value->name }} </h2>
                            <h2 class="company-en-name font-wieght-600"> {{ $value->en_name }} </h2>   
                        </div>
                        <div class="col col-md-3 text-right">
                            <button class="btn btn-success bg-teal-400 legitRipple" onclick="window.print()">Print</button>
                            <button class="btn btn-danger bg-teal-400 legitRipple" data-dismiss="modal" data-modal="#modalOne">Cancel</button>
                        </div>
                    </div>

                    <hr size="30">   
                    <!-- First row -->
                    <div class="row invoice-data">
                        
                        <div class="col-8">
                            <p class="text-left"><strong>អតិថិជន / Customer:</strong></p>
                            <table class="text-left">
                                <tr class="">
                                    <td>ឈ្មោះក្រុមហ៊ុន</td>
                                    <td>: </td>
                                    <td>{{ $invoice[0]->customers->name_kh }}</td>
                                </tr>
                                <tr class="">
                                    <td>Company Name</td>
                                    <td>: </td>
                                    <td>{{ $invoice[0]->customers->name_en }}</td>
                                </tr>
                                <tr class="">
                                    <td>លេខអតប / VAT No.</td>
                                    <td>: </td>
                                    <td>{{ $invoice[0]->customers->register_number }}</td>

                                </tr>
                                <tr class="">
                                    <td>ទំនាក់ទំនង​/ Contact</td>
                                    <td>: </td>
                                    <td>{{ $invoice[0]->contact_person_id }}</td>
                               </tr>
                                <tr class="">
                                    <td>ទូរសព្ទ / Tel</td>
                                    <td>: </td>
                                    <td>{{ $invoice[0]->contact_phone }}</td>
                               </tr>
                                <tr class="">
                                    <td>អុីម៉ែល / E-mail</td>
                                    <td>: </td>
                                    <td>{{ $invoice[0]->customers->contacts[0]->email }}</td>
                               </tr>
                                <tr class="">
                                    <td>អាសយដ្ឋាន / Address</td>
                                    <td>: </td>
                                    <td>{{ $invoice[0]->customers->address }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col text-right">
                            <p><strong>វិក័យប័ត្រពន្ធ / Tax Invoice</strong></p>
                            <table class="d-flex justify-content-end">
                                <tr>
                                    <td>លេខអតប / VAT No</td>
                                    <td>:</td>
                                    <td>{{ $value->register_number }}</td>
                                </tr>
                                <tr>
                                    <td>វិក័យប័ត្រលេខ / Invoice No</td>
                                    <td>:</td>
                                    <td>{{ $invoice[0]->invoice_number }}</td>
                                </tr>
                                <tr>
                                    <td>ថ្ងៃចេញវិក័យប័ត្រ / Issued Date</td>
                                    <td>:</td>
                                    <td> {{ date('d-M-Y',strtotime($invoice[0]->issue_date)) }}</td>
                                </tr>
                                <tr>
                                    <td>ចេញដោយ / Issued by</td>
                                    <td>:</td>
                                    <td> {{ $invoice[0]->issue_by->name }}</td>
                                </tr>
                                
                            </table>
                        </div>
                        
                    </div>
                    <!-- ./First row -->
               
                    <!-- Second row -->
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <!-- Item list -->
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="bg-info">
                                            <th class="text-nowrap">ល.រ <br/>No</th>
                                            <th class="text-nowrap text-left">បរិយាយមុខទំនិញ<br/>Description</th>
                                            <th class="text-nowrap">តម្លៃឯកតា<br/>Unit Price</th>
                                            <th class="text-nowrap">ឯកតា<br/>Unit</th>
                                            <th class="text-nowrap">តំលៃសរុប<br/>Total Price</th>
                                            <th class="text-nowrap">អតប១០%<br/>VAT10%</th>
                                            <th class="text-nowrap">តំលៃសរុបរួមអតប<br/>Total Price Include VAT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    
                                        @foreach($invoice[0]->$variable as $$variable)
                                            
                                                <tr>
                                                    <td class="align-top">{{ $loop->iteration }}</td>
                                                    <td class="text-left"> 
                                                        <p class="m-0"> សេវាកម្មសម្រាប់៖ {{ $$variable->full_name }} </p>
                                                        @if($obj == 'tour')
                                                            <p class="m-0">From-To Date: {{ date('d/m/Y',strtotime($invoice[0]->tour->from_date)) }} - {{ date('d/m/Y',strtotime($invoice[0]->tour->to_date)) }}</p>
                                                            <p class="m-0">Tour Code: {{ $invoice[0]->tour->tour_code }}</p>
                                                        @endif
                                                        @if($obj == 'hotel')
                                                            <p class="m-0">Total Room: {{ $invoice[0]->hotel->total_room }}</p>
                                                        @endif
                                                        @if($obj == 'transporation')
                                                            <p class="m-0">Total Room: {{ $invoice[0]->transporation->total_car }}</p>
                                                        @endif
                                                            <p class="m-0">Description: {{ $invoice[0]->description }}</p>
                                                    </td>
                                                    <td>${{ number_format($$variable->price,2) }}</td>
                                                    <td>{{ $$variable->quantity }}</td>
                                                    <td>${{ number_format($$variable->price*$$variable->quantity,2) }} </td>
                                                    <td> - </td>
                                                    <td>${{ number_format($$variable->price*$$variable->quantity,2) }}</td>
                                                
                                                </tr>
                                               
                                        @endforeach                                    

                                        @php
                                            $service_fee        = $invoice[0]->service_fee_price*$invoice[0]->$variable->sum('quantity');
                                            $total_service_fee  =  $service_fee/$invoice[0]->vat_percent; 
                                             $vat               = $service_fee + $total_service_fee;
                                        @endphp
                                        <tr>
                                            <td class="align-top">{{ $invoice[0]->$variable->count('id')+1 }}</td>
                                            <td class="text-left">កម្រៃសេវា / Service Fee</td>
                                            <td>${{ number_format($invoice[0]->service_fee_price,2) }}</td>
                                           
                                            <td>{{ $invoice[0]->$variable->sum('quantity') }}</td>
                                            <td>${{ number_format($service_fee,2) }}</td>
                                            <td>${{ number_format($total_service_fee,2) }}</td>
                                            <td>${{ number_format($vat,2) }}</td>
                                        </tr>
                                        <!--Total row-->
                                        <tr class="border-top-2 border-dark">
                                            <td colspan="3" class="text-left align-top">អត្រាប្ដូរប្រាក់ / Exchange Rate:USD 1 = KHR {{ $invoice[0]->exchange_riel }}</td>
                                            <td></td>
                                            <td>
                                                សរុបមុនអត<br>
                                                <small class="text-nowrap">Total before VAT</small>
                                                <p class="m-0">USD {{ number_format($invoice[0]->$variable->sum('price')+$service_fee,2) }}</p>
                                            </td>
                                            <td>
                                                សរុបអតប<br><small class="text-nowrap">Total VAT</small>
                                                <p class="m-0">USD {{ number_format($total_service_fee,2) }}</p>
                                            </td>
                                            <td>
                                                សរុបរួមអតប<br><small class="text-nowrap">TOTAL Incl.VAT</small>
                                                <p class="m-0">USD {{ number_format($invoice[0]->$variable->sum('price')+$vat,2) }}</p>
                                                <p class="m-0">KHR {{ number_format( ($invoice[0]->$variable->sum('price')+$vat)*$invoice[0]->exchange_riel,0)}}</p>

                                            </td>
                                        </tr>
                                       

                                    </tbody>
                                </table>
                                <!-- /.Item list -->
                            </div>
                        </div>
                    </div>                    
                </div>
                <!---footer invoice-->
                <div class="d-flex align-items-end w-100">
                    <div class="col-md-12 footer-invoice pt-5 mt-5">
                   
                        <div class="row pt-5">
                            <div class="col d-flex justify-content-center">
                                <div class="col-md-7 text-center">
                                    <h6 class="mt-3 pb-5 mb-5">ហត្ថលេខា និងឈ្មោះអតិថិជន​ <br/><small>Customer's Signature & Name</small></h6>
                                    <p>&nbsp;</p>
                                    <hr/>
                                </div>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <div class="col-md-7 text-center">
                                    <h6 class="mt-3 pb-5 mb-5">អ្នកផ្ដល់សេវា <br/><small>Service Provider</small></h6>
                                    <p>&nbsp;</p>
                                    <hr/>
                                </div>
                            </div>
                        </div>
                        <div class="row footer-note mt-5">
                            <div class="col-md-12 ">
                                <hr class="mt-1">
                            </div>
                            <div class="note​​ col-md-12 pt-0">
                                <small class="text-left">
                                    <p class="m-0">សំគាល់៖ វិក័យប័ត្រពន្ធនេះមានសុពលភាពដរាបណាមានហត្ថលេខារបស់គណនេយ្យករ​ ឬ ក៏បុគ្គលិកផ្នែកទទួលបន្ទុក អមជាមួយនិងត្រាក្រុមហ៊ុន។</p>
                                    <p class="">Note: This Tax Invoice is valid only when there is a signature of our company's cashier or reservation sfaff with company stamp.</p>
                                </small>
                            </div>    
                            <div class="col-md-12">
                                <hr class="mt-1 mb-1">
                            </div>
                            <div class="address col-md-12 text-center pb-3">
                                <small class="companyinfo ">
                                    @foreach($value->company_address as $address)
                                        @if($address->lang == 'kh')
                                            <p class="m-0">ផ្ទះលេខ{{ $address->house_number}}  ផ្លូវលេខ{{ $address->street_number}}  សង្កាត់{{ $address->commune}}  ខ័ណ្ឌ{{ $address->districk}}  រាជធានី{{ $address->province}}  កម្ពុជា / លេខទំនាក់ទំនង៖​ 
                                                @foreach($value->company_phone as $phone) 
                                                    {{$phone->phone }}
                                                    @if(!$loop->last)
                                                        /
                                                    @endif
                                                @endforeach
                                                អុីម៉ែល៖ 
                                                @foreach($value->company_email as $email) 
                                                    {{$email->email }}
                                                    @if(!$loop->last)
                                                        /
                                                    @endif
                                                @endforeach
                                            </p>
                                        @else
                                            <p class="m-0">{{ $address->house_number}}, Street {{ $address->street_number}}, Sangkat {{ $address->commune}}, Khan {{ $address->districk}}, City {{ $address->province}}, Cambodia. Hoteline:
                                            @foreach($value->company_phone as $phone) 
                                                    {{$phone->phone }}
                                                    @if(!$loop->last)
                                                        /
                                                    @endif
                                                @endforeach
                                                , E-mail:  
                                                @foreach($value->company_email as $email) 
                                                    {{$email->email }}
                                                    @if(!$loop->last)
                                                        /
                                                    @endif
                                                @endforeach
                                            </p> 
                                        @endif
                                    @endforeach
                                
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </section>
        </div>

    </main>
</div>    