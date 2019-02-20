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
    $query = "SELECT * FROM trigger_load WHERE user_id =? ORDER BY add_date DESC LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1,$q);
    $stmt->execute();
    $num = $stmt->rowCount();
    $jsonData = array();
    if($num>0){
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
           // $id=$row['trigger_id'];

            $jsonData[] = $row;
            extract($row);


            $sql = "DELETE FROM trigger_load WHERE trigger_id=?";
            $stmt1 = $conn->prepare($sql);
            $stmt1->bindParam(1,$trigger_id);
            $stmt1->execute();




        }


    }
    else{
        $val="<a href='' class='listview__item'>
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
echo json_encode($jsonData);

//function getData($conn) {
//    $query = "SELECT * FROM rooms_info WHERE room_id=?";
//    $stmt = $conn->prepare($query);
//    return $stmt;
//}

?>