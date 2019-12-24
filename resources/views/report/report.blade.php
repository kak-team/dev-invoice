@extends('header_report')
@section('content')
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
<div class="fixed-sn white-skin js-focus-visible container-fluid bg-white">
            <section class="invoice font row">

                @include('report.report_header')

                <div class="col-md-12">
                    <!-- Second row -->
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="text-center pt-5">
                                    <h1>Report</h1>
                                </div>
                                </span>
                                <table class="table table-striped">
                                    <thead class="bg-info">
                                        <tr>
                                            <th class="text-nowrap small">Issued Date</th>
                                            <th class="text-nowrap small">Pay Date</th>
                                            <th class="text-center text-nowrap small">Invoice Number</th>
                                            <th class="text-center text-nowrap small">Provider Name</th>
                                            <th class="text-center text-nowrap small">Service Type</th>
                                            <th class="text-center text-nowrap small">Company Name</th>
                                            <th class="text-center text-nowrap small">Contact Name</th>
                                            <th class="text-center text-nowrap small">Total</th>
                                            <th class="text-center text-nowrap small">Deposit</th>
                                            <th class="text-center text-nowrap small">Balence</th>
                                            <th class="text-center text-nowrap small">Sale By</th>
                                            <th class="text-center text-nowrap small">Status</th>
                                            <th class="text-center text-nowrap small">Reissue To</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="small">
                                            <td class="col-md-9"><em>Baked Rodopa Sheep Feta</em></h4></td>
                                            <td class="col-md-1" style="text-align: center"> 2 </td>
                                            <td class="col-md-1 text-center">$13</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>

                                        </tr>
                                        <tr class="small">
                                            <td class="col-md-9"><em>Lebanese Cabbage Salad</em></h4></td>
                                            <td class="col-md-1" style="text-align: center"> 1 </td>
                                            <td class="col-md-1 text-center">$8</td>
                                            <td class="col-md-1 text-center">$8</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                            <td class="col-md-1 text-center">$26</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.Second row -->
                </div>
            </section>
</div>   
@stop 