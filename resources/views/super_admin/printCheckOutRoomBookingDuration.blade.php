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


                    <div class="card">
                        <div class="card-body">
                        <img style="margin-right: 25px" src="{{ asset('demo/img/Header.jpg') }}" height="130px" width="905px" />
                            <br><br>

                            <table class="table table-bordered mb-0" style="color:#000000;font-size: 16px">
                            <?php date_default_timezone_set('Asia/Colombo');
                                  $date = date("Y M d");
                                  $time = date("H:i:s");

                                  ?>
                                 <tbody>
                                     <thead>
                                        <tr style="font-size: 16px">
                                            @if(session('search_booking_type')==0)
                                            <td>Booking Type :<br> Nelly Marine</td>
                                            @elseif(session('search_booking_type')==1)
                                            <td>Booking Type :<br> Booking.com</td>
                                            @elseif(session('search_booking_type')==2)
                                            <td>Booking Type :<br> Room Brokers</td>
                                            @elseif(session('search_booking_type')==3)
                                            <td>Booking Type :<br> Others</td>
                                            @else
                                            <td>Booking Type :<br> All Bookings</td>
                                            @endif

                                            <th>Date Period :&nbsp&nbsp<br> {{session('search_date_report_check_from')}} To {{session('search_date_report_check_to')}} </th>
                                            <th>Date & Time :&nbsp&nbsp<br>{{$date}}&nbsp {{$time}} </th>

                                        </tr>
                                    </thead>

                                </tbody>
                            </table>


                          @inject('meals_details', 'App\Http\Controllers\SuperAdminController')
                         @inject('booking_details', 'App\Http\Controllers\SuperAdminController')
                         @inject('room_details', 'App\Http\Controllers\SuperAdminController')
                         @inject('cus_details', 'App\Http\Controllers\SuperAdminController')
                         @inject('time_conversion', 'App\Http\Controllers\SuperAdminController')
                         @inject('booking_type', 'App\Http\Controllers\SuperAdminController')
                         @inject('cus_id', 'App\Http\Controllers\ReceptionistController')
                         @inject('cus_info', 'App\Http\Controllers\SuperAdminController')
                         @inject('con_date_time', 'App\Http\Controllers\ReceptionistController')
                         @inject('get_book_pay', 'App\Http\Controllers\SuperAdminController')

                            <table class="table mb-3" style="color:#000000;font-size: 16px">
                                <thead  class="thead-default">
                                <tr>
                                    <th style="color: darkblue"><b>#</b></th>
                                    <th style="color: darkblue"><i>Customer Name & Inv</i></th>
                                    <th style="color: darkblue"><i>Type & Room No</i></th>
                                    <th style="color: darkblue"><i>Check In</i></th>
                                    <th style="color: darkblue"><i>Check Out</i></th>
                                    <th style="color: darkblue"><i>Days</i></th>
                                    <th style="color: darkblue"><i>Amount/Day</i></th>
                                    <th style="color: darkblue"><i>Total Amount</i></th>
                                    <hr>

                                </tr>

                                </thead>

                                <tbody>
                                <?php $cont=0;$totalAmount=0.0;?>
                                 @foreach($bookingInfos as $bookingInfo)
                                	<tr>
                                		<th scope="row">{{$cont=$cont+1}}</th>
                                		<td>{{$cus_info->getCustomer($cus_id->getCustomerId($bookingInfo->invoice_id))->cus_first_name}} {{$cus_info->getCustomer($cus_id->getCustomerId($bookingInfo->invoice_id))->cus_last_name}}<br>
                                		{{$bookingInfo->invoice_id}}</td>
                                		@if($bookingInfo->booking_type==0)
                                		<td>Nelly Marine <br>{{$room_details->getRoomDetails($bookingInfo->room_id)->room_number}}</td>
                                		@elseif($bookingInfo->booking_type==1)
                                		<td>Booking.com</td>
                                		@elseif($bookingInfo->booking_type==2)
                                		<td>Room Brokers</td>
                                		@else
                                		<td>Others</td>
                                		@endif
                                		<td>{{$con_date_time->convertDate($bookingInfo->from_date)}}</td>
                                		<td>{{$con_date_time->convertDate($bookingInfo->to_date)}}</td>
                                		<td>{{$get_book_pay->getBookingPayDetails($bookingInfo->booking_id)->no_of_days}}</td>
                                		<?php $perDay=($get_book_pay->getBookingPayDetails($bookingInfo->booking_id)->total_amount/$get_book_pay->getBookingPayDetails($bookingInfo->booking_id)->no_of_days);?>

                                		<td>{{number_format((float)$perDay,2,'.','')}}</td>
                                		<?php $totalAmount=$totalAmount+$get_book_pay->getBookingPayDetails($bookingInfo->booking_id)->total_amount;?>
                                		<td>{{number_format((float)$get_book_pay->getBookingPayDetails($bookingInfo->booking_id)->total_amount,2,'.','')}}</td>

                                	</tr>
                                @endforeach


                                </tbody>
                            </table>

                            <table class="table table-bordered mb-0" style="color:#000000;font-size: 16px">

                                <thead>
                                <tr style="font-size: 16px">
                                	<th style="color: #004444"><b>#</b></th>
                                	<th style="color: #004444"><b>Total Amount For Room Booking
                                	<?php $num=40-strlen(number_format((float)$totalAmount,2,'.',''));?></b></th>

                                	<th style="color: #004444"><b>
                                	<?php for($i=0;$i<$num;$i++){echo"&nbsp&nbsp";}?>
                                	{{number_format((float)$totalAmount,2,'.','')}}</b></th>

                                </tr>
                                </thead>
                            </table>




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