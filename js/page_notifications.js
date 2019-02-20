var userId=document.getElementById("in_user_id").value;
var myVar = setInterval(showRoomBook, 1000);
var myVar1 = setInterval(showMealsOut, 1000);
var myVar2 = setInterval(showAirOut, 1000);
var myVar3= setInterval(showTodayNotify, 1000);
var myVar4= setInterval(function(){ browserNotify(userId);},1000);
function showRoomBook() {
    $str="test";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("book_out_put").innerHTML = this.responseText;
    }
    };
    xmlhttp.open("GET", "https://system.nellymarine.com/phpFolder/roomsBookingNotification.php?q=" + $str, true);
    xmlhttp.send();
    }
function showMealsOut() {

    $str="test";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("meals_out_put").innerHTML = this.responseText;
    }
    };
    xmlhttp.open("GET", "https://system.nellymarine.com/phpFolder/mealsBookingNotification.php?q=" + $str, true);
    xmlhttp.send();

    }

function showAirOut() {

    $str="test";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("air_out_put").innerHTML = this.responseText;
    }
    };
    xmlhttp.open("GET", "https://system.nellymarine.com/phpFolder/airBookingNotification.php?q=" + $str, true);
    xmlhttp.send();

    }


function showTodayNotify() {

    $str="test";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("today_out_put").innerHTML = this.responseText;
    }
    };
    xmlhttp.open("GET", "https://system.nellymarine.com/phpFolder/todayNotification.php?q=" + $str, true);
    xmlhttp.send();

    }

function browserNotify($userId) {
    $str="test";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    var myObj = JSON.parse(this.responseText);

    if(myObj.length!=0){

    for (x in myObj) {
    if(myObj[x].change_type==0){
        $msg="";
        if(myObj[x].change_status==1) {
            $msg = "Room Id : " + myObj[x].change_name + "\n" + "Check In Date : " + myObj[x].change_date_one + "\n" +
            "Check Out Date : " + myObj[x].change_date_two+"\n"+"Booking Status : In Progress";
        }
        else if(myObj[x].change_status==2){
            $msg = "Room Id : " + myObj[x].change_name + "\n" + "Check In Date : " + myObj[x].change_date_one + "\n" +
            "Check Out Date : " + myObj[x].change_date_two+"\n"+"Booking Status : Booked";
        }
        notifyRoom(myObj[x].change_id,$msg);
    }
    else if(myObj[x].change_type==1){
    $msg="Meals : "+myObj[x].change_name+"\n"+"Order Date : "+myObj[x].change_date_one+"\n"+
    "Order Time : "+myObj[x].change_time;
    notifyMeals(myObj[x].change_id,$msg);
    }
    else{
        $msg="Pickup/Drop Date : "+myObj[x].change_date_one+"\n"+"Pickup/Drop Time : "+myObj[x].change_time;
        notifyAir(myObj[x].change_id,$msg);
    }



    }
    }

    }
    };
    xmlhttp.open("GET", "https://system.nellymarine.com/phpFolder/browserNotify.php?q=" +$userId, true);
    xmlhttp.send();

    }

document.addEventListener('DOMContentLoaded', function () {
    if (!Notification) {
    alert('Desktop notifications not available in your browser. Try Chromium.');
    return;
    }

    if (Notification.permission !== "granted")
    Notification.requestPermission();
    });

function notifyRoom($id,$msg) {
    if (Notification.permission !== "granted")
    Notification.requestPermission();
    else {
    var notification = new Notification('Rooms Booking', {
    icon: 'https://system.nellymarine.com/demo/img/profile-pics/room.jpg',
    body: $msg
    });

    notification.onclick = function () {
    window.open("https://system.nellymarine.com/receptionist/res_booking_detail/"+$id,"_self");
    };

    }


    }

document.addEventListener('DOMContentLoaded', function () {
    if (!Notification) {
    alert('Desktop notifications not available in your browser. Try Chromium.');
    return;
    }

    if (Notification.permission !== "granted")
    Notification.requestPermission();
    });

function notifyMeals($id,$msg) {
    if (Notification.permission !== "granted")
    Notification.requestPermission();
    else {
    var notification = new Notification('Meals Order', {
    icon: 'http://system.nellymarine.com/demo/img/profile-pics/meals.jpg',
    body: $msg
    });

    notification.onclick = function () {
    window.open("https://system.nellymarine.com/receptionist/res_order_detail/"+$id,"_self");
    };

    }


    }

document.addEventListener('DOMContentLoaded', function () {
    if (!Notification) {
    alert('Desktop notifications not available in your browser. Try Chromium.');
    return;
    }

    if (Notification.permission !== "granted")
    Notification.requestPermission();
    });

function notifyAir($id,$msg) {
    if (Notification.permission !== "granted")
    Notification.requestPermission();
    else {
    var notification = new Notification('Airport Booking', {
    icon: 'https://system.nellymarine.com/demo/img/profile-pics/taxi.jpg',
    body: $msg
    });

    notification.onclick = function () {
    window.open("https://system.nellymarine.com/receptionist/res_air_detail/"+$id,"_self");
    };

    }


    }






function changeTheme($this)
{

    var user_id=document.getElementById("in_user_id").value;
    var themeValue=$this.value;
    //  alert(themeValue);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // alert(this.responseText);
            document.location.reload();

        }
    };
    xmlhttp.open("GET", "https://system.nellymarine.com/phpFolder/themeChange.php?q=" +user_id+"&r="+themeValue, true);
    xmlhttp.send();

}

