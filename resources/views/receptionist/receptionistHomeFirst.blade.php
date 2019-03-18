<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="{{ asset('vendors/bower_components/fullcalendar/dist/fullcalendar.min.css') }}">


        <!-- Vendor styles -->
        <link rel="stylesheet" href="{{ asset('vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/bower_components/animate.css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css') }}">
        <!-- App styles -->
        <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">

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
                <div class="navigation-trigger" data-sa-action="aside-open" data-sa-target=".sidebar">
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

            <aside class="sidebar sidebar--hidden">
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
                            <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                        </div>
                    </div>

                    <ul class="navigation">
                        <li class="navigation__active"><a href="{{route('receptionist_home')}}"><i class="zmdi zmdi-home"></i> Home</a></li>


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
                                <li class="@@cssanimationsactive"><a href="{{route('res_index_order_list')}}">Order List</a></li>
                                <li class="@@colorsactive"><a href="{{route('res_index_check_order_list')}}">Check Out Orders</a></li>

                            </ul>
                        </li>
                        <li class="navigation__sub @@uiactive">
                             <a href=""><i class="zmdi zmdi-car-taxi zmdi-hc-fw"></i> Airport Booking</a>


                             <ul>
                              <li class="@@colorsactive"><a href="{{route('res_index_airport_booking')}}">Make Booking</a></li>
                              <li class="@@colorsactive"><a href="{{route('res_index_airport_booking_list')}}">Booking List</a></li>
                              <li class="@@colorsactive"><a href="{{route('res_index_check_airport_booking_list')}}">Check Out Air Bookings</a></li>



                             </ul>
                        </li>
                        <li class="navigation__sub @@uiactive">
                            <a href=""><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> Payment</a>

                            <ul>
                                <li class="@@colorsactive"><a href="{{route('res_index_check_out_payment')}}">Pending Payments</a></li>
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
                            <a href=""><i class="zmdi zmdi-globe zmdi-hc-fw"></i>Web Site (nellymarine.com)</a>

                            <ul>
                                <li class="@@colorsactive"><a href="{{route('res_cus_request')}}">Customer Request</a></li>
                                <li class="@@colorsactive"><a href="{{route('res_cus_questions')}}">FAQ Questions</a></li>
                            </ul>
                        </li>


                        <li class="navigation__sub @@uiactive">
                            <a href=""><i class="zmdi zmdi-accounts-list-alt zmdi-hc-fw"></i> Customers</a>


                            <ul>
                               <li class="@@colorsactive"><a href="{{route('res_index_add_customer')}}">Add Customer</a></li>
                               <li class="@@colorsactive"><a href="{{route('res_cus_list')}}">Customer List</a></li>
                           </ul>
                        </li>

                        <li class="@@colorsactive">
                            <a href="{{route('logout')}}"><i class="zmdi zmdi-lock"></i> Log Out</a>
                        </li>


                    </ul>
                </div>
            </aside>

            <section class="content content--full">
                <div class="content__inner">
                    <header class="content__title">
                    {{--<ul class="navigation">--}}
                        {{--<li class="@@indexactive"><a href="{{route('receptionist_home')}}"><i class="zmdi zmdi-home"></i> Home</a></li>--}}
                    {{--</ul>--}}
                    <form>
                    <input type="hidden" name="in_user_id" id="in_user_id" value="{{session('user_id')}}" />
                    </form>
                   <br><br>


                        <h4>Welcome to hotel reservation system</h4>
                    </header>

                    <div class="row stats">
                        <div class="col-sm-6 col-md-3">
                            <div class="stats__item">
                                <div class="stats__chart" style="text-align: center">
                                    <i class="zmdi zmdi-hotel zmdi-hc-5x"></i>
                                    {{--<img class="cir__img" src="{{ asset('demo/img/home/booking.jpg') }}" class="img-circle">--}}
                                </div>

                                <div class="stats__info">
                                    <div>
                                        <h2>Room Reservation</h2>
                                        <small> <a href="{{route('res_check_map')}}" class="btn btn-light btn--icon-text"><i class="zmdi zmdi-arrow-forward"></i> Click To Move</a>
</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="stats__item">
                                <div class="stats__chart" style="text-align: center">
                                <i class="zmdi zmdi-cutlery zmdi-hc-5x"></i>
                                {{--<i class="cir__img" class="zmdi zmdi-flower-alt zmdi-hc-5x"></i>--}}
                                    {{--<img class="cir__img" src="{{ asset('demo/img/home/booking.jpg') }}" class="img-circle">--}}
                                </div>

                                <div class="stats__info">
                                    <div>
                                        <h2>Meals Order</h2>
                                        <small> <a href="{{route('res_index_order_meals')}}" class="btn btn-light btn--icon-text"><i class="zmdi zmdi-arrow-forward"></i> Click To Move</a>
</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                           <div class="stats__item">
                               <div class="stats__chart" style="text-align: center">
                                    <i class="zmdi zmdi-car-taxi zmdi-hc-5x"></i>
                                   {{--<img class="cir__img" src="{{ asset('demo/img/home/booking.jpg') }}" class="img-circle">--}}
                               </div>

                               <div class="stats__info">
                                   <div>
                                       <h2>Airport Booking</h2>
                                       <small> <a href="{{route('res_index_airport_booking')}}" class="btn btn-light btn--icon-text"><i class="zmdi zmdi-arrow-forward"></i> Click To Move</a>
</small>
                                   </div>
                               </div>
                           </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="stats__item">
                                <div class="stats__chart" style="text-align: center">
                                    {{--<img class="cir__img" src="{{ asset('demo/img/home/booking.jpg') }}" class="img-circle">--}}
                                    <i class="zmdi zmdi-accounts-list-alt zmdi-hc-5x"></i>
                                </div>

                                <div class="stats__info">
                                    <div>
                                        <h2>Customers Info</h2>
                                        <small> <a href="{{route('res_cus_list')}}" class="btn btn-light btn--icon-text"><i class="zmdi zmdi-arrow-forward"></i> Click To Move</a>
</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row stats">
                        <div class="col-sm-6 col-md-3">
                            <div class="stats__item">
                                <div class="stats__chart" style="text-align: center">
                                    <i class="zmdi zmdi-time-restore zmdi-hc-5x"></i>
                                </div>

                                <div class="stats__info">
                                    <div>
                                        <h2>Customer History</h2>
                                        <small> <a href="{{route('res_cus_booking_history')}}" class="btn btn-light btn--icon-text"><i class="zmdi zmdi-arrow-forward"></i> Click To Move</a>
</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="stats__item">
                                <div class="stats__chart" style="text-align: center">
                                <i class="zmdi zmdi-money zmdi-hc-5x"></i>

                                </div>

                                <div class="stats__info">
                                    <div>
                                        <h2>Payments</h2>
                                        <small> <a href="{{route('res_index_check_out_payment')}}" class="btn btn-light btn--icon-text"><i class="zmdi zmdi-arrow-forward"></i> Click To Move</a>
</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                           <div class="stats__item">
                               <div class="stats__chart" style="text-align: center">
                                    <i class="zmdi zmdi-globe zmdi-hc-5x"></i>
                               </div>

                               <div class="stats__info">
                                   <div>
                                       <h2>Web Site (nellymarine.com)</h2>
                                       <small> <a href="{{route('res_cus_request')}}" class="btn btn-light btn--icon-text"><i class="zmdi zmdi-arrow-forward"></i> Click To Move</a>
</small>
                                   </div>
                               </div>
                           </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="stats__item">
                                <div class="stats__chart" style="text-align: center">
                                    {{--<img class="cir__img" src="{{ asset('demo/img/home/booking.jpg') }}" class="img-circle">--}}
                                    <i class="zmdi zmdi-lock zmdi-hc-5x"></i>
                                </div>

                                <div class="stats__info">
                                    <div>
                                        <h2>Log Out</h2>
                                        <small> <a href="{{route('logout')}}" class="btn btn-light btn--icon-text"><i class="zmdi zmdi-arrow-forward"></i> Click To Move</a>
</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modal-default" tabindex="-1" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title pull-left"><i class="zmdi zmdi-shield-security"></i> For Security Management </h5>
                                </div>
                                <div class="modal-body" style="font-size: 16px">
                                    {{--<div class="stats__chart" style="text-align: center">--}}
                                        {{--<i class="zmdi zmdi-shield-security zmdi-hc-3x"></i>--}}
                                        {{--<h1>Please enter current receptionist user name ( Don't use user name as "nelly")</h1>--}}
                                        {{--<img class="cir__img" src="{{ asset('demo/img/home/booking.jpg') }}" class="img-circle">--}}
                                    {{--</div>--}}

                                     {{Form::open(['action'=>'CommonController@mtnUserAddP','class'=>'form-horizontal form-label-left input_mask','name'=>'edit_res_form', 'method'=>'POST','role'=>'form'])}}
                                         <input type="hidden" value="{{session('mtn_id')}}" name="mtn_id"/>
                                            <div class="row">
                                                <div class="col-sm-12">

                                                    <div class="form-group">
                                                        <label style="font-size: 16px"><b><i class="zmdi zmdi-play-for-work"></i>&nbsp Please enter your name below and submit <br>(Don't use nelly as your name)</b></label>
                                                        <input type="text" class="form-control" name="mtn_name"  style="font-size: 16px"   placeholder="Your Name" required />

                                                    </div>

                                                </div>
                                                <div class="col-sm-6">

                                                </div>

                                            </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-link">Submit</button>
                                    {{--<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>--}}
                                    {{Form::close()}}
                                </div>
                            </div>
                        </div>
                    </div>


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
                </div>
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
        <script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/popper.js/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js') }}"></script>

        <script src="{{ asset('vendors/bower_components/salvattore/dist/salvattore.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/flot/jquery.flot.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/flot/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/flot.curvedlines/curvedLines.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/jqvmap/dist/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/peity/jquery.peity.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/moment/min/moment.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>



         <!-- Charts and maps-->
        <script src="{{ asset('demo/js/flot-charts/curved-line.js') }}"></script>
        <script src="{{ asset('demo/js/flot-charts/line.js') }}"></script>
        <script src="{{ asset('demo/js/flot-charts/chart-tooltips.js') }}"></script>
        <script src="{{ asset('demo/js/other-charts.js') }}"></script>
        <script src="{{ asset('demo/js/jqvmap.js') }}"></script>

        <!-- App functions and actions -->
        <script src="{{ asset('js/app.min.js') }}"></script>
        <script src="{{ asset('js/page_notifications.js') }}"></script>

        <script type="text/javascript">
            $(window).on('load',function(){
                $('#modal-default').modal(

                'show'
                );
            });
        </script>





        <!-- Demo -->


    </body>
</html>