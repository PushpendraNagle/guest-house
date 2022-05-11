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
    switch($_GET['action']) { 
        case "approve":
            $bookingid = $_GET['id'];
            echo $bookingid;
            $stmt = "UPDATE booking set booking_status = 'Booked' where booking_id = '$bookingid'";
            $res = mysqli_query($db, $stmt);
            header("Location: home.php#view_booking");
            break;
        case "reject":
            $bookingid = $_GET['id'];
            $stmt = "UPDATE booking set booking_status = 'Rejected' where booking_id = '$bookingid'";
            $res = mysqli_query($db, $stmt);
            header("Location: home.php#view_booking");
            break;
        case "paid":
            $bookingid = $_GET['id'];
            $stmt = "UPDATE booking_bill set bill_status = 'Paid' where booking_id = '$bookingid'";
            $res = mysqli_query($db, $stmt);
            header("Location: bill.php?id=$bookingid#bill");
            break;
    }
}else{
    header("Location: index.php");
}
?>