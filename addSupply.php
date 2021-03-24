<html>
	<head>
		<title>ADD SUPPLY|PET SHOP</title>
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
					ADD SUPPLY
					<hr>
				</div>
				<form method="post" class="regForm" id="validateIt" action="addSupplyParse.php" enctype="multipart/form-data">
				<div class="row">
					  <div class="form-group col-md-6">
						<label for="type" class="labelElements">Enter Type</label>
						<input type="text" name="type" data-rule-required="true" data-msg-required="Please Enter Type" class="form-control" id="type" placeholder="Enter Type">
					  </div>
					  <div class="form-group col-md-6">
						<label for="item" class="labelElements">Enter Item</label>
						<input type="text" name="item" class="form-control" id="item" data-rule-required="true" data-msg-required="Please Enter Item" placeholder="Enter Item">
					  </div>
					  <div class="form-group col-md-6">
						<label for="price" class="labelElements">Enter Price(Rs.)</label>
						<input type="number" name="price" class="form-control" id="price" data-rule-required="true" data-msg-required="Please Enter Price" placeholder="Enter Price">
					  </div>
					  <div class="form-group col-md-6">
						<label for="qty" class="labelElements">Enter Quantity</label>
						<input type="number" name="qty" class="form-control" id="qty" data-rule-required="true" data-msg-required="Please Enter Quantity" placeholder="Enter Quantity">
					  </div>
					  <div class="form-group col-md-6">
						<label for="discount" class="labelElements">Enter Discount</label>
						<input type="text" name="discount" class="form-control" id="discount" data-rule-required="true" data-msg-required="Please Enter Discount" placeholder="Enter Discount">
					  </div>
					  <div class="form-group col-md-6">
						<label for="File" class="labelElements">Image</label>
					 	<input type="file" name="File" data-rule-required="true" data-msg-required="Please Select An Image" class="custom-file-input form-control" id="File">
					  </div>
				  </div>
				  <button type="submit" class="btn sub2 col-md-4" style="margin-top:0;">ADD</button>
				</form>
			</div>
		</div>
	</div>
	
	<script>
		$('#validateIt').validate();
	</script>
		
	</body>
</html>