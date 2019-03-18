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
                       <li class="navigation__sub navigation__sub--active navigation__sub--toggled">
                         <a href=""><i class="zmdi zmdi-cutlery zmdi-hc-fw"></i> Meals Order</a>


                         <ul>
                          <li class="@@colorsactive"><a href="{{route('res_index_order_meals')}}">Choose Meals</a></li>
                          <li class="navigation__active"><a href="{{route('res_index_order_list')}}">Order List</a></li>
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
             <a href="{{route('res_index_order_list')}}" class="btn btn-light btn--icon-text"><i class="zmdi zmdi-search"></i>Search All</a>
             <br><br>

                
                <div class="card">
                    <div class="card-body">
                    <br><br>
                        @if($msg==1)
                            <div class="alert alert-danger alert-dismissible fade show" style="font-size: 16px">
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
                        @elseif($msg==6)
                            <div class="alert alert-success alert-dismissible fade show" style="font-size: 16px">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Your remove approval request</strong><br> Successfully submit to the manager.
                            </div>
                        @elseif($msg==7)
                            <div class="alert alert-success alert-dismissible fade show" style="font-size: 16px">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Your edit approval request</strong><br> Successfully submit to the system.
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
                        	{{Form::open(['action'=>'ReceptionistController@recOrderDateSearchP','class'=>'form-horizontal form-label-left input_mask','name'=>'edit_res_form', 'method'=>'POST','role'=>'form','onsubmit'=>'return editResFormValidation()'])}}
                        		<div class="row">
                        			<div class="col-sm-4">
                        				<label>Select the date</label>

                        				<div class="input-group">
                        					<span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                        					<div class="form-group">
                        					@if(session()->has('search_order_date_from'))
                        						<input  type="text" name="from_date" class="form-control date-picker" value="{{session('search_order_date_from')}}e">
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
                        		{{Form::open(['action'=>'ReceptionistController@recOrderDateSearchP','class'=>'form-horizontal form-label-left input_mask','name'=>'edit_res_form', 'method'=>'POST','role'=>'form','onsubmit'=>'return editResFormValidation()'])}}
                        		<div class="row">
                        			<div class="col-sm-4">
                        				<label>Select the date</label>

                        				<div class="input-group">
                        					<span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                        					<div class="form-group">
                        					@if(session()->has('search_order_date_from'))
                        						<input  type="text" name="from_date" class="form-control date-picker" value="{{session('search_order_date_from')}}e">
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
                        	{{Form::open(['action'=>'ReceptionistController@recOrderDateSearchP','class'=>'form-horizontal form-label-left input_mask','name'=>'edit_res_form', 'method'=>'POST','role'=>'form','onsubmit'=>'return editResFormValidation()'])}}
                        		<div class="row">
                        			<div class="col-sm-4">
                        				<label>Select the date</label>

                        				<div class="input-group">
                        					<span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                        					<div class="form-group">
                        					@if(session()->has('search_order_date_from'))
                        						<input  type="text" name="from_date" class="form-control date-picker" value="{{session('search_order_date_from')}}e">
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
                        	{{Form::open(['action'=>'ReceptionistController@recOrderDurationSearchP','class'=>'form-horizontal form-label-left input_mask','name'=>'edit_res_form', 'method'=>'POST','role'=>'form','onsubmit'=>'return editResFormValidation()'])}}
                        	<div class="row">
                        		<div class="col-sm-4">
                        			<label>Start Date</label>

                        			<div class="input-group">
                        				<span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                        				<div class="form-group">
                        				@if(session()->has('search_date_from'))
                        					<input  type="text" name="from_date" class="form-control date-picker" value="{{session('search_date_from')}}">
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
                        				@if(session()->has('search_date_to'))
                        					<input id="dt" type="text" name="to_date" class="form-control date-picker" value="{{session('search_date_to')}}">
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
                        	{{Form::open(['action'=>'ReceptionistController@recOrderDurationSearchP','class'=>'form-horizontal form-label-left input_mask','name'=>'edit_res_form', 'method'=>'POST','role'=>'form','onsubmit'=>'return editResFormValidation()'])}}
                        		<div class="row">
                        			<div class="col-sm-4">
                        				<label>Start Date</label>

                        				<div class="input-group">
                        					<span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                        					<div class="form-group">
                        					@if(session()->has('search_order_date_from'))
                        						<input  type="text" name="from_date" class="form-control date-picker" value="{{session('search_order_date_from')}}">
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
                        					@if(session()->has('search_order_date_to'))
                        						<input id="dt" type="text" name="to_date" class="form-control date-picker" value="{{session('search_order_date_to')}}">
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
                        	{{Form::open(['action'=>'ReceptionistController@recOrderDurationSearchP','class'=>'form-horizontal form-label-left input_mask','name'=>'edit_res_form', 'method'=>'POST','role'=>'form','onsubmit'=>'return editResFormValidation()'])}}
                        		<div class="row">
                        			<div class="col-sm-4">
                        				<label>Start Date</label>

                        				<div class="input-group">
                        					<span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                        					<div class="form-group">
                        					@if(session()->has('search_order_date_from'))
                        						<input  type="text" name="from_date" class="form-control date-picker" value="{{session('search_order_date_from')}}">
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
                        					@if(session()->has('search_order_date_to'))
                        						<input id="dt" type="text" name="to_date" class="form-control date-picker" value="{{session('search_order_date_to')}}">
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
                         @inject('time_conversion', 'App\Http\Controllers\SuperAdminController')
                            <table id="data-table" class="table">
                                <thead>
                                    <tr style="font-size: 16px;font-weight: bold">
                                        <th><i>Meals Name</i></th>
                                        <th><i>Quantity</i></th>
                                        <th><i>Order Date</i></th>
                                        <th><i>Order Time</i></th>
                                        <th><i>Room No</i></th>
                                        <th><i>Pay</i></th>
                                        <th style="font-size:12px"><i>Check Out</i></th>
                                        <th><i>Action</i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($orderInfos)!=0)
                                 @foreach($orderInfos as $orderInfo)
                                	<tr style="font-size: 16px">
                                		<td>
                                		   {{$meals_details->getMealsInfo($orderInfo->meals_id)->meals_name}}<br><span style="font-size: 14px">({{$orderInfo->invoice_id}})</span>
                                		</td>
                                		<td>
                                		  {{$orderInfo->quantity}}

                                		</td>
                                		<td>{{$orderInfo->order_date}}</td>

                                		<td>@if($orderInfo->order_time==null)N/A @else{{$time_conversion->timeConversion($orderInfo->order_time)}}@endif</td>

                                		<td>{{$room_details->getRoomDetails($booking_details->getBookingInfo($orderInfo->booking_id)->room_id)->room_number}}</td>
                                		<td style="font-size: 14px"><strong><a href="{{route('res_bill_payment', ['id'=>$orderInfo->invoice_id])}}" class="btn btn-light btn--icon-text" href=""><i class="zmdi zmdi-money"></i></a></strong></td>

                                        <td style="font-size: 14px"><strong><a href="{{route('res_pay_check', ['id'=>$orderInfo->invoice_id])}}" class="btn btn-light btn--icon-text" href=""><i class="zmdi zmdi-shopping-cart"></i></a></strong></td>

                                        @if($orderInfo->edit_lock==1)
                                		    <td><button class="btn btn-light" data-toggle="modal" data-target="#modal-default1{{$orderInfo->order_id}}"><i style="font-size: 18px" class="zmdi zmdi-border-color"></i> </button>&nbsp
                                		@else
                                		    <td><button class="btn btn-light" data-toggle="modal" data-target="#modal-default_approve_edit{{$orderInfo->order_id}}"><i style="font-size: 18px" class="zmdi zmdi-border-color"></i> </button>&nbsp
                                		@endif
                                		@if($orderInfo->remove_lock==1)
                                		    <button class="btn btn-light" data-toggle="modal" data-target="#modal-default{{$orderInfo->order_id}}"><i style="font-size: 18px" class="zmdi zmdi-delete"></i> </button>
                                		@else
                                		    <button class="btn btn-light" data-toggle="modal" data-target="#modal-default_approve_remove{{$orderInfo->order_id}}"><i style="font-size: 18px" class="zmdi zmdi-delete"></i> </button>
                                		@endif
                                		</td>
                                	</tr>
                                @endforeach
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                @inject('cus_details1', 'App\Http\Controllers\SuperAdminController')
                @inject('room_details1', 'App\Http\Controllers\SuperAdminController')
                @inject('book_details1', 'App\Http\Controllers\SuperAdminController')
                @inject('order_pay', 'App\Http\Controllers\ReceptionistController')

             @if(count($orderInfos)!=0)

                @foreach($orderInfos as $orderInfo)

                 <div class="modal fade" id="modal-default1{{$orderInfo->order_id}}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title pull-left">Update the order</h5>
                            </div>
                            <div class="modal-body" style="font-size: 16px">
                                {{Form::open(['action'=>'ReceptionistController@resUpdateMealsOrderP','class'=>'form-horizontal form-label-left input_mask','name'=>'edit_res_form', 'method'=>'POST','role'=>'form'])}}
                                	 <input type="hidden" value="{{$orderInfo->order_id}}" name="order_id"/>
                                	 <input type="hidden" value="{{$order_pay->getOrderPayInfo($orderInfo->order_id)->order_pay_id}}" name="pay_id"/>
                                		<div class="row">
                                			<div class="col-sm-6">
                                				<label>Order Date</label>

                                				<div class="input-group">
                                					<span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                					<div class="form-group">
                                						<input  type="text" name="order_date" class="form-control date-picker" value="{{$orderInfo->order_date}}" required>
                                						<i class="form-group__bar"></i>
                                					</div>
                                				</div>
                                			</div>
                                			<div class="col-sm-6">
                                				<label>Order Time</label>

                                				<div class="input-group">
                                					<span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                					<div class="form-group">
                                						<input type="text" name="order_time" class="form-control time-picker" value="{{$orderInfo->order_time}}" required>
                                						<i class="form-group__bar"></i>
                                					</div>
                                				</div>
                                			</div>

                                		</div>
                                		<br>
                                		<div class="row">
                                			 <div class="col-sm-6">
                                				{{--<label>Quantity</label>--}}

                                				<div class="form-group">
                                					<label style="font-size: 16px">Quantity *</label>
                                					<input style="font-size: 16px" id="qu{{$orderInfo->order_id}}" oninput="amountCal(this)" name="quantity" type="number" min="0" class="form-control" value="{{$orderInfo->quantity}}" required>
                                					<i class="form-group__bar"></i>
                                				</div>
                                			 </div>
                                			 <div class="col-sm-6">
                                															 {{--<label>Quantity</label>--}}

                                				 <div class="form-group">
                                					 <label style="font-size: 16px">Unit Price *</label>
                                					 <?php $perUnit=($order_pay->getOrderPayInfo($orderInfo->order_id)->amount/$orderInfo->quantity);?>
                                					 <input style="font-size: 16px" id="up{{$orderInfo->order_id}}" oninput="amountCal(this)" name="price_per_unit" type="number" min="0" class="form-control" value="{{number_format((float)$perUnit,2,'.','')}}" required>
                                					 <i class="form-group__bar"></i>
                                				 </div>
                                			 </div>

                                		</div>
                                		<div class="row">
                                			<div class="col-sm-6">
                                				 <div class="form-group">

                                					 <label style="font-size: 16px">TotalAmount *</label>
                                					 <input style="font-size: 16px" id="tm{{$orderInfo->order_id}}"  name="total_am" type="number" min="0" class="form-control" value="{{number_format((float)$order_pay->getOrderPayInfo($orderInfo->order_id)->amount,2,'.','')}}" disabled>
                                					 <input type="hidden" name="total_amount" id="ta{{$orderInfo->order_id}}" value="0.0" />
                                					 <i class="form-group__bar"></i>
                                				 </div>
                                			 </div>
                                			<div class="col-sm-6">

                                			 </div>
                                		</div>


                                	{{--Please make sure customer <strong>{{$roomInfo->room_number}}</strong> remove from the system. If you approve room number <strong>{{$roomInfo->room_number}}</strong> will <strong>permanently remove</strong> from the system.--}}
                                	</div>
                                	<div class="modal-footer">
                                	<button type="submit" class="btn btn-link">Update Order</button>
                                	<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                	{{Form::close()}}
                            </div>

                        </div>
                    </div>
                </div>

                @endforeach

                @foreach($orderInfos as $orderInfo)

                     <div class="modal fade" id="modal-default{{$orderInfo->order_id}}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title pull-left">Make sure to remove receptionist</h5>
                                </div>
                                <div class="modal-body" style="font-size: 16px">
                                    <div class="stats__chart" style="text-align: center">
                                        <i class="zmdi zmdi-info-outline zmdi-hc-5x"></i>
                                        {{--<img class="cir__img" src="{{ asset('demo/img/home/booking.jpg') }}" class="img-circle">--}}
                                    </div>
                                    Please make sure the order <strong>{{$meals_details->getMealsInfo($orderInfo->meals_id)->meals_name}}</strong> remove from the system. If you approve <strong>this order</strong> will <strong>permanently remove</strong> from the system.
                                </div>
                                <div class="modal-footer">
                                    <a href="{{route('res_remove_order', ['id'=>$orderInfo->order_id])}}" class="btn btn-link">Approve</a>
                                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

                @foreach($orderInfos as $orderInfo)

                <div class="modal fade" id="modal-default_approve_remove{{$orderInfo->order_id}}" tabindex="-1">
                	<div class="modal-dialog">
                		<div class="modal-content">
                			<div class="modal-header">
                				<h5 class="modal-title pull-left">Approval Request For Remove Order</h5>
                			</div>
                			<div class="modal-body" style="font-size: 16px">
                			<p style="font-size:12px"><i class="zmdi zmdi-info-outline"></i>&nbspYou can't remove any order data with out manager approval. Please make a request to manger for an approval</p>
                				{{Form::open(['action'=>'ReceptionistController@resRemoveMealsAppP','class'=>'form-horizontal form-label-left input_mask','name'=>'edit_res_form', 'method'=>'POST','role'=>'form'])}}
                					 <input type="hidden" value="{{$orderInfo->order_id}}" name="remove_order_id"/>
                						<div class="row">
                							<div class="col-sm-12">

                                                <div class="form-group">
                                                    <label style="font-size: 16px"><b><i class="zmdi zmdi-play-for-work"></i>&nbsp Reason for remove meals order ?</b></label>
                                                    <textarea name="remove_reason" class="form-control" style="font-size: 16px"  rows="4" cols="50"  placeholder="Type here ..." required></textarea>

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

                @foreach($orderInfos as $orderInfo)

                	<div class="modal fade" id="modal-default_approve_edit{{$orderInfo->order_id}}" tabindex="-1">
                		<div class="modal-dialog">
                			<div class="modal-content">
                				<div class="modal-header">
                					<h5 class="modal-title pull-left">Approval Request For Meals Order Modifications</h5>
                				</div>
                				<div class="modal-body" style="font-size: 16px">
                				<p style="font-size:12px"><i class="zmdi zmdi-info-outline"></i>&nbspYou can't modify any order data with out manager approval. Please make a request to manger for an approval</p>
                					{{Form::open(['action'=>'ReceptionistController@resEditMealsAppP','class'=>'form-horizontal form-label-left input_mask','name'=>'edit_res_form', 'method'=>'POST','role'=>'form'])}}
                						 <input type="hidden" value="{{$orderInfo->order_id}}" name="edit_order_id"/>
                							<div class="row">
                								<div class="col-sm-12">

                									<div class="form-group">
                										<label style="font-size: 16px"><b><i class="zmdi zmdi-play-for-work"></i>&nbsp Reason for edit meals order ?</b></label>
                										<textarea class="form-control" name="edit_reason" style="font-size: 16px"  rows="4" cols="50"  placeholder="Type here ..." required></textarea>

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

                @endif

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
        <script src="{{ asset('vendors/bower_components/flatpickr/dist/flatpickr1.min.js') }}"></script>




                <script src="{{ asset('vendors/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js') }}"></script>
                <script src="{{ asset('vendors/bower_components/sweetalert2/dist/sweetalert2.min.js') }}"></script>


        <!-- App functions and actions -->
        <script src="{{ asset('js/app.min.js') }}"></script>

         <!-- Demo only -->
        <script src="{{ asset('demo/js/demo.js') }}"></script>

        <script src="{{ asset('js/page_notifications.js') }}"></script>

        <script>
         function amountCal($this)
         {
            var id=$this.id.substr(2);
            var quantity=document.getElementById("qu"+id).value;
            var unitPrice=document.getElementById("up"+id).value;
            document.getElementById("tm"+id).value=(quantity*unitPrice).toFixed(2);
            document.getElementById("ta"+id).value=(quantity*unitPrice).toFixed(2);
         }
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
        </script>



    </body>
</html>