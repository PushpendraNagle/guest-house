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
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Guest Register<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="food_order.php">Food Ordering</a>
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

        <form action="register-check.php" method="post" style="margin: 10%;">
            <div class="form-row">
                <div class="form-group col-md-3">
                <label>Guest-1 Name</label>
                <input type="text" class="form-control" placeholder="Guest-1 Name" name="g1name">
                </div>
                <div class="form-group col-md-3">
                <label>Guest-1 Designation</label>
                <input type="text" class="form-control" placeholder="Guest-1 Designation" name="g1desig">
                </div>
                <div class="form-group col-md-3">
                <label>Guest-1 Phone</label>
                <input type="number" class="form-control" placeholder="Phone number" name="g1phone">
                </div>
                <div class="form-group col-md-3">
                <label>Guest-1 Email</label>
                <input type="email" class="form-control" placeholder="Email" name="g1email">
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="form-group col-md-4">
                <label>Guest-2 Name</label>
                <input type="text" class="form-control" placeholder="Guest-2 Name" name="g2name">
                </div>
                <div class="form-group col-md-4">
                <label>Guest-2 Designation</label>
                <input type="text" class="form-control" placeholder="Guest-2 Designation" name="g2desig">
                </div>
                <div class="form-group col-md-4">
                <label>Guest-2 Phone</label>
                <input type="number" class="form-control" placeholder="Phone number" name="g2phone">
                </div>
            </div>
            <br>
            
            <div class="form-row">
                <div class="form-group col-md-3">
                <label>House number</label>
                <input type="text" class="form-control" placeholder="House number" name="house_no">
                </div>
                <div class="form-group col-md-3">
                <label>City</label>
                <input type="text" class="form-control" placeholder="City" name="city">
                </div>
                <div class="form-group col-md-4">
                <label>State</label>
                <input type="text" class="form-control" placeholder="State" name="state">
                </div>
                <div class="form-group col-md-2">
                <label>Zip</label>
                <input type="text" class="form-control" placeholder="Zip Code" name="zip">
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="form-group col-md-3">
                <label>Number of person</label>
                <input type="text" class="form-control" placeholder="No. of person" name="np">
                </div>
                <div class="form-group col-md-3">
                <label>Number of rooms</label>
                <input type="text" class="form-control" placeholder="No. of rooms" name="nr">
                </div>
                <div class="form-group col-md-3">
                <label>Accomodation type</label>
                <select id="inputState" class="form-control" name="actype">
                    <option selected>Choose...</option>
                    <option>Attached bathroom</option>
                    <option>Non Attached bathroom</option>
                </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                <label>Date-time of arrival</label>
                <input type="datetime-local" class="form-control" name="dtarrive">
                </div>
                <div class="form-group col-md-3">
                <label>Date-time of departure</label>
                <input type="datetime-local" class="form-control" name="dtdepart">
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="form-group col-md-2">
                <label>Guest 1 vaccine dose nos</label>
                <input type="number" placeholder="Number of doses" class="form-control" name="g1vacnos">
                </div>
                <div class="form-group col-md-4">
                <label>Vaccine certificate link</label>
                <input type="text" placeholder="Vaccine certificate link" class="form-control" name="g1vaclink">
                </div>
                <div class="form-group col-md-2">
                <label>Guest 2 vaccine dose nos</label>
                <input type="number" placeholder="Number of doses" class="form-control" name="g2vacnos">
                </div>
                <div class="form-group col-md-4">
                <label>Vaccine certificate link</label>
                <input type="text" placeholder="Vaccine certificate link" class="form-control" name="g2vaclink">
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="form-group col-md-3">
                <label>Purpose of visit</label>
                <select id="inputState" class="form-control" name="purpose">
                    <option selected>Choose...</option>
                    <option>Official</option>
                    <option>Personal</option>
                </select>
                </div>
                <div class="form-group col-md-3">
                <label>Describe purpose of visit</label>
                <input type="text" class="form-control" name="r_purpose">
                </div>
                <div class="form-group col-md-3">
                <label>Payment by</label>
                <select id="inputState" class="form-control" onchange="showDiv('pfcode', this)" name="payby">
                    <option selected>Choose...</option>
                    <option>Institute</option>
                    <option>Project_Fund</option>
                    <option>Indentor</option>
                    <option>Guest</option>
                </select>
                </div>
                <div class="form-group col-md-3" id="pfcode">
                <label>Project Fund Code</label>
                <input type="text" class="form-control" name="pf_code">
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="form-group col-md-2">
                <label>Food Type NOS</label><br>

                <label>Veg NOS</label>
                </div>
                <div class="form-group col-md-3">
                <label>Breakfast</label>
                <input type="number" class="form-control" placeholder="Veg breakfast" name="vbf">
                </div>
                <div class="form-group col-md-3">
                <label>Lunch</label>
                <input type="number" class="form-control" placeholder="Veg lunch" name="vlun">
                </div>
                <div class="form-group col-md-3">
                <label>Dinner</label>
                <input type="number" class="form-control" placeholder="Veg Dinner" name="vdin">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                <label>Non-Veg NOS</label>
                </div>
                <div class="form-group col-md-3">
                <input type="number" class="form-control" placeholder="Non-Veg breakfast" name="nvbf">
                </div>
                <div class="form-group col-md-3">
                <input type="number" class="form-control" placeholder="Non-Veg lunch" name="nvlun">
                </div>
                <div class="form-group col-md-3">
                <input type="number" class="form-control" placeholder="Non-Veg Dinner" name="nvdin">
                </div>
            </div>
            <br>
            <div class="row justify-content-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form> 

        
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