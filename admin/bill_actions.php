<?php
session_start();
include "db_conn.php";

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_SESSION['id'])){
    if(isset($_POST['submit'])){
        $bookingid = $_SESSION['bookingid'];
        $service = $_POST['service_charge'];
        $extra = $_POST['extra_charge'];
        echo $service; 
        echo $extra;
        echo $bookingid;
        $stmt = "update booking_bill set Service_charge = '$service' where booking_id = '$bookingid'";
        $res = mysqli_query($db, $stmt);
        $stmt = "update booking_bill set Extra_charge='$extra' where booking_id = '$bookingid'";
        $res = mysqli_query($db, $stmt);
        header("Location: bill.php?id=$bookingid#bill");
    }
}else{
    header("Location: index.php");
}
?>