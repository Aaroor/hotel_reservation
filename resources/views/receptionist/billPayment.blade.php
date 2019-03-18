<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="{{ asset('vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/bower_components/animate.css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/bower_components/select2/dist/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/bower_components/dropzone/dist/dropzone.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/bower_components/flatpickr/dist/flatpickr.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendors/bower_components/nouislider/distribute/nouislider.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/bower_components/trumbowyg/dist/ui/trumbowyg.min.css') }}">

            <!-- App styles -->
            <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">

        <!-- Demo only -->
        <link rel="stylesheet" href="{{ asset('demo/css/demo.css') }}">
        <link rel="shortcut icon" type="image/png" href="{{ asset('demo/img/fac_hot.ico')}}">

    </head>

    @inject('user_info', 'App\Http\Controllers\ReceptionistController')
    <body data-sa-theme="{{$user_info->getUserInfo(session('user_id'))->theme_id}}">
        <main class="main">
            <div class="page-loader">
                <div class="page-loader__spinner">
                    <svg viewBox="25 25 50 50">
                        <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                    </svg>
                </div>
            </div>

            <header class="header">
                <div class="navigation-trigger hidden-xl-up" data-sa-action="aside-open" data-sa-target=".sidebar">
                    <i class="zmdi zmdi-menu"></i>
                </div>

                <div class="logo hidden-sm-down">
                    <h1><a href="index.html">Hotel Reservation System</a></h1>
                </div>

                <form class="search">
                    <div class="search__inner">
                        <input type="text" class="search__text" placeholder="Search for people, files, documents...">
                        <i class="zmdi zmdi-search search__helper" data-sa-action="search-close"></i>
                    </div>
                </form>

                <ul class="top-nav">
                    <li class="hidden-xl-up"><a href="" data-sa-action="search-open"><i class="zmdi zmdi-search"></i></a></li>
                    <li class="dropdown hidden-xs-down">
                                        {{--<button class="btn btn-light" data-toggle="popover" data-trigger="hover" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">Dismissible popover</button>--}}

                        <a href="{{route('logout')}}" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="Log Out" ><i class="zmdi zmdi-lock"></i></a>
                    </li>
                    <li class="dropdown top-nav__notifications">

                    	<a href="" data-toggle="dropdown" class="top-nav__notify">
                    		<i class="zmdi zmdi-calendar-check"></i>
                    	</a>

                    		<div class="dropdown-menu dropdown-menu-right dropdown-menu--block">
                    			<div class="listview listview--hover">
                    				<div class="listview__header">
                    					Today Booking And Orders

                    					<div class="actions">
                    						<a href="" class="actions__item zmdi zmdi-check-all" data-sa-action="notifications-clear"></a>
                    					</div>
                    				</div>

                    				<div class="listview__scroll scrollbar-inner" id="today_out_put">

                    				</div>

                    				<div class="p-1"></div>
                    			</div>
                    		</div>
                    </li>
                    <li class="dropdown top-nav__notifications">

                    	<a href="" data-toggle="dropdown" class="top-nav__notify">
                    		<i class="zmdi zmdi-car-taxi"></i>
                    	</a>

                    		<div class="dropdown-menu dropdown-menu-right dropdown-menu--block">
                    			<div class="listview listview--hover">
                    				<div class="listview__header">
                    					Airport Pickup/Drop

                    					<div class="actions">
                    						<a href="" class="actions__item zmdi zmdi-check-all" data-sa-action="notifications-clear"></a>
                    					</div>
                    				</div>

                    				<div class="listview__scroll scrollbar-inner" id="air_out_put">



                    				</div>

                    				<div class="p-1"></div>
                    			</div>
                    		</div>


                    </li>

                    <li class="dropdown top-nav__notifications">

                    	<a href="" data-toggle="dropdown" class="top-nav__notify">
                    		<i class="zmdi zmdi-cutlery"></i>
                    	</a>

                    		<div class="dropdown-menu dropdown-menu-right dropdown-menu--block">
                    			<div class="listview listview--hover">
                    				<div class="listview__header">
                    					Meals Order Notifications

                    					<div class="actions">
                    						<a href="" class="actions__item zmdi zmdi-check-all" data-sa-action="notifications-clear"></a>
                    					</div>
                    				</div>

                    				<div class="listview__scroll scrollbar-inner" id="meals_out_put">



                    				</div>

                    				<div class="p-1"></div>
                    			</div>
                    		</div>


                    </li>


                    <li class="dropdown top-nav__notifications">

                    	<a href="" data-toggle="dropdown" class="top-nav__notify">
                    		<i class="zmdi zmdi-hotel"></i>
                    	</a>

                    		<div class="dropdown-menu dropdown-menu-right dropdown-menu--block">
                    			<div class="listview listview--hover">
                    				<div class="listview__header">
                    					Room Booking Notifications

                    					<div class="actions">
                    						<a href="" class="actions__item zmdi zmdi-check-all" data-sa-action="notifications-clear"></a>
                    					</div>
                    				</div>

                    				<div class="listview__scroll scrollbar-inner" id="book_out_put">



                    				</div>

                    				<div class="p-1"></div>
                    			</div>
                    		</div>


                    </li>


                    <li class="dropdown hidden-xs-down">
                    	<a href="" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>

                    	<div class="dropdown-menu dropdown-menu-right">
                    		<div class="dropdown-item theme-switch">
                    			Theme Switch

                    			<div class="btn-group btn-group--colors mt-2 d-block" data-toggle="buttons">
                    				@if($user_info->getUserInfo(session('user_id'))->theme_id==1)
                    				<label class="btn active border-0" style="background-color: #772036"><input type="radio" id="theme_val_1"  value="1" onchange="changeTheme(this)" autocomplete="off" checked></label>
                    				@else
                    				<label class="btn border-0" style="background-color: #772036"><input type="radio" id="theme_val_1"   value="1" onchange="changeTheme(this)" autocomplete="off"></label>
                    				@endif
                    				@if($user_info->getUserInfo(session('user_id'))->theme_id==2)
                    				<label class="btn active border-0" style="background-color: #273C5B"><input type="radio" id="theme_val_2"   value="2" onchange="changeTheme(this)"  checked></label>
                    				@else
                    				<label class="btn border-0" style="background-color: #273C5B"><input type="radio" id="theme_val_2"  value="2" onchange="changeTheme(this)" autocomplete="off"></label>
                    				@endif
                    				@if($user_info->getUserInfo(session('user_id'))->theme_id==3)
                    				<label class="btn active border-0" style="background-color: #174042"><input type="radio" id="theme_val_3"   value="3" onchange="changeTheme(this)" autocomplete="off" checked></label>
                    				@else
                    				<label class="btn border-0" style="background-color: #174042"><input type="radio" id="theme_val_3"  value="3" onchange="changeTheme(this)" autocomplete="off"></label>
                    				@endif
                    				@if($user_info->getUserInfo(session('user_id'))->theme_id==4)
                    				<label class="btn active border-0" style="background-color: #383844"><input type="radio" id="theme_val_4"  value="4" onchange="changeTheme(this)" autocomplete="off" checked></label>
                    				@else
                    				<label class="btn border-0" style="background-color: #383844"><input type="radio" id="theme_val_4"  value="4" onchange="changeTheme(this)" autocomplete="off"></label>
                    				@endif
                    				@if($user_info->getUserInfo(session('user_id'))->theme_id==5)
                    				<label class="btn active border-0" style="background-color: #49423F"><input type="radio" id="theme_val_5"   value="5" onchange="changeTheme(this)" autocomplete="off" checked></label>
                    				@else
                    				<label class="btn border-0" style="background-color: #49423F"><input type="radio" id="theme_val_5"  value="5" onchange="changeTheme(this)" autocomplete="off" ></label>
                    				@endif


                    				<br>
                    				@if($user_info->getUserInfo(session('user_id'))->theme_id==6)
                    				<label class="btn active border-0" style="background-color: #5e3d22"><input type="radio" id="theme_val_6"   value="6" onchange="changeTheme(this)" autocomplete="off" checked></label>
                    				@else
                    				<label class="btn border-0" style="background-color: #5e3d22"><input type="radio" id="theme_val_6"  value="6" onchange="changeTheme(this)" autocomplete="off"></label>
                    				@endif
                    				@if($user_info->getUserInfo(session('user_id'))->theme_id==7)
                    				<label class="btn active border-0" style="background-color: #234d6d"><input type="radio" id="theme_val_7"   value="7" onchange="changeTheme(this)" autocomplete="off" checked></label>
                    				@else
                    				<label class="btn border-0" style="background-color: #234d6d"><input type="radio" id="theme_val_7"  value="7" onchange="changeTheme(this)" autocomplete="off"></label>
                    				@endif
                    				@if($user_info->getUserInfo(session('user_id'))->theme_id==8)
                    				<label class="btn active border-0" style="background-color: #3b5e5e"><input type="radio" id="theme_val_8"  value="8" onchange="changeTheme(this)" autocomplete="off" checked></label>
                    				@else
                    				<label class="btn border-0" style="background-color: #3b5e5e"><input type="radio" id="theme_val_8" value="8" onchange="changeTheme(this)" autocomplete="off"></label>
                    				@endif
                    				@if($user_info->getUserInfo(session('user_id'))->theme_id==9)
                    				<label class="btn active border-0" style="background-color: #0a4c3e"><input  type="radio" id="theme_val_9"  value="9" onchange="changeTheme(this)" autocomplete="off" checked></label>
                    				@else
                    				<label class="btn border-0" style="background-color: #0a4c3e"><input type="radio" id="theme_val_9" value="9" onchange="changeTheme(this)" autocomplete="off"></label>
                    				@endif
                    				@if($user_info->getUserInfo(session('user_id'))->theme_id==10)
                    				<label class="btn active border-0" style="background-color: #7b3d54"><input type="radio" id="theme_val_10"  value="10" onchange="changeTheme(this)" autocomplete="off" checked></label>
                    				@else
                    				<label class="btn border-0" style="background-color: #7b3d54"><input type="radio" id="theme_val_10" value="10" autocomplete="off" onchange="changeTheme(this)" ></label>
                    				@endif
                    			</div>
                    		</div>
                    		<a href="" class="dropdown-item" data-sa-action="fullscreen">Fullscreen</a>
                    		<a href="" class="dropdown-item">Clear Local Storage</a>
                    	</div>
                    </li>
                </ul>

                <div class="clock hidden-md-down">
                    <div class="time">
                        <span class="hours"></span>
                        <span class="min"></span>
                        <span class="sec"></span>
                    </div>
                </div>
            </header>

            <aside class="sidebar">
                <div class="scrollbar-inner">

                    <div class="user">
                        <div class="user__info" data-toggle="dropdown">
                            <img class="user__img" src="{{ asset('demo/img/profile-pics/8.jpg') }}" alt="">
                            <div>
                                <div class="user__name">{{$user_info->getUserInfo(session('user_id'))->user_name}}</div>
                                <div class="user__email">{{$user_info->getUserInfo(session('user_id'))->user_email}}</div>
                            </div>
                        </div>

                        <div class="dropdown-menu">
                            {{--<a class="dropdown-item" href="">View Profile</a>--}}
                            {{--<a class="dropdown-item" href="">Settings</a>--}}
                            <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                        </div>
                    </div>

                    <ul class="navigation">
                      <li class="@indexactivehp"><a href="{{route('receptionist_home')}}"><i class="zmdi zmdi-home"></i> Home</a></li>

                        <li class="navigation__sub @@uiactive">
                         <a href=""><i class="zmdi zmdi-hotel zmdi-hc-fw"></i> Rooms Booking</a>

                         <ul>
                          <li class="@@colorsactive"><a href="{{route('res_monthly_map')}}">Monthly Time Line</a></li>
                          <li class="@@colorsactive"><a href="{{route('res_check_map')}}">Availability Map</a></li>
                          <li class="@@colorsactive"><a href="{{route('res_check_map_bulk')}}">Bulk Booking</a></li>
                          <li class="@@cssanimationsactive"><a href="{{route('res_index_booking_list')}}">Booking List</a></li>
                          <li class="@@colorsactive"><a href="{{route('res_index_check_booking_list')}}">Check Out Bookings</a></li>

                         </ul>
                        </li>
                        <li class="navigation__sub @@uiactive">
                         <a href=""><i class="zmdi zmdi-cutlery zmdi-hc-fw"></i> Meals Order</a>


                         <ul>
                          <li class="@@colorsactive"><a href="{{route('res_index_order_meals')}}">Choose Meals</a></li>
                          <li class="@@colorsactive"><a href="{{route('res_index_order_list')}}">Order List</a></li>
                          <li class="@@colorsactive"><a href="{{route('res_index_check_order_list')}}">Check Out Orders</a></li>

                         </ul>
                        </li>
                        <li class="navigation__sub @@uiactive">
                            <a href=""><i class="zmdi zmdi-car-taxi zmdi-hc-fw"></i> Airport Booking</a>


                            <ul>
                             <li class="@@cssanimationsactive"><a href="{{route('res_index_airport_booking')}}">Make Booking</a></li>
                             <li class="@@colorsactive"><a href="{{route('res_index_airport_booking_list')}}">Booking List</a></li>
                             <li class="@@colorsactive"><a href="{{route('res_index_check_airport_booking_list')}}">Check Out Air Bookings</a></li>


                            </ul>
                        </li>
                        <li class="navigation__sub navigation__sub--active navigation__sub--toggled">
                           <a href=""><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> Payment</a>

                           <ul>
                               <li class="@@colorsactive"><a href="{{route('res_index_check_out_payment')}}">Pending Payments</a></li>
                               <li class="navigation__active"><a href="{{route('res_bill_payment', ['id'=>session('p_invoice_id')])}}">Bill Payment</a></li>
                               <li class="@@colorsactive"><a href="{{route('res_payment_preview', ['id'=>session('p_invoice_id')])}}">Payment Preview</a></li>
                               <li class="@@colorsactive"><a href="{{route('res_index_paid_payment')}}">Paid Payments</a></li>
                               <li class="@@colorsactive"><a href="{{route('res_check_out_info')}}">Check Outs</a></li>

                           </ul>
                        </li>
                        <li class="navigation__sub @@uiactive">
                        	<a href=""><i class="zmdi zmdi-time-restore zmdi-hc-fw"></i>Previous Histories</a>

                        	<ul>
                        		<li class="@@colorsactive"><a href="{{route('res_cus_booking_history')}}">Customer Histories</a></li>
                        	</ul>
                        </li>
                        <li class="navigation__sub @@uiactive">
                         <a href=""><i class="zmdi zmdi-accounts-list-alt zmdi-hc-fw"></i> Customers</a>

                         <ul>
                          <li class="@@colorsactive"><a href="{{route('res_index_add_customer')}}">Add Customer</a></li>
                          <li class="@@colorsactive"><a href="{{route('res_cus_list')}}">Customer List</a></li>
                         </ul>
                        </li>
                        <li class="navigation__sub @@uiactive">
                           <a href=""><i class="zmdi zmdi-globe zmdi-hc-fw"></i>Web Site (nellymarine.com)</a>

                           <ul>
                        	   <li class="@@colorsactive"><a href="{{route('res_cus_request')}}">Customer Request</a></li>
                        	   <li class="@@colorsactive"><a href="{{route('res_cus_questions')}}">FAQ Questions</a></li>
                           </ul>
                        </li>

                        <li class="@@colorsactive">
                         <a href="{{route('logout')}}"><i class="zmdi zmdi-lock"></i> Log Out</a>
                        </li>
                    </ul>
                </div>
            </aside>

            <section class="content">
                <div class="content__inner">

                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title" style="text-align: center"><u>New Booking</u></h3>
                            @inject('cal', 'App\Http\Controllers\SuperAdminController')

                            <div class="row">
                                <div class="col-sm-12" id="top_msg">
                                @if($msg==1)
                                    <div class="alert alert-success alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <strong>{{$cmt}}</strong><br> Successfully added to the system.
                                    </div>
                                @elseif($msg==2)
                                     <div class="alert alert-danger alert-dismissible fade show">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>{{$cmt}}</strong><br> This login name already in the system please try with different login name
                                     </div>
                                @endif
                                </div>

                            </div>


                            <br>


                                <div class="row">
                                    <div class="col-sm-1">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">


                                            <button class="btn btn-light" data-toggle="modal" data-target="#modal-xl"><i style="font-size: 18px" class="zmdi zmdi-google-pages"></i> Preview Bill </button>

                                        </div>

                                    </div>
                                    <div class="col-sm-2">

                                    </div>
                                    <div class="col-sm-1">
                                    </div>
                                </div>
                                @inject('cus_id', 'App\Http\Controllers\ReceptionistController')
                                @inject('cus_info', 'App\Http\Controllers\SuperAdminController')
                         {{Form::open(['action'=>'ReceptionistController@resAddPayment','class'=>'form-horizontal form-label-left input_mask','name'=>'user_form', 'method'=>'POST','role'=>'form','onsubmit'=>'return userFormValidation()'])}}
                            <div class="row">





                                <div class="col-sm-1">
                                </div>
                                <div class="col-sm-5">

                                        <div class="form-group">
                                            <label style="font-size: 16px">Invoice ID</label>
                                            <input style="font-size: 16px" name="invoice_h_id" type="text" class="form-control" value="{{$checkOutPayInfo->invoice_id}}" disabled>

                                            <input type="hidden" name="invoice_id" value="{{$checkOutPayInfo->invoice_id}}" />
                                            <i class="form-group__bar"></i>
                                        </div>

                                    <div id="msg_user_name">

                                    </div>

                                    <br>

                                </div>

                                <div class="col-sm-5">

                                        <div class="form-group">
                                            <label style="font-size: 16px">Customer Name </label>
                                            <input style="font-size: 16px" name="floor_number" type="text" class="form-control" value="{{$cus_info->getCustomer($cus_id->getCustomerId($checkOutPayInfo->invoice_id))->cus_first_name}} {{$cus_info->getCustomer($cus_id->getCustomerId($checkOutPayInfo->invoice_id))->cus_last_name}}" disabled>

                                            <i class="form-group__bar"></i>
                                        </div>

                                    <div id="msg_login_name">

                                    </div>

                                    <br>

                                </div>
                                <div class="col-sm-1">
                                </div>

                                <div class="col-sm-1">
                                </div>

                                <div class="col-sm-5">


                                        <div class="form-group">
                                            <label style="font-size: 16px">Total Booking Amount</label>
                                            <?php $newTotalAmount=($checkOutPayInfo->total_amount-$checkOutPayInfo->discount_amount);?>



                                            <input style="font-size: 16px" name="from_date" type="text" class="form-control" value="{{number_format((float)$newTotalAmount,2,'.','')}}" disabled>
                                            <i class="form-group__bar"></i>
                                        </div>

                                    <div id="msg_user_mail">

                                    </div>

                                    <br>

                                </div>

                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label style="font-size: 16px">Paid Amount (Rs)  </label>
                                        <input style="font-size: 16px" name="to_date" type="number" class="form-control"   value="{{number_format((float)$checkOutPayInfo->paid_amount,2,'.','')}}" disabled>
                                        <i class="form-group__bar"></i>
                                    </div>
                                    <br>
                                    <div id="msg_user_phone">

                                    </div>

                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-5">
                                     <div class="form-group">
                                        <label style="font-size: 16px">Outstanding Payment ( Rs ) </label>
                                        <?php $outPay=$newTotalAmount-$checkOutPayInfo->paid_amount;?>
                                        <input style="font-size: 16px" name="to_date" type="number" step="any" class="form-control" value="{{number_format((float)$outPay,2,'.','')}}" disabled>
                                        <i class="form-group__bar"></i>
                                        <input type="hidden" name="out_stand_amount" id="out_stand_am" value="{{number_format((float)$outPay,2,'.','')}}" />
                                    </div>
                                    <br>
                                    <div id="msg_user_phone">

                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label style="font-size: 16px">Payment Type</label>

                                        <select id="book_type" name="booking_type" class="select2" data-minimum-results-for-search="Infinity" onchange="setPaymentType()" >
                                            <option style="font-size: 16px" value="0">Cash</option>
                                            <option style="font-size: 16px" value="1">Card</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-1"></div>

                                    <div class="col-sm-1" id="di1" style="display:none"></div>
                                     <div class="col-sm-5" id="di2" style="display:none">

                                    		<div class="form-group">
                                    			<label style="font-size: 16px">Card Type</label>

                                    			<select id="card_type" name="card_type" class="select2" data-minimum-results-for-search="Infinity" >
                                    				<option style="font-size: 16px" value="0">Visa</option>
                                    				<option style="font-size: 16px" value="1">Debit</option>
                                    				<option style="font-size: 16px" value="1">Credit</option>

                                    			</select>
                                    		</div>

                                    	 <br>
                                    	 <div id="msg_user_password">

                                    	 </div>
                                     </div>

                                     <div class="col-sm-5" id="di3" style="display:none">

                                    		 <div class="form-group">
                                    			 <label style="font-size: 16px">Card Number Last 6 Digits</label>
                                    			 <input style="font-size: 16px" name="card_number" type="text" class="form-control" value="0.0" required>
                                    			 <i class="form-group__bar"></i>
                                    		 </div>

                                    	  <br>
                                    	  <div id="msg_user_password">

                                    	  </div>
                                      </div>
                                    <div class="col-sm-1" id="di4" style="display:none"></div>

                                {{--</div>--}}
                                 <div class="col-sm-1"></div>
                                 <div class="col-sm-5">

                                        <div class="form-group">
                                            <label style="font-size: 16px">Pay Amount</label>
                                            <input id="pay_amount" name="paid_amount" style="font-size: 16px" oninput="setBalanceAmount()" step="any" name="total_amount" type="number" min="0" class="form-control" placeholder="00.00" required>
                                            <i class="form-group__bar"></i>
                                        </div>

                                     <br>
                                     <div id="msg_user_password">

                                     </div>
                                 </div>

                                 <div class="col-sm-5">
                                         <div class="form-group" id="di5" style="display: block">
                                            <label style="font-size: 16px">Balance To Customer</label>
                                            <input style="font-size: 16px" id="balance_amount"  name="balance_amount" type="text" class="form-control" value="0.00" disabled>
                                            <input type="hidden" id="bal_amount" name="bal_amount" value="0.00">
                                            <i class="form-group__bar"></i>
                                        </div>
                                  </div>

                                 {{--<div class="col-sm-5">--}}




                                <div class="col-sm-1"></div>

                                <div class="col-sm-1"></div>
                                <div class="col-sm-5">
                                    <button style="font-size: 16px" type="submit" class="btn btn-dark btn--icon-text"><i class="zmdi zmdi-save"></i> Add Payment</button>



                                </div>
                                <div class="col-sm-5"></div>
                                <div class="col-sm-1"></div>
                            </div>
                            {{Form::close()}}

                            <br>

                        </div>
                    </div>
                </div>

                 <div class="modal fade" id="modal-xl" tabindex="-1">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title pull-left">Bill Preview</h5>
                                </div>
                                <div class="modal-body">
                                     @inject('countDay', 'App\Http\Controllers\SuperAdminController')
                                      @inject('book_info', 'App\Http\Controllers\SuperAdminController')
                                      @inject('room_info', 'App\Http\Controllers\SuperAdminController')
                                      @inject('order_info', 'App\Http\Controllers\SuperAdminController')
                                      @inject('meals_info', 'App\Http\Controllers\SuperAdminController')
                                      @inject('a_booking', 'App\Http\Controllers\SuperAdminController')
                                      @inject('checkOut', 'App\Http\Controllers\ReceptionistController')

                                    <table class="table mb-3">
                                        <thead  class="thead-default">
                                        <tr>
                                            <th>#</th>
                                            <th>Rooms Booking/Meals Order/Airport Booking</th>
                                            <th>Unit Price/Day Price</th>
                                            <th>Days/Unit</th>
                                            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAmount</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $cont=0;$roomsAmount=0.0;$mealsAmount=0.0;$airBookingAmount=0.0;$invId=null; ?>
                                        @foreach($roomsBookings as $roomsBooking)
                                        <tr>
                                            <th scope="row">{{$cont=$cont+1}}</th>
                                            <td>Room No : {{$room_info->getRoomDetails($book_info->getBookingInfo($roomsBooking->booking_id)->room_id)->room_number}}<br> Duration : ( {{$book_info->getBookingInfo($roomsBooking->booking_id)->from_date}} To {{$book_info->getBookingInfo($roomsBooking->booking_id)->to_date}})</td>
                                            <?php $perAmount=($roomsBooking->total_amount)/$roomsBooking->no_of_days;?>
                                            <td>{{number_format((float)$perAmount,2,'.','')}}</td>
                                            <td>{{$roomsBooking->no_of_days}}</td>
                                            <?php $num=30-strlen(number_format((float)$roomsBooking->total_amount,2,'.',''));?>
                                            <td><?php for($i=0;$i<$num;$i++){echo"&nbsp";}?><b>{{number_format((float)$roomsBooking->total_amount,2,'.','')}}</b></td>
                                            <?php $roomsAmount=$roomsAmount+$roomsBooking->total_amount;
                                            $invId=$roomsBooking->invoice_id;
                                            ?>

                                        </tr>
                                        @endforeach

                                        <?php $discount=$checkOut->getCheckOutInfo($invId)->discount_amount;?>


                                        @foreach($orderPayments as $orderPayment)
                                        <tr>
                                            <th scope="row">{{$cont=$cont+1}}</th>
                                            <td>Meals Name : {{$meals_info->getMealsInfo($order_info->getOrderDetails($orderPayment->order_id)->meals_id)->meals_name}}<br>Order Date : {{$order_info->getOrderDetails($orderPayment->order_id)->order_date}} <br> Order Time : {{$order_info->getOrderDetails($orderPayment->order_id)->order_time}}</td>
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
                                                <td>Booking Date :{{$a_booking->getAirBookingInfo($aBookingPayment->a_booking_id)->a_booking_date}}<br> Booking Time : {{$a_booking->getAirBookingInfo($aBookingPayment->a_booking_id)->a_booking_time}} </td>
                                                <td>{{number_format((float)$aBookingPayment->amount,2,'.','')}}</td>
                                                <td>1</td>
                                                <?php $num=30-strlen(number_format((float)$aBookingPayment->amount,2,'.',''));?>
                                                <td><?php for($i=0;$i<$num;$i++){echo"&nbsp";}?><b>{{number_format((float)$aBookingPayment->amount,2,'.','')}}</b></td>
                                                <?php $airBookingAmount=$airBookingAmount+$aBookingPayment->amount;?>


                                            </tr>
                                        @endforeach

                                        </tbody>



                                    </table>











                                    <table class="table table-bordered mb-0">
                                        <thead>
                                        <tr style="font-size: 16px">
                                            <th>#</th>
                                            <th>Total amount for rooms booking<?php $num=40-strlen(number_format((float)$roomsAmount,2,'.',''));?></th>

                                            <th>
                                            <?php for($i=0;$i<$num;$i++){echo"&nbsp&nbsp";}?>
                                            {{number_format((float)$roomsAmount,2,'.','')}}</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                         <thead>
                                            <tr style="font-size: 16px">
                                                <th>#</th>
                                                <th>Total amounts for meals order<?php $num=40-strlen(number_format((float)$mealsAmount,2,'.',''));?></th>
                                                <th>
                                                <?php for($i=0;$i<$num;$i++){echo"&nbsp&nbsp";}?>
                                                {{number_format((float)$mealsAmount,2,'.','')}}</th>

                                            </tr>
                                        </thead>

                                        </tbody>
                                        <tbody>
                                             <thead>
                                                <tr style="font-size: 16px">
                                                    <th>#</th>
                                                    <th>Total amount for AirPort(Pick Up/Drop)<?php $num=40-strlen(number_format((float)$airBookingAmount,2,'.',''));?>  </th>
                                                    <th>
                                                    <?php for($i=0;$i<$num;$i++){echo"&nbsp&nbsp";}?>
                                                    {{number_format((float)$airBookingAmount,2,'.','')}}</th>

                                                </tr>
                                            </thead>

                                        </tbody>
                                        <tbody>
                                             <thead>
                                                <tr style="font-size: 16px">

                                                    <th>#</th>
                                                    <th>Total Discount <?php $num=40-strlen(number_format((float)$discount,2,'.',''));?> </th>
                                                    <th>
                                                    <?php for($i=0;$i<$num;$i++){echo"&nbsp&nbsp";}?>
                                                    {{number_format((float)$discount,2,'.','')}}</th>

                                                </tr>
                                            </thead>

                                        </tbody>

                                        <tbody>
                                             <thead>
                                                <tr style="font-size: 16px">
                                                <?php $amountForPay=($roomsAmount+$airBookingAmount+$mealsAmount)-$discount;?>
                                                    <th>#</th>
                                                    <th>Amount for payment <?php $num=40-strlen(number_format((float)$amountForPay,2,'.',''));?> </th>
                                                    <th>
                                                    <?php for($i=0;$i<$num;$i++){echo"&nbsp&nbsp";}?>
                                                    {{number_format((float)$amountForPay,2,'.','')}}</th>

                                                </tr>
                                            </thead>

                                        </tbody>
                                        <?php $paidAmount=0.0;?>

                                        @if(count($paymentHstys)!=0)

                                        @foreach($paymentHstys as $paymentHsty)
                                        	<thead>
                                        		<tr style="font-size: 16px">
                                        			<th>#</th>
                                        			<?php $paidAmount=$paidAmount+$paymentHsty->paid_amount;?>
                                        			<th>Payment Date : {{$paymentHsty->add_date}} <br> Payment Type : @if($paymentHsty->payment_type==0) Cash @else Card @endif

                                        			<?php $num=40-strlen(number_format((float)$paymentHsty->paid_amount,2,'.',''));?></th>

                                        			<th>
                                        			<?php for($i=0;$i<$num;$i++){echo"&nbsp&nbsp";}?>
                                        			{{number_format((float)$paymentHsty->paid_amount,2,'.','')}}</th>

                                        		</tr>
                                        	</thead>
                                        @endforeach
                                        <thead>
                                        	<tr style="font-size: 16px">
                                        		<th>#</th>
                                        		<th>Total Paid Amount</th>
                                        		<?php $num=40-strlen(number_format((float)$paidAmount,2,'.',''));?>
                                        		<th><?php for($i=0;$i<$num;$i++){echo"&nbsp&nbsp";}?>
                                        													{{number_format((float)$paidAmount,2,'.','')}}</th>
                                        	</tr>
                                        </thead>
                                        @else
                                        	<thead>
                                        		<tr style="font-size: 16px">
                                        			<th>#</th>
                                        			<th>Total Paid Amount</th>
                                        			<?php $num=40-strlen(number_format((float)$paidAmount,2,'.',''));?>
                                        			<th><?php for($i=0;$i<$num;$i++){echo"&nbsp&nbsp";}?>
                                        														{{number_format((float)$paidAmount,2,'.','')}}</th>
                                        		</tr>
                                        	</thead>
                                        @endif

                                        <thead>
                                        	<tr style="font-size: 16px">
                                        	<?php $outAmount=($roomsAmount+$airBookingAmount+$mealsAmount-$discount)-$paidAmount;?>
                                        		<th>#</th>
                                        		<th>Outstanding Amount</th>
                                        		<?php $num=40-strlen(number_format((float)$outAmount,2,'.',''));?>
                                        		<th><?php for($i=0;$i<$num;$i++){echo"&nbsp&nbsp";}?>
                                        													{{number_format((float)$outAmount,2,'.','')}}</th>
                                        	</tr>
                                        </thead>

                                    </table>
                                </div>
                                <div class="modal-footer">
                                    {{--<button type="button" class="btn btn-link">Save changes</button>--}}
                                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                 </div>

                 <form>
                 	<input type="hidden" name="in_user_id" id="in_user_id" value="{{session('user_id')}}" />
                 </form>


                <footer class="footer hidden-xs-down">
                	<p>© Developing team of hotel reservation. All rights reserved.</p>

                	<ul class="nav footer__nav">


                		<a class="nav-link" href="{{route('rec_available_rooms_index')}}">Check Rooms Availability</a>

                		<a class="nav-link" href="{{route('res_index_booking_list')}}">Booking List</a>

                		<a class="nav-link" href="{{route('res_index_order_meals')}}">Order Meals</a>

                		<a class="nav-link" href="{{route('res_index_order_list')}}">Order List</a>

                		<a class="nav-link" href="{{route('res_index_airport_booking')}}">Make Pickup or Drop</a>

                		<a class="nav-link" href="{{route('res_index_check_out_payment')}}">Payment Check Out</a>

                		<a class="nav-link" href="{{route('res_index_add_customer')}}">Add New Customer</a>

                		<a class="nav-link" href="{{route('res_cus_list')}}">Customer List</a>

                		<a class="nav-link" href="{{route('logout')}}">Logout</a>
                		{{--<p id="out_put"></p>--}}
                	</ul>
                </footer>
            </section>
        </main>


            <![endif]-->

        <!-- Javascript -->
        <script src="{{ asset('form_validations/admin_form_validations.js') }}"></script>
        <!-- Vendors -->
        <script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/popper.js/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js') }}"></script>

        <script src="{{ asset('vendors/bower_components/jquery-mask-plugin/dist/jquery.mask.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/dropzone/dist/min/dropzone.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/moment/min/moment.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/flatpickr/dist/flatpickr.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/nouislider/distribute/nouislider.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/trumbowyg/dist/trumbowyg.min.js') }}"></script>




        <!-- App functions and actions -->
        <script src="{{ asset('js/app.min.js') }}"></script>
        <script src="{{ asset('js/page_notifications.js') }}"></script>
        <script>
            function setBalanceAmount()
            {
              // document.getElementById("balance_amount").value="0.00"
               var payAmount=document.getElementById("pay_amount").value;
               var outAmount=document.getElementById("out_stand_am").value;
               var bAm=payAmount-outAmount;
               if(bAm<0){
               document.getElementById("balance_amount").value="0.00";
               document.getElementById("bal_amount").value="0.00";
               }
               else{
               document.getElementById("balance_amount").value=(payAmount-outAmount).toFixed(2);
               document.getElementById("bal_amount").value=(payAmount-outAmount).toFixed(2);
               }

            }
        </script>
        <script>
            function setPaymentType(){
                $type=document.getElementById("book_type").value;
                if($type==0){
                   document.getElementById('di1').style.display="none";
                   document.getElementById('di2').style.display="none";
                   document.getElementById('di3').style.display="none";
                   document.getElementById('di4').style.display="none";
                   var x=document.getElementById('di5');
                   if (x.style.display === "none")
                           x.style.display = "block";


                }
                else{
                     document.getElementById('di1').style.display="block";
                     document.getElementById('di2').style.display="block";
                     document.getElementById('di3').style.display="block";
                     document.getElementById('di4').style.display="block";
                     var y=document.getElementById('di5');
                     if (y.style.display === "block")
                            y.style.display = "none";

                }



            }
        </script>


    </body>
</html>