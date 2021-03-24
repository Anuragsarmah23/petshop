<?php
	session_start();
	$con=mysqli_connect('localhost','root','','petshop');
	if(!$con){
		die("CONNECTION NOT FOUND".mysqli_error());
	}
	$id=$_GET["id"];
	$q="select * from pets where id='$id'";
	$q_run=mysqli_query($con,$q);
	$row=mysqli_fetch_assoc($q_run);
?>
<html>
	<head>
		<title><?php echo $row["breed"]; ?>|Pet Detail</title>
		<link rel="stylesheet" href="css/view.css">
		</head>
	<body>
		<div class="container">
			<div class="nav">
				<div class="nav-logo">
					<a href="index.php"><span>PET SHOP</span></a>
				</div>
			</div>
			<div class="mainContent" style="height:75vh;">
				<div class="content">
					<?php 
						$pPrice=$row['price']-$row['discount'];		
					?>
					<div class="contentImage">
						<img src="img/pets/<?php echo $row['pic']; ?>" height="300" width="300" style="margin-right:45px;margin-top:50px;">
					</div>
					<div class="detailContent">
						<table style="border-spacing:0 25px;">
							<tr>
								<th class="head">TYPE</th>
								<td class="data"><?php echo $row['type']; ?></td>
							</tr>
							<tr class="rowData">
								<th class="head">BREED</th>
								<td class="data"><?php echo $row['breed']; ?></td>
							</tr>
							<tr class="rowData">
								<th class="head">ORIGINAL PRICE</th>
								<td class="data">Rs. <?php echo $row['price']; ?></td>
							</tr>
							<tr class="rowData">
								<th class="head">DISCOUNT</th>
								<td class="data">Rs. <?php echo $row['discount']; ?></td>
							</tr>
							<tr class="rowData">
								<th class="head">PAYABLE PRICE</th>
								<td class="data">Rs. <?php echo $pPrice; ?></td>
							</tr>
						</table>
						<?php
							$cid=$_SESSION["customerID"];
							if($row["qty"] > 0){
								$q2="select * from cart where petID='$id' and customerID='$cid'";
								$q2_run=mysqli_query($con,$q2);
								$row2=mysqli_fetch_assoc($q2_run);
								$newQty=$row['qty']-$row2['cartQty'];
								if($newQty<=0){			
						?>
			
						<a href="cart.php" class="btn" style="text-decoration:none;padding:12px;">BUY FROM CART</a>
								<?php }else{
									if(mysqli_num_rows($q2_run)>0){
								?>
								<form method="post" action="updatePetCart.php">
									<input type="hidden" name="cartID" value="<?php echo $row2['id']; ?>">
									<input type="hidden" name="cartQtyPrev" value="<?php echo $row2['cartQty']; ?>">
									<input type="hidden" name="price" value="<?php echo $row2['baseAmount']; ?>">
									<input type="hidden" name="totalPrice" value="<?php echo $row2['totalAmount']; ?>">
									<select name="cartQty" style="padding:5px;font-size:14px;border:1px solid #fff;width:100%;" required>
										<option value="" disabled selected>Select quantity to be added to cart</option>
										<?php for($i=1;$i<=$newQty;$i++){ ?>
												<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php } ?>
									</select><br><br>
									<input type="submit" value="ADD TO CART" class="btn">
									<a href="cart.php" class="btn" style="text-decoration:none;padding:12px;margin-left:10px;">BUY FROM CART</a>
								</form>
								
								
									<?php }else{?>
						<form method="post" action="addPetCartParse.php">
							<input type="hidden" name="id" value="<?php echo $id; ?>">
							<input type="hidden" name="price" value="<?php echo $pPrice; ?>">
							<select name="cartQty" style="padding:5px;font-size:14px;border:1px solid #fff;width:100%;" required>
								<option value="" disabled selected>Select quantity to be added to cart</option>
								<?php for($i=1;$i<=$newQty;$i++){ ?>
										<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?>
							</select><br><br>
							<input type="submit" value="ADD TO CART" class="btn">
						</form>
						
						<form method="post" action="buyPet.php" style="margin-top:-56px;margin-left:160px;">
							<input type="hidden" name="id" value="<?php echo $id; ?>">
							<input type="hidden" name="price" value="<?php echo $row['price']; ?>">
							<input type="submit" value="BUY" class="btn">
						</form>
								<?php }
								}
								?>
						<?php
							}else{
								echo '<p style="font-size:20px;">Currently Out Of Stock</p>';
							}
						?>
					</div>
				</div>
			</div>
			<div class="footer">
				Copyright &copy; 2019 PET SHOP 
			</div>
		</div>
	</body>
</html>