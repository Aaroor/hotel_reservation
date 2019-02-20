

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
                    			<li class="@@colorsactive"><a href="{{route('man_index_order_list')}}">Order List</a></li>
                    			<li class="@@colorsactivee"><a href="{{route('man_index_check_order_list')}}">Check Out Orders</a></li>

                    		</ul>
                    	</li>
                    	<li class="navigation__sub @@uiactive">
                    		 <a href=""><i class="zmdi zmdi-car-taxi zmdi-hc-fw"></i> Airport Booking</a>


                    		 <ul>
                    		  <li class="@@colorsactive"><a href="{{route('man_index_airport_booking')}}">Make Booking</a></li>
                    		  <li class="@@colorsactive"><a href="{{route('man_index_airport_booking_list')}}">Booking List</a></li>
                    		  <li class="@@colorsactive"><a href="{{route('man_index_check_airport_booking_list')}}">Check Out Air Bookings</a></li>



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

                    	<li class="navigation__sub navigation__sub--active navigation__sub--toggled">
                    	  <a href=""><i class="zmdi zmdi-accounts-alt"></i> Receptionist</a>

                    	  <ul>
                    		  <li class="navigation__active"><a href="{{route('add_receptionist')}}">Add Receptionist</a></li>
                    		  <li class="@@colorsactive"><a href="{{route('receptionist_list')}}">Receptionist List</a></li>

                    	  </ul>

                    	</li>

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
                <div class="content__inner">


                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title" style="text-align: center"><u>Create Receptionist</u></h3>
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


                            <br>
                            {{Form::open(['action'=>'ManagerController@createReceptionist','class'=>'form-horizontal form-label-left input_mask','name'=>'res_form', 'method'=>'POST','role'=>'form','onsubmit'=>'return resFormValidation()'])}}

                            <div class="row">
                                <div class="col-sm-1">
                                </div>
                                <div class="col-sm-5">
                                    {{--<div class="input-group">--}}
                                        {{--<span class="input-group-addon">*</span>--}}
                                        <div class="form-group">
                                            <label style="font-size: 16px">User Name  *</label>
                                            <input style="font-size: 16px" name="user_name" type="text" class="form-control" placeholder="eg : Name">
                                            <i class="form-group__bar"></i>
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
                                            <label style="font-size: 16px">Login Name  *</label>
                                            <input style="font-size: 16px" name="login_name" type="text" class="form-control" placeholder="eg : Login Name">
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
                                            <label style="font-size: 16px">User Email  </label>
                                            <input style="font-size: 16px" name="user_mail" type="email" class="form-control" placeholder="eg : example@gmail.com">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    {{--</div>--}}
                                    <div id="msg_user_mail">

                                    </div>

                                    <br>

                                </div>

                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label style="font-size: 16px">Phone Number  </label>
                                        <input style="font-size: 16px" name="user_phone" type="text" class="form-control input-mask" data-mask="(00) 0000-0000" placeholder="eg: (00) 0000-0000">
                                        <i class="form-group__bar"></i>
                                    </div>
                                    <br>
                                    <div id="msg_user_phone">

                                    </div>

                                </div>
                                <div class="col-sm-1"></div>
                                 <div class="col-sm-1"></div>
                                 <div class="col-sm-5">
                                     {{--<div class="input-group">--}}
                                        {{--<span class="input-group-addon">@</span>--}}
                                        <div class="form-group">
                                            <label style="font-size: 16px">Password *</label>
                                            <input style="font-size: 16px" name="user_password" type="password" class="form-control" placeholder="eg: Password">
                                            <i class="form-group__bar"></i>
                                        </div>
                                     {{--</div>--}}
                                     <br>
                                     <div id="msg_user_password">

                                     </div>
                                 </div>

                                <div class="col-sm-5">
                                    {{--<div class="input-group">--}}
                                        {{--<span class="input-group-addon">*</span>--}}
                                        <div class="form-group">
                                            <label style="font-size: 16px">Re-Type Password *</label>
                                            <input style="font-size: 16px" name="user_re_password" type="password" class="form-control" placeholder="eg: Password">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    {{--</div>--}}
                                    <div id="msg_user_re_password">

                                    </div>

                                    <br>

                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-5">
                                    <button style="font-size: 16px" type="submit" class="btn btn-dark btn--icon-text"><i class="zmdi zmdi-save"></i> Save</button>
                                    <a style="font-size: 16px" href="{{route('receptionist_list')}}" class="btn btn-dark btn--icon-text"><i class="zmdi zmdi-accounts-list"></i> Receptionist List</a>


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
                    <p>© Super Admin Responsive. All rights reserved.</p>

                    <ul class="nav footer__nav">
                        <a class="nav-link" href="">Homepage</a>

                        <a class="nav-link" href="">Company</a>

                        <a class="nav-link" href="">Support</a>

                        <a class="nav-link" href="">News</a>

                        <a class="nav-link" href="">Contacts</a>
                    </ul>
                </footer>
            </section>
        </main>


            <![endif]-->

        <!-- Javascript -->
        <script src="{{ asset('form_validations/manager_form_validations.js') }}"></script>
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
        <script src="{{ asset('js/page_notifications_man.js') }}"></script>
    </body>
</html>