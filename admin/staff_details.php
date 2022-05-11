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
?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Welcome! </title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        </head>
        <body>
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary justify-content-between">
            <a class="navbar-brand" href="#">Guest-house Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item" style="margin: 0px 20px 0px 20px;">
                        <a class="nav-link disabled active" href="#">Welcome!</a>
                    </li>
                    <li class="nav-item" style="margin: 0px 20px 0px 20px;">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bookings
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="home.php#view_booking">Booking Requests</a>
                        <a class="dropdown-item" href="home.php#current_booking">Current Bookings</a>
                        <a class="dropdown-item" href="booking_data.php">Booking Data</a>
                        <div class="dropdown-divider"></div>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Rooms
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="home.php#room_price">View pricing</a>
                        <a class="dropdown-item" href="home.php#edit_room_price">Edit price</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="home.php#add_room">Add rooms</a>
                        <a class="dropdown-item" href="home.php#delete_room">Delete rooms</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Food
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="food_data.php">Food billing data</a>
                        <div class="dropdown-divider"></div>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Staff
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Staff details</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="duty_roster.php">Duty Roster</a>
                        </div>
                    </li>
                </ul>
                
                <span style="margin-right: 150px; margin-left: 100px">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['name'] ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="logout.php">Logout</a>
                        <div class="dropdown-divider"></div>
                        </div>
                    </li>
                </ul>
                </span>
            </div>
        </nav>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4"> <strong> Current Staff Details </strong></h1>
                <p class="lead">You can make use of the below given functionalities.</p>
            </div>
        </div>
<?php
    $stmt = "select * from staff_details";
    $res = mysqli_query($db, $stmt);
    if($res){
        $n_rows = mysqli_num_rows($res);
    }else{
        $n_rows = 0;
    }
    echo '<div class="container">';
    echo "<center>";
    echo '<h2>'.$n_rows. '  Staff currently employed ' .'</h2>';
    echo '<table class="table table-hover table-striped table-bordered">';
        echo '<tr>';
        echo '<td>Staff ID</td>';
        echo '<td>Staff Type</td>';
        echo '<td>Name</td>';
        echo '<td>Phone</td>';
        echo '<td>Address</td>';
        echo '<td>Remove</td>';
        echo '</tr>';
    if($res){
        foreach($res as $row) {
            echo '<tr>';
            echo '<td>' . $row['staff_id'] . '</td>';
            echo '<td>' . $row['staff_type'] . '</td>';
            echo '<td>' . $row['staff_name'] . '</td>';
            echo '<td>' . $row['phone'] . '</td>';
            echo '<td>' . $row['staff_address'] . '</td>';
            echo '<td><a class="btn btn-danger" href="staff_actions.php?action=remove&id='.$row['staff_id'].'">Remove</a></td>';
            echo '</tr>';
        }
    }
    echo '</table>';
    echo "</center>";
    echo '</div>';
?>  
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"> <strong> Add New Staff </strong></h1>
            <p class="lead"></p>
        </div>
    </div>
    <div class="container">
    <form action="add_staff.php" method="post" style="margin-bottom: 20%;">
        <div class="form-row">
            <div class="form-group col-md-4">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Name" name="staff_name">
            </div>

            <div class="form-group col-md-4">
            <label>Staff Type</label>
            <select class="form-control" name="staff_type">
                <option selected>Choose...</option>
                <?php
                    $stmt = "select staff_type from staff_type";
                    $res1 = mysqli_query($db, $stmt); 
                    foreach ($res1 as $stype){
                        echo '<option>' . $stype['staff_type'] . '</option>';
                    }
                ?>
            </select>
            </div>

            <div class="form-group col-md-4">
            <label>Phone</label>
            <input type="number" class="form-control" placeholder="phone" name="Phone">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
            <label><Address></Address></label>
            <input type="text" class="form-control" placeholder="Address" name="staff_address">
            </div>

            <div class="form-group col-md-4">
            <label>Confirm</label><br>
            <button name="add_staff" type="submit" class="btn btn-primary">Add Staff</button>
            </div>
        </div>
    </form> 
    </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </body>
        
    </html>
<?php  
}else{
    header("Location: index.php");
}
?>