<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="SYSTEM NELLY MARINE is a Fully web based centralize hotel property management software and booking system with Channel Manager (Access from anywhere with any device). Its a next generation application framework combines state-of-the-art technology with advanced user features to deliver the hospitality industry's most flexible and easy-to-use reservation and distribution solution">
<meta name="google-site-verification" content="mCJKyKdllAoyprueoPA5xYteKgTyegQg1UR0U83Wcbk"/>
<title>System Login</title>
<meta name="robots" content="index,follow">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="{{ asset('vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/bower_components/animate.css/animate.min.css') }}">

        <!-- App styles -->
        <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
         <script>
            function loginFormValidation(){
               var loginId=document.login_form.user_login_id.value;
               var password=document.login_form.user_password.value;
               var msgElement=document.getElementById("alert_msg");
                if(loginId==null || loginId==""){
                msgElement.innerHTML="<br><div class='alert alert-danger' role='alert'>"
                                                                  +" <strong>Empty user login Id.</strong><br> Please enter the login Id.";
                                                               +"</div>";
                return false;
               }

               else if(password==null || password==""){
                msgElement.innerHTML="<br><div class='alert alert-danger' role='alert'>"
                                                                                  +" <strong>Empty Password.</strong><br> Please enter the password.";
                                                                               +"</div>";
                return false;
               }

            }
         </script>
    </head>

    <body data-sa-theme="7">
        <div class="login">

            <!-- Login -->
            <div class="login__block active" id="l-login">
                <div class="login__block__header">
                    <i class="zmdi zmdi-account-circle"></i>
                    Hi there! Please Sign in

                    {{--<div class="actions actions--inverse login__block__actions">--}}
                        {{--<div class="dropdown">--}}
                            {{--<i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>--}}

                            {{--<div class="dropdown-menu dropdown-menu-right">--}}
                                {{--<a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-register" href="">Create an account</a>--}}
                                {{--<a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-forget-password" href="">Forgot password?</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>

                <div class="login__block__body">
                 {{Form::open(['action'=>'CommonController@loginAuthorization', 'method'=>'POST','name'=>'login_form','role'=>'form','onsubmit'=>'return loginFormValidation()'])}}
                    <div class="form-group" >
                        <input style="font-size: 16px;font-weight: bold" type="text" name="user_login_id" class="form-control text-center" placeholder="User Name">
                    </div>

                    <div class="form-group">
                        <input  style="font-size: 16px;font-weight: bold" type="password" name="user_password" class="form-control text-center" placeholder="Password">
                    </div>

                    <button type="submit"  class="btn btn--icon login__block__btn"><i class="zmdi zmdi-long-arrow-right"></i></button>
                 {{Form::close()}}
                     <div id="alert_msg">
                         <br>
                         @if($msg==3)
                         <div class="alert alert-danger" role="alert">
                             <strong>Invalid ID or Password.</strong><br> Please try again.
                         </div>
                         @elseif($msg==2)
                         <div class="alert alert-danger" role="alert">
                              <strong>Invalid Password.</strong><br> Please try again.
                          </div>
                         @endif
                     </div>

                </div>

            </div>



            <!-- Register -->
            <div class="login__block" id="l-register">
                <div class="login__block__header">
                    <i class="zmdi zmdi-account-circle"></i>
                    Create an account

                    <div class="actions actions--inverse login__block__actions">
                        <div class="dropdown">
                            <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-login" href="">Already have an account?</a>
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-forget-password" href="">Forgot password?</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="login__block__body">

                    <div class="form-group">
                        <input type="text" class="form-control text-center"  placeholder="Name">
                    </div>

                    <div class="form-group form-group--centered">
                        <input type="text" class="form-control text-center" name="user_login_id" placeholder="Email Address">
                    </div>

                    <div class="form-group form-group--centered">
                        <input type="password" name="user_password" class="form-control text-center" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Accept the license agreement</span>
                        </label>
                    </div>

                    <input type="submit" class="btn btn--icon login__block__btn"><i class="zmdi zmdi-plus"></i></input>


                </div>
            </div>

            <!-- Forgot Password -->
            <div class="login__block" id="l-forget-password">
                <div class="login__block__header">
                    <i class="zmdi zmdi-account-circle"></i>
                    Forgot Password?

                    <div class="actions actions--inverse login__block__actions">
                        <div class="dropdown">
                            <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-login" href="">Already have an account?</a>
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-register" href="">Create an account</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="login__block__body">
                    <p class="mb-5">Lorem ipsum dolor fringilla enim feugiat commodo sed ac lacus.</p>

                    <div class="form-group">
                        <input type="text" class="form-control text-center" placeholder="Email Address">
                    </div>

                    <a href="index.html" class="btn btn--icon login__block__btn"><i class="zmdi zmdi-check"></i></a>
                </div>
            </div>

        </div>



        <!-- Javascript -->
        <!-- Vendors -->
        <script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/popper.js/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

        <!-- App functions and actions -->
        <script src="{{ asset('js/app.min.js') }}"></script>

        
    </body>
</html>