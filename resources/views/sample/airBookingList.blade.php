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

    <body data-sa-theme="7">
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
                    <h1><a href="index.html">Super Admin 2.0</a></h1>
                </div>

                <form class="search">
                    <div class="search__inner">
                        <input type="text" class="search__text" placeholder="Search for people, files, documents...">
                        <i class="zmdi zmdi-search search__helper" data-sa-action="search-close"></i>
                    </div>
                </form>

                <ul class="top-nav">
                    <li class="hidden-xl-up"><a href="" data-sa-action="search-open"><i class="zmdi zmdi-search"></i></a></li>

                    <li class="dropdown">
                        <a href="" data-toggle="dropdown" class="top-nav__notify"><i class="zmdi zmdi-email"></i></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu--block">
                            <div class="dropdown-header">
                                Messages

                                <div class="actions">
                                    <a href="messages.html" class="actions__item zmdi zmdi-plus"></a>
                                </div>
                            </div>

                            <div class="listview listview--hover">
                                <a href="" class="listview__item">
                                    <img src="demo/img/profile-pics/1.jpg" class="listview__img" alt="">

                                    <div class="listview__content">
                                        <div class="listview__heading">
                                            David Belle <small>12:01 PM</small>
                                        </div>
                                        <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                    </div>
                                </a>

                                <a href="" class="listview__item">
                                    <img src="demo/img/profile-pics/2.jpg" class="listview__img" alt="">

                                    <div class="listview__content">
                                        <div class="listview__heading">
                                            Jonathan Morris
                                            <small>02:45 PM</small>
                                        </div>
                                        <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                                    </div>
                                </a>

                                <a href="" class="listview__item">
                                    <img src="demo/img/profile-pics/3.jpg" class="listview__img" alt="">

                                    <div class="listview__content">
                                        <div class="listview__heading">
                                            Fredric Mitchell Jr.
                                            <small>08:21 PM</small>
                                        </div>
                                        <p>Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</p>
                                    </div>
                                </a>

                                <a href="" class="listview__item">
                                    <img src="demo/img/profile-pics/4.jpg" class="listview__img" alt="">

                                    <div class="listview__content">
                                        <div class="listview__heading">
                                            Glenn Jecobs
                                            <small>08:43 PM</small>
                                        </div>
                                        <p>Ut vitae lacus sem ellentesque maximus, nunc sit amet varius dignissim, dui est consectetur neque</p>
                                    </div>
                                </a>

                                <a href="" class="listview__item">
                                    <img src="demo/img/profile-pics/5.jpg" class="listview__img" alt="">

                                    <div class="listview__content">
                                        <div class="listview__heading">
                                            Bill Phillips
                                            <small>11:32 PM</small>
                                        </div>
                                        <p>Proin laoreet commodo eros id faucibus. Donec ligula quam, imperdiet vel ante placerat</p>
                                    </div>
                                </a>

                                <a href="" class="view-more">View all messages</a>
                            </div>
                        </div>
                    </li>

                    <li class="dropdown top-nav__notifications">
                        <a href="" data-toggle="dropdown" class="top-nav__notify">
                            <i class="zmdi zmdi-notifications"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu--block">
                            <div class="dropdown-header">
                                Notifications

                                <div class="actions">
                                    <a href="" class="actions__item zmdi zmdi-check-all" data-sa-action="notifications-clear"></a>
                                </div>
                            </div>

                            <div class="listview listview--hover">
                                <div class="listview__scroll scrollbar-inner">
                                    <a href="" class="listview__item">
                                        <img src="demo/img/profile-pics/1.jpg" class="listview__img" alt="">

                                        <div class="listview__content">
                                            <div class="listview__heading">David Belle</div>
                                            <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                        </div>
                                    </a>

                                    <a href="" class="listview__item">
                                        <img src="demo/img/profile-pics/2.jpg" class="listview__img" alt="">

                                        <div class="listview__content">
                                            <div class="listview__heading">Jonathan Morris</div>
                                            <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                                        </div>
                                    </a>

                                    <a href="" class="listview__item">
                                        <img src="demo/img/profile-pics/3.jpg" class="listview__img" alt="">

                                        <div class="listview__content">
                                            <div class="listview__heading">Fredric Mitchell Jr.</div>
                                            <p>Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</p>
                                        </div>
                                    </a>

                                    <a href="" class="listview__item">
                                        <img src="demo/img/profile-pics/4.jpg" class="listview__img" alt="">

                                        <div class="listview__content">
                                            <div class="listview__heading">Glenn Jecobs</div>
                                            <p>Ut vitae lacus sem ellentesque maximus, nunc sit amet varius dignissim, dui est consectetur neque</p>
                                        </div>
                                    </a>

                                    <a href="" class="listview__item">
                                        <img src="demo/img/profile-pics/5.jpg" class="listview__img" alt="">

                                        <div class="listview__content">
                                            <div class="listview__heading">Bill Phillips</div>
                                            <p>Proin laoreet commodo eros id faucibus. Donec ligula quam, imperdiet vel ante placerat</p>
                                        </div>
                                    </a>

                                    <a href="" class="listview__item">
                                        <img src="demo/img/profile-pics/1.jpg" class="listview__img" alt="">

                                        <div class="listview__content">
                                            <div class="listview__heading">David Belle</div>
                                            <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                        </div>
                                    </a>

                                    <a href="" class="listview__item">
                                        <img src="demo/img/profile-pics/2.jpg" class="listview__img" alt="">

                                        <div class="listview__content">
                                            <div class="listview__heading">Jonathan Morris</div>
                                            <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                                        </div>
                                    </a>

                                    <a href="" class="listview__item">
                                        <img src="demo/img/profile-pics/3.jpg" class="listview__img" alt="">

                                        <div class="listview__content">
                                            <div class="listview__heading">Fredric Mitchell Jr.</div>
                                            <p>Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="p-1"></div>
                            </div>
                        </div>
                    </li>

                    <li class="dropdown hidden-xs-down">
                        <a href="" data-toggle="dropdown"><i class="zmdi zmdi-check-circle"></i></a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-menu--block" role="menu">
                            <div class="dropdown-header">Tasks</div>

                            <div class="listview listview--hover">
                                <a href="" class="listview__item">
                                    <div class="listview__content">
                                        <div class="listview__heading">HTML5 Validation Report</div>

                                        <div class="progress mt-1">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="listview__item">
                                    <div class="listview__content">
                                        <div class="listview__heading">Google Chrome Extension</div>

                                        <div class="progress mt-1">
                                            <div class="progress-bar bg-warning" style="width: 43%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="listview__item">
                                    <div class="listview__content">
                                        <div class="listview__heading">Social Intranet Projects</div>

                                        <div class="progress mt-1">
                                            <div class="progress-bar bg-success" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="listview__item">
                                    <div class="listview__content">
                                        <div class="listview__heading">Bootstrap Admin Template</div>

                                        <div class="progress mt-1">
                                            <div class="progress-bar bg-info" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="listview__item">
                                    <div class="listview__content">
                                        <div class="listview__heading">Youtube Client App</div>

                                        <div class="progress mt-1">
                                            <div class="progress-bar bg-danger" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="view-more">View all Tasks</a>
                            </div>
                        </div>
                    </li>

                    <li class="dropdown hidden-xs-down">
                        <a href="" data-toggle="dropdown"><i class="zmdi zmdi-apps"></i></a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-menu--block" role="menu">
                            <div class="row app-shortcuts">
                                <a class="col-4 app-shortcuts__item" href="">
                                    <i class="zmdi zmdi-calendar"></i>
                                    <small class="">Calendar</small>
                                </a>
                                <a class="col-4 app-shortcuts__item" href="">
                                    <i class="zmdi zmdi-file-text"></i>
                                    <small class="">Files</small>
                                </a>
                                <a class="col-4 app-shortcuts__item" href="">
                                    <i class="zmdi zmdi-email"></i>
                                    <small class="">Email</small>
                                </a>
                                <a class="col-4 app-shortcuts__item" href="">
                                    <i class="zmdi zmdi-trending-up"></i>
                                    <small class="">Reports</small>
                                </a>
                                <a class="col-4 app-shortcuts__item" href="">
                                    <i class="zmdi zmdi-view-headline"></i>
                                    <small class="">News</small>
                                </a>
                                <a class="col-4 app-shortcuts__item" href="">
                                    <i class="zmdi zmdi-image"></i>
                                    <small class="">Gallery</small>
                                </a>
                            </div>
                        </div>
                    </li>

                    <li class="dropdown hidden-xs-down">
                        <a href="" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-item theme-switch">
                                Theme Switch

                                <div class="btn-group btn-group--colors mt-2 d-block" data-toggle="buttons">
                                    <label class="btn active border-0" style="background-color: #772036"><input type="radio" value="1" autocomplete="off" checked></label>
                                    <label class="btn border-0" style="background-color: #273C5B"><input type="radio" value="2" autocomplete="off"></label>
                                    <label class="btn border-0" style="background-color: #174042"><input type="radio" value="3" autocomplete="off"></label>
                                    <label class="btn border-0" style="background-color: #383844"><input type="radio" value="4" autocomplete="off"></label>
                                    <label class="btn border-0" style="background-color: #49423F"><input type="radio" value="5" autocomplete="off"></label>

                                    <br>

                                    <label class="btn border-0" style="background-color: #5e3d22"><input type="radio" value="6" autocomplete="off"></label>
                                    <label class="btn border-0" style="background-color: #234d6d"><input type="radio" value="7" autocomplete="off"></label>
                                    <label class="btn border-0" style="background-color: #3b5e5e"><input type="radio" value="8" autocomplete="off"></label>
                                    <label class="btn border-0" style="background-color: #0a4c3e"><input type="radio" value="9" autocomplete="off"></label>
                                    <label class="btn border-0" style="background-color: #7b3d54"><input type="radio" value="10" autocomplete="off"></label>
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
                                <div class="user__name">Malinda Hollaway</div>
                                <div class="user__email">malinda-h@gmail.com</div>
                            </div>
                        </div>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="">View Profile</a>
                            <a class="dropdown-item" href="">Settings</a>
                            <a class="dropdown-item" href="">Logout</a>
                        </div>
                    </div>

                    <ul class="navigation">
                       <li class="@indexactivehp"><a href="{{route('admin_home')}}"><i class="zmdi zmdi-home"></i> Home</a></li>

                       <li class="navigation__sub @@uiactive">
                         <a href=""><i class="zmdi zmdi-hotel zmdi-hc-fw"></i> Rooms Booking</a>

                         <ul>
                          <li class="@@cssanimationsactive"><a href="{{route('admin_available_rooms_index')}}">Check Availability</a></li>
                          <li class="@@colorsactive"><a href="{{route('admin_index_booking_info', ['id'=>session('s_room_id')])}}">Add Booking</a></li>
                          <li class="@@cssanimationsactive"><a href="{{route('booking_list')}}">Booking List</a></li>

                          <li class="@@cssanimationsactive"><a href="{{route('admin_index_add_room')}}">Add Rooms</a></li>
                          <li class="@@colorsactive"><a href="{{route('admin_room_list')}}">Room List</a></li>
                         </ul>
                       </li>
                       <li class="navigation__sub navigation__sub--active navigation__sub--toggled">
                         <a href=""><i class="zmdi zmdi-cutlery zmdi-hc-fw"></i> Meals Order</a>


                         <ul>
                          <li class="@@colorsactive"><a href="{{route('admin_index_order_meals')}}">Choose Meals</a></li>
                          <li class="navigation__active"><a href="{{route('admin_index_order_list')}}">Order List</a></li>
                          <li class="@@colorsactive"><a href="{{route('admin_add_meals')}}">Add Meals</a></li>
                          <li class="@@cssanimationsactive"><a href="{{route('admin_meals_list')}}">Meals List</a></li>

                         </ul>
                       </li>
                       <li class="navigation__sub @@uiactive">
                         <a href=""><i class="zmdi zmdi-accounts-list-alt zmdi-hc-fw"></i> Customers</a>

                         <ul>
                          <li class="@@colorsactive"><a href="colors.html">Customer List</a></li>
                         </ul>
                       </li>
                       <li class="navigation__sub @@uiactive">
                        <a href=""><i class="zmdi zmdi-accounts-alt"></i> User</a>

                        <ul>
                         <li class="@@colorsactive"><a href="{{route('admin_index_add_user')}}">Add User</a></li>
                         <li class="@@colorsactive"><a href="#">Users List</a></li>

                        </ul>

                       </li>
                       <li class="navigation__sub @@uiactive">
                         <a href=""><i class="zmdi zmdi-account-box"></i> Account</a>

                         <ul>
                          <li class="@@colorsactive"><a href="colors.html">My Info</a></li>
                         </ul>
                       </li>
                       <li class="navigation__sub @@uiactive">
                         <a href=""><i class="zmdi zmdi-lock"></i> Log Out</a>
                       </li>
                    </ul>
                </div>
            </aside>

            <section class="content">
                <header class="content__title">
                    <h1>Order List</h1>


                    <div class="actions">
                            <a href="{{route('admin_room_list')}}" class="actions__item zmdi zmdi-refresh"></a>
                            {{--<a href="" class="actions__item zmdi zmdi-check-all"></a>--}}

                            {{--<div class="dropdown actions__item">--}}
                                {{--<i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>--}}
                                {{--<div class="dropdown-menu dropdown-menu-right">--}}
                                    {{--<a href="" class="dropdown-item">Refresh</a>--}}
                                    {{--<a href="" class="dropdown-item">Manage Widgets</a>--}}
                                    {{--<a href="" class="dropdown-item">Settings</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                    </div>
                </header>
                
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
                        @endif
                        {{--<h4 class="card-title">Basic example</h4>--}}
                        {{--<h6 class="card-subtitle">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table.</h6>--}}

                        <div class="table-responsive">
                         @inject('meals_details', 'App\Http\Controllers\SuperAdminController')
                         @inject('booking_details', 'App\Http\Controllers\SuperAdminController')
                         @inject('room_details', 'App\Http\Controllers\SuperAdminController')
                         @inject('cus_details', 'App\Http\Controllers\SuperAdminController')
                            <table id="data-table" class="table">
                                <thead>
                                    <tr style="font-size: 16px;font-weight: bold">
                                        <th><i>Customer Name</i></th>
                                        <th><i>Booking Type</i></th>
                                        <th><i>No Of Passengers</i></th>
                                        <th><i>Booking Date</i></th>
                                        <th><i>Booking Time</i></th>
                                        <th><i>Room No</i></th>
                                        <th><i>Action</i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($aBookingInfos as $aBookingInfo)
                                	<tr style="font-size: 16px">
                                		<td>
                                		   {{$aBookingInfo->booking_id}}
                                		</td>
                                		<td>
                                		  {{$aBookingInfo->a_booking_type}}

                                		</td>
                                		<td>{{$aBookingInfo->no_of_passengers}}</td>

                                		<td>{{$aBookingInfo->a_booking_date}}</td>
                                		<td>{{$aBookingInfo->a_booking_time}}</td>

                                		<td>{{$room_details->getRoomDetails($booking_details->getBookingInfo($aBookingInfo->booking_id)->room_id)->room_number}}</td>

                                		<td><a href="{{route('index_update_user', ['id'=>$aBookingInfo->a_booking_id])}}" class="btn btn-light" href=""><i style="font-size: 18px" class="zmdi zmdi-border-color"></i></a>&nbsp
                                		<button class="btn btn-light" data-toggle="modal" data-target="#modal-default{{$orderInfo->order_id}}"><i style="font-size: 18px" class="zmdi zmdi-delete"></i> </button>
                                		</td>
                                	</tr>
                                @endforeach
                                    {{--<tr>--}}
                                        {{--<td>Garrett Winters</td>--}}
                                        {{--<td>Accountant</td>--}}
                                        {{--<td>Tokyo</td>--}}
                                        {{--<td>63</td>--}}
                                        {{--<td>2011/07/25</td>--}}
                                        {{--<td>$170,750</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Ashton Cox</td>--}}
                                        {{--<td>Junior Technical Author</td>--}}
                                        {{--<td>San Francisco</td>--}}
                                        {{--<td>66</td>--}}
                                        {{--<td>2009/01/12</td>--}}
                                        {{--<td>$86,000</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Cedric Kelly</td>--}}
                                        {{--<td>Senior Javascript Developer</td>--}}
                                        {{--<td>Edinburgh</td>--}}
                                        {{--<td>22</td>--}}
                                        {{--<td>2012/03/29</td>--}}
                                        {{--<td>$433,060</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Airi Satou</td>--}}
                                        {{--<td>Accountant</td>--}}
                                        {{--<td>Tokyo</td>--}}
                                        {{--<td>33</td>--}}
                                        {{--<td>2008/11/28</td>--}}
                                        {{--<td>$162,700</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Brielle Williamson</td>--}}
                                        {{--<td>Integration Specialist</td>--}}
                                        {{--<td>New York</td>--}}
                                        {{--<td>61</td>--}}
                                        {{--<td>2012/12/02</td>--}}
                                        {{--<td>$372,000</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Herrod Chandler</td>--}}
                                        {{--<td>Sales Assistant</td>--}}
                                        {{--<td>San Francisco</td>--}}
                                        {{--<td>59</td>--}}
                                        {{--<td>2012/08/06</td>--}}
                                        {{--<td>$137,500</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Rhona Davidson</td>--}}
                                        {{--<td>Integration Specialist</td>--}}
                                        {{--<td>Tokyo</td>--}}
                                        {{--<td>55</td>--}}
                                        {{--<td>2010/10/14</td>--}}
                                        {{--<td>$327,900</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Colleen Hurst</td>--}}
                                        {{--<td>Javascript Developer</td>--}}
                                        {{--<td>San Francisco</td>--}}
                                        {{--<td>39</td>--}}
                                        {{--<td>2009/09/15</td>--}}
                                        {{--<td>$205,500</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Sonya Frost</td>--}}
                                        {{--<td>Software Engineer</td>--}}
                                        {{--<td>Edinburgh</td>--}}
                                        {{--<td>23</td>--}}
                                        {{--<td>2008/12/13</td>--}}
                                        {{--<td>$103,600</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Jena Gaines</td>--}}
                                        {{--<td>Office Manager</td>--}}
                                        {{--<td>London</td>--}}
                                        {{--<td>30</td>--}}
                                        {{--<td>2008/12/19</td>--}}
                                        {{--<td>$90,560</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Quinn Flynn</td>--}}
                                        {{--<td>Support Lead</td>--}}
                                        {{--<td>Edinburgh</td>--}}
                                        {{--<td>22</td>--}}
                                        {{--<td>2013/03/03</td>--}}
                                        {{--<td>$342,000</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Charde Marshall</td>--}}
                                        {{--<td>Regional Director</td>--}}
                                        {{--<td>San Francisco</td>--}}
                                        {{--<td>36</td>--}}
                                        {{--<td>2008/10/16</td>--}}
                                        {{--<td>$470,600</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Haley Kennedy</td>--}}
                                        {{--<td>Senior Marketing Designer</td>--}}
                                        {{--<td>London</td>--}}
                                        {{--<td>43</td>--}}
                                        {{--<td>2012/12/18</td>--}}
                                        {{--<td>$313,500</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Tatyana Fitzpatrick</td>--}}
                                        {{--<td>Regional Director</td>--}}
                                        {{--<td>London</td>--}}
                                        {{--<td>19</td>--}}
                                        {{--<td>2010/03/17</td>--}}
                                        {{--<td>$385,750</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Michael Silva</td>--}}
                                        {{--<td>Marketing Designer</td>--}}
                                        {{--<td>London</td>--}}
                                        {{--<td>66</td>--}}
                                        {{--<td>2012/11/27</td>--}}
                                        {{--<td>$198,500</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Paul Byrd</td>--}}
                                        {{--<td>Chief Financial Officer (CFO)</td>--}}
                                        {{--<td>New York</td>--}}
                                        {{--<td>64</td>--}}
                                        {{--<td>2010/06/09</td>--}}
                                        {{--<td>$725,000</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Gloria Little</td>--}}
                                        {{--<td>Systems Administrator</td>--}}
                                        {{--<td>New York</td>--}}
                                        {{--<td>59</td>--}}
                                        {{--<td>2009/04/10</td>--}}
                                        {{--<td>$237,500</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Bradley Greer</td>--}}
                                        {{--<td>Software Engineer</td>--}}
                                        {{--<td>London</td>--}}
                                        {{--<td>41</td>--}}
                                        {{--<td>2012/10/13</td>--}}
                                        {{--<td>$132,000</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Dai Rios</td>--}}
                                        {{--<td>Personnel Lead</td>--}}
                                        {{--<td>Edinburgh</td>--}}
                                        {{--<td>35</td>--}}
                                        {{--<td>2012/09/26</td>--}}
                                        {{--<td>$217,500</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Jenette Caldwell</td>--}}
                                        {{--<td>Development Lead</td>--}}
                                        {{--<td>New York</td>--}}
                                        {{--<td>30</td>--}}
                                        {{--<td>2011/09/03</td>--}}
                                        {{--<td>$345,000</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Yuri Berry</td>--}}
                                        {{--<td>Chief Marketing Officer (CMO)</td>--}}
                                        {{--<td>New York</td>--}}
                                        {{--<td>40</td>--}}
                                        {{--<td>2009/06/25</td>--}}
                                        {{--<td>$675,000</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Caesar Vance</td>--}}
                                        {{--<td>Pre-Sales Support</td>--}}
                                        {{--<td>New York</td>--}}
                                        {{--<td>21</td>--}}
                                        {{--<td>2011/12/12</td>--}}
                                        {{--<td>$106,450</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Doris Wilder</td>--}}
                                        {{--<td>Sales Assistant</td>--}}
                                        {{--<td>Sidney</td>--}}
                                        {{--<td>23</td>--}}
                                        {{--<td>2010/09/20</td>--}}
                                        {{--<td>$85,600</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Angelica Ramos</td>--}}
                                        {{--<td>Chief Executive Officer (CEO)</td>--}}
                                        {{--<td>London</td>--}}
                                        {{--<td>47</td>--}}
                                        {{--<td>2009/10/09</td>--}}
                                        {{--<td>$1,200,000</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Gavin Joyce</td>--}}
                                        {{--<td>Developer</td>--}}
                                        {{--<td>Edinburgh</td>--}}
                                        {{--<td>42</td>--}}
                                        {{--<td>2010/12/22</td>--}}
                                        {{--<td>$92,575</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Jennifer Chang</td>--}}
                                        {{--<td>Regional Director</td>--}}
                                        {{--<td>Singapore</td>--}}
                                        {{--<td>28</td>--}}
                                        {{--<td>2010/11/14</td>--}}
                                        {{--<td>$357,650</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Brenden Wagner</td>--}}
                                        {{--<td>Software Engineer</td>--}}
                                        {{--<td>San Francisco</td>--}}
                                        {{--<td>28</td>--}}
                                        {{--<td>2011/06/07</td>--}}
                                        {{--<td>$206,850</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Fiona Green</td>--}}
                                        {{--<td>Chief Operating Officer (COO)</td>--}}
                                        {{--<td>San Francisco</td>--}}
                                        {{--<td>48</td>--}}
                                        {{--<td>2010/03/11</td>--}}
                                        {{--<td>$850,000</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Shou Itou</td>--}}
                                        {{--<td>Regional Marketing</td>--}}
                                        {{--<td>Tokyo</td>--}}
                                        {{--<td>20</td>--}}
                                        {{--<td>2011/08/14</td>--}}
                                        {{--<td>$163,000</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Michelle House</td>--}}
                                        {{--<td>Integration Specialist</td>--}}
                                        {{--<td>Sidney</td>--}}
                                        {{--<td>37</td>--}}
                                        {{--<td>2011/06/02</td>--}}
                                        {{--<td>$95,400</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Suki Burks</td>--}}
                                        {{--<td>Developer</td>--}}
                                        {{--<td>London</td>--}}
                                        {{--<td>53</td>--}}
                                        {{--<td>2009/10/22</td>--}}
                                        {{--<td>$114,500</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Prescott Bartlett</td>--}}
                                        {{--<td>Technical Author</td>--}}
                                        {{--<td>London</td>--}}
                                        {{--<td>27</td>--}}
                                        {{--<td>2011/05/07</td>--}}
                                        {{--<td>$145,000</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Gavin Cortez</td>--}}
                                        {{--<td>Team Leader</td>--}}
                                        {{--<td>San Francisco</td>--}}
                                        {{--<td>22</td>--}}
                                        {{--<td>2008/10/26</td>--}}
                                        {{--<td>$235,500</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Martena Mccray</td>--}}
                                        {{--<td>Post-Sales support</td>--}}
                                        {{--<td>Edinburgh</td>--}}
                                        {{--<td>46</td>--}}
                                        {{--<td>2011/03/09</td>--}}
                                        {{--<td>$324,050</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Unity Butler</td>--}}
                                        {{--<td>Marketing Designer</td>--}}
                                        {{--<td>San Francisco</td>--}}
                                        {{--<td>47</td>--}}
                                        {{--<td>2009/12/09</td>--}}
                                        {{--<td>$85,675</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Howard Hatfield</td>--}}
                                        {{--<td>Office Manager</td>--}}
                                        {{--<td>San Francisco</td>--}}
                                        {{--<td>51</td>--}}
                                        {{--<td>2008/12/16</td>--}}
                                        {{--<td>$164,500</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Hope Fuentes</td>--}}
                                        {{--<td>Secretary</td>--}}
                                        {{--<td>San Francisco</td>--}}
                                        {{--<td>41</td>--}}
                                        {{--<td>2010/02/12</td>--}}
                                        {{--<td>$109,850</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Vivian Harrell</td>--}}
                                        {{--<td>Financial Controller</td>--}}
                                        {{--<td>San Francisco</td>--}}
                                        {{--<td>62</td>--}}
                                        {{--<td>2009/02/14</td>--}}
                                        {{--<td>$452,500</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Timothy Mooney</td>--}}
                                        {{--<td>Office Manager</td>--}}
                                        {{--<td>London</td>--}}
                                        {{--<td>37</td>--}}
                                        {{--<td>2008/12/11</td>--}}
                                        {{--<td>$136,200</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Jackson Bradshaw</td>--}}
                                        {{--<td>Director</td>--}}
                                        {{--<td>New York</td>--}}
                                        {{--<td>65</td>--}}
                                        {{--<td>2008/09/26</td>--}}
                                        {{--<td>$645,750</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Olivia Liang</td>--}}
                                        {{--<td>Support Engineer</td>--}}
                                        {{--<td>Singapore</td>--}}
                                        {{--<td>64</td>--}}
                                        {{--<td>2011/02/03</td>--}}
                                        {{--<td>$234,500</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Bruno Nash</td>--}}
                                        {{--<td>Software Engineer</td>--}}
                                        {{--<td>London</td>--}}
                                        {{--<td>38</td>--}}
                                        {{--<td>2011/05/03</td>--}}
                                        {{--<td>$163,500</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Sakura Yamamoto</td>--}}
                                        {{--<td>Support Engineer</td>--}}
                                        {{--<td>Tokyo</td>--}}
                                        {{--<td>37</td>--}}
                                        {{--<td>2009/08/19</td>--}}
                                        {{--<td>$139,575</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Thor Walton</td>--}}
                                        {{--<td>Developer</td>--}}
                                        {{--<td>New York</td>--}}
                                        {{--<td>61</td>--}}
                                        {{--<td>2013/08/11</td>--}}
                                        {{--<td>$98,540</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Finn Camacho</td>--}}
                                        {{--<td>Support Engineer</td>--}}
                                        {{--<td>San Francisco</td>--}}
                                        {{--<td>47</td>--}}
                                        {{--<td>2009/07/07</td>--}}
                                        {{--<td>$87,500</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Serge Baldwin</td>--}}
                                        {{--<td>Data Coordinator</td>--}}
                                        {{--<td>Singapore</td>--}}
                                        {{--<td>64</td>--}}
                                        {{--<td>2012/04/09</td>--}}
                                        {{--<td>$138,575</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Zenaida Frank</td>--}}
                                        {{--<td>Software Engineer</td>--}}
                                        {{--<td>New York</td>--}}
                                        {{--<td>63</td>--}}
                                        {{--<td>2010/01/04</td>--}}
                                        {{--<td>$125,250</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Zorita Serrano</td>--}}
                                        {{--<td>Software Engineer</td>--}}
                                        {{--<td>San Francisco</td>--}}
                                        {{--<td>56</td>--}}
                                        {{--<td>2012/06/01</td>--}}
                                        {{--<td>$115,000</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Jennifer Acosta</td>--}}
                                        {{--<td>Junior Javascript Developer</td>--}}
                                        {{--<td>Edinburgh</td>--}}
                                        {{--<td>43</td>--}}
                                        {{--<td>2013/02/01</td>--}}
                                        {{--<td>$75,650</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Cara Stevens</td>--}}
                                        {{--<td>Sales Assistant</td>--}}
                                        {{--<td>New York</td>--}}
                                        {{--<td>46</td>--}}
                                        {{--<td>2011/12/06</td>--}}
                                        {{--<td>$145,600</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Hermione Butler</td>--}}
                                        {{--<td>Regional Director</td>--}}
                                        {{--<td>London</td>--}}
                                        {{--<td>47</td>--}}
                                        {{--<td>2011/03/21</td>--}}
                                        {{--<td>$356,250</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Lael Greer</td>--}}
                                        {{--<td>Systems Administrator</td>--}}
                                        {{--<td>London</td>--}}
                                        {{--<td>21</td>--}}
                                        {{--<td>2009/02/27</td>--}}
                                        {{--<td>$103,500</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Jonas Alexander</td>--}}
                                        {{--<td>Developer</td>--}}
                                        {{--<td>San Francisco</td>--}}
                                        {{--<td>30</td>--}}
                                        {{--<td>2010/07/14</td>--}}
                                        {{--<td>$86,500</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Shad Decker</td>--}}
                                        {{--<td>Regional Director</td>--}}
                                        {{--<td>Edinburgh</td>--}}
                                        {{--<td>51</td>--}}
                                        {{--<td>2008/11/13</td>--}}
                                        {{--<td>$183,000</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Michael Bruce</td>--}}
                                        {{--<td>Javascript Developer</td>--}}
                                        {{--<td>Singapore</td>--}}
                                        {{--<td>29</td>--}}
                                        {{--<td>2011/06/27</td>--}}
                                        {{--<td>$183,000</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>Donna Snider</td>--}}
                                        {{--<td>Customer Support</td>--}}
                                        {{--<td>New York</td>--}}
                                        {{--<td>27</td>--}}
                                        {{--<td>2011/01/25</td>--}}
                                        {{--<td>$112,000</td>--}}
                                    {{--</tr>--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                 {{--@foreach($roomInfos as $roomInfo)--}}

                 {{--<div class="modal fade" id="modal-default{{$roomInfo->room_id}}" tabindex="-1">--}}
                    {{--<div class="modal-dialog">--}}
                        {{--<div class="modal-content">--}}
                            {{--<div class="modal-header">--}}
                                {{--<h5 class="modal-title pull-left">Make sure to remove receptionist</h5>--}}
                            {{--</div>--}}
                            {{--<div class="modal-body" style="font-size: 16px">--}}
                                {{--<div class="stats__chart" style="text-align: center">--}}
                                    {{--<i class="zmdi zmdi-info-outline zmdi-hc-5x"></i>--}}
                                    {{--<img class="cir__img" src="{{ asset('demo/img/home/booking.jpg') }}" class="img-circle">--}}
                                {{--</div>--}}
                                {{--Please make sure customer <strong>{{$roomInfo->room_number}}</strong> remove from the system. If you approve room number <strong>{{$roomInfo->room_number}}</strong> will <strong>permanently remove</strong> from the system.--}}
                            {{--</div>--}}
                            {{--<div class="modal-footer">--}}
                                {{--<a href="{{route('remove_user', ['id'=>$roomInfo->room_id])}}" class="btn btn-link">Approve</a>--}}
                                {{--<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--@endforeach--}}


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



    </body>
</html>