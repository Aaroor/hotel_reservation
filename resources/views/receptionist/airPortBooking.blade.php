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
                          <li class="@@cssanimationsactive"><a href="{{route('rec_available_rooms_index')}}">Availability List</a></li>
                          <li class="@@cssanimationsactive"><a href="{{route('res_index_booking_list')}}">Booking List</a></li>
                          <li class="@@colorsactive"><a href="{{route('res_index_check_booking_list')}}">Check Out Bookings</a></li>
                         </ul>
                        </li>
                        <li class="navigation__sub @@uiactive">
                         <a href=""><i class="zmdi zmdi-cutlery zmdi-hc-fw"></i> Meals Order</a>


                         <ul>
                          <li class="@@colorsactive"><a href="{{route('res_index_order_meals')}}">Choose Meals</a></li>
                          <li class="@@cssanimationsactive"><a href="{{route('res_index_order_list')}}">Order List</a></li>
                          <li class="@@colorsactive"><a href="{{route('res_index_check_order_list')}}">Check Out Orders</a></li>

                         </ul>
                        </li>
                        <li class="navigation__sub navigation__sub--active navigation__sub--toggled">
                             <a href=""><i class="zmdi zmdi-car-taxi zmdi-hc-fw"></i> Airport Booking</a>
                             <ul>
                              <li class="navigation__active"><a href="{{route('res_index_airport_booking')}}">Make Booking</a></li>
                              <li class="@@cssanimationsactive"><a href="{{route('res_index_airport_booking_list')}}">Booking List</a></li>
                              <li class="@@colorsactive"><a href="{{route('res_index_check_airport_booking_list')}}">Check Out Air Bookings</a></li>
                             </ul>
                        </li>
                        <li class="navigation__sub @@uiactive">
                        	<a href=""><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> Payment</a>

                        	<ul>
                        		<li class="@@colorsactive"><a href="{{route('res_index_check_out_payment')}}">Payment Check Out</a></li>
                        		<li class="@@colorsactive"><a href="{{route('res_index_paid_payment')}}">Paid Payments</a></li>
                        		<li class="@@colorsactive"><a href="{{route('res_check_out_info')}}">Final Check Outs</a></li>
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
                            <h3 class="card-title" style="text-align: center"><u>Airport Booking</u></h3>
                            @inject('cal', 'App\Http\Controllers\SuperAdminController')
                            {{--<h6 class="card-subtitle">Easily extend form controls by adding text, buttons, or button groups on either side of textual <code>&#x3C;input&#x3E;</code>s.</h6>--}}
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
                            @if(count($bookingInfos)!=0)

                            {{Form::open(['action'=>'ReceptionistController@resAddBookingIdA','class'=>'form-horizontal form-label-left input_mask','name'=>'edit_res_form', 'method'=>'POST','role'=>'form','onsubmit'=>'return editResFormValidation()'])}}
                                <div class="row">
                                @inject('cus_details', 'App\Http\Controllers\SuperAdminController')
                                @inject('room_details', 'App\Http\Controllers\SuperAdminController')
                                    <div class="col-sm-1"></div>

                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label style="font-size: 16px">Select Booking</label>

                                            <select name="booking_id" class="select2" onchange="myFunction()">
                                            @foreach($bookingInfos as $bookingInfo)
                                                @if(strcmp($bookingInfo->booking_id,session('a_booking_id'))==0)
                                                <option  value="{{$bookingInfo->booking_id}}" selected>Name : {{$cus_details->getCustomer($bookingInfo->customer_id)->cus_first_name}} {{$cus_details->getCustomer($bookingInfo->customer_id)->cus_last_name}} &nbsp Room No :  {{$room_details->getRoomDetails($bookingInfo->room_id)->room_number}} &nbsp Floor : {{$room_details->getRoomDetails($bookingInfo->room_id)->floor_number}}  &nbsp Duration : {{$bookingInfo->from_date}} To {{$bookingInfo->to_date}}</option>
                                                @else
                                                <option  value="{{$bookingInfo->booking_id}}">Name : {{$cus_details->getCustomer($bookingInfo->customer_id)->cus_first_name}} {{$cus_details->getCustomer($bookingInfo->customer_id)->cus_last_name}} &nbsp Room No :  {{$room_details->getRoomDetails($bookingInfo->room_id)->room_number}} &nbsp Floor : {{$room_details->getRoomDetails($bookingInfo->room_id)->floor_number}}  &nbsp Duration : {{$bookingInfo->from_date}} To {{$bookingInfo->to_date}}</option>
                                                @endif
                                            @endforeach
                                            </select>
                                        </div>

                                    </div>



                                    <div class="col-sm-3">
                                    <label></label>
                                        <div class="input-group">
                                            <div class="form-group">
                                                <button id="btn_search" class="btn btn-light btn--icon-text"><i class="zmdi zmdi-search"></i> Search</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                             {{Form::close()}}
                             @else
                             <a href="{{route('rec_available_rooms_index')}}" class="btn btn-light btn--icon-text"><i class="zmdi zmdi-hotel"></i>Add Booking</a>
                             <br><br>
                             @endif


                            <br>
                            {{Form::open(['action'=>'ReceptionistController@resAirPortBookingP','class'=>'form-horizontal form-label-left input_mask','name'=>'air_booking_form', 'method'=>'POST','role'=>'form','onsubmit'=>'return airportBookingFormValidation()'])}}

                            <div class="row">



                                <div class="col-sm-1">
                                </div>
                                <div class="col-sm-5">
                                    {{--<div class="input-group">--}}
                                        {{--<span class="input-group-addon">*</span>--}}
                                        <input type="hidden" name="room_id" value=""/>

                                            <div class="form-group">
                                                <label style="font-size: 16px">Booking Type</label>
                                                <select id="book_type" name="booking_type" class="select2" data-minimum-results-for-search="Infinity" onchange="placeSet()">
                                                    <option style="font-size: 16px" value="0">Pick Up</option>
                                                    <option style="font-size: 16px" value="1">Drop</option>
                                                </select>
                                            </div>

                                    {{--</div>--}}
                                    <div id="msg_user_name">

                                    </div>

                                    <br>

                                </div>

                                <div class="col-sm-5">
                                    {{--<div class="input-group">--}}
                                        {{--<span class="input-group-addon">*</span>--}}
                                        <div class="form-group">
                                            <label style="font-size: 16px">Number of passengers </label>
                                            <input style="font-size: 16px" name="no_of_passengers" type="number" class="form-control" value="1" min="1">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    {{--</div>--}}
                                    <div id="msg_login_name">

                                    </div>

                                    <br>

                                </div>
                                <div class="col-sm-1">
                                </div>

                                <div class="col-sm-1">
                                </div>

                                <div class="col-sm-5">
                                    {{--<div class="input-group">--}}
                                        {{--<span class="input-group-addon">*</span>--}}
                                        <div class="form-group">
                                            <label style="font-size: 16px">From</label>
                                            <input style="font-size: 16px" id="from_p" name="from_place" type="text" class="form-control" value="Bandaranaike International Airport">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    {{--</div>--}}
                                    <div id="msg_user_mail">

                                    </div>

                                    <br>

                                </div>

                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label style="font-size: 16px">To</label>
                                        <input style="font-size: 16px" id="to_p" name="to_place" type="text" class="form-control" value="Hotel Nelly Marine">
                                        <i class="form-group__bar"></i>
                                    </div>

                                    <br>
                                    <div id="msg_user_phone">

                                    </div>

                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-5">
                                    <label style="font-size: 16px">Date(Pick Up/Drop)</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                        <div class="form-group">
                                            <input  type="text" name="booking_date" class="form-control date-picker" placeholder="Pick Date" required>
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-5">
                                    <label style="font-size: 16px">Booking Time</label>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                        <div class="form-group">
                                            <input type="text" name="booking_time" class="form-control time-picker" placeholder="Pick a time" required>
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-1"></div>


                                <div class="col-sm-1"></div>
                                <div class="col-sm-5">
                                <br>
                                <div class="form-group">
                                    <label style="font-size: 16px">Booking Amount ( Rs )</label>
                                    <input style="font-size: 16px" name="a_amount" type="number" min="1" step="any" class="form-control" placeholder="000.00" required>

                                    <i class="form-group__bar"></i>
                                </div>
                                </div>

                                <div class="col-sm-5"></div>
                                <div class="col-sm-1"></div>

                                <div class="col-sm-1"></div>
                                <div class="col-sm-5">
                                @if(count($bookingInfos)!=0)
                                    <button style="font-size: 16px" type="submit" class="btn btn-dark btn--icon-text"><i class="zmdi zmdi-save"></i> Add Booking</button>
                                @else
                                    <button style="font-size: 16px" type="submit" class="btn btn-dark btn--icon-text" disabled><i class="zmdi zmdi-save"></i> Add Booking</button>
                                @endif
                                    <a style="font-size: 16px" href="{{route('res_index_airport_booking_list')}}" class="btn btn-dark btn--icon-text"><i class="zmdi zmdi-accounts-list"></i> Booking List</a>


                                </div>
                                <div class="col-sm-5"></div>
                                <div class="col-sm-1"></div>
                            </div>
                            {{Form::close()}}

                            <br>

                        </div>
                    </div>
                </div>
                <form>
                	<input type="hidden" name="in_user_id" id="in_user_id" value="{{session('user_id')}}" />
                </form>



                <footer class="footer hidden-xs-down">
                	<p>© Developing team of hotel reservation. All rights reserved.</p>

                	<ul class="nav footer__nav">
                		{{--<a class="nav-link" href="{{route('receptionist_home')}}">Home</a>--}}

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
        <script src="{{ asset('form_validations/res_form_validations.js') }}"></script>
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
        <script src="{{ asset('vendors/bower_components/flatpickr/dist/flatpickr1.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/nouislider/distribute/nouislider.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/trumbowyg/dist/trumbowyg.min.js') }}"></script>




        <!-- App functions and actions -->
        <script src="{{ asset('js/app.min.js') }}"></script>
        <script src="{{ asset('js/page_notifications.js') }}"></script>

         <script>
                    function myFunction(){
                       document.getElementById("btn_search").click();
                    }

                    function placeSet()
                    {
                       $val=document.getElementById("book_type").value;
                        if($val==0){
                        document.getElementById("from_p").value="Bandaranaike International Airport";
                        document.getElementById("to_p").value='Hotel Nelly Marine';
                        }
                        else{
                        document.getElementById("to_p").value="Bandaranaike International Airport";
                        document.getElementById("from_p").value='Hotel Nelly Marine';
                        }
                    }
         </script>



    </body>
</html>