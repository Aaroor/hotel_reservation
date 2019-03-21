<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <!-- Vendor styles -->
        <link rel="stylesheet" href="{{ asset('vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/bower_components/animate.css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css') }}">


                <link rel="stylesheet" href="{{ asset('vendors/bower_components/sweetalert2/dist/sweetalert2.min.css') }}">

                <!-- App styles -->
                <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">

                <!-- Demo only -->
                <link rel="stylesheet" href="{{ asset('demo/css/demo.css') }}">
                <script src="{{ asset('print/jquery.min.js')}}"></script>
                <script src="{{ asset('print/jquery.printPage.js')}}"></script>

                <link rel="shortcut icon" type="image/png" href="{{ asset('demo/img/fac_hot.ico')}}">


        <!-- App styles -->
        {{--<link rel="stylesheet" href="{{ asset('css/app.min.css') }}">--}}
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
                    	<li class="@@colorsactive"><a href="{{route('manager_home')}}"><i class="zmdi zmdi-home"></i> Home</a></li>


                    	 <!-- <li class="navigation__sub @@uiactive">
                    		<a href=""><i class="zmdi zmdi-hotel zmdi-hc-fw"></i> Rooms Booking</a>

                    		<ul>
                    			<li class="@@colorsactive"><a href="{{route('man_check_map')}}">Availability Map</a></li>
                                <li class="@@colorsactive"><a href="{{route('man_check_map_bulk')}}">Bulk Booking</a></li>
                                <li class="@@colorsactive"><a href="{{route('man_available_rooms_index')}}">Availability List</a></li>
                                <li class="@@colorsactive"><a href="{{route('man_index_booking_list')}}">Booking List</a></li>
                                <li class="@@colorsactive"><a href="{{route('man_index_check_booking_list')}}">Check Out Bookings</a></li>

                    		</ul>
                    	</li> -->
                    	<!-- <li class="navigation__sub @@uiactive">
                    		<a href=""><i class="zmdi zmdi-cutlery zmdi-hc-fw"></i> Meals Order</a>

                    		<ul>
                    			<li class="@@colorsactive"><a href="{{route('man_index_order_meals')}}">Choose Meals</a></li>
                    			<li class="@@cssanimationsactive"><a href="{{route('man_index_order_list')}}">Order List</a></li>
                    			<li class="@@colorsactive"><a href="{{route('man_index_check_order_list')}}">Check Out Orders</a></li>

                    		</ul>
                    	</li> -->
                    	<!-- <li class="navigation__sub @@uiactive">
                    		 <a href=""><i class="zmdi zmdi-car-taxi zmdi-hc-fw"></i> Airport Booking</a>


                    		 <ul>
                    		  <li class="@@colorsactive"><a href="{{route('man_index_airport_booking')}}">Make Booking</a></li>
                    		  <li class="@@colorsactive"><a href="{{route('man_index_airport_booking_list')}}">Booking List</a></li>
                    		  <li class="@@colorsactive"><a href="{{route('man_index_check_airport_booking_list')}}">Check Out Air Bookings</a></li>



                    		 </ul>
                    	</li> -->
                    	<!-- <li class="navigation__sub @@uiactive">
                    		<a href=""><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> Payment</a>

                    		<ul>
                    			<li class="@@colorsactive"><a href="{{route('man_index_check_out_payment')}}">Payment Check Out</a></li>
                    			<li class="@@colorsactive"><a href="{{route('man_index_paid_payment')}}">Paid Payments</a></li>
                    			<li class="@@colorsactive"><a href="{{route('man_check_out_info')}}">Final Check Outs</a></li>
                    		</ul>
                    	</li> -->
                    	<!-- <li class="navigation__sub @@uiactive">
                    		<a href=""><i class="zmdi zmdi-time-restore zmdi-hc-fw"></i>Previous Histories</a>

                    		<ul>
                    			<li class="@@colorsactive"><a href="{{route('man_cus_booking_history')}}">Customer Histories</a></li>
                    		</ul>
                    	</li> -->
                    	<li class="navigation__sub--active">
                    	   <a href="{{route('man_meals_order_app')}}"><i class="zmdi zmdi-check-all zmdi-hc-fw"></i> Approval List</a>

                    	 </li>


                    	<li class="navigation__sub @@uiactive">
                    		<a href=""><i class="zmdi zmdi-accounts-list-alt zmdi-hc-fw"></i> Customers</a>


                    		<ul>
                    		   <li class="@@colorsactive"><a href="{{route('man_index_add_customer')}}">Add Customer</a></li>
                    		   <li class="@@colorsactive"><a href="{{route('man_cus_list')}}">Customer List</a></li>
                    	   </ul>
                    	</li>

                    	<!-- <li class="navigation__sub @@uiactive">
                    	  <a href=""><i class="zmdi zmdi-accounts-alt"></i> Receptionist</a>

                    	  <ul>
                    		  <li class="@@colorsactive"><a href="{{route('add_receptionist')}}">Add Receptionist</a></li>
                    		  <li class="@@colorsactive"><a href="{{route('receptionist_list')}}">Receptionist List</a></li>

                    	  </ul>

                    	</li> -->

                    	<li class="navigation__sub @@uiactive">
                    		<a href=""><i class="zmdi zmdi-airline-seat-flat zmdi-hc-fw"></i> Rooms Management</a>


                    		<ul>
                    		   <li class="@@colorsactive"><a href="{{route('man_index_add_room')}}">Add Room</a></li>
                    		   <li class="@@colorsactive"><a href="{{route('man_room_list')}}">Room List</a></li>
                    	   </ul>
                    	</li>

                    	<li class="navigation__sub @@uiactive">
                    		<a href=""><i class="zmdi zmdi-star-circle zmdi-hc-fw"></i> Meals Management</a>


                    		<ul>
                    		   <li class="@@colorsactive"><a href="{{route('man_add_meals')}}">Add Meals</a></li>
                    		   <li class="@@colorsactive"><a href="{{route('man_meals_list')}}">Meals List</a></li>

                    	   </ul>
                    	</li>

                    	<!-- <li class="navigation__sub @@uiactive">
                    		<a href=""><i class="zmdi zmdi-tv-list zmdi-hc-fw"></i> Reports</a>


                    		<ul>
                    		   <li class="@@colorsactive"><a href="{{route('man_day_summary')}}">Booking Summary</a></li>
                               <li class="@@colorsactive"><a href="{{route('man_rep_check_out')}}">Check Out Reports</a></li>
                    	   </ul>
                    	</li> -->



                    	<li class="@@colorsactive">
                    		<a href="{{route('logout')}}"><i class="zmdi zmdi-lock"></i> Log Out</a>
                    	</li>


                    </ul>
                </div>
            </aside>

            <section class="content">
                <header class="content__title">
                    <h1>Permission List</h1>


                    <div class="actions">

                    </div>
                </header>
                
                <div class="card">
                    <div class="card-body">
                    <br><br>
                        @if($msg==1)
                            <div class="alert alert-success alert-dismissible fade show" style="font-size: 16px">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>For {{$cmt}} </strong><br> Successfully gave a permission to edit
                            </div>
                        @elseif($msg==2)
                            <div class="alert alert-success alert-dismissible fade show" style="font-size: 16px">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>For {{$cmt}}</strong><br> Successfully gave a permission to remove
                            </div>
                        @elseif($msg==3)
                            <div class="alert alert-success alert-dismissible fade show" style="font-size: 16px">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>For {{$cmt}}</strong><br> Successfully gave a permission to print bill
                            </div>
                        @elseif($msg==4)
                            <div class="alert alert-success alert-dismissible fade show" style="font-size: 16px">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>For {{$cmt}}</strong><br> Successfully gave a permission to cancel a room booking
                            </div>
                        @elseif($msg==5)
                            <div class="alert alert-success alert-dismissible fade show" style="font-size: 16px">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>For {{$cmt}}</strong><br> Successfully gave a permission to modify a room booking
                            </div>
                        @elseif($msg==6)
                            <div class="alert alert-success alert-dismissible fade show" style="font-size: 16px">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>For {{$cmt}}</strong><br> Successfully gave a permission to modify a airport booking
                            </div>
                        @elseif($msg==7)
                            <div class="alert alert-success alert-dismissible fade show" style="font-size: 16px">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>For {{$cmt}}</strong><br> Successfully gave a permission to remove a airport booking
                            </div>
                        @elseif($msg==8)
                            <div class="alert alert-success alert-dismissible fade show" style="font-size: 16px">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>For {{$cmt}}</strong><br> Successfully gave a permission to remove payment history
                            </div>
                        @elseif($msg==9)
                            <div class="alert alert-danger alert-dismissible fade show" style="font-size: 16px">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Permission denied for this approval request</strong>
                            </div>
                        @endif
                        {{--<h4 class="card-title">Basic example</h4>--}}
                        {{--<h6 class="card-subtitle">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table.</h6>--}}

                        <div class="table-responsive">
                         @inject('meals_details', 'App\Http\Controllers\SuperAdminController')
                         @inject('booking_details', 'App\Http\Controllers\SuperAdminController')
                         @inject('room_details', 'App\Http\Controllers\SuperAdminController')
                         @inject('cus_details', 'App\Http\Controllers\SuperAdminController')
                         @inject('time_conversion', 'App\Http\Controllers\SuperAdminController')
                         @inject('booking_type', 'App\Http\Controllers\SuperAdminController')
                         @inject('cus_id', 'App\Http\Controllers\ReceptionistController')
                         @inject('cus_info', 'App\Http\Controllers\SuperAdminController')
                         @inject('con_date_time', 'App\Http\Controllers\ReceptionistController')


                            <table id="data-table" class="table">
                                <thead>
                                    <tr style="font-size: 16px;font-weight: bold">
                                        <th><i>Invoice No</i></th>
                                        <th><i>Approval Type</i></th>
                                        <th><i>Request Date</i></th>
                                        <th><i>Reason</i></th>
                                        <th><i>Permission</i></th>


                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($appInfos)!=0)
                                 @foreach($appInfos as $appInfo)
                                	<tr style="font-size: 16px">
                                	    <td>{{$appInfo->invoice_id}}</td>
                                		<td>{{$appInfo->type_desc}}</td>
                                		<td>{{$appInfo->add_date}}</td>
                                		<td><button class="btn btn-light" data-toggle="modal" data-target="#modal-default{{$appInfo->app_id}}"><i style="font-size: 18px" class="zmdi zmdi-info-outline"></i> </button></td>
                                		<td>
                                		@if($appInfo->is_remove==0)
                                            @if($appInfo->data_type==1)
                                                <a href="{{route('man_order_edit_app_r', ['id'=>$appInfo->app_id])}}" class="btn btn-light" href=""><i style="font-size: 18px" class="zmdi zmdi-check"></i></a>&nbsp
                                            @elseif($appInfo->data_type==0)
                                                <a href="{{route('man_order_remove_app_r', ['id'=>$appInfo->app_id])}}" class="btn btn-light" href=""><i style="font-size: 18px" class="zmdi zmdi-check"></i></a>&nbsp
                                            @elseif($appInfo->data_type==2)
                                                <a href="{{route('man_bill_print_app_r', ['id'=>$appInfo->app_id])}}" class="btn btn-light" href=""><i style="font-size: 18px" class="zmdi zmdi-check"></i></a>&nbsp
                                            @elseif($appInfo->data_type==3)
                                                <a href="{{route('man_book_cancel_app_r', ['id'=>$appInfo->app_id])}}" class="btn btn-light" href=""><i style="font-size: 18px" class="zmdi zmdi-check"></i></a>&nbsp
                                            @elseif($appInfo->data_type==4)
                                                <a href="{{route('man_book_edit_app_r', ['id'=>$appInfo->app_id])}}" class="btn btn-light" href=""><i style="font-size: 18px" class="zmdi zmdi-check"></i></a>&nbsp
                                            @elseif($appInfo->data_type==5)
                                                <a href="{{route('man_air_book_edit_app_r', ['id'=>$appInfo->app_id])}}" class="btn btn-light" href=""><i style="font-size: 18px" class="zmdi zmdi-check"></i></a>&nbsp
                                            @elseif($appInfo->data_type==6)
                                                <a href="{{route('man_air_book_remove_app_r', ['id'=>$appInfo->app_id])}}" class="btn btn-light" href=""><i style="font-size: 18px" class="zmdi zmdi-check"></i></a>&nbsp
                                            @elseif($appInfo->data_type==7)
                                                <a href="{{route('man_pay_remove_app_r', ['id'=>$appInfo->app_id])}}" class="btn btn-light" href=""><i style="font-size: 18px" class="zmdi zmdi-check"></i></a>&nbsp

                                            @endif
                                        @else
                                            <a href="#" class="btn btn-light" href=""><i style="font-size: 18px" class="zmdi zmdi-info-outline"></i></a>&nbsp
                                        @endif
                                		<a href="{{route('man_remove_approvals', ['id'=>$appInfo->app_id])}}" class="btn btn-light" href=""><i style="font-size: 18px" class="zmdi zmdi-close"></i></a>
                                		</td>

                                	</tr>
                                 @endforeach
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>




              @if(count($appInfos)!=0)

                 @foreach($appInfos as $appInfo)

                 <div class="modal fade" id="modal-default{{$appInfo->app_id}}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title pull-left">Reason for the approval</h5>
                            </div>
                            <div class="modal-body" style="font-size: 16px">
                                <div class="stats__chart" style="text-align: center">
                                    <i class="zmdi zmdi-info-outline zmdi-hc-5x"></i>

                                </div>
                                {{$appInfo->app_reason}}
                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

               @endforeach

           @endif



                <form>
                	<input type="hidden" name="in_user_id" id="in_user_id" value="{{session('user_id')}}" />
                </form>


                <footer class="footer hidden-xs-down">
                    <p>© Developing team of hotel reservation. All rights reserved.</p>

                    <ul class="nav footer__nav">

                        <a class="nav-link" href="{{route('man_available_rooms_index')}}">Check Rooms Availability</a>

                        <a class="nav-link" href="{{route('man_index_booking_list')}}">Booking List</a>

                        <a class="nav-link" href="{{route('man_index_order_meals')}}">Order Meals</a>

                        <a class="nav-link" href="{{route('man_index_order_list')}}">Order List</a>

                        <a class="nav-link" href="{{route('man_index_airport_booking')}}">Make Pickup or Drop</a>

                        <a class="nav-link" href="{{route('man_index_check_out_payment')}}">Payment Check Out</a>

                        <a class="nav-link" href="{{route('man_index_add_customer')}}">Add New Customer</a>

                        <a class="nav-link" href="{{route('man_cus_list')}}">Customer List</a>

                        <a class="nav-link" href="{{route('logout')}}">Logout</a>

                    </ul>
                </footer>
            </section>
        </main>

        <!-- Older IE warning message -->
            <!--[if IE]>
                <div class="ie-warning">
                    <h1>Warning!!</h1>
                    <p>You are using an outdated version of Internet Explorer, please upgrade to any of the following web browsers to access this website.</p>

                    <div class="ie-warning__downloads">
                        <a href="http://www.google.com/chrome">
                            <img src="img/browsers/chrome.png" alt="">
                        </a>

                        <a href="https://www.mozilla.org/en-US/firefox/new">
                            <img src="img/browsers/firefox.png" alt="">
                        </a>

                        <a href="http://www.opera.com">
                            <img src="img/browsers/opera.png" alt="">
                        </a>

                        <a href="https://support.apple.com/downloads/safari">
                            <img src="img/browsers/safari.png" alt="">
                        </a>

                        <a href="https://www.microsoft.com/en-us/windows/microsoft-edge">
                            <img src="img/browsers/edge.png" alt="">
                        </a>

                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="img/browsers/ie.png" alt="">
                        </a>
                    </div>
                    <p>Sorry for the inconvenience!</p>
                </div>
            <![endif]-->

        <!-- Javascript -->
        <!-- Vendors -->

        {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
        <script src="{{ asset('vendors/bower_components/popper.js/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js') }}"></script>

        <script src="{{ asset('vendors/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/jszip/dist/jszip.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>




        <script src="{{ asset('vendors/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/sweetalert2/dist/sweetalert2.min.js') }}"></script>


        <!-- App functions and actions -->
        <script src="{{ asset('js/app.min.js') }}"></script>

         <!-- Demo only -->
        <script src="{{ asset('demo/js/demo.js') }}"></script>

        <script>

          $(document).ready(function() {
            $(".btn-success").printPage();
          });

         </script>




        <script src="{{ asset('js/page_notifications_man.js') }}"></script>



    </body>
</html>