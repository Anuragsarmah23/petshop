<?php
	//RADHEY
	session_start();
	$id=$_POST["id"];
	$price=$_POST["price"];
	$_SESSION["supplyIDP"]=$id;
	$_SESSION["supplyPriceP"]=$price;
?>	
<script>
		var price=<?php echo $price; ?>;
		var confirmation=confirm("Quick buying unit quantity..\nTo buy more than one quantity purchase through cart..\n Are you sure you want to buy this product at Rs."+price+"..\npress ok to buy or cancel to abort..");
		var supplyID=<?php echo $id; ?>;
		if(confirmation == false){
			setTimeout(function (){
				location.href="viewSupply.php?id="+supplyID;
			});	 
		}	
		else
			setTimeout(function (){
				location.href="buySupplyParse.php";
			});
</script>

	

	