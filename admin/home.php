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
                    <li class="nav-item active" style="margin: 0px 20px 0px 20px;">
                        <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bookings
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#view_booking">Booking Requests</a>
                        <a class="dropdown-item" href="#current_booking">Current Bookings</a>
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
                        <a class="dropdown-item" href="#room_price">View pricing</a>
                        <a class="dropdown-item" href="#edit_room_price">Edit price</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#add_room">Add rooms</a>
                        <a class="dropdown-item" href="#delete_room">Delete rooms</a>
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
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4"> <strong> Welcome to the Guest-house admin panel </strong></h1>
                <p class="lead">You can make use of the below given functionalities.</p>
            </div>
        </div>

        <div class="jumbotron jumbotron-fluid" id="room_price">
            <div class="container">
                <h1 class="display-4"> <strong> Current Room Prices </strong></h1>
                <p class="lead"></p>
            </div>
        </div>
        <div class="container">
            <?php 
                    $stmt = "select * from room_type";
                    $res = mysqli_query($db, $stmt);
            ?>
            <table class="table table-hover table-striped table-bordered" >
                <thead>
                    <tr>
                    <th scope="col">Room_Type</th>
                    <th scope="col">Total Rooms</th>
                    <th scope="col">Price</th>
                    <th scope="col">Available Rooms</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($res as $row) {
                ?>
                    <tr>
                    <th scope="row"><?php echo $row['Room_type']?></th>
                    <td><?php echo $row['total_rooms']?></td>
                    <td><?php echo $row['Price']?></td>
                    <td><?php echo $row['avail_rooms']?></td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        
        <div class="jumbotron jumbotron-fluid" id="edit_room_price">
            <div class="container">
                <h1 class="display-4"> <strong> Edit Room Prices </strong></h1>
                <p class="lead"></p>
            </div>
        </div>
        <form action="room_actions.php" method="post" style="margin: 0% 20% 0%;">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label>Accomodation type</label>
                <select name="ac_type" id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>Attached bathroom</option>
                    <option>Non Attached bathroom</option>
                </select>
                </div>

                <div class="form-group col-md-3">
                <label>New Price</label>
                <input name="new_price" type="number" class="form-control" placeholder="new Price">
                </div>
                
                <div class="form-group col-md-3">
                <label>Click to change price</label>
                <button name="edit_room_price" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        
        <div class="jumbotron jumbotron-fluid" id="add_room"> 
            <div class="container">
                <h1 class="display-4"> <strong> Add rooms </strong></h1>
                <p class="lead"></p>
            </div>
        </div>
        <form action="room_actions.php" method="post" style="margin: 0% 20% 0%;">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label>Accomodation type</label>
                <select name="ac_type" id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>Attached bathroom</option>
                    <option>Non Attached bathroom</option>
                </select>
                </div>

                <div class="form-group col-md-3">
                <label>Number of new rooms</label>
                <input name="new_rooms" type="number" class="form-control" placeholder="Number of new rooms">
                </div>
                
                <div class="form-group col-md-3">
                <label>Click to add</label><br>
                <button name="add_room" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

        <div class="jumbotron jumbotron-fluid" id="delete_room"> 
            <div class="container">
                <h1 class="display-4"> <strong> Delete rooms </strong></h1>
                <p class="lead"></p>
            </div>
        </div>
        <form action="room_actions.php" method="post" style="margin: 0% 20% 0%;">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label>Accomodation type</label>
                <select name="ac_type" id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>Attached bathroom</option>
                    <option>Non Attached bathroom</option>
                </select>
                </div>

                <div class="form-group col-md-3">
                <label>Number of rooms to delete</label>
                <input name="del_rooms" type="number" class="form-control" placeholder="Number of rooms to delete">
                </div>
                
                <div class="form-group col-md-3">
                <label>Click to Delete</label><br>
                <button name="delete_room" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        
        <div class="jumbotron jumbotron-fluid"  id="view_booking">
            <div class="container">
                <h1 class="display-4"> <strong> Booking Requests </strong></h1>
                <p class="lead"></p>
            </div>
        </div>
        <div class="container-fluid">
            <?php
                $stmt = "select * from booking where booking_status = 'Pending'";
                $res = mysqli_query($db, $stmt);
                echo "<center>";
                echo '<table class="table table-hover table-striped table-bordered">';
                    echo '<tr>';
                    echo '<td>Booking ID</td>';
                    echo '<td>Guest 1 Name</td>';
                    echo '<td>Guest 2 Name</td>';
                    echo '<td>No. Person</td>';
                    echo '<td> Payment by</td>';
                    echo '<td> No. Rooms</td>';
                    echo '<td>Arrival date-time</td>';
                    echo '<td>Departure date-time</td>';
                    echo '<td>Type</td>';
                    echo '<td>Purpose</td>';
                    echo '<td>Reason</td>';
                    echo '<td>Indentor ID</td>';
                    echo '<td>PF Code</td>';
                    echo '<td>Details</td>';
                    echo '<td>Approve</td>';
                    echo '<td>Reject</td>';
                    echo '</tr>';
                foreach($res as $row) {
                    $bookid = $row['booking_id'];
                    $stmt = "select * from guest where booking_id = '$bookid'";
                    $res1 = mysqli_query($db, $stmt);
                    $res1 = mysqli_fetch_assoc($res1);
                    echo '<tr>';
                    echo '<td>' . $row['booking_id'] . '</td>';
                    echo '<td>' . $res1['guest_1_name'] . '</td>';
                    echo '<td>' . $res1['guest_2_name'] . '</td>';
                    echo '<td>' . $row['n_person'] . '</td>';
                    echo '<td>' . $row['payment_by'] . '</td>';
                    echo '<td>' . $row['n_room'] . '</td>';
                    echo '<td>' . $row['check_in'] . '</td>';
                    echo '<td>' . $row['check_out'] . '</td>';
                    echo '<td>' . $row['acmod_type'] . '</td>';
                    echo '<td>' . $row['purpose'] . '</td>';
                    echo '<td>' . $row['purpose_reason'] . '</td>';
                    echo '<td>' . $row['indentor_id'] . '</td>';
                    echo '<td>' . $row['pf_code'] . '</td>';
                    echo '<td><a class="btn btn-warning" href="guest_details.php?id='.$row['booking_id'].'">Details</a></td>';
                    echo '<td><a class="btn btn-success" href="booking_actions.php?action=approve&id='.$row['booking_id'].'">OK</a></td>';
                    echo '<td><a class="btn btn-danger" href="booking_actions.php?action=reject&id='.$row['booking_id'].'">Reject</a></td>';
                    echo '</tr>';
            }
                echo '</table>';
                echo "</center>";
            ?>
        </div>
        
        <div class="jumbotron jumbotron-fluid" id="current_booking">
            <div class="container">
                <h1 class="display-4"> <strong> Current Bookings </strong></h1>
                <p class="lead"></p>
            </div>
        </div>
        <div class="container-fluid">
            <?php
                $stmt = "select * from booking join booking_bill on booking.booking_id = booking_bill.booking_id where (booking.check_out <= now() or booking_bill.bill_status = 'Unpaid') and booking_status = 'Booked'";
                $res = mysqli_query($db, $stmt);
                echo "<center>";
                echo '<table class="table table-hover table-striped table-bordered">';
                    echo '<tr>';
                    echo '<td>Booking ID</td>';
                    echo '<td>Guest 1 Name</td>';
                    echo '<td>Guest 2 Name</td>';
                    echo '<td>No. Person</td>';
                    echo '<td>Payment by</td>';
                    echo '<td>No. Rooms</td>';
                    echo '<td>Arrival date-time</td>';
                    echo '<td>Departure date-time</td>';
                    echo '<td>Type</td>';
                    echo '<td>Purpose</td>';
                    echo '<td>Reason</td>';
                    echo '<td>Indentor ID</td>';
                    echo '<td>PF Code</td>';
                    echo '<td>View Bill</td>';
                    echo '</tr>';
                foreach($res as $row) {
                    $bookid = $row['booking_id'];
                    $stmt = "select * from guest where booking_id = '$bookid'";
                    $res1 = mysqli_query($db, $stmt);
                    $res1 = mysqli_fetch_assoc($res1);
                    echo '<tr>';
                    echo '<td>' . $row['booking_id'] . '</td>';
                    echo '<td>' . $res1['guest_1_name'] . '</td>';
                    echo '<td>' . $res1['guest_2_name'] . '</td>';
                    echo '<td>' . $row['n_person'] . '</td>';
                    echo '<td>' . $row['payment_by'] . '</td>';
                    echo '<td>' . $row['n_room'] . '</td>';
                    echo '<td>' . $row['check_in'] . '</td>';
                    echo '<td>' . $row['check_out'] . '</td>';
                    echo '<td>' . $row['acmod_type'] . '</td>';
                    echo '<td>' . $row['purpose'] . '</td>';
                    echo '<td>' . $row['purpose_reason'] . '</td>';
                    echo '<td>' . $row['indentor_id'] . '</td>';
                    echo '<td>' . $row['pf_code'] . '</td>';
                    echo '<td><a class="btn btn-warning" href="bill.php?id='.$row['booking_id'].'">Bill and Food</a></td>';
                    echo '</tr>';
            }
                echo '</table>';
                echo "</center>";
            ?>
        </div>
        
        
        <div class="jumbotron jumbotron-fluid" style="padding-bottom: 20%;">
            <div class="container">
                <h1 class="display-4"> <strong> Guest house admin panel </strong></h1>
                <p class="lead"></p>
            </div>
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