<?php
session_start();
include "db_conn.php";

if(isset($_POST['id']) && isset($_POST['password'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $id = validate($_POST['id']);
    $password = validate($_POST['password']);

    if(empty($id) || empty($password)){
        header("Location: index.php?error=Both fields are required!");
        exit();
    }else{
        

        $stmt = "select * from admin_login_details where id_code='$id' and password='$password'";
        $res = mysqli_query($db, $stmt);

        if(mysqli_num_rows($res) === 1){
            $row = mysqli_fetch_assoc($res);
            if($row['id_code']===$id && $row['password']===$password){
                $_SESSION['id']=$id;
                $_SESSION['name']=$row['Name'];
                $_SESSION['desig']=$row['Designation'];
                $_SESSION['dept']=$row['Department'];
                $_SESSION['phone']=$row['Phone'];
                $_SESSION['email']=$row['Email'];
                header("Location: home.php");
                exit();
            }else{
                header("Location: index.php?error=Incorrect credentials1");
                exit();
            }
        }else{
            header("Location: index.php?error=Incorrect credentials2");
            exit();
        }
    }

}
?>