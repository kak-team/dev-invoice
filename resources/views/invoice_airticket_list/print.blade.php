<style>
.font {
    font-family: battambang, Roboto,-apple-system,BlinkMacSystemFont;
}
.fixed-sn main {
    padding-top: 2.5rem;
}
.company-name {
    font-family: moul, Roboto;
}
.company-en-name {
    font-family:Roboto;
    font-weight: 600;
}
</style>
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<div class="fixed-sn white-skin js-focus-visible">
     <!-- First row -->
     <div class="row top-print d-flext justify-content-end mb-5">
        <div class="form-group text-center">
            <button class="btn btn-danger legitRipple waves-effect waves-light" type="button" data-dismiss="modal" id="iaSave">Cancel</button>
            <button type="button" id="print" class="btn btn-success legitRipple waves-effect waves-light">Print<i class="icon-circle-right2 ml-2"></i></button>
        </div>
    </div>
    <!-- /.First row -->
    <main class="print-wrap">
        <div class="container-fluid">
            <section class="invoice font row mb-r">
            @foreach($company as $value)
                <div class="col-md-12">
                
                    <!-- company logo-->
                    <div class="row p-1 d-flex align-items-center">
                        <div class="col p-3">
                            <img class="img-fluid" src="{{ URL::asset('/images/'. $value->logo) }}"/>
                        </div>
                        <div class="col col-md-10 text-left">
                            <h2 class="company-name"> {{ $value->name }} </h2>
                            <h2 class="company-en-name font-wieght-600"> {{ $value->en_name }} </h2>   
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
                                    <td>Name Here</td>
                                </tr>
                                <tr class="">
                                    <td>Company Name</td>
                                    <td>: </td>
                                    <td>Name Here</td>
                                </tr>
                                <tr class="">
                                    <td>លេខអតប / VAT No.</td>
                                    <td>: </td>
                                    <td>00000000000000000</td>
                                </tr>
                                <tr class="">
                                    <td>ទំនាក់ទំនង​/ Contact</td>
                                    <td>: </td>
                                    <td>00000000000000000</td>
                                </tr>
                                <tr class="">
                                    <td>ទូរសព្ទ / Tel</td>
                                    <td>: </td>
                                    <td>00000000000000000</td>
                                </tr>
                                <tr class="">
                                    <td>អុីម៉ែល / E-mail</td>
                                    <td>: </td>
                                    <td>00000000000000000</td>
                                </tr>
                                <tr class="">
                                    <td>អាសយដ្ឋាន / Address</td>
                                    <td>: </td>
                                    <td>00000000000000000</td>
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
                                    <td>#000000</td>
                                </tr>
                                <tr>
                                    <td>ថ្ងៃចេញវិក័យប័ត្រ / Issued Date</td>
                                    <td>:</td>
                                    <td> 12/12/2019</td>
                                </tr>
                                <tr>
                                    <td>ចេញដោយ / Issued by</td>
                                    <td>:</td>
                                    <td> Heng Seyha</td>
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
                                            <th class="text-nowrap">បរិយាយមុខទំនិញ<br/>Description</th>
                                            <th class="text-nowrap">ថ្ងៃទំនិញរាយ<br/>Unit Price</th>
                                            <th class="text-nowrap">បរិមាណ<br/>Quantity</th>
                                            <th class="text-nowrap">តម្លៃសរុប<br/>Total Price</th>
                                            <th class="text-nowrap">អតប១០%<br/>VAT10%</th>
                                            <th class="text-nowrap">តម្លៃសរុបរួមអតប<br/>Total Price Include VAT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td class="text-left">សេវាកម្មសម្រាប់៖ Customer's Name<br/>
                                                Ticket No: MT00000000000<br/>
                                                Routing: PP-BKK/BKK-PP
                                            </td>
                                            <td>$ {{ number_format(319,2) }}</td>
                                            <td>1</td>
                                            <td>$ {{ number_format(319,2) }}</td>
                                            <td></td>
                                            <td>$ {{ number_format(319,2) }}</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td class="text-left">សេវាកម្មសម្រាប់៖ Customer's Name<br/>
                                                Ticket No: MT00000000000<br/>
                                                Routing: PP-BKK/BKK-PP
                                            </td>
                                            <td>$ {{ number_format(319,2) }}</td>
                                            <td>1</td>
                                            <td>$ {{ number_format(319,2) }}</td>
                                            <td></td>
                                            <td>$ {{ number_format(319,2) }}</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td class="text-left">សេវាកម្មសម្រាប់៖ Customer's Name<br/>
                                                Ticket No: MT00000000000<br/>
                                                Routing: PP-BKK/BKK-PP
                                            </td>
                                            <td>$ {{ number_format(319,2) }}</td>
                                            <td>1</td>
                                            <td>$ {{ number_format(319,2) }}</td>
                                            <td></td>
                                            <td>$ {{ number_format(319,2) }}</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td class="text-left">សេវាកម្មសម្រាប់៖ Customer's Name<br/>
                                                Ticket No: MT00000000000<br/>
                                                Routing: PP-BKK/BKK-PP
                                            </td>
                                            <td>$ {{ number_format(319,2) }}</td>
                                            <td>1</td>
                                            <td>$ {{ number_format(319,2) }}</td>
                                            <td></td>
                                            <td>$ {{ number_format(319,2) }}</td>
                                        </tr>
                                        <!--Total row-->
                                        <tr class="border-top-2 border-dark">
                                            <td colspan="3" class="text-left">អត្រាប្ដូរប្រាក់ / Exchange Rate:USD 1 = KHR 4068</td>
                                            <td></td>
                                            <td>សរុបមុនអត<br><small class="text-nowrap">Total before VAT</small></td>
                                            <td>សរុបអតប<br><small class="text-nowrap">Total VAT</small></td>
                                            <td>សរុបរួមអតប<br><small class="text-nowrap">TOTAL Incl.VAT</small></td>
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
                                    <h6 class="mt-3 pb-5 mb-5">ហត្ថលេខា និងឈ្មោះអ្នកទិញ​ <br/><small>Customer's Signature & Name</small></h6>
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
                            <div class="note​​ col-md-12">
                                <small class="text-left">
                                <p>សំគាល់៖ វិក័យប័ត្រពន្ធនេះមានសុពលភាពដរាបណាមានហត្ថលេខារបស់គណនេយ្យករ​ ឬ ក៏បុគ្គលិកផ្នែកទទួលបន្ទុក អមជាមួយនិងត្រាក្រុមហ៊ុន។</p>
                                <p>Note: This Tax Invoice is valid only whne there is a signature of our company's cashier or reservation sfaff with company stamp.</p>
                                </small>
                            </div>    
                            <div class="col-md-12">
                                <hr class="mt-1 mb-1">
                            </div>
                            <div class="address col-md-12 text-center pb-3">
                                <small class="companyinfo">
                                    @foreach($value->company_address as $address)
                                        @if($address->lang == 'kh')
                                            <p>ផ្ទះលេខ{{ $address->house_number}}  ផ្លូវលេខ{{ $address->street_number}}  សង្កាត់{{ $address->commune}}  ខ័ណ្ឌ{{ $address->districk}}  រាជធានី{{ $address->province}}  កម្ពុជា / លេខទំនាក់ទំនង៖​ 
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
                                            <p>{{ $address->house_number}}, Street {{ $address->street_number}}, Sangkat {{ $address->commune}}, Khan {{ $address->districk}}, City {{ $address->province}}, Cambodia. Hoteline:
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