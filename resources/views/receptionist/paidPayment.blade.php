<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <!-- Vendor styles -->
        <link rel="stylesheet" href="{{ asset('vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/bower_components/animate.css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/bower_components/flatpickr/dist/flatpickr.min.css') }}" />


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
                               <li class="navigation__active"><a href="{{route('res_index_paid_payment')}}">Paid Payments</a></li>
                               <li class="@@colorsactive"><a href="{{route('res_check_out_info')}}">Check Outs</a></li>

                           </ul>
                       </li>
                       <li class="navigation__sub @@uiactive">
                        <a href=""><i class="zmdi zmdi-tv-list zmdi-hc-fw"></i> Reports</a>
                        <ul>
                           <li class="@@colorsactive"><a href="{{route('res_rep_check_out')}}">Check Out Invoices</a></li>
                           <li class="@@colorsactive"><a href="{{route('res_rep_check_rooms')}}">Check Out Rooms</a></li>
                           <li class="@@colorsactive"><a href="{{route('res_rep_current_booking')}}">Current Booking</a></li>
                           <li class="@@colorsactive"><a href="{{route('res_index_paid_payment_report')}}">Paid Booking</a></li>
                           
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
                <header class="content__title">
                    <a href="{{route('res_index_paid_payment')}}" class="btn btn-light btn--icon-text"><i class="zmdi zmdi-search"></i>All Search</a>



                </header>
                
                <div class="card">
                    <div class="card-body">
                    <br><br>
                        @if($msg==1)
                            <div class="alert alert-success alert-dismissible fade show" style="font-size: 16px">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Successfully paid your amount </strong><br> Ready your bill to print
                            </div>
                        @elseif($msg==2)
                            <div class="alert alert-success alert-dismissible fade show" style="font-size: 16px">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{{$cmt}}</strong><br> Successfully sent a request to manager approval
                            </div>
                        @endif


                        <label class="custom-control custom-radio">
                        @if($msg==4)
                            <input type="radio" value="1" name="radio-inline" onchange="setSearchType(this)" class="custom-control-input" checked>
                        @elseif($msg==5)
                            <input type="radio" value="1" name="radio-inline" onchange="setSearchType(this)" class="custom-control-input">
                        @else
                            <input type="radio" value="1" name="radio-inline" onchange="setSearchType(this)" class="custom-control-input" checked>
                        @endif
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Date Search</span>
                        </label>

                        <label class="custom-control custom-radio">
                            @if($msg==4)
                            <input type="radio" value="2" name="radio-inline" onchange="setSearchType(this)" class="custom-control-input">
                            @elseif($msg==5)
                            <input type="radio" value="2" name="radio-inline" onchange="setSearchType(this)" class="custom-control-input" checked>
                            @else
                            <input type="radio" value="2" name="radio-inline" onchange="setSearchType(this)" class="custom-control-input">
                            @endif
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Duration Search</span>
                        </label>
                        <br><br>
                        @if($msg==5)
                        <div id="sec_date" style="display: none">
                        {{Form::open(['action'=>'ReceptionistController@recPaidSearchP','class'=>'form-horizontal form-label-left input_mask','name'=>'edit_res_form', 'method'=>'POST','role'=>'form','onsubmit'=>'return editResFormValidation()'])}}
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Select the date</label>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                        <div class="form-group">
                                        @if(session()->has('search_date_paid_from'))
                                            <input  type="text" name="from_date" class="form-control date-picker" value="{{session('search_date_paid_from')}}e">
                                        @else
                                            <input  type="text" name="from_date" class="form-control date-picker" value="Pick a date">
                                        @endif
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label></label>
                                    <div class="input-group">
                                        <div class="form-group">
                                            <button id="btn_search" class="btn btn-light btn--icon-text"><i class="zmdi zmdi-search"></i> Search</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">


                                </div>

                            </div>
                        {{Form::close()}}
                        </div>
                        @elseif($msg==4)
                        <div id="sec_date">
                            {{Form::open(['action'=>'ReceptionistController@recPaidSearchP','class'=>'form-horizontal form-label-left input_mask','name'=>'edit_res_form', 'method'=>'POST','role'=>'form','onsubmit'=>'return editResFormValidation()'])}}
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Select the date</label>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                        <div class="form-group">
                                        @if(session()->has('search_date_paid_from'))
                                            <input  type="text" name="from_date" class="form-control date-picker" value="{{session('search_date_paid_from')}}">
                                        @else
                                            <input  type="text" name="from_date" class="form-control date-picker" value="Pick a date">
                                        @endif
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label></label>
                                    <div class="input-group">
                                        <div class="form-group">
                                            <button id="btn_search" class="btn btn-light btn--icon-text"><i class="zmdi zmdi-search"></i> Search</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">


                                </div>

                            </div>
                        {{Form::close()}}
                        </div>
                        @else
                        <div id="sec_date">
                        {{Form::open(['action'=>'ReceptionistController@recPaidSearchP','class'=>'form-horizontal form-label-left input_mask','name'=>'edit_res_form', 'method'=>'POST','role'=>'form','onsubmit'=>'return editResFormValidation()'])}}
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Select the date</label>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                        <div class="form-group">
                                        @if(session()->has('search_date_paid_from'))
                                            <input  type="text" name="from_date" class="form-control date-picker" value="{{session('search_date_paid_from')}}e">
                                        @else
                                            <input  type="text" name="from_date" class="form-control date-picker" value="Pick a date">
                                        @endif
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label></label>
                                    <div class="input-group">
                                        <div class="form-group">
                                            <button id="btn_search" class="btn btn-light btn--icon-text"><i class="zmdi zmdi-search"></i> Search</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">


                                </div>

                            </div>
                        {{Form::close()}}
                        </div>
                        @endif

                        @if($msg==4)
                        <div style="display: none" id="sec_deu">
                        {{Form::open(['action'=>'ReceptionistController@recPaidDurationSearchP','class'=>'form-horizontal form-label-left input_mask','name'=>'edit_res_form', 'method'=>'POST','role'=>'form','onsubmit'=>'return editResFormValidation()'])}}
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Start Date</label>

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                    <div class="form-group">
                                    @if(session()->has('search_date_paid_from'))
                                        <input  type="text" name="from_date" class="form-control date-picker" value="{{session('search_date_paid_from')}}">
                                    @else
                                        <input  type="text" name="from_date" class="form-control date-picker" value="Pick a date">
                                    @endif
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label>End Date</label>

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                    <div class="form-group">
                                    @if(session()->has('search_date_paid_to'))
                                        <input id="dt" type="text" name="to_date" class="form-control date-picker" value="{{session('search_date_paid_to')}}">
                                    @else
                                        <input id="dt" type="text" name="to_date" class="form-control date-picker" value="Pick a date">
                                    @endif
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label></label>
                                <div class="input-group">
                                    <div class="form-group">
                                        <button id="btn_search" class="btn btn-light btn--icon-text"><i class="zmdi zmdi-search"></i> Search</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    {{Form::close()}}
                    </div>
                        @elseif($msg==5)
                        <div id="sec_deu">
                        {{Form::open(['action'=>'ReceptionistController@recPaidDurationSearchP','class'=>'form-horizontal form-label-left input_mask','name'=>'edit_res_form', 'method'=>'POST','role'=>'form','onsubmit'=>'return editResFormValidation()'])}}
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Start Date</label>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                        <div class="form-group">
                                        @if(session()->has('search_date_paid_from'))
                                            <input  type="text" name="from_date" class="form-control date-picker" value="{{session('search_date_paid_from')}}">
                                        @else
                                            <input  type="text" name="from_date" class="form-control date-picker" value="Pick a date">
                                        @endif
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label>End Date</label>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                        <div class="form-group">
                                        @if(session()->has('search_date_paid_to'))
                                            <input id="dt" type="text" name="to_date" class="form-control date-picker" value="{{session('search_date_paid_to')}}">
                                        @else
                                            <input id="dt" type="text" name="to_date" class="form-control date-picker" value="Pick a date">
                                        @endif
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label></label>
                                    <div class="input-group">
                                        <div class="form-group">
                                            <button id="btn_search" class="btn btn-light btn--icon-text"><i class="zmdi zmdi-search"></i> Search</button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        {{Form::close()}}
                        </div>
                        @else
                        <div style="display: none" id="sec_deu">
                        {{Form::open(['action'=>'ReceptionistController@recPaidDurationSearchP','class'=>'form-horizontal form-label-left input_mask','name'=>'edit_res_form', 'method'=>'POST','role'=>'form','onsubmit'=>'return editResFormValidation()'])}}
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Start Date</label>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                        <div class="form-group">
                                        @if(session()->has('search_date_paid_from'))
                                            <input  type="text" name="from_date" class="form-control date-picker" value="{{session('search_date_paid_from')}}">
                                        @else
                                            <input  type="text" name="from_date" class="form-control date-picker" value="Pick a date">
                                        @endif
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label>End Date</label>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                        <div class="form-group">
                                        @if(session()->has('search_date_paid_to'))
                                            <input id="dt" type="text" name="to_date" class="form-control date-picker" value="{{session('search_date_paid_to')}}">
                                        @else
                                            <input id="dt" type="text" name="to_date" class="form-control date-picker" value="Pick a date">
                                        @endif
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label></label>
                                    <div class="input-group">
                                        <div class="form-group">
                                            <button id="btn_search" class="btn btn-light btn--icon-text"><i class="zmdi zmdi-search"></i> Search</button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        {{Form::close()}}
                        </div>
                        @endif





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
                                        {{--<th><i>Customer Name</i></th>--}}
                                        <th><i>Customer Name</i></th>
                                        <th><i>NIC/Passport</i></th>
                                        <th><i>Booking Date</i></th>
                                        <th><i>Preview</i></th>
                                        <th><i>Outstanding</i></th>
                                        <th><i>Paid History</i></th>
                                        <th><i>Check Out</i></th>
                                        <th><i>Print</i></th>
                                        <th style="display: none"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($checkOutInfos as $checkOutInfo)
                                 <?php
                                  $out_pay1=0.0;
                                  $out_pay1=($checkOutInfo->total_amount-$checkOutInfo->discount_amount)-$checkOutInfo->paid_amount;
                                  ?>


                                	<tr style="font-size: 16px">

                                		<td>
                                		{{$cus_info->getCustomer($cus_id->getCustomerId($checkOutInfo->invoice_id))->cus_first_name}} {{$cus_info->getCustomer($cus_id->getCustomerId($checkOutInfo->invoice_id))->cus_last_name}}<br><span style="font-size: 14px">({{$checkOutInfo->invoice_id}})</span>
                                		</td>
                                		<td>{{$cus_info->getCustomer($cus_id->getCustomerId($checkOutInfo->invoice_id))->cus_nic_pass}}</td>
                                		<td>{{$con_date_time->convertDate($checkOutInfo->add_date)}}</td>
                                		<td><button class="btn btn-light" data-toggle="modal" data-target="#modal_xl{{$checkOutInfo->invoice_id}}"><i style="font-size: 18px" class="zmdi zmdi-google-pages"></i></button></td>


                                		<td>{{number_format((float)$out_pay1,2,'.','')}}</td>
                                		<td><a data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="Paid History For Invoice" href="{{route('res_payment_history_r', ['id'=>$checkOutInfo->invoice_id])}}" class="btn btn-light"><i style="font-size: 18px" class="zmdi zmdi-time-restore"></i></a></td>
                                		<td><a data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="Press for checkout invoice" href="{{route('res_add_check_out', ['id'=>$checkOutInfo->invoice_id])}}" class="btn btn-light btn--icon-text"><i style="font-size: 18px" class="zmdi zmdi-check"></i></a></td>
                                		@if($checkOutInfo->bill_lock==0)
                                		<td id="td{{$checkOutInfo->invoice_id}}"><a  href="{{route('res_print_bill', ['id'=>$checkOutInfo->invoice_id])}}" class="btn btn-success btn--icon-text" id="{{$checkOutInfo->invoice_id}}" onclick="clickEv(this.id)"><i style="font-size: 18px" class="zmdi zmdi-print"></i> Print</a></td>
                                		<td style="display: none" id="tdd{{$checkOutInfo->invoice_id}}"><button class="btn btn-light" data-toggle="modal" data-target="#modal-default_bill_print{{$checkOutInfo->payment_id}}"><i style="font-size: 18px" class="zmdi zmdi-print"></i> Print </button></td>
                                		@else
                                		<td><button class="btn btn-light" data-toggle="modal" data-target="#modal-default_bill_print{{$checkOutInfo->payment_id}}"><i style="font-size: 18px" class="zmdi zmdi-print"></i> Print</button></td>
                                		<td style="display: none"><button class="btn btn-light" data-toggle="modal" data-target="#modal-default_bill_print{{$checkOutInfo->payment_id}}"><i style="font-size: 18px" class="zmdi zmdi-print"></i> Print</button></td>
                                		@endif


                                	</tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                @foreach($checkOutInfos as $checkOutInfo)
                <div class="modal fade" id="modal_xl{{$checkOutInfo->invoice_id}}" tabindex="-1">
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

                				@inject('booking_pay', 'App\Http\Controllers\ReceptionistController')
                                @inject('order_pay', 'App\Http\Controllers\ReceptionistController')
                                @inject('air_pay', 'App\Http\Controllers\ReceptionistController')
                                @inject('hsty_pay', 'App\Http\Controllers\ReceptionistController')
                                @inject('checkOut', 'App\Http\Controllers\ReceptionistController')
                                @inject('time_conversion', 'App\Http\Controllers\SuperAdminController')

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
                					<?php $cont=0;$roomsAmount=0.0;$mealsAmount=0.0;$airBookingAmount=0.0; ?>
                					@foreach($booking_pay->getBookingPay($checkOutInfo->invoice_id) as $roomsBooking)
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


                					@foreach($order_pay->getOrderPay($checkOutInfo->invoice_id) as $orderPayment)
                					<tr>
                						<th scope="row">{{$cont=$cont+1}}</th>
                						<td>@if($meals_info->getMealsInfo($order_info->getOrderDetails($orderPayment->order_id)->meals_id)->meals_type==4)Drinks Name : @else Meals Name : @endif{{$meals_info->getMealsInfo($order_info->getOrderDetails($orderPayment->order_id)->meals_id)->meals_name}}<br>Order Date : {{$order_info->getOrderDetails($orderPayment->order_id)->order_date}} @if($order_info->getOrderDetails($orderPayment->order_id)->order_time==null)@else<br> Order Time : {{$time_conversion->timeConversion($order_info->getOrderDetails($orderPayment->order_id)->order_time)}}@endif</td>
                						<?php $perMAmount=($orderPayment->amount)/$orderPayment->quantity;?>
                						<td>{{number_format((float)$perMAmount,2,'.','')}}</td>
                						<td>{{$orderPayment->quantity}}</td>
                						<?php $num=30-strlen(number_format((float)$orderPayment->amount,2,'.',''));?>
                						<td><?php for($i=0;$i<$num;$i++){echo"&nbsp";}?><b>{{number_format((float)$orderPayment->amount,2,'.','')}}</b></td>
                						<?php $mealsAmount=$mealsAmount+$orderPayment->amount;?>


                					</tr>
                					@endforeach
                					@foreach($air_pay->getAirBookingPay($checkOutInfo->invoice_id) as $aBookingPayment)
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

                					@if(count($hsty_pay->getPayHistory($checkOutInfo->invoice_id))!=0)

                					@foreach($hsty_pay->getPayHistory($checkOutInfo->invoice_id) as $paymentHsty)
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

                				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                			</div>
                		</div>

                	</div>
                </div>
                @endforeach



                @foreach($checkOutInfos as $checkOutInfo)
                	<div class="modal fade" id="modal-default_bill_print{{$checkOutInfo->payment_id}}" tabindex="-1">
                		<div class="modal-dialog">
                			<div class="modal-content">
                				<div class="modal-header">
                					<h5 class="modal-title pull-left">Approval Request For Bill Printing</h5>
                				</div>
                				<div class="modal-body" style="font-size: 16px">
                				<p style="font-size:12px"><i class="zmdi zmdi-info-outline"></i>&nbspYou can't print bill with out manager approval. Please make a request to manger for an approval</p>
                					{{Form::open(['action'=>'ReceptionistController@resBillPrintsAppP','class'=>'form-horizontal form-label-left input_mask','name'=>'edit_res_form', 'method'=>'POST','role'=>'form'])}}
                						 <input type="hidden" value="{{$checkOutInfo->invoice_id}}" name="inv_id"/>
                							<div class="row">
                								<div class="col-sm-12">

                									<div class="form-group">
                										<label style="font-size: 16px"><b><i class="zmdi zmdi-play-for-work"></i>&nbsp Reason for bill print again ?</b></label>
                										<textarea class="form-control" name="print_reason" style="font-size: 16px"  rows="4" cols="50"  placeholder="Type here ..." required></textarea>

                									</div>

                								</div>
                								<div class="col-sm-6">

                								</div>

                							</div>




                						{{--Please make sure customer <strong>{{$roomInfo->room_number}}</strong> remove from the system. If you approve room number <strong>{{$roomInfo->room_number}}</strong> will <strong>permanently remove</strong> from the system.--}}
                						</div>
                						<div class="modal-footer">
                						<button type="submit" class="btn btn-link">Submit</button>
                						<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                						{{Form::close()}}
                				</div>

                			</div>
                		</div>
                	</div>
                @endforeach

                <div class="modal fade" id="modal-default_calc" tabindex="-1">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button style="color: white;float: right;
                                                          font-size: 30px;
                                                          font-weight: 700;
                                                          line-height: 1;
                                                          filter: alpha(opacity=20);
                                                          opacity: .9;" type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body" style="font-size: 16px">
                                <iframe src="https://system.nellymarine.com/common/calculator" height="600" width="100%" frameBorder="0">

                                </iframe>

                            </div>
                            <div class="modal-footer">
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
        <script src="{{ asset('vendors/bower_components/flatpickr/dist/flatpickr1.min.js') }}"></script>

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

          <script>
              function setSearchType($this){
                  var type=$this.value;
                  if(type==1){
                     document.getElementById('sec_date').style.display="block";
                     document.getElementById('sec_deu').style.display="none";


                  }
                  else{
                      document.getElementById('sec_date').style.display="none";
                      document.getElementById('sec_deu').style.display="block";

                  }



              }

              function clickEv($val)
              {
                var id=$val;
                var td_id="td"+$val;
                var tdd_id="tdd"+$val;
                document.getElementById(td_id).style.display="none";
                document.getElementById(tdd_id).style.display="block";
              }
          </script>


        <script src="{{ asset('js/page_notifications.js') }}"></script>




    </body>
</html>