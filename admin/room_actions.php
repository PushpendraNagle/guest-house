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
    if(isset($_POST['edit_room_price'])){
        $ac_type = $_POST['ac_type'];
        $new_price = $_POST['new_price'];
        $stmt = "update room_type set Price = '$new_price' where Room_type = '$ac_type'";
        $res = mysqli_query($db, $stmt);
        header("Location: home.php#room_price");
    }else if(isset($_POST['add_room'])){
        $ac_type = $_POST['ac_type'];
        $new_rooms = $_POST['new_rooms'];
        $stmt = "update room_type set total_rooms = total_rooms + '$new_rooms' where Room_type = '$ac_type'";
        $res = mysqli_query($db, $stmt);
        $stmt = "update room_type set avail_rooms = avail_rooms + '$new_rooms' where Room_type = '$ac_type'";
        $res = mysqli_query($db, $stmt);
        header("Location: home.php#room_price");
    }else if(isset($_POST['delete_room'])){
        $ac_type = $_POST['ac_type'];
        $del_rooms = $_POST['del_rooms'];
        $stmt = "update room_type set total_rooms = total_rooms - '$del_rooms' where Room_type = '$ac_type'";
        $res = mysqli_query($db, $stmt);
        $stmt = "update room_type set avail_rooms = avail_rooms - '$del_rooms' where Room_type = '$ac_type'";
        $res = mysqli_query($db, $stmt);
        header("Location: home.php#room_price");
    }
}else{
    header("Location: index.php");
}
?>