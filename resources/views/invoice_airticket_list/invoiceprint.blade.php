@extends('master')
@section('content')

<main class="">
        <div class="container-fluid">
            <!-- First row -->
            <div class="row white z-depth-1 mb-r">

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

            <section class="invoice row mb-r">

                <div class="col-md-12">

                    <!-- First row -->
                    <div class="row invoice-data">
                        
                        <div class="col-6">
                            <p><small>From:</small></p>
                            <p><strong>Awesome Company Inc</strong></p>
                            <p>134 Richardson Ave</p>
                            <p>San Francisco, CA 94123</p>
                            <p><strong>Invoice date:</strong> November 18, 2016</p>
                            <p><strong>Due date:</strong> December 2, 2016</p>
                        </div>
                        <div class="col-6 text-right">
                            <h4 class="h4-responsive"><small>Invoice No.</small><br><strong><span class="blue-text">#124190</span></strong></h4>

                            <p><small>To:</small></p>
                            <p><strong>The Company, Inc</strong></p>
                            <p>1-245 East Russel Road</p>
                            <p>Munger, MI 48747</p>
                        </div>

                    </div>
                    <!-- ./First row -->

                    <!-- Second row -->
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <!-- Item list -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Item list</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Tax</th>
                                            <th>Total price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>MDBootstrap Corporate License</td>
                                            <td>1</td>
                                            <td>$319</td>
                                            <td>$73.37</td>
                                            <td>$319</td>
                                        </tr>
                                        <tr>
                                            <td>Material Design for Wordpress</td>
                                            <td>2</td>
                                            <td>$69</td>
                                            <td>$31.74</td>
                                            <td>$138</td>
                                        </tr>
                                        <tr>
                                            <td>MDBootstrap Portfolio Template Personal Licence</td>
                                            <td>1</td>
                                            <td>$49</td>
                                            <td>$11.27</td>
                                            <td>$49</td>
                                        </tr>
                                        <tr>
                                            <td>MDBootstrap Magazine Corporate Licence</td>
                                            <td>1</td>
                                            <td>$249</td>
                                            <td>$57.27</td>
                                            <td>$249</td>
                                        </tr>

                                    </tbody>
                                </table>
                                <!-- /.Item list -->
                            </div>
                        </div>
                    </div>
                    <!-- /.Second row -->

                    <!-- Third row -->
                    <div class="row mt-2">
                        <div class="col-md-3 float-md-right ml-auto">
                            <ul class="striped list-unstyled">
                                <li><strong>Sub Total:</strong><span class="float-right">$755</span></li>
                                <li><strong>TAX:</strong><span class="float-right">$173,65</span></li>
                                <li><strong>TOTAL:</strong><span class="float-right">$755</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.Third row -->
                </div>

            </section>
        </div>

    </main>

    @stop