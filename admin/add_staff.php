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
        if(isset($_POST['add_staff'])){
            $staff_name = $_POST['staff_name'];
            $staff_type = $_POST['staff_type'];
            $phone = $_POST['Phone'];
            $staff_address = $_POST['staff_address'];

            $stmt = "INSERT into staff_details (staff_type, staff_name, phone, staff_address) value ('$staff_type', '$staff_name', '$phone', '$staff_address')";
            $res = mysqli_query($db, $stmt);
            echo $res;
        }
    }else{
        header("Location: index.php");
    }
    ?>