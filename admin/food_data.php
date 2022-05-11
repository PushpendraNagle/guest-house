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
                        <a class="dropdown-item" href="#">Food billing data</a>
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
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4"> <strong> Welcome to the Guest-house admin panel </strong></h1>
                <p class="lead">You can make use of the below given functionalities.</p>
            </div>
        </div>

        <div class="jumbotron jumbotron-fluid" id="booking_data">
            <div class="container">
                <h1 class="display-4"> <strong>Food Billing Data</strong></h1>
                <p class="lead"></p>
            </div>
        </div>
        <form action="" method="post" style="margin: 0% 20% 10%;">
            <div class="form-row">
                <div class="form-group col-md-3">
                <label>Start date</label>
                <input name="start_date" type="datetime-local" class="form-control" placeholder="start date">
                </div>

                <div class="form-group col-md-3">
                <label>End date</label>
                <input name="end_date" type="datetime-local" class="form-control" placeholder="end date">
                </div>
                
                <div class="form-group col-md-3">
                <label>Search Food bills</label><br>
                <button name="food_data_submit" type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

        <div class="container-fluid" style="margin-bottom: 10%;">
            <?php
            if(isset($_POST['food_data_submit'])) {
                $s_date = $_POST['start_date'];
                $e_date = $_POST['end_date'];
                $cnt=0;
                $stmt = "select * from booking where check_in between '$s_date' and '$e_date'";
                $res = mysqli_query($db, $stmt);
                $n_rows = mysqli_num_rows($res);
                echo "<center>";
                echo '<table class="table table-hover table-striped table-bordered">';
                    echo '<tr>';
                    echo '<td>Booking ID</td>';
                    echo '<td>Guest 1 Name</td>';
                    echo '<td>Guest 2 Name</td>';
                    echo '<td>Food Bill</td>';
                    echo '<td>Status</td>';
                    echo '</tr>';
                foreach($res as $row) {
                    $bookid = $row['booking_id'];
                    $stmt = "select * from booking_bill where booking_id = '$bookid'";
                    $res1 = mysqli_query($db, $stmt);
                    if(mysqli_num_rows($res1) > 0){
                        $res1 = mysqli_fetch_assoc($res1);
                        $stmt = "select * from guest where booking_id = '$bookid'";
                        $res2 = mysqli_query($db, $stmt);
                        $res2 = mysqli_fetch_assoc($res2);
                        echo '<tr>';
                        echo '<td>' . $row['booking_id'] . '</td>';
                        echo '<td>' . $res2['guest_1_name'] . '</td>';
                        echo '<td>' . $res2['guest_2_name'] . '</td>';
                        echo '<td>' . $res1['Food_charge'] . '</td>';
                        echo '<td>' . $res1['bill_status'] . '</td>';
                        echo '</tr>';
                        $cnt++;
                    }
                }
                echo '</table>';
                echo '<h2>'.$cnt. '  Food Bookings from '. $s_date . '  to  ' . $e_date .'</h2>';
                echo "</center>";
            }   
            ?>
        </div>

        <div class="container">
            <?php
                if(isset($_POST['food_data_submit'])) {
                    $c=0;
                    $stmt = "select * from food_order where order_date between '$s_date' and '$e_date'";
                    $result = mysqli_query($db, $stmt);
                    $cnt = mysqli_num_rows($result);
                    $myarray = array();
                    while ($c < mysqli_num_fields($result))
                    {
                        $fld = mysqli_fetch_field($result);
                        $myarray[] = $fld->name;
                        $c++;
                    }
                    echo '<h2>'.$cnt. '  Outside Food Bookings from '. $s_date . '  to  ' . $e_date .'</h2>';
                    echo '<table class="table table-hover table-striped table-bordered">';
                    echo "<thead>\n";
                    echo "<tr>\n";
                    foreach($myarray as $columnhead){
                        echo "<th>".$columnhead."</th>\n";
                    }
                    echo "</tr>\n";
                    echo "</thead>\n";
                    echo "<tbody>\n";
                    if (mysqli_num_rows($result) > 0) {
                        while (($row = mysqli_fetch_assoc($result))) {
                            echo "<tr>\n";
                            foreach($row as $td) {
                                echo "<td>".$td."</td>";
                            }
                            echo "<tr>\n";
                        }
                    }
                    echo "<tbody>\n";
                    echo '</table>';
                }
            ?>
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


