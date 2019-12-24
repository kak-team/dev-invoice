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
    <main class="">
        <div class="container-fluid">
            <!-- First row -->
            <div class="row white z-depth-1 mb-5">

                <!-- Navigation -->
                <div class="col-md-6">
                    <h4 class="h4-responsive mt-3">Invoice #124190</h4>
                </div>

                <div class="col-md-6 text-md-right">
                    <a href="#" class="btn btn-secondary waves-effect waves-light">Pay now</a>
                    <a href="#" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print left"></i> Print</a>
                </div>
                <!-- /.Navigation -->

            </div>
            <!-- /.First row -->

            <section class="invoice font row mb-r">
            @foreach($company as $value)
                <div class="col-md-12">
                
                    <!-- company logo-->
                    <div class="row p-1 d-flex align-items-center">
                        <div class="col p-3">
                            <img class="img-fluid" src="{{ URL::asset('/images/'. $value->logo) }}"/>
                        </div>
                        <div class="col col-md-10">
                            <h2 class="company-name"> {{ $value->name }} </h2>
                            <h2 class="company-en-name font-wieght-600"> {{ $value->en_name }} </h2>   
                        </div>
                    </div>
                    <hr size="30">   
                    <!-- First row -->
                    <div class="row invoice-data">
                        
                        <div class="col-8">
                            <p><strong>អតិថិជន / Customer:</strong></p>
                            <table class="">
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
                                            <th class="text-nowrap">ថ្ងៃសេវាកម្ម<br/>Service Fee</th>
                                            <th class="text-nowrap">អតប១០%<br/>VAT10%</th>
                                            <th class="text-nowrap">ថ្ងៃសេវា និងអតប<br/>Service Fee & VAT</th>
                                            <th class="text-nowrap">ថ្លៃសរុប<br/>Total price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>MDBootstrap Corporate License</td>
                                            <td>$319</td>
                                            <td>1</td>
                                            <td>20</td>
                                            <td>$73.37</td>
                                            <td>2</td>
                                            <td>$319</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Material Design for Wordpress</td>
                                            <td>$69</td>
                                            <td>1</td>
                                            <td>$5</td>
                                            <td>$31.74</td>
                                            <td>4</td>
                                            <td>$138</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>MDBootstrap Portfolio Template Personal Licence</td>
                                            <td>$69</td>
                                            <td>1</td>
                                            <td>$5</td>
                                            <td>$31.74</td>
                                            <td>4</td>
                                            <td>$138</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>MDBootstrap Magazine Corporate Licence</td>
                                            <td>$69</td>
                                            <td>1</td>
                                            <td>$5</td>
                                            <td>$31.74</td>
                                            <td>5</td>
                                            <td>$138</td>
                                        </tr>

                                    </tbody>
                                </table>
                                <!-- /.Item list -->
                            </div>
                        </div>
                    </div>
                    <!-- /.Second row -->

                    <!-- Third row -->
                    <div class="row mt-4">
                        <div class="col-md-3 float-md-right ml-auto">
                            <ul class="striped list-unstyled">
                                <li><strong>សរុបមុនអត / Total befor VAT:</strong><span class="float-right">$755</span></li>
                                <li><strong>សរុបអតប / Total VAT:</strong><span class="float-right">$173,65</span></li>
                                <li><strong>សរុបរួមអតប / TOTAL Incl.VAT:</strong><span class="float-right">$755</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.Third row -->
                </div>
                <!---footer invoice-->
                <div class="col-md-12 footer-invoice pt-5 mt-5">
                    <div class="row pt-5">
                        <div class="col d-flex justify-content-center">
                            <div class="col-md-7 text-center">
                                <hr/>
                                <h6 class="mt-3">ហត្ថលេខា និងឈ្មោះអ្នកទិញ​ <br/><small>Customer's Signature & Name</small></h6>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <div class="col-md-7 text-center">
                                <hr/>
                                <h6 class="mt-3">ហត្ថលេខា និងឈ្មោះអ្នកលក់ <br/><small>Seller's Signature & Name</small></h6>
                            </div>
                        </div>
                    </div>
                    <div class="row footer-note mt-5">
                        <div class="note​​ col-md-12">
                            <small>
                               <p>សំគាល់៖ </p>
                               <p>Note: </p>
                            </small>
                        </div>
                        <div class="col-md-12">
                            <hr>
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

            @endforeach
            </section>
        </div>

    </main>
</div>    