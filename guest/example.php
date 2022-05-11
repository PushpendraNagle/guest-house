

<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>pushpendra_1901cs44@iitp.ac.in</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
<link href="css/self.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="js/dt/jquery.datetimepicker.css"/>
<script type="text/javascript" src="js/jquery-1.12.4.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script src="js/dt/jquery.js"></script>
<script src="js/dt/build/jquery.datetimepicker.full.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datetimepicker({minDate: 0});
  } );
  </script>
  <script>
  $( function() {
    $( "#datepicker1" ).datetimepicker({minDate: 0});
  } );
  </script>
<!-- validation  -->
<!-- <script type="text/javascript" src="valid/jquery.min.js"></script> -->
<script type="text/javascript" src="valid/jquery.form-validator.min.js"></script>
<script>
$(document).ready(function () {
    $("#form").validate({
        rules: {
            "g_name": {
                required: true,
                minlength: 5
            },
			"g_desi": {
                required: true,
            },
			"g_phone": {
                required: true,
            },
            "g_email": {
                required: true,
                email: true
            }
        	},
			"g_add": {
                required: true,
            },
			"g_city": {
                required: true,
            },
			"g_pin": {
                required: true,
            },
			"g_nop": {
                required: true,
            },
			"g_payment": {
                required: true,
            },
			"pco_data": {
                required: true,
            },
			"g_nor": {
                required: true,
            },
			"g_at": {
                required: true,
            },
			"g_date_from": {
                required: true,
				date:true
            },
			"g_date_to": {
                required: true,
            },
			"g_food": {
                required: true,
            },
				"g_pov": {
                required: true,
            },
        messages: {
            "g_name": {
                required: "Please, enter a name"
            },
			"g_desi": {
                required: "Please, enter designation"
            },
			"g_phone": {
                required: "Please, enter phone no."
            },
            "g_email": {
                required: "Please, enter an email",
                email: "Email is invalid"
            }
        },
		"g_add": {
                required: "Please, enter an address"
            },
			"g_city": {
                required: "Please, enter city"
            },
			"g_pin": {
                required: "Please, enter pin no."
            },
			"g_nop": {
                required: "Please, enter no. of person"
            },
			"g_payment": {
                required: "Please, enter payment mode"
            },
			"pco_data": {
                required: "Please, enter Project Code no."
            },
			"g_nor": {
                required: "Please, enter no. of rooms"
            },
			"g_at": {
                required: "Please, accomodation type"
            },
			"g_date_from": {
                required: " * required: You must enter a destruction date",
        		date: "Can contain digits only"
            },
			"g_date_to": {
                required: "Please, enter to date"
            },
			"g_food": {
                required: "Please, select food choice"
            },
			"g_pov": {
                required: "Please, purpose of visit"
            },
        submitHandler: function (form) { // for demo
            alert('valid form submitted'); // for demo
            return false; // for demo
        }
    });

});
</script>

    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                   <a class="brand" href="home.php">Home</a>
                    <a class="brand" href="guest_reg.php">Room Booking</a>
                    <a class="brand" href="browse.php">Upload PDF</a>
                    <div class="nav-collapse collapse">
                       <ul class="nav pull-right">
                       <a class="brand" href="#">Mr.Pushpendra Nagle </a>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> 
								pushpendra_1901cs44@iitp.ac.in <i class="caret"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-5" href="logout.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        
                </div>
                    <!--/.nav-collapse -->
                </div>
            </div>

<!---form 1 -->
<div id="guestreg">
<center>This form is only valid for two (2) person, if person is more than two (2), please fill up separate form.</center></br>
<form name="form" action="guest_add.php" id="form" method="post">
  <table width="70%" align="center" cellpadding="3" cellspacing="3" border="0">
    <tr>
      <td colspan="2" style="color: #fff; background: #75C5DF; text-align: left"><strong>Guest Information</strong></td>
    </tr>
    <tr>
      <td width="200">Guest/Visitor Name_1:</td>
      <td><input name="g_name" type="text" value="" required/></td>
      <td width="200">Guest/Visitor Name_2:</td>
      <td><input name="g_name_1" type="text" value="" required/></td>
      
    </tr>
    <tr>
      <td width="200">Designation:</td>
      <td><input name="g_desi" type="text" value="" required /></td>
      <td width="200">Designation:</td>
      <td><input name="g_desi_1" type="text" value="" required /></td>
       </tr>
     <tr>
      <td width="200">Phone:</td>
      <td><input name="g_phone" type="text" value="" required /></td>
       <td width="200">Phone:</td>
      <td><input name="g_phone_1" type="text" value="" required /></td>
      
    </tr>
      
    </tr>
     <tr>
     
      <td width="200">Email:</td>
      <td><input name="g_email" type="email" value="" required /></td>
      
    </tr>
    <tr>
      <td colspan="2" style="color: #fff; background: #75C5DF; text-align: left"><strong>Guest Address:</strong></td>
    </tr>
    <tr>
      <td width="200">Flat/Apt/Street No:</td>
      <td><input name="g_add" type="text" value="" required /></td>
      <td width="200">City:</td>
      <td><input name="g_city" type="text" value="" required /></td>
    </tr>
    <tr>
      <td width="200">State:</td>
      <td><input name="g_state" type="text" value="" required /></td>
      <td width="200">Pin:</td>
      <td><input name="g_pin" type="text" value="" required /></td>
    </tr>
    
    
     <tr>
      <td>No. of Person:</td>
      <td><input name="g_nop" type="text" value="" required /></td>
      <td width="200">Payment by:</td>
      <td><select name="g_payment" id="payment_mode" >
        <option value="" >Please choose....</option>
        <option>Institute</option>
        <option>Project_Fund</option>
        <option>Indentor</option>
        <option>Guest</option>
       </select></td>
    </tr>
    
<tr>  <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>
      <div id="pco" style="display:none;">
<label for="PCN">Project Code Number</label>
<input type="text" name="pco_data" placeholder="Enter Project Code Number" />
</div>
<script>
	$('#payment_mode').on('change',function(){
        if( $(this).val()==="Project_Fund"){
        $("#pco").show()
        }
        else{
        $("#pco").hide()
        }
    });
	</script>
</td>
</tr>  

    <tr>
      <td>No. of Rooms:</td>
      <td><input name="g_nor" type="text" value="" required /></td>
      <td width="200">Accomodation Type:</td>
      <td><select name="g_at" required>
        <option value="" >Please choose....</option>
        <option>Attached bathroom</option>
        <option>Non Attached bathroom</option>
      </select></td>
    </tr>
    <tr>
      <td width="200">Date & Time of Arrival:</td>
      <td><input name="g_date_from" type="text" id="datepicker" required></td>
      <td width="200"> Date & Time of Departure:</td>
      <td><input name="g_date_to" type="text" id="datepicker1" required></td>
    </tr>
    <tr>
      <td>Purpose of visit:<br><font color="red">(*Mandatory field)</font></td>
      <td><select name="g_pov" id="pov" required>
        <option value="">Please choose....</option>
        <option>Official</option>
        <option>Personal</option>
      </select></td>
 <td>
      <div id="pov1" style="display:none;">
<label for="POV">Describe Official Purpose</label>
<input type="text" name="pov_data" placeholder="Describe Official Purpose" />
</div>
<div id="pov2" style="display:none;">
<label for="POV">Describe Personal relation</label>
<input type="text" name="pov_data" placeholder="Describe Personal Relation" />
</div>
<script>
	$('#pov').on('change',function(){
        if( $(this).val()==="Official"){
        $("#pov1").show()
		$("#pov2").hide()
        }
        else{
        $("#pov2").show()
		$("#pov1").hide()
        }
    });
	</script>
   </td>
   </tr> 
    
    
     <tr align="left">
     	<th>Nos of Food Type</th>
     	<th>Breakfast</th>
        <th>Lunch</th>
        <th>Dinner</th>
     </tr>
      <tr>
      	<td>Nos for Veg:</td>
        <td><input name="g_food" type="text" value=""></td>
		<td><input name="v_lunch" type="text" value=""></td>
      	<td><input name="v_dinner" type="text" value=""></td>
     </tr>
		<tr>
        	<td>Nos for Non-Veg:</td>
            <td><input name="nv_bf" type="text" value=""></td>
            <td><input name="nv_lunch" type="text" value=""></td>
			<td><input name="nv_dinner" type="text" value=""></td>
         </tr>
    
    <tr>
      <td colspan="2" style="color: #fff; background: #75C5DF; text-align: left"><strong>Indentor Information</strong></td>
    </tr>
    <tr>
      <td>Emp. Id:</td>
      <td><input name="i_emp_id" type="text" value="1901CS44" readonly /></td>
      <td width="200">Indentor Name:</td>
      <td><input name="i_name" type="text" value="Pushpendra Nagle" readonly /></td>
    </tr>
    <tr>
      <td>Designation:</td>
      <td><input name="i_desi" type="text" value="First year student" readonly /></td>
      <td width="200">Department:</td>
      <td><input name="i_dept" type="text" value="CSE" readonly /></td>
    </tr>
    <tr>
      <td>Phone:</td>
      <td><input name="i_phone" type="text" value="7000038421" readonly /></td>
      <td width="200">Email:</td>
      <td><input name="i_email" type="text" value="pushpendra_1901cs44@iitp.ac.in" readonly /></td>
    </tr>
    <tr>
      <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">Countersignature of the concerned HOD/HOS <br/>
        (in case the purpose of visit is official)</td>

      <td>Signature of the Indentor with date</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">Approval of the Registrar/Director</td>
      <td>Signature of Incharge Guest House with Date</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="submit" type="submit" value="Submit" /></td>
    </tr>
  </table>
</form>
    </div></div>
        
        <!--/.fluid-container-->
<!--        <script src="bootstrap/js/jquery-1.9.1.min.js"></script>  conflict with calendar -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/scripts.js"></script>



        
    </body>

</html>
