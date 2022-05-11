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
    $staff_id = $_GET['id'];
    switch($_GET['action']) { 
        case "remove":
            $staff_id = $_GET['id'];
            $stmt = "DELETE from staff_details where staff_id = '$staff_id'";
            $res = mysqli_query($db, $stmt);
            header("Location: staff_details.php");
            break;
    }
}else{
    header("Location: index.php");
}
?>