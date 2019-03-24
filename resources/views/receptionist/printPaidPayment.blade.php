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
                                            <th>Print Type :&nbsp&nbsp<br> Paid room_details </th>
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

                            <table class="table mb-3" style="color:#000000;font-size: 16px">
                                <thead  class="thead-default">
                                <tr>
                                    <th style="color: darkblue"><b>#</b></th>


                                        <th style="color: darkblue"><i>Customer Name</i></th>
                                        <th style="color: darkblue"><i>Booking Date</i></th>
                                        <th style="color: darkblue"><i>Total</i></th>
                                        <th style="color: darkblue"><i>Paid Amount</i></th>
                                        <th style="color: darkblue"><i>Outstanding</i></th>
                                        <th style="color: darkblue"><i>Check Out Status</i></th>
                                    <hr>

                                </tr>

                                </thead>

                                <tbody>
                                        <?php $cont=0;?>
                                        @foreach($checkOutInfos as $checkOutInfo)
                                        <?php
                                         $out_pay1=0.0;
                                         $total=0.0;
                                         $out_pay1=($checkOutInfo->total_amount-$checkOutInfo->discount_amount)-$checkOutInfo->paid_amount;
                                         $total=$checkOutInfo->total_amount-$checkOutInfo->discount_amount;
                                         
                                         ?>
                                               <tr>
                                                    <th scope="row">{{$cont=$cont+1}}</th>
       
                                                       <td>
                                                       {{$cus_info->getCustomer($cus_id->getCustomerId($checkOutInfo->invoice_id))->cus_first_name}} {{$cus_info->getCustomer($cus_id->getCustomerId($checkOutInfo->invoice_id))->cus_last_name}}<br><span style="font-size: 14px">({{$checkOutInfo->invoice_id}})</span>
                                                       </td>
                                                       <td>{{$con_date_time->convertDate($checkOutInfo->add_date)}}</td>
                                                       <td>{{number_format((float)$total,2,'.','')}}</td>
                                                       <td>{{number_format((float)$checkOutInfo->paid_amount,2,'.','')}}</td>
                                                       <td>{{number_format((float)$out_pay1,2,'.','')}}</td>
                                                       <td>Still Not checkOut</td>
                                                   </tr>
       
                                       
                                       @endforeach
                                

                                 </tbody>
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