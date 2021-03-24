<?php
	//RADHEY
	session_start();
	$id=$_POST["id"];
	$price=$_POST["price"];
	$_SESSION["petIDP"]=$id;
	$_SESSION["petPriceP"]=$price;
?>	
<script>
		var price=<?php echo $price; ?>;
		var confirmation=confirm("Quick buying unit quantity..\nTo buy more than one quantity purchase through cart..\n Are you sure you want to buy this product at Rs."+price+"..\npress ok to buy or cancel to abort..");
		var petID=<?php echo $id; ?>;
		if(confirmation == false){
			setTimeout(function (){
				location.href="viewPet.php?id="+petID;
			});	 
		}	
		else
			setTimeout(function (){
				location.href="buyPetParse.php";
			});
</script>

	

	