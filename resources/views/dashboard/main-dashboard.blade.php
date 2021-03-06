@extends('master')
@section('content')
<div class="title">
<h2>Issue invocie for: </h2>
</div>
<div class="row">
<?php 
    $array_color = array(
        array(
            'bg'    => 'bg-teal-400',
            'icon'  => 'icon-airplane2',
            'title' => 'AIR TICKET',
            'link'  => 'invoice_airticket_list'
        ),
        array(
            'bg'    => 'bg-green-400',
            'icon'  => 'icon-vcard',
            'title' => 'VISA SERVICE',
            'link'  => 'invoice_visa_list'
        ),
        array(
            'bg'    => 'bg-blue-400',
            'icon'  => 'icon-camera',
            'title' => 'TOURS BOOKING',
            'link'  => 'invoice_tour_list'
        ),
        array(
            'bg'    => 'bg-warning-400',
            'icon'  => 'icon-bed2',
            'title' => 'HOTEL BOOKING',
            'link'  => 'invoice_hotel_list'
        ),
        array(
            'bg'    => 'bg-pink-400',
            'icon'  => 'icon-folder-heart',
            'title' => 'INSURANCE SAVING',
            'link'  => 'invoice_insurance_list'
        ),
        array(
            'bg'    => 'bg-info-400',
            'icon'  => 'icon-car2',
            'title' => 'TRANSPORTATION',
            'link'  => 'invoice_transportation_list'
        ),
        array(
            'bg'    => 'bg-orange-400',
            'icon'  => 'icon-grid4',
            'title' => 'OTHER',
            'link'  => 'invoice_other_list'
        )
    
    );
    $loop = 0;
    foreach($array_color as $key):
        echo '<div class="col-lg-3">
                <!-- Members online -->
                    <a href="'.$key['link'].'" >
                        <div class="card '.$key['bg'].'">
                            <div class="card-body text-center">
                                <i class=" '.$key['icon'].' icon-round"></i>
                                <p class="h4">'.$key['title'].'</p>
                            </div>
                        </div>
                    </a>
                <!-- /members online -->
                </div>';
        $loop++;
    endforeach;
?>




</div>
@stop

