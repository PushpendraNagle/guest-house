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
                        <a class="dropdown-item" href="#">Duty Roster</a>
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
                <h1 class="display-4"> <strong> Add duty </strong></h1>
                <p class="lead"></p>
            </div>
        </div>
        <div class="container">
           <form action="" method="post" style="margin-bottom: 5%;">
            <div class="form-row">
                <div class="form-group col-md-3">
                <label>Staff ID</label>
                <input type="text" class="form-control" placeholder="Staff ID" name="staff_id">
                </div>
                
                <div class="form-group col-md-3">
                <label>Work Date</label>
                <input type="date" class="form-control" placeholder="Date" name="work_date">
                </div>

                <div id="cook_shift" class="form-group col-md-3">
                <label>Work Shift</label>
                <select class="form-control" name="work_shift">
                    <option selected>Choose...</option>
                    <option>BF + Lunch</option>
                    <option>BF + Dinner</option>
                    <option>Lunch + Dinner</option>
                    <option>7 AM to 3 PM</option>
                    <option>3 PM to 11 PM</option>
                </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                <label>Overtime hours</label>
                <input type="number" class="form-control" placeholder="Overtime hours" name="overtime_hours">
                </div>
                <div class="form-group col-md-3">
                <label>Confirm</label><br>
                <button name="add_duty" type="submit" class="btn btn-primary">Add Duty</button>
                </div>
            </div>
           </form>
        </div>

        <?php
            if(isset($_POST['add_duty'])){
                $staff_id = $_POST['staff_id'];
                $work_date = $_POST['work_date'];
                $work_shift = $_POST['work_shift'];
                $overtime_hours = $_POST['overtime_hours'];

                $stmt = "insert into staff_schedule value ('$staff_id', '$work_date', '$work_shift', '$overtime_hours')";
                $res = mysqli_query($db, $stmt);
            }
        ?>

        <div class="jumbotron jumbotron-fluid" id="room_price">
            <div class="container">
                <h1 class="display-4"> <strong> Duty Roster for last 7 days </strong></h1>
                <p class="lead"></p>
            </div>
        </div>
        <div class="container-fluid" style="margin-bottom: 10%;">
            <?php 
                $stmt = "select curdate() as cur";
                $cur = mysqli_query($db, $stmt);
                $cur = mysqli_fetch_assoc($cur);
                $date7=date_create($cur['cur']);
                date_sub($date7,date_interval_create_from_date_string("7 days"));
                $date6=date_create($cur['cur']);
                date_sub($date6,date_interval_create_from_date_string("6 days"));
                $date5=date_create($cur['cur']);
                date_sub($date5,date_interval_create_from_date_string("5 days"));
                $date4=date_create($cur['cur']);
                date_sub($date4,date_interval_create_from_date_string("4 days"));
                $date3=date_create($cur['cur']);
                date_sub($date3,date_interval_create_from_date_string("3 days"));
                $date2=date_create($cur['cur']);
                date_sub($date2,date_interval_create_from_date_string("2 days"));
                $date1=date_create($cur['cur']);
                date_sub($date1,date_interval_create_from_date_string("1 days"));
            ?>
            <table class="table table-hover table-striped table-bordered" >
                <thead>
                    <tr>
                    <th scope="col">Staff ID</th>
                    <th scope="col">Staff Type</th>
                    <th scope="col">Staff Name</th>
                    <th scope="col"><?php echo date_format($date7,"Y-m-d"); ?></th>
                    <th scope="col"><?php echo date_format($date6,"Y-m-d"); ?></th>
                    <th scope="col"><?php echo date_format($date5,"Y-m-d"); ?></th>
                    <th scope="col"><?php echo date_format($date4,"Y-m-d"); ?></th>
                    <th scope="col"><?php echo date_format($date3,"Y-m-d"); ?></th>
                    <th scope="col"><?php echo date_format($date2,"Y-m-d"); ?></th>
                    <th scope="col"><?php echo date_format($date1,"Y-m-d"); ?></th>
                    <th scope="col"><?php echo $cur['cur']; ?></th>
                    <th scope="col">Overtime hours</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $stmt = "select staff_id, staff_type, staff_name from staff_details";
                    $res = mysqli_query($db, $stmt);
                    foreach($res as $row) {
                    $st_id = $row['staff_id'];
                ?>
                    <tr>
                    <th scope="row"><?php echo $row['staff_id']?></th>
                    <td><?php echo $row['staff_type']?></td>
                    <td><?php echo $row['staff_name']?></td>
                    <td><?php 
                        $stmt = "SELECT work_shift from staff_schedule where staff_id = '$st_id' and work_date = date_sub(curdate(), interval 7 day)";
                        $temp = mysqli_query($db, $stmt);
                        if(mysqli_num_rows($temp)>0){
                            $temp = mysqli_fetch_assoc($temp);
                            echo $temp['work_shift'];
                        }else{
                            echo '--';
                        }
                    ?></td>
                    <td><?php 
                        $stmt = "SELECT work_shift from staff_schedule where staff_id = '$st_id' and work_date = date_sub(curdate(), interval 6 day)";
                        $temp = mysqli_query($db, $stmt);
                        if(mysqli_num_rows($temp)>0){
                            $temp = mysqli_fetch_assoc($temp);
                            echo $temp['work_shift'];
                        }else{
                            echo '--';
                        }
                    ?></td>
                    <td><?php 
                        $stmt = "SELECT work_shift from staff_schedule where staff_id = '$st_id' and work_date = date_sub(curdate(), interval 5 day)";
                        $temp = mysqli_query($db, $stmt);
                        if(mysqli_num_rows($temp)>0){
                            $temp = mysqli_fetch_assoc($temp);
                            echo $temp['work_shift'];
                        }else{
                            echo '--';
                        }
                    ?></td>
                    <td><?php 
                        $stmt = "SELECT work_shift from staff_schedule where staff_id = '$st_id' and work_date = date_sub(curdate(), interval 4 day)";
                        $temp = mysqli_query($db, $stmt);
                        if(mysqli_num_rows($temp)>0){
                            $temp = mysqli_fetch_assoc($temp);
                            echo $temp['work_shift'];
                        }else{
                            echo '--';
                        }
                    ?></td>
                    <td><?php 
                        $stmt = "SELECT work_shift from staff_schedule where staff_id = '$st_id' and work_date = date_sub(curdate(), interval 3 day)";
                        $temp = mysqli_query($db, $stmt);
                        if(mysqli_num_rows($temp)>0){
                            $temp = mysqli_fetch_assoc($temp);
                            echo $temp['work_shift'];
                        }else{
                            echo '--';
                        }
                    ?></td>
                    <td><?php 
                        $stmt = "SELECT work_shift from staff_schedule where staff_id = '$st_id' and work_date = date_sub(curdate(), interval 2 day)";
                        $temp = mysqli_query($db, $stmt);
                        if(mysqli_num_rows($temp)>0){
                            $temp = mysqli_fetch_assoc($temp);
                            echo $temp['work_shift'];
                        }else{
                            echo '--';
                        }
                    ?></td>
                    <td><?php 
                        $stmt = "SELECT work_shift from staff_schedule where staff_id = '$st_id' and work_date = date_sub(curdate(), interval 1 day)";
                        $temp = mysqli_query($db, $stmt);
                        if(mysqli_num_rows($temp)>0){
                            $temp = mysqli_fetch_assoc($temp);
                            echo $temp['work_shift'];
                        }else{
                            echo '--';
                        }
                    ?></td>
                    <td><?php 
                        $stmt = "SELECT work_shift from staff_schedule where staff_id = '$st_id' and work_date = curdate()";
                        $temp = mysqli_query($db, $stmt);
                        if(mysqli_num_rows($temp)>0){
                            $temp = mysqli_fetch_assoc($temp);
                            echo $temp['work_shift'];
                        }else{
                            echo '--';
                        }
                    ?></td>
                    <td><?php 
                        $stmt = "SELECT sum(overtime_hours) as ovtime from staff_schedule where staff_id = '$st_id' and work_date >= date_sub(curdate(), interval 7 day)";
                        $temp = mysqli_query($db, $stmt);
                        $temp = mysqli_fetch_assoc($temp);
                        if($temp['ovtime']>0){
                            echo $temp['ovtime'];
                        }else{
                            echo '--';
                        }
                    ?></td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
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