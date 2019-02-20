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
                            <img class="user__img" src="{{ asset('demo/img/profile-pics/8.jpg')}}" alt="">
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

                    	<li class="navigation__sub navigation__sub--active navigation__sub--toggled">
                    	  <a href=""><i class="zmdi zmdi-hotel zmdi-hc-fw"></i> Rooms Booking</a>

                    	  <ul>
                           <li class="navigation__active"><a href="{{route('res_monthly_map')}}">Monthly Time Line</a></li>
                    	   <li class="@@colorsactive"><a href="{{route('res_check_map')}}">Availability Map</a></li>
                    	   <li class="@@colorsactive"><a href="{{route('res_check_map_bulk')}}">Bulk Booking</a></li>
                    	   <li class="@@colorsactive"><a href="{{route('rec_available_rooms_index')}}">Availability List</a></li>
                    	   <li class="@@colorsactive"><a href="{{route('res_index_booking_list')}}">Booking List</a></li>
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
                <header class="content__title">
					<table class="table mb-3">
						<tbody style="margin-left:0px;margin-right:0px;padding-left:0px;padding-right:0px">
                    </table>

                </header>
                
                <div class="card">
                    <div class="card-body">
                    {{Form::open(['action'=>'ReceptionistController@monthlySearchP','class'=>'form-horizontal form-label-left input_mask','name'=>'single_booking_form', 'method'=>'POST','role'=>'form','onsubmit'=>'return monthlySerachVal()'])}}

                        <div class="row">
                            <div class="col-sm-6">
                                <label>Select Month (Start Date)</label>

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                    <div class="form-group">
                                        <input  type="text" id="st_date" name="stn_date" class="form-control date-picker" value="{{session('st_date')}}">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>



                            </div>
                           <!-- <div class="col-sm-4">
                                <label>End Date (12.00 PM)</label>

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                    <div class="form-group">
                                        <input id="dt" style="" type="text" name="ton_date" class="form-control date-picker" value="{{session('en_date')}}">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>


                            </div>-->
                            <div class="col-sm-6">
                                <label></label>
                                <div class="input-group">
                                    <div class="form-group">
                                        <button style="background-color:MediumVioletRed;font-size:22px" id="btn_search" class="btn btn-light btn--icon-text"><b>{{date("F", strtotime(session('st_date')))}} {{date("Y", strtotime(session('st_date')))}}</b></button>
                                    </div>
                                </div>

                            </div>

                        </div>
                        {{Form::close()}}
                        <br>


                        @inject('is_available', 'App\Http\Controllers\SuperAdminController')
                        @inject('remove_id', 'App\Http\Controllers\SuperAdminController')
                        @inject('dec_room_type', 'App\Http\Controllers\SuperAdminController')
                        @inject('check_out', 'App\Http\Controllers\SuperAdminController')
						@inject('check_av', 'App\Http\Controllers\ReceptionistController')
                    
                           <div class="row stats">
								<table class="table mb-3">
									
									<tbody style="margin-left:0px;margin-right:0px;padding-left:0px;padding-right:0px">
									@foreach($roomInfos as $roomInfo)
									  <tr style="margin-left:0px;margin-right:0px;padding-left:0px;padding-right:0px">   
									    <td><a style="background-color:blue" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="Room Number" href="#" class="btn btn-light btn--icon-text" href=""><b>{{$roomInfo->room_number}}</b></a></td>
									  </tr>
									    <tr style="margin-left:0px;margin-right:0px;padding-left:0px;padding-right:0px">                                 
											<td>    
												 @for ($i = 1; $i <= 17; $i++)
												 <?php $val=$check_av->dayAvailabilityFinal($roomInfo->room_id,session('st_date'),$i);?>
                                                                                                 <?php $mo_id=$roomInfo->room_id."mv".$i;?>
											      @if($val==0)
												  <a style="background-color:green" data-toggle="popover" data-placement="bottom" href="#" class="btn btn-light btn--icon-text" href=""><b>{{$i}}</b>
												   <label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" name="categories[]" value="{{$i}}">
														<span class="custom-control-indicator"></span>
													</label>
												  
												  </a>&nbsp
												  @elseif($val==1)
												  <!--<a style="background-color:purple" data-toggle="popover" data-placement="bottom"  href="#" class="btn btn-light btn--icon-text" href=""><b>{{$i}}</b>							  
												  </a>-->
<button style="background-color:purple" class="btn btn-light btn--icon-text" data-toggle="modal" data-target="#modal-xl{{$mo_id}}">{{$i}}</button>
&nbsp
												  @elseif($val>=2)
											     <!-- <a style="background-color:red" data-toggle="popover" data-placement="bottom" href="#" class="btn btn-light btn--icon-text" href=""><b>{{$i}}</b>							  
												  </a>-->
												  <button style="background-color:red" class="btn btn-light btn--icon-text" data-toggle="modal" data-target="#modal-xl{{$mo_id}}">{{$i}}</button>
												  &nbsp
											
												  @endif
										
												 @endfor									 
											</td>
										</tr>
										<tr style="margin-left:0px;margin-right:0px;padding-left:0px;padding-right:0px">                                 
											<td>    
												 @for ($i = 18; $i <= $days; $i++)
											      <?php $val1=$check_av->dayAvailabilityFinal($roomInfo->room_id,session('st_date'),$i);?>
                                                                                              <?php $mo_id2=$roomInfo->room_id."mv".$i;?>
												  @if($val1==0)
												  <a style="background-color:green" data-toggle="popover" data-placement="bottom" href="#" class="btn btn-light btn--icon-text" href=""><b>{{$i}}</b>
												   <label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" name="categories[]" value="{{$i}}">
														<span class="custom-control-indicator"></span>
													</label>
												  
												  </a>&nbsp
												  @elseif($val1==1)
												 <!-- <a style="background-color:purple" data-toggle="popover" data-placement="bottom" href="#" class="btn btn-light btn--icon-text" href=""><b>{{$i}}</b>							  
												  </a>-->
<button style="background-color:purple" class="btn btn-light btn--icon-text" data-toggle="modal" data-target="#modal-xl{{$mo_id2}}">{{$i}}</button>

&nbsp
												  @elseif($val1==2)
											      <!--<a style="background-color:red" data-toggle="popover" data-placement="bottom" href="#" class="btn btn-light btn--icon-text" href=""><b>{{$i}}</b>-->
												  <!--</a>-->
												  <button style="background-color:red" class="btn btn-light btn--icon-text" data-toggle="modal" data-target="#modal-xl{{$mo_id2}}">{{$i}}</button>
												  &nbsp
												  @elseif($val1==3)
												  <button style="background-color:#ff6600" class="btn btn-light btn--icon-text" data-toggle="modal" data-target="#modal-xlst{{$mo_id2}}">{{$i}}</button>
												  &nbsp
												  @endif
										
										
												 @endfor									 
											</td>
										</tr>
									@endforeach
									</tbody>
                                </table>

                           </div>

                    </div>
                </div>
				
				@foreach($roomInfos as $roomInfo)
				   @for ($i = 1; $i <= $days; $i++)
                    <?php $m_id=$roomInfo->room_id."mv".$i;?>
                    <div class="modal fade" id="modal-xl{{$m_id}}" tabindex="-1">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title pull-left">Booking History</h5>
                                </div>
                                <div class="modal-body">
                                    <table class="table mb-3">
                                    	<thead  class="thead-default">
                                    	<tr>
                                    		<th>#</th>
                                                <th>Room No</th>
                                    		<th>Customer Name</th>
                                    		<th>Booking Status</th>
                                    		<th>Check in date</th>
                                    		<th>Check out date</th>
                                    		<th>Action</th>
                                    	</tr>
                                    	</thead>
                                    	<tbody>
                                    	@inject('customer_info', 'App\Http\Controllers\SuperAdminController')
					@inject('check_av_hs', 'App\Http\Controllers\ReceptionistController')
                                        <?php $isAv=$check_av->dayAvailabilityFinal($roomInfo->room_id,session('st_date'),$i);?>


                                    	 @if($isAv!=0)
                                    	    <?php $row=0;$bookInfos=$check_av_hs->dayAvailabilityFinalHistory($roomInfo->room_id,session('st_date'),$i); ?>
                                    	  
                                            @foreach($bookInfos as $bookingInfo)
                                             <tr>
                                                <th scope="row">{{$row=$row+1}}</th>
                                                <td>{{$roomInfo->room_number}}</td>
                                                @if($bookingInfo->customer_id!=null or $bookingInfo->customer_id!="")

                                                <td>{{$customer_info->getCustomer($bookingInfo->customer_id)->cus_first_name}} {{$customer_info->getCustomer($bookingInfo->customer_id)->cus_last_name}}<br>{{$bookingInfo->invoice_id}}</td>
                                                @else
                                                <td>NULL<br>{{$bookingInfo->invoice_id}}</td>
                                                @endif
                                                
                                                <td><span style="background-color:green;padding:5px">Confirmed</span></td>
                                                <td>{{$bookingInfo->from_date}}</td>
                                                <td>{{$bookingInfo->to_date}}</td>
                                                <td><a data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="Direct To Payment" href="{{route('res_bill_payment', ['id'=>$bookingInfo->invoice_id])}}" class="btn btn-light btn--icon-text" href=""><i class="zmdi zmdi-money"></i></a>&nbsp
                                                    <a data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="Check out payment" href="{{route('res_pay_check', ['id'=>$bookingInfo->invoice_id])}}" class="btn btn-light btn--icon-text" href=""><i class="zmdi zmdi-shopping-cart"></i></a>
                                                    <a data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="Go to booking list" href="{{route('res_direct_to_booking_list', ['id'=>$bookingInfo->booking_id])}}" class="btn btn-light btn--icon-text" href=""><i class="zmdi zmdi-format-list-bulleted"></i></a>
                                                    <a data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="Make Orders For Meals" href="{{route('res_re_meals_booking', ['id'=>$bookingInfo->booking_id])}}" class="btn btn-light btn--icon-text" href=""><i class="zmdi zmdi-cutlery"></i></a>
                                                    <a data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="Make Booking For Airport Pick Up/Drop" href="{{route('res_re_air_booking', ['id'=>$bookingInfo->booking_id])}}" class="btn btn-light btn--icon-text" href=""><i class="zmdi zmdi-car-taxi"></i></a>
                                                    <a data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="Add another booking for invoice" href="{{route('res_re_room_booking', ['id'=>$bookingInfo->booking_id])}}" class="btn btn-light btn--icon-text" ><i class="zmdi zmdi-hotel"></i></a>
													<a style="background-color:#ff6600" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="Change Booking Confirm Status" href="{{route('res_not_confirm_booking_monthly', ['id'=>$bookingInfo->booking_id])}}" class="btn btn-light btn--icon-text" ><i class="zmdi zmdi-check"></i></a>
                                                    </td>
                                            </tr>   
                                            @endforeach
                                         @endif

                                    	</tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
					@endfor
                @endforeach


				@foreach($roomInfos as $roomInfo)
				   @for ($i = 1; $i <= $days; $i++)
                    <?php $m_id=$roomInfo->room_id."mv".$i;?>
                    <div class="modal fade" id="modal-xlst{{$m_id}}" tabindex="-1">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title pull-left">Booking History</h5>
                                </div>
                                <div class="modal-body">
                                    <table class="table mb-3">
                                    	<thead  class="thead-default">
                                    	<tr>
											<th>#</th>
											<th>Room No</th>
											<th>Customer Name</th>
											<th>Check in date</th>
											<th>Check out date</th>
											<th>Booking Status</th>
											<th>Action</th>
                                    	</tr>
                                    	</thead>
                                    	<tbody>
                                    	@inject('customer_info', 'App\Http\Controllers\SuperAdminController')
					@inject('check_av_hs', 'App\Http\Controllers\ReceptionistController')
                                        <?php $isAv=$check_av->dayAvailabilityFinal($roomInfo->room_id,session('st_date'),$i);?>


                                    	 @if($isAv!=0)
                                    	    <?php $row=0;$bookInfos=$check_av_hs->dayAvailabilityFinalHistory($roomInfo->room_id,session('st_date'),$i); ?>
                                    	  
                                            @foreach($bookInfos as $bookingInfo)
                                             <tr>
                                                <th scope="row">{{$row=$row+1}}</th>
                                                <td>{{$roomInfo->room_number}}</td>
                                                @if($bookingInfo->customer_id!=null or $bookingInfo->customer_id!="")

                                                <td>{{$customer_info->getCustomer($bookingInfo->customer_id)->cus_first_name}} {{$customer_info->getCustomer($bookingInfo->customer_id)->cus_last_name}}<br>{{$bookingInfo->invoice_id}}</td>
                                                @else
                                                <td>NULL<br>{{$bookingInfo->invoice_id}}</td>
                                                @endif
                                                <td>{{$bookingInfo->from_date}}</td>
                                                <td>{{$bookingInfo->to_date}}</td>
												<td><span style="background-color:green;padding:5px">Not confirmed yet<span></td>
                                                <td><a style="background-color:green" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="Confirm to booking" href="{{route('res_confirm_booking_monthly', ['id'=>$bookingInfo->booking_id])}}" class="btn btn-light btn--icon-text" href=""><i class="zmdi zmdi-check"></i></a>&nbsp
                                                    <a style="background-color:red" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="Remove Booking" href="{{route('res_remove_not_confirm_booking_monthly', ['id'=>$bookingInfo->booking_id])}}"  class="btn btn-light btn--icon-text"><i class="zmdi zmdi-delete"></i></a>
                                                    </td>
                                            </tr>   
                                            @endforeach
                                         @endif

                                    	</tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
					@endfor
                @endforeach

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
        <script src="{{ asset('form_validations/res_form_validations.js') }}"></script>

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
   



    </body>
</html>