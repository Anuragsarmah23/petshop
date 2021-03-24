<?php
	session_start();
?>
<html>
	<head>
		<title>EDIT PROFILE|PET SHOP</title>
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

		<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="css/form.css" rel="stylesheet">
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-2.1.0.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.validate.min.js"></script>
		
	</head>
	<body>
		<?php
			$id=$_GET["id"];
			$_SESSION["customerEID"]=$id;
			$con=mysqli_connect("localhost","root","","petshop");
			$q="select * from customer where id='$id'";
			$q_run=mysqli_query($con,$q);
			$row=mysqli_fetch_assoc($q_run);
		?>
		<div class="main">
		<div class="formMain">
			<div class="regFormElements">
				<div class="card-header">
					EDIT PROFILE
					<hr>
				</div>
				<form method="post" class="regForm" id="validateIt" action="updateCustomer.php">
				<div class="row">
					  <div class="form-group col-md-4">
						<label for="fname" class="labelElements">Enter Your First Name</label>
						<input type="text" name="fname" data-rule-required="true" data-msg-required="Please Enter Your First Name" class="form-control" id="fname" placeholder="Enter First Name" value="<?php echo  $row['fname']; ?>">
					  </div>
					  <div class="form-group col-md-4">
						<label for="mname" class="labelElements">Enter Your Middle Name</label>
						<input type="text" name="mname" class="form-control" id="mname" data-rule-required="true" data-msg-required="Please Enter Your Middle Name" placeholder="Enter Middle Name" value="<?php echo  $row['mname']; ?>">
					  </div>
					  <div class="form-group col-md-4">
						<label for="lname" class="labelElements">Enter Your Last Name</label>
						<input type="text" name="lname" data-rule-required="true" data-msg-required="Please Enter Your Last Name" class="form-control" id="lname" placeholder="Enter Last Name" value="<?php echo  $row['lname']; ?>">
					  </div>
					  
				  </div>
				  <div class="row">
				  <div class="form-group col-md-6">
						<label for="email" class="labelElements">Enter Your E-Mail</label>
						<input type="email" name="email" data-rule-required="true" data-msg-required="Please Enter Your Email" data-rule-email="true" data-msg-email="Please enter a valid email" class="form-control" id="email" placeholder="Enter Email" value="<?php echo  $row['email']; ?>">
					  </div>
					  <div class="form-group col-md-6">
						<label for="cno" class="labelElements">Enter Your Contact Number</label>
						<input type="text" name="cno" data-rule-minlength="10" data-rule-maxlength="10" data-rule-numbersonly="true" data-msg-numbersonly="Contact number do not expects any alphabet" data-rule-required="true" data-msg-required="Please Enter Your Contact Number" class="form-control" id="cno" placeholder="Enter Contact Number" value="<?php echo  $row['contact']; ?>">
					  </div>
				  </div>
				  <div class="row">
					<div class="form-group col-md-4">
						<label for="address" class="labelElements">Enter Your Address</label>
						<input type="text" name="address" data-rule-required="true" data-msg-required="Please Enter Your Address" class="form-control" id="address" placeholder="Enter Address" value="<?php echo  $row['address']; ?>">
					 </div>
					 <div class="form-group col-md-4">
						<label for="city" class="labelElements">Select Your City</label>
						<select name="city" class="form-control city" data-rule-required="true" data-msg-required="Please select your city">
							<option selected value="<?php echo  $row['email']; ?>"> <?php echo  $row['city']; ?> </option>
							<option value="Bongaigaon">Bongaigaon</option>
							<option value="Guwahati">Dibrugarh</option>
							<option value="Goalpara">Goalpara</option>
							<option value="Golaghat">Golaghat</option>
							<option value="Guwahati">Guwahati</option>
							<option value="Kokrajhar">Kokrajhar</option>
							<option value="Nalbari">Nalbari</option>
							<option value="Rangiya">Rangiya</option>
							<option value="Silchar">Silchar</option>
							<option value="Tinsukia">Tinsukia</option>	
						</select>
					 </div>
					 <div class="form-group col-md-4">
						<label for="pin" class="labelElements">Enter Your Pin</label>
						<input type="text" name="pin" data-rule-required="true" data-msg-required="Please Enter Your Pin" class="form-control" id="pin" placeholder="Enter Pin" value="<?php echo  $row['pin']; ?>">
					 </div>
				  </div>
				  <div class="row">
					  <div class="form-group col-md-6">
						<label for="password" class="labelElements">Enter Password</label>
						<input type="text" name="password" data-rule-password="true" data-msg-password="Enter combination of numbers and letters of minimum 8 characters" data-rule-required="true" data-msg-required="Please Enter Your Password" class="form-control" id="password" placeholder="Password" value="<?php echo  $row['password']; ?>">
					  </div>
				  </div>
				  <button type="submit" class="btn sub2 col-md-4" style="margin-top:0;">Update</button>
				</form>
			</div>
		</div>
	</div>
	<script>
		jQuery.validator.addMethod("numbersonly", function(value, element) {
			return this.optional(element) || /^[0-9]+$/i.test(value);
		}, "Enter Number");
	</script>
		
	<script>
		jQuery.validator.addMethod("password", function(value, element) {
			return this.optional(element) || /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/i.test(value);
		}, "Enter combination of numbers and alphabets");
	</script>
	
	<script>
		$('#validateIt').validate();
	</script>
		
	</body>
</html>