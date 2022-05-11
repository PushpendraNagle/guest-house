<?php
session_start();
include "db_conn.php";

function post_isset($indexes) {
    foreach($indexes as $index) {
        if (!isset($_POST[$index])) {
            return false;
        }
    }
    return true;
}

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if(post_isset(['g1name', 'g1desig', 'g1phone', 'g1email', 'g2name', 'g2desig', 'g2phone', 'house_no', 'city', 'state', 'zip', 'np', 'nr', 'actype', 'dtarrive', 'dtdepart', 'purpose', 'r_purpose', 'payby'])){

    $g1name = validate($_POST['g1name']);
    $g1desig = validate($_POST['g1desig']);
    $g1phone = validate($_POST['g1phone']);
    $g1email = validate($_POST['g1email']);
    $g2name = validate($_POST['g2name']);
    $g2desig = validate($_POST['g2desig']);
    $g2phone = validate($_POST['g2phone']);
    $house_no = validate($_POST['house_no']);
    $city = validate($_POST['city']);
    $state_name = validate($_POST['state']);
    $zip = validate($_POST['zip']);
    $np = validate($_POST['np']);
    $nr = validate($_POST['nr']);
    $actype = validate($_POST['actype']);
    $dtarrive = validate($_POST['dtarrive']);
    $dtdepart = validate($_POST['dtdepart']);
    $purpose = validate($_POST['purpose']);
    $r_purpose = validate($_POST['r_purpose']);
    $payby = validate($_POST['payby']);
    $vbf = $_POST['vbf'];
    $vlun = $_POST['vlun'];
    $vdin = $_POST['vdin'];
    $nvbf = $_POST['nvbf'];
    $nvlun = $_POST['nvlun'];
    $nvdin = $_POST['nvdin'];
    $indentorid = $_SESSION['id'];

    $stmt = "INSERT into booking (n_person, payment_by, n_room, check_in, check_out, acmod_type, purpose, purpose_reason, indentor_id, booking_status) value ('$np', '$payby', '$nr', '$dtarrive', '$dtdepart', '$actype', '$purpose', '$r_purpose', '$indentorid', 'Pending')";
    $res = mysqli_query($db, $stmt); 
    $stmt = "select last_insert_id() as bkid";
    $res = mysqli_query($db, $stmt);
    $row = mysqli_fetch_assoc($res);
    $booking_id = $row['bkid'];
    $stmt = "INSERT into guest (booking_id, guest_1_name, guest_1_designation, guest_1_phone, email, guest_2_name, guest_2_designation, guest_2_phone, house_no, city, state_name, zip_code) value ('$booking_id', '$g1name', '$g1desig', '$g1phone', '$g1email', '$g2name', '$g2desig', '$g2phone', '$house_no', '$city', '$state_name', '$zip')";
    $res = mysqli_query($db, $stmt);
    $stmt = "INSERT into food_pref (booking_id, n_veg_bf, n_veg_lunch, n_veg_dinner, n_nveg_bf, n_nveg_lunch, n_nveg_dinner) value ('$booking_id', '$vbf', '$vlun', '$vdin', '$nvbf', '$nvlun', '$nvdin')";
    $res = mysqli_query($db, $stmt);
    if(isset($_POST['pf_code'])){
        validate($_POST['pf_code']);
        $pf_code = $_POST['pf_code'];
        $stmt = "UPDATE booking set pf_code = '$pf_code' where booking_id = '$booking_id'";
        $res = mysqli_query($db, $stmt);
    }
    header("Location: home.php?success=submitted successfully");

}else{
    header("Location: guest_register.php?error=invalid data entered");
    exit();
}
?>