<?php

$q = $_REQUEST["q"];

$servername = "localhost";
$username = "Aarooran";
$password = "hotelres201827";

date_default_timezone_set('Asia/Colombo');
$date_time=date("Y-m-d H:i:s");

try {
    $conn = new PDO("mysql:host=$servername;dbname=hotel_res_db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $queryAir="SELECT * FROM air_port_booking_info WHERE DATE(a_booking_date) = CURDATE() ORDER BY update_date DESC";
    $queryMeals="SELECT * FROM order_info WHERE DATE(order_date) = CURDATE() ORDER BY update_date DESC";
    $query = "SELECT * FROM booking_info WHERE CURDATE() between from_date and to_date ORDER BY update_date DESC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $num = $stmt->rowCount();
    $val="";
    $val=$val."<br><h6 style='text-align:center'><b>Rooms Booking</b>&nbsp&nbsp<span class='badge badge-secondary'><b><i>{$num}</i></b></span></h6>";
    if($num>0){
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $roomInf=getData($conn);
            $roomInf->bindParam(1,$room_id);
            $roomInf->execute();
            // store retrieved row to a variable
            $rowR = $roomInf->fetch(PDO::FETCH_ASSOC);

            $val= $val."<a href='https://system.nellymarine.com/manager/man_booking_detail/{$booking_id}' class='listview__item'>
                                            <img src='https://system.nellymarine.com/demo/img/profile-pics/room.jpg' class='listview__img' alt=''>

                                            <div class='listview__content'>
                                                <div class='listview__heading'>Room No :{$rowR['room_number']}</div>
                                                <p>Floor No : {$rowR['floor_number']} </p>
                                                <p>{$from_date} To {$to_date}</p>
                                                <p>Booked Date : <span style='font-size:10px'>{$update_date} </span></p>
                                            </div>
                                        </a>";

        }
    }

    else{
            $val="<a href='' class='listview__item'>
                                            <img src='https://system.nellymarine.com/demo/img/profile-pics/room.jpg' class='listview__img' alt=''>

                                            <div class='listview__content'>
                                                <div class='listview__heading'>No Booking Data Available</div>
                                            </div>
                                        </a>";
        }

    $stmt1 = $conn->prepare($queryMeals);
    $stmt1->execute();
    $num1 = $stmt1->rowCount();
    $val=$val."<br><h6 style='text-align:center'><b>Meals Order</b>&nbsp&nbsp<span class='badge badge-secondary'><b><i>{$num1}</i></b></span></h6>";

    if($num1>0){

        while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
            extract($row1);
            $mealsInf=getMealsData($conn);
            $mealsInf->bindParam(1,$meals_id);
            $mealsInf->execute();
            // store retrieved row to a variable
            $rowM = $mealsInf->fetch(PDO::FETCH_ASSOC);
            $orTime=date("g:i a", strtotime($order_time));

            $val= $val."<a href='https://system.nellymarine.com/manager/man_order_detail/{$order_id}' class='listview__item'>
                                            <img src='https://system.nellymarine.com/demo/img/profile-pics/meals.jpg' class='listview__img' alt=''>

                                            <div class='listview__content'>
                                                <div class='listview__heading'>Meals Name : {$rowM['meals_name']}</div>
                                                <p>Order Date : {$order_date} </p>
                                                <p>Order Time : {$orTime}</p>
                                                <p>ordered Date : <span style='font-size:10px'> {$update_date} </span></p>
                                            </div>
                                        </a>";

        }
    }

    else{
        $val=$val."<a href='' class='listview__item'>
                                            <img src='https://system.nellymarine.com/demo/img/profile-pics/meals.jpg' class='listview__img' alt=''>

                                            <div class='listview__content'>
                                                <div class='listview__heading'>No Orders Available</div>
                                            </div>
                                        </a>";
    }

    $stmt2 = $conn->prepare($queryAir);
    $stmt2->execute();
    $num2 = $stmt2->rowCount();
    $val=$val."<br><h6 style='text-align:center'><b>Airport Booking</b>&nbsp&nbsp<span class='badge badge-secondary'><b><i>{$num2}</i></b></span></h6>";
    if($num2>0){
        while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
            extract($row2);

            $bTime=date("g:i a", strtotime($a_booking_time));

            $val= $val."<a href='https://system.nellymarine.com/manager/man_air_detail/{$a_booking_id}' class='listview__item'>
                                            <img src='https://system.nellymarine.com/manager/demo/img/profile-pics/taxi.jpg' class='listview__img' alt=''>

                                            <div class='listview__content'>
                                                <div class='listview__heading'>Booking Date :{$a_booking_date}</div>
                                                <p>Booking Time : {$bTime} </p>
                                                <p>Booked Date : <span style='font-size:10px'>{$update_date} </span></p>
                                            </div>
                                        </a>";

        }
    }
    else{
        $val=$val."<a href='' class='listview__item'>
                                            <img src='https://system.nellymarine.com/demo/img/profile-pics/taxi.jpg' class='listview__img' alt=''>

                                            <div class='listview__content'>
                                                <div class='listview__heading'>No Booking Data Available</div>
                                            </div>
                                        </a>";
    }







   // $q= "Connected successfully";
}
catch(PDOException $e)
{
    //= "Connection failed: " . $e->getMessage();
}

echo $val;

function getData($conn) {
    $query = "SELECT * FROM rooms_info WHERE room_id=?";
    $stmt = $conn->prepare($query);
    return $stmt;
}

function getMealsData($conn) {
    $query = "SELECT * FROM meals_info WHERE meals_id=?";
    $stmt = $conn->prepare($query);
    return $stmt;
}

?>