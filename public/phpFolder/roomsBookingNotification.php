<?php

$q = $_REQUEST["q"];

$servername = "localhost";
$username = "root";
$password = "";

date_default_timezone_set('Asia/Colombo');
$date_time=date("Y-m-d H:i:s");

try {
    $conn = new PDO("mysql:host=$servername;dbname=hotel_db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * FROM booking_info WHERE DATE(update_date) = CURDATE() ORDER BY update_date DESC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $num = $stmt->rowCount();
    $val="";
    if($num>0){
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $roomInf=getData($conn);
            $roomInf->bindParam(1,$room_id);
            $roomInf->execute();
            // store retrieved row to a variable
            $rowR = $roomInf->fetch(PDO::FETCH_ASSOC);

            $val= $val."<a href='http://localhost/hotel_reservation/receptionist/res_booking_detail/{$booking_id}' class='listview__item'>
                                            <img src='http://localhost/hotel_reservation/demo/img/profile-pics/room.jpg' class='listview__img' alt=''>

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
                                            <img src='http://localhost/hotel_reservation/demo/img/profile-pics/room.jpg' class='listview__img' alt=''>

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

?>