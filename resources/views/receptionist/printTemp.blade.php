<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



            <!-- App styles -->
        <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/print.css') }}">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script>
        <script src="https://use.fontawesome.com/160905b9c7.js"></script>

    </head>

    <body data-sa-theme="3">
     <div class="page">
        <main class="main">
            {{--<div class="page-loader">--}}
                {{--<div class="page-loader__spinner">--}}
                    {{--<svg viewBox="25 25 50 50">--}}
                        {{--<circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />--}}
                    {{--</svg>--}}
                {{--</div>--}}
            {{--</div>--}}





            {{--<section class="content">--}}
                {{--<div class="content__inner">--}}
                    {{--<header class="content__title">--}}
                        {{--<nav aria-label="breadcrumb" role="navigation">--}}
                            {{--<ol class="breadcrumb">--}}
                              {{--<li class="breadcrumb-item"><a href="{{route('receptionist_home')}}">Home</a></li>--}}
                              {{--<li class="breadcrumb-item active" aria-current="page">Add Receptionist</li>--}}
                            {{--</ol>--}}
                        {{--</nav>--}}

                    {{--</header>--}}
                    @inject('cus_id', 'App\Http\Controllers\ReceptionistController')
                    @inject('cus_info', 'App\Http\Controllers\SuperAdminController')

                    <div class="card">
                        <div class="card-body">
                        <img style="margin-right: 25px" src="{{ asset('demo/img/Header.jpg') }}" height="130px" width="905px" />
                            {{--<h3 class="card-title" style="text-align: center"><u>Payment Preview</u></h3>--}}
                            <br><br>

                                {{--<h4 class="card-title" style="color: #000000">Invoice No : {{session('pay_invoice')}}</h4>--}}

                                {{--<h4 class="card-title" style="color: #000000">Generate Date : {{date("Y/m/d")}}</h4>--}}
                            <table class="table table-bordered mb-0" style="color:#000000;font-size: 16px">
                            <?php date_default_timezone_set('Asia/Colombo');
                                  $date = date("Y M d");
                                  $time = date("H:i:s");

                                  ?>
                                 <tbody>
                                     <thead>
                                        <tr style="font-size: 16px">
                                            {{--<th>#</th>--}}
                                            <th>Invoice No :&nbsp&nbsp {{session('pay_invoice')}} </th>
                                            <th>Date & Time :&nbsp&nbsp{{$date}}&nbsp {{$time}} </th>

                                        </tr>
                                        <tr>
                                           <th>Guest Name :&nbsp&nbsp{{$cus_info->getCustomer($cus_id->getCustomerId(session('pay_invoice')))->cus_first_name}} {{$cus_info->getCustomer($cus_id->getCustomerId(session('pay_invoice')))->cus_last_name}}</th>
                                           
                                        </tr>
                                    </thead>

                                </tbody>
                            </table>


                              @inject('countDay', 'App\Http\Controllers\SuperAdminController')
                              @inject('book_info', 'App\Http\Controllers\SuperAdminController')
                              @inject('room_info', 'App\Http\Controllers\SuperAdminController')
                              @inject('order_info', 'App\Http\Controllers\SuperAdminController')
                              @inject('meals_info', 'App\Http\Controllers\SuperAdminController')
                              @inject('a_booking', 'App\Http\Controllers\SuperAdminController')
                              @inject('time_conversion', 'App\Http\Controllers\SuperAdminController')
                              @inject('con_date_time', 'App\Http\Controllers\ReceptionistController')
                              

                            <table class="table mb-3" style="color:#000000;font-size: 16px">
                                <thead  class="thead-default">
                                <tr>
                                    <th style="color: darkblue"><b>#</b></th>
                                    <th style="color: darkblue"><b>Rooms Booking/Meals Order/Airport Booking</b></th>
                                    <th style="color: darkblue"><b>Unit Price</b></th>
                                    <th style="color: darkblue"><b>Unit</b></th>
                                    <th style="color: darkblue"><b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAmount</b></th>
                                    <hr>

                                </tr>

                                </thead>

                                <tbody>
                                <?php $cont=0;$roomsAmount=0.0;$mealsAmount=0.0;$airBookingAmount=0.0; ?>
                                @foreach($roomsBookings as $roomsBooking)
                                <tr>
                                    <th scope="row">{{$cont=$cont+1}}</th>
                                    <td>Room No : {{$room_info->getRoomDetails($book_info->getBookingInfo($roomsBooking->booking_id)->room_id)->room_number}}<br> Check-in   : ( {{$con_date_time->convertDate($book_info->getBookingInfo($roomsBooking->booking_id)->from_date)}} 12.00 PM )<br> Check-out :({{$con_date_time->convertDate($book_info->getBookingInfo($roomsBooking->booking_id)->to_date)}} 12.00 PM)</td>
                                    <?php $perAmount=($roomsBooking->total_amount)/$roomsBooking->no_of_days;?>
                                    <td>{{number_format((float)$perAmount,2,'.','')}}</td>
                                    <td>{{$roomsBooking->no_of_days}}</td>
                                    <?php $num=30-strlen(number_format((float)$roomsBooking->total_amount,2,'.',''));?>
                                    <td><?php for($i=0;$i<$num;$i++){echo"&nbsp";}?><b>{{number_format((float)$roomsBooking->total_amount,2,'.','')}}</b></td>
                                    <?php $roomsAmount=$roomsAmount+$roomsBooking->total_amount;?>

                                </tr>
                                @endforeach


                                @foreach($orderPayments as $orderPayment)
                                <tr>
                                    <th scope="row">{{$cont=$cont+1}}</th>
                                    <td>@if($meals_info->getMealsInfo($order_info->getOrderDetails($orderPayment->order_id)->meals_id)->meals_type==4)Drinks Name : @else Meals Name : @endif {{$meals_info->getMealsInfo($order_info->getOrderDetails($orderPayment->order_id)->meals_id)->meals_name}}<br>Order Date : {{$order_info->getOrderDetails($orderPayment->order_id)->order_date}}
                                    @if($order_info->getOrderDetails($orderPayment->order_id)->order_time==null)@else<br> Order Time : {{$time_conversion->timeConversion($order_info->getOrderDetails($orderPayment->order_id)->order_time)}}@endif</td>
                                    <?php $perMAmount=($orderPayment->amount)/$orderPayment->quantity;?>
                                    <td>{{number_format((float)$perMAmount,2,'.','')}}</td>
                                    <td>{{$orderPayment->quantity}}</td>
                                    <?php $num=30-strlen(number_format((float)$orderPayment->amount,2,'.',''));?>
                                    <td><?php for($i=0;$i<$num;$i++){echo"&nbsp";}?><b>{{number_format((float)$orderPayment->amount,2,'.','')}}</b></td>
                                    <?php $mealsAmount=$mealsAmount+$orderPayment->amount;?>


                                </tr>
                                @endforeach
                                @foreach($aBookingPayments as $aBookingPayment)
                                    <tr>
                                        <th scope="row">{{$cont=$cont+1}}</th>
                                        <td>Airport Booking Date :{{$a_booking->getAirBookingInfo($aBookingPayment->a_booking_id)->a_booking_date}}<br> Booking Time : {{$a_booking->getAirBookingInfo($aBookingPayment->a_booking_id)->a_booking_time}} </td>
                                        <td>{{number_format((float)$aBookingPayment->amount,2,'.','')}}</td>
                                        <td>1</td>
                                        <?php $num=30-strlen(number_format((float)$aBookingPayment->amount,2,'.',''));?>
                                        <td><?php for($i=0;$i<$num;$i++){echo"&nbsp";}?><b>{{number_format((float)$aBookingPayment->amount,2,'.','')}}</b></td>
                                        <?php $airBookingAmount=$airBookingAmount+$aBookingPayment->amount;?>


                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {{--<h4 style="color: #000000">Payment History</h4>--}}











                            <table class="table table-bordered mb-0" style="color:#000000;font-size: 16px">

                                <thead>
                                <tr style="font-size: 16px">
                                    <th style="color: #004444"><b>#</b></th>
                                    <th style="color: #004444"><b>Total amount for rooms booking<?php $num=40-strlen(number_format((float)$roomsAmount,2,'.',''));?></b></th>

                                    <th style="color: #004444"><b>
                                    <?php for($i=0;$i<$num;$i++){echo"&nbsp&nbsp";}?>
                                    {{number_format((float)$roomsAmount,2,'.','')}}</b></th>

                                </tr>
                                </thead>


                                <tbody>
                                 <thead>
                                    <tr style="font-size: 16px">
                                        <th style="color: #004444"><b>#</b></th>
                                        <th style="color: #004444"><b>Total amounts for meals order<?php $num=40-strlen(number_format((float)$mealsAmount,2,'.',''));?></b></th>
                                        <th style="color: #004444"><b>
                                        <?php for($i=0;$i<$num;$i++){echo"&nbsp&nbsp";}?>
                                        {{number_format((float)$mealsAmount,2,'.','')}}</b></th>

                                    </tr>
                                </thead>

                                </tbody>
                                <tbody>
                                     <thead>
                                        <tr style="font-size: 16px">
                                            <th style="color: #004444"><b>#</b></th>
                                            <th style="color: #004444"><b>Total amount for AirPort(Pick Up/Drop)<?php $num=40-strlen(number_format((float)$airBookingAmount,2,'.',''));?>  </b></th>
                                            <th style="color: #004444"><b>
                                            <?php for($i=0;$i<$num;$i++){echo"&nbsp&nbsp";}?>
                                            {{number_format((float)$airBookingAmount,2,'.','')}}</b></th>

                                        </tr>
                                    </thead>

                                </tbody>




                                <tbody>
                                     <thead>
                                        <tr style="font-size: 16px;font-weight: bold">
                                            <th style="color: darkblue">#</th>
                                            <th style="color: darkblue"><b>Amount for payment</b> <?php $num=40-strlen(number_format((float)$roomsAmount+$airBookingAmount+$mealsAmount,2,'.',''));?> </th>
                                            <th style="color: darkblue"><b>
                                            <?php for($i=0;$i<$num;$i++){echo"&nbsp&nbsp";}?>
                                            {{number_format((float)$roomsAmount+$airBookingAmount+$mealsAmount,2,'.','')}}
                                            </b>
                                            </th>

                                        </tr>
                                    </thead>

                                </tbody>

                                <?php $paidAmount=0.0;?>

                                @if(count($paymentHstys)!=0)

                                @foreach($paymentHstys as $paymentHsty)
                                    <thead>
                                        <tr style="font-size: 16px">
                                            <th style="color: #004444"><b>#</b></th>
                                            <?php $paidAmount=$paidAmount+$paymentHsty->paid_amount;?>
                                            <th style="color: #004444"><b>Payment Date : {{$paymentHsty->add_date}} <br> Payment Type : @if($paymentHsty->payment_type==0) Cash @else Card @endif

                                            <?php $num=40-strlen(number_format((float)$paymentHsty->paid_amount,2,'.',''));?></b></th>

                                            <th style="color: #004444"><b>
                                            <?php for($i=0;$i<$num;$i++){echo"&nbsp&nbsp";}?>
                                            {{number_format((float)$paymentHsty->paid_amount,2,'.','')}}</b></th>

                                        </tr>
                                    </thead>
                                @endforeach
                                <thead>
                                    <tr style="font-size: 16px">
                                        <th style="color: #006600"><b>#</b></th>
                                        <th style="color: #006600"><b>Total Paid Amount</b></th>
                                        <?php $num=40-strlen(number_format((float)$paidAmount,2,'.',''));?>
                                        <th style="color: #006600"><b><?php for($i=0;$i<$num;$i++){echo"&nbsp&nbsp";}?>
                                                                                    {{number_format((float)$paidAmount,2,'.','')}}</b></th>
                                    </tr>
                                </thead>
                                @else
                                    <thead>
                                        <tr style="font-size: 16px">
                                            <th style="color: #004444">#</th>
                                            <th style="color: #004444">Total Paid Amount</th>
                                            <?php $num=40-strlen(number_format((float)$paidAmount,2,'.',''));?>
                                            <th style="color: #004444"><?php for($i=0;$i<$num;$i++){echo"&nbsp&nbsp";}?>
                                                                                        {{number_format((float)$paidAmount,2,'.','')}}</th>
                                        </tr>
                                    </thead>
                                @endif

                                <thead>
                                    <tr style="font-size: 16px">
                                    <?php $outAmount=($roomsAmount+$airBookingAmount+$mealsAmount)-$paidAmount;?>
                                     @if($outAmount==0)
                                        <th style="color: #004444"><b>#</b></th>
                                        <th style="color: #004444"><b>Outstanding Amount</b></th>
                                        <?php $num=40-strlen(number_format((float)$outAmount,2,'.',''));?>
                                        <th style="color: #004444"><b><?php for($i=0;$i<$num;$i++){echo"&nbsp&nbsp";}?>
                                                                                    {{number_format((float)$outAmount,2,'.','')}}</b></th>
                                     @else
                                        <th style="color: red"><b>#</b></th>
                                        <th style="color: red"><b>Outstanding Amount</b></th>
                                        <?php $num=40-strlen(number_format((float)$outAmount,2,'.',''));?>
                                        <th style="color: red"><b><?php for($i=0;$i<$num;$i++){echo"&nbsp&nbsp";}?>
                                                                                    {{number_format((float)$outAmount,2,'.','')}}</b></th>
                                     @endif

                                    </tr>
                                </thead>
                            </table>
                            <br><br>
                            <h3 style="font-size: 16px;color: #004444;text-align: center"><b>Thank you come again</b></h3>

                            <br><br>
                            <img style="margin-right: 25px" src="{{ asset('demo/img/footer.jpg') }}" height="65px" width="905px" />







                        </div>

                    </div>




                {{--</div>--}}

                {{--<footer class="footer hidden-xs-down">--}}
                    {{--<p>© Super Admin Responsive. All rights reserved.</p>--}}

                    {{--<ul class="nav footer__nav">--}}
                        {{--<a class="nav-link" href="">Homepage</a>--}}

                        {{--<a class="nav-link" href="">Company</a>--}}

                        {{--<a class="nav-link" href="">Support</a>--}}

                        {{--<a class="nav-link" href="">News</a>--}}

                        {{--<a class="nav-link" href="">Contacts</a>--}}
                    {{--</ul>--}}
                {{--</footer>--}}
            {{--</section>--}}
        </main>


            <![endif]-->


        <!-- Vendors -->









</div>
{{--<div class="page">--}}
{{--<h1>hi</h1>--}}
{{--</div>--}}
  <script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    </body>

</html>