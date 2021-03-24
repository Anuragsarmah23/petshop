<?php
	session_start();
?>
<html>
	<head>
		<title>EDIT PET|PET SHOP</title>
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
		<div class="main">
		<div class="formMain">
			<div class="regFormElements">
				<div class="card-header">
					EDIT PET
					<hr>
				</div>
				<form method="post" class="regForm" id="validateIt" action="updatePets.php">
				<div class="row">
					  <?php
							$id=$_GET["id"];
							$_SESSION["petID"]=$id;
							$con=mysqli_connect("localhost","root","","petshop");
							if(!$con)
								die("error");
							$q="select * from pets where id='$id'";
							$q_run=mysqli_query($con,$q);
							$row=mysqli_fetch_assoc($q_run);
					  ?>
					  <div class="form-group col-md-6">
						<label for="type" class="labelElements">Enter Type</label>
						<input type="text" name="type" class="form-control" id="type" disabled value="<?php echo $row["type"]; ?>" style="background:transparent;">
					  </div>
					  <div class="form-group col-md-6">
						<label for="breed" class="labelElements">Enter Breed</label>
						<input type="text" name="breed" class="form-control" id="breed" disabled value="<?php echo $row["breed"]; ?>" style="background:transparent;">
					  </div>
					  <div class="form-group col-md-6">
						<label for="price" class="labelElements">Enter Price(Rs.)</label>
						<input type="number" name="price" class="form-control" id="price" data-rule-required="true" data-msg-required="Please Enter Price" placeholder="Enter Price" value="<?php echo $row["price"]; ?>">
					  </div>
					  <div class="form-group col-md-6">
						<label for="qty" class="labelElements">Enter Quantity</label>
						<input type="number" name="qty" class="form-control" id="qty" data-rule-required="true" data-msg-required="Please Enter Quantity" placeholder="Enter Quantity" value="<?php echo $row["qty"]; ?>">
					  </div>
					  <div class="form-group col-md-6">
						<label for="discount" class="labelElements">Enter Discount</label>
						<input type="text" name="discount" class="form-control" id="discount" data-rule-required="true" data-msg-required="Please Enter Discount" placeholder="Enter Discount" value="<?php echo $row["discount"]; ?>">
					  </div>
				  </div>
				  <button type="submit" class="btn sub2 col-md-4" style="margin-top:0;">UPDATE</button>
				</form>
			</div>
		</div>
	</div>
	
	<script>
		$('#validateIt').validate();
	</script>
		
	</body>
</html>