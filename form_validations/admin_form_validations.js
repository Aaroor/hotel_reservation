/**
 * Created by Aaroor on 1/8/2018.
 */

function userFormValidation(){
    var userName=document.user_form.user_name.value;
    var loginName=document.user_form.login_name.value;
    var userEmail=document.user_form.user_mail.value;
    var userPhone=document.user_form.user_phone.value;
    var userPassword=document.user_form.user_password.value;
    var reUserPassword=document.user_form.user_re_password.value;
    var msgUserName=document.getElementById("msg_user_name");
    var msgLoginName=document.getElementById("msg_login_name");
    var msgUserMail=document.getElementById("msg_user_mail");
    var msgUserPhone=document.getElementById("msg_user_phone");
    var msgUserPassword=document.getElementById("msg_user_password");
    var msgUserRePassword=document.getElementById("msg_user_re_password");
    var topMsg=document.getElementById("top_msg");

    if(userName==null || userName==""){
        msgUserName.innerHTML= "<div class='alert alert-danger alert-dismissible fade show'>"
        +" <button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
        +" <span aria-hidden='true'>&times;</span>"
        +" </button>"
        +"<strong>Empty user Name.</strong><br> Please enter the User Name.."
        +"</div>";
        return false;
    }
    else if(loginName==null || loginName==""){
        msgUserName.innerHTML="";
        msgLoginName.innerHTML= "<div class='alert alert-danger alert-dismissible fade show'>"
        +" <button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
        +" <span aria-hidden='true'>&times;</span>"
        +" </button>"
        +"<strong>Empty Login Name.</strong><br> Please enter the login name."
        +"</div>";
        return false;
    }

    else if(userPassword==null || userPassword==""){
        msgUserName.innerHTML="";
        msgLoginName.innerHTML="";
        msgUserPassword.innerHTML= "<div class='alert alert-danger alert-dismissible fade show'>"
        +" <button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
        +" <span aria-hidden='true'>&times;</span>"
        +" </button>"
        +"<strong>Empty Password.</strong><br> Please enter the password"
        +"</div>";
        return false;
    }

    else if(reUserPassword==null || reUserPassword==""){
        msgUserName.innerHTML="";
        msgLoginName.innerHTML="";
        msgUserPassword.innerHTML= "<div class='alert alert-danger alert-dismissible fade show'>"
        +" <button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
        +" <span aria-hidden='true'>&times;</span>"
        +" </button>"
        +"<strong>Empty Password.</strong><br> Please Re-Type password."
        +"</div>";
        return false;
    }
    else if(reUserPassword!=userPassword){
        msgUserName.innerHTML="";
        msgLoginName.innerHTML="";
        msgUserPassword.innerHTML="";
        msgUserRePassword.innerHTML="";
        topMsg.innerHTML="<div class='alert alert-danger alert-dismissible fade show'>"
        +" <button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
        +" <span aria-hidden='true'>&times;</span>"
        +" </button>"
        +"<strong>Password Not Match.</strong><br> Please Re-Type password."
        +"</div>";
        return false;
    }


}
