<?php
session_start();
include "db_conn.php";

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
                        <a class="nav-link" href="home.php">Home</span></a>
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
                        <a class="dropdown-item" href="home.php#view_pricing">View pricing</a>
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
                        <a class="dropdown-item" href="staff_details.php">Staff details</a>
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
        <?php
            $bookingid = $_GET['id'];
            $_SESSION['bookingid'] = $bookingid;
        ?>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4"> <strong> Food Preference </strong></h1>
                <p class="lead"></p>
            </div>
        </div>
        <div class="container">
            <?php
                $stmt = "select * from food_pref where booking_id = '$bookingid'";
                $res = mysqli_query($db, $stmt);
                echo "<center>";
                echo '<table class="table table-hover table-striped table-bordered">';
                    echo '<tr>';
                    echo '<td>Booking ID</td>';
                    echo '<td>Veg Breakfast</td>';
                    echo '<td>Veg Lunch</td>';
                    echo '<td>Veg Dinner</td>';
                    echo '<td>Non Veg Breakfast</td>';
                    echo '<td>Non Veg Lunch</td>';
                    echo '<td>Non Veg Dinner</td>';
                    echo '</tr>';
                foreach($res as $row) {
                    echo '<tr>';
                    echo '<td>' . $row['booking_id'] . '</td>';
                    echo '<td>' . $row['n_veg_bf'] . '</td>';
                    echo '<td>' . $row['n_veg_lunch'] . '</td>';
                    echo '<td>' . $row['n_veg_dinner'] . '</td>';
                    echo '<td>' . $row['n_nveg_bf'] . '</td>';
                    echo '<td>' . $row['n_nveg_lunch'] . '</td>';
                    echo '<td>' . $row['n_nveg_dinner'] . '</td>';
                    echo '</tr>';
            }
                echo '</table>';
                echo "</center>";
            ?>
        </div>
        <div class="jumbotron jumbotron-fluid" id="bill">
            <div class="container">
                <h1 class="display-4"> <strong> Bill </strong></h1>
                <p class="lead"></p>
            </div>
        </div>

        <div class="container" >
            <?php
                $stmt = "select * from booking_bill where booking_id = '$bookingid'";
                $res = mysqli_query($db, $stmt);
                echo "<center>";
                echo '<table class="table table-hover table-striped table-bordered">';
                    echo '<tr>';
                    echo '<td>Booking ID</td>';
                    echo '<td>Room charge</td>';
                    echo '<td>Food charge</td>';
                    echo '<td>Service charge</td>';
                    echo '<td>Extra charge</td>';
                    echo '<td>Total</td>';
                    echo '<td>Payment status</td>';
                    echo '<td>Update status</td>';
                    echo '</tr>';
                foreach($res as $row) {
                    echo '<tr>';
                    echo '<td>' . $row['booking_id'] . '</td>';
                    echo '<td>' . $row['Room_charge'] . '</td>';
                    echo '<td>' . $row['Food_charge'] . '</td>';
                    echo '<td>' . $row['Service_charge'] . '</td>';
                    echo '<td>' . $row['Extra_charge'] . '</td>';
                    echo '<td>' . ($row['Extra_charge'] +  $row['Room_charge'] + $row['Food_charge'] + $row['Service_charge']) . '</td>';
                    echo '<td>' . $row['bill_status'] . '</td>';
                    echo '<td><a class="btn btn-success" href="booking_actions.php?action=paid&id='.$row['booking_id'].'">Click here</a></td>';
                    echo '</tr>';
            }
                echo '</table>';
                echo "</center>";
            ?>
        </div>


        <form class="container" action="bill_actions.php" method="post" style="margin-bottom: 20%">
            <div class="form-row">
                <div class="form-group col-md-4">
                <label>Service charge</label>
                <input name="service_charge" type="number" class="form-control" placeholder="Service charge" required>
                </div>

                <div class="form-group col-md-4">
                <label>Extra charge</label>
                <input name="extra_charge" type="number" class="form-control" placeholder="Extra charge" required>
                </div>
                
                <div class="form-group col-md-3">
                <label>Click to add to bill</label><br>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
            </div>
        </form>

        
        
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