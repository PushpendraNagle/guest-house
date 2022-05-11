<?php
session_start();
include "db_conn.php";

if(isset($_SESSION['id'])){
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Guest Register </title>
        <link rel="stylesheet" href="css/home_css.css">
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
                    <li class="nav-item" style="margin: 0px 50px 0px 50px;">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="guest_register.php">Guest Register</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="food_order.php">Food Ordering<span class="sr-only">(current)</span></a>
                    </li>
                    
                </ul>
                <span style="margin-right: 200px;">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['name'] ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Logout</a>
                        <div class="dropdown-divider"></div>
                        </div>
                    </li>
                </ul>
                </span>
            </div>
        </nav>


        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4"> <strong> Food Order </strong></h1>
                <p class="lead">Instructions for food ordering</p>
            </div>
        </div>
        <div class="container-fluid" style="margin-bottom: 5%;">
            <center>
            <img style="border: 5px solid #555; width:60%;" src="foodmenu.png" class="rounded float-center" alt="...">
            </center>
        </div>
        <div class="container">
        <form action="" method="post" style="margin-bottom: 10%;">
            <div class="form-row">
                <div class="form-group col-md-4">
                <label>Date for order</label>
                <input type="date" class="form-control" placeholder="date for order" name="order_date">
                </div>

                <div class="form-group col-md-4">
                <label>Meal Type</label>
                <select class="form-control" name="meal_type">
                    <option selected>Choose...</option>
                    <option>Veg Bf</option>
                    <option>Veg Lunch</option>
                    <option>Veg Dinner</option>
                    <option>Non Veg Bf</option>
                    <option>Non Veg Lunch</option>
                    <option>Non Veg Dinner</option>
                </select>
                </div>
                <div class="form-group col-md-4">
                <label>Confirm</label><br>
                <button name="food_confirm" type="submit" class="btn btn-primary">Place Order</button>
                </div>
                
            </div>
        </form> 
        </div>
        <?php
            if(isset($_POST['food_confirm'])){
                $order_date = $_POST['order_date'];
                $meal_type = $_POST['meal_type'];
                $empid = $_SESSION['id'];
                $stmt = "CALL food_book('$empid', '$order_date', '$meal_type')";
                $res = mysqli_query($db, $stmt); 
                header("Location: home.php");
            }
        ?>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4"> <strong> Food Order </strong></h1>
                <p class="lead">Instructions for food ordering</p>
            </div>
        </div>

        
        <script src="javascript/home_js.js"></script>
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