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
    $query = "SELECT * FROM order_info WHERE DATE(update_date) = CURDATE() ORDER BY update_date DESC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $num = $stmt->rowCount();
    $val="";
    if($num>0){
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $mealsInf=getData($conn);
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
        $val="<a href='' class='listview__item'>
                                            <img src='https://system.nellymarine.com/demo/img/profile-pics/meals.jpg' class='listview__img' alt=''>

                                            <div class='listview__content'>
                                                <div class='listview__heading'>No Orders Available</div>
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
    $query = "SELECT * FROM meals_info WHERE meals_id=?";
    $stmt = $conn->prepare($query);
    return $stmt;
}

?>