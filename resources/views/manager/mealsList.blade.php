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


						 <li class="navigation__sub @@uiactive">
							<a href=""><i class="zmdi zmdi-hotel zmdi-hc-fw"></i> Rooms Booking</a>

							<ul>
								<li class="@@colorsactive"><a href="{{route('man_check_map')}}">Availability Map</a></li>
                                <li class="@@colorsactive"><a href="{{route('man_check_map_bulk')}}">Bulk Booking</a></li>
                                <li class="@@colorsactive"><a href="{{route('man_available_rooms_index')}}">Availability List</a></li>
                                <li class="@@colorsactive"><a href="{{route('man_index_booking_list')}}">Booking List</a></li>
                                <li class="@@colorsactive"><a href="{{route('man_index_check_booking_list')}}">Check Out Bookings</a></li>

							</ul>
						</li>
						<li class="navigation__sub @@uiactive">
							<a href=""><i class="zmdi zmdi-cutlery zmdi-hc-fw"></i> Meals Order</a>

							<ul>
								<li class="@@colorsactive"><a href="{{route('man_index_order_meals')}}">Choose Meals</a></li>
								<li class="@@cssanimationsactive"><a href="{{route('man_index_order_list')}}">Order List</a></li>

							</ul>
						</li>
						<li class="navigation__sub @@uiactive">
							 <a href=""><i class="zmdi zmdi-car-taxi zmdi-hc-fw"></i> Airport Booking</a>


							 <ul>
							  <li class="@@colorsactive"><a href="{{route('man_index_airport_booking')}}">Make Booking</a></li>
							  <li class="@@colorsactive"><a href="{{route('man_index_airport_booking_list')}}">Booking List</a></li>



							 </ul>
						</li>
						<li class="navigation__sub @@uiactive">
							<a href=""><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> Payment</a>

							<ul>
								<li class="@@colorsactive"><a href="{{route('man_index_check_out_payment')}}">Payment Check Out</a></li>
								<li class="@@colorsactive"><a href="{{route('man_index_paid_payment')}}">Paid Payments</a></li>
								<li class="@@colorsactive"><a href="{{route('man_check_out_info')}}">Final Check Outs</a></li>
							</ul>
						</li>
						<li class="navigation__sub @@uiactive">
							<a href=""><i class="zmdi zmdi-time-restore zmdi-hc-fw"></i>Previous Histories</a>

							<ul>
								<li class="@@colorsactive"><a href="{{route('man_cus_booking_history')}}">Customer Histories</a></li>
							</ul>
						</li>
						<li class="@@colorsactive">
						   <a href="{{route('man_meals_order_app')}}"><i class="zmdi zmdi-check-all zmdi-hc-fw"></i> Approval List</a>

						 </li>


						<li class="navigation__sub @@uiactive">
							<a href=""><i class="zmdi zmdi-accounts-list-alt zmdi-hc-fw"></i> Customers</a>


							<ul>
							   <li class="@@colorsactive"><a href="{{route('man_index_add_customer')}}">Add Customer</a></li>
							   <li class="@@colorsactive"><a href="{{route('man_cus_list')}}">Customer List</a></li>
						   </ul>
						</li>

						<li class="navigation__sub @@uiactive">
							<a href=""><i class="zmdi zmdi-airline-seat-flat zmdi-hc-fw"></i> Rooms Management</a>


							<ul>
							   <li class="@@colorsactive"><a href="{{route('man_index_add_room')}}">Add Room</a></li>
							   <li class="@@colorsactive"><a href="{{route('man_room_list')}}">Room List</a></li>
						   </ul>
						</li>

						<li class="navigation__sub navigation__sub--active navigation__sub--toggled">
							<a href=""><i class="zmdi zmdi-star-circle zmdi-hc-fw"></i> Meals Management</a>


							<ul>
							   <li class="@@colorsactive"><a href="{{route('man_add_meals')}}">Add Meals</a></li>
							   <li class="navigation__active"><a href="{{route('man_meals_list')}}">Meals List</a></li>

						   </ul>
						</li>

						<li class="navigation__sub @@uiactive">
							<a href=""><i class="zmdi zmdi-tv-list zmdi-hc-fw"></i> Reports</a>


							<ul>
							   <li class="@@colorsactive"><a href="{{route('man_day_summary')}}">Booking Summary</a></li>
                               <li class="@@colorsactive"><a href="{{route('man_rep_check_out')}}">Check Out Reports</a></li>
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
                    <h1>Meals List</h1>


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
                                <strong>{{$cmt}}</strong><br> Successfully remove from the system.
                            </div>
                        @elseif($msg==3)
                            <div class="alert alert-success alert-dismissible fade show" style="font-size: 16px">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{{$cmt}}</strong><br> Successfully update to the system.
                            </div>
                        @endif
                   

                        <div class="table-responsive">
                        @inject('time_conversion', 'App\Http\Controllers\SuperAdminController')
                        @inject('dec_meals_type', 'App\Http\Controllers\SuperAdminController')
                        @inject('dec_meals_style', 'App\Http\Controllers\SuperAdminController')
                            <table id="data-table" class="table">
                                <thead>
                                    <tr style="font-size: 16px;font-weight: bold">
                                        <th><i>Meals Name</i></th>
                                        <th><i>Meals Type</i></th>
                                        <th><i>Time Start</i></th>
                                        <th><i>Time End</i></th>
                                        <th><i>Style Of Meals</i></th>
                                        <th><i>Price Per Unit</i></th>
                                        <th><i>Action</i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($mealsInfos as $mealsInfo)
                                	<tr style="font-size: 16px">
                                		<td>
                                		   {{$mealsInfo->meals_name}}
                                		</td>
                                		<td>
                                		  {{$dec_meals_type->getMealsType($mealsInfo->meals_type)}}

                                		</td>
                                		<td>{{$time_conversion->timeConversion($mealsInfo->available_start_time)}}</td>

                                		<td>{{$time_conversion->timeConversion($mealsInfo->available_end_time)}}</td>
                                		<td>{{$dec_meals_style->getMealsStyle($mealsInfo->style_of_food)}}</td>

                                		<td>{{number_format((float)$mealsInfo->price_per_unit,2,'.','')}}</td>
                                		{{--<td></td>--}}
                                		<td><a href="{{route('man_edit_meals_r', ['id'=>$mealsInfo->meals_id])}}" class="btn btn-light" href=""><i style="font-size: 18px" class="zmdi zmdi-border-color"></i></a>&nbsp
                                		<button class="btn btn-light" data-toggle="modal" data-target="#modal-default{{$mealsInfo->meals_id}}"><i style="font-size: 18px" class="zmdi zmdi-delete"></i> </button>
                                		</td>
                                	</tr>
                                @endforeach
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                 @foreach($mealsInfos as $mealsInfo)

                 <div class="modal fade" id="modal-default{{$mealsInfo->meals_id}}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title pull-left">Make sure to remove Meals</h5>
                            </div>
                            <div class="modal-body" style="font-size: 16px">
                                <div class="stats__chart" style="text-align: center">
                                    <i class="zmdi zmdi-info-outline zmdi-hc-5x"></i>

                                </div>
                                Please make sure this <strong>{{$mealsInfo->meals_name}}</strong> remove from the system. If you approve <strong>this</strong> will <strong>permanently remove</strong> from the system.
                            </div>
                            <div class="modal-footer">
                                <a href="{{route('man_remove_meals_r', ['id'=>$mealsInfo->meals_id])}}" class="btn btn-link">Approve</a>
                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

                <form>
                    <input type="hidden" name="in_user_id" id="in_user_id" value="{{session('user_id')}}" />
                </form>


                <footer class="footer hidden-xs-down">
                    <p>© Developing team of hotel reservation. All rights reserved.</p>

                    <ul class="nav footer__nav">
                        {{--<a class="nav-link" href="{{route('receptionist_home')}}">Home</a>--}}

                        <a class="nav-link" href="{{route('man_available_rooms_index')}}">Check Rooms Availability</a>

                        <a class="nav-link" href="{{route('man_index_booking_list')}}">Booking List</a>

                        <a class="nav-link" href="{{route('man_index_order_meals')}}">Order Meals</a>

                        <a class="nav-link" href="{{route('man_index_order_list')}}">Order List</a>

                        <a class="nav-link" href="{{route('man_index_airport_booking')}}">Make Pickup or Drop</a>

                        <a class="nav-link" href="{{route('man_index_check_out_payment')}}">Payment Check Out</a>

                        <a class="nav-link" href="{{route('man_index_add_customer')}}">Add New Customer</a>

                        <a class="nav-link" href="{{route('man_cus_list')}}">Customer List</a>

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

        <script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
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
                <script src="{{ asset('js/page_notifications_admin.js') }}"></script>



    </body>
</html>