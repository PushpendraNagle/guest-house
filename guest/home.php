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
            <a class="navbar-brand" href="#">Guest-house</a>
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
                    <li class="nav-item ">
                        <a class="nav-link" href="guest_register.php">Guest Register</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="food_order.php">Food Ordering</a>
                    </li>
                    
                </ul>
                <span style="margin-right: 200px;">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['name'] ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
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
                <h1 class="display-4"> <strong> Instructions for Guest-house booking </strong></h1>
                <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit odio accusantium saepe, dolorem culpa inventore optio nam officia in maxime sed blanditiis neque vero consectetur sunt. Quam excepturi quos alias. <br> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perferendis iure eligendi nulla expedita excepturi sit quisquam porro esse, odit in. Facere, magni labore aliquam obcaecati culpa maiores in voluptas beatae. <br><br> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi quidem minus cumque sit, dolor recusandae, aperiam reiciendis maiores unde debitis, et eos dolores quia minima dignissimos fugit optio nostrum veritatis?</p>
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


        <div class="jumbotron jumbotron-fluid" id="room_price">
            <div class="container">
                <h1 class="display-4"> <strong> Food bookings </strong></h1>
                <p class="lead"></p>
            </div>
        </div>
        <div class="container">
        <?php
            $id = $_SESSION['id'];
            $c=0;
            $stmt = "select * from food_order where emp_id='$id'";
            $result = mysqli_query($db, $stmt);
            $myarray = array();
            while ($c < mysqli_num_fields($result))
            {
                $fld = mysqli_fetch_field($result);
                $myarray[] = $fld->name;
                $c++;
            }
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
        ?>
        </div>

        <div class="jumbotron jumbotron-fluid" id="room_price">
            <div class="container">
                <h1 class="display-4"> <strong> Bookings </strong></h1>
                <p class="lead"></p>
            </div>
        </div>
        <div class="container">
        <?php
            $c=0;
            $stmt = "select * from booking where indentor_id='$id'";
            $result = mysqli_query($db, $stmt);
            $myarray = array();
            while ($c < mysqli_num_fields($result))
            {
                $fld = mysqli_fetch_field($result);
                $myarray[] = $fld->name;
                $c++;
            }
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