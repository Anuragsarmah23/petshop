<?php
	session_start();
	if(!isset($_SESSION["customerID"]))
		header("location:index.php");
	// $con=mysqli_connect('localhost','root','','petshop');
	// if(!$con)
 			// die("CONNECTION NOT FOUND".mysqli_error());
	// $id=$_SESSION["customerID"];
	// $q="select * from customer where id='$id'";
	// $q_run=mysqli_query($con,$q);
	// $row=mysqli_fetch_assoc($q_run);
?><html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Customer|PET SHOP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel" style="background:#c725e3;">
        <nav class="navbar navbar-expand-sm navbar-default" style="background:#c725e3;">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="menu-title">
                        <a href="main.php" class="text-light"><i class="menu-icon fa fa-laptop text-light"></i>Dashboard </a>
                    </li>
                    <li class="active">
						<a href="productsUser.php"><i class="menu-icon fa fa-paw"></i>Products</a>
					</li>
					<li class="menu-title">
                        <a href="cart.php" class="text-light"><i class="menu-icon fa fa-shopping-cart text-light"></i>Cart</a>
                    </li>
					<li class="menu-title">
						<a href="transactionsUser.php" class="text-light"><i class="menu-icon fa fa-history text-light"></i>Transactions</a>
					</li>
                </ul>
            </div>
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header bg-dark">
            <div class="top-left">
                <div class="navbar-header bg-dark">
                    <a class="navbar-brand bg-dark" href="index.php">PET SHOP</a>
                </div>
            </div>
			<div class="top-right">
				<div class="header-menu">	
                    <div class="searchAreaM">
						<div class="dropdown">
							<span class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-user-circle-o" style="font-size:25px;margin-top:2%;margin-left:75%;color:#129945;cursor:pointer;"></i>
							</span>
							<div class="dropdown-menu" style="font-size:14px;margin-top:9%;margin-left:50%;color:#129945;cursor:pointer;">
								<a class="dropdown-item"  href="logout.php">Log Out</a>
							</div>
						</div>
					</div>
				</div>	
			</div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <?php 
				$con=mysqli_connect("localhost","root","","petshop");
				if(!$con)
					die("error");
				$q="select * from pets where type='dog'";
				$q_run=mysqli_query($con,$q);
				$rows=mysqli_num_rows($q_run);
			?>
			<h3><b>DOGS</b></h3><br>
			<div id="carousel-example-multi" class="carousel slide carousel-multi-item v-2 bg-dark p-5" data-ride="carousel">


			  <!-- Indicators -->
			  <ol class="carousel-indicators">
				<li data-target="#carousel-example-multi" data-slide-to="0" class="active"></li>
				<?php for($i=1;$i<=$rows;$i++){ ?>
				<li data-target="#carousel-example-multi" data-slide-to="<?php echo $i; ?>"></li>
				<?php } ?>
			  </ol>
			  <!--/.Indicators-->

			  <div class="carousel-inner" role="listbox">

				<div class="carousel-item active">
				  <div class="col-12 col-md-4">
					<div class="card mb-2 bg-transparent">
					  <img class="card-img-top" src="img/pets/sample.png"
						alt="Card image cap" width="200" height="200">
					  <div class="card-body">
						<h4 class="card-title font-weight-bold">Dummy</h4>
						<p class="card-text">Not for selling purpose</p>
						<a class="btn btn-primary btn-md btn-rounded">Dummy</a>
					  </div>
					</div>
				  </div>
				</div>
				<?php while($row=mysqli_fetch_assoc($q_run)){ ?>
				<div class="carousel-item">
				  <div class="col-12 col-md-4">
					<div class="card mb-2 bg-transparent">
					  <img class="card-img-top" src="img/pets/<?php echo $row['pic']; ?>"
						alt="Card image cap" width="200" height="200">
					  <div class="card-body">
					  <?php
							$dPrice=$row["discount"];
							if($dPrice>0){
								$newPrice=$row["price"]-$dPrice;
					 ?>
						<h4 class="card-title font-weight-bold">Rs.<span style='color:#fff;text-decoration:line-through'><?php echo $row['price']; ?></span><?php echo $newPrice; ?></h4>
					<?php   }else{
							
					  ?>
						<h4 class="card-title font-weight-bold">Rs.<?php echo $row['price']; ?></h4>
					<?php    } ?>
						<p class="card-text"><?php echo $row['breed']; ?></p>
						<a class="btn btn-primary btn-md btn-rounded" href="viewPet.php?id=<?php echo $row['id']; ?>">View</a>
					  </div>
					</div>
				  </div>
				</div>
				<?php } ?>
			  </div>
			   <a class="carousel-control-prev" href="#carousel-example-multi" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carousel-example-multi" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			  </a>
				
			</div>
			<br>
			<?php 
				$con=mysqli_connect("localhost","root","","petshop");
				if(!$con)
					die("error");
				$q="select * from pets where type='cat'";
				$q_run=mysqli_query($con,$q);
				$rows=mysqli_num_rows($q_run);
			?>
			<h3><b>CATS</b></h3><br>
			<div id="carousel-example-multi" class="carousel slide carousel-multi-item v-2 bg-dark p-5" data-ride="carousel">


			  <!-- Indicators -->
			  <ol class="carousel-indicators">
				<li data-target="#carousel-example-multi" data-slide-to="0" class="active"></li>
				<?php for($i=1;$i<=$rows;$i++){ ?>
				<li data-target="#carousel-example-multi" data-slide-to="<?php echo $i; ?>"></li>
				<?php } ?>
			  </ol>
			  <!--/.Indicators-->

			  <div class="carousel-inner" role="listbox">

				<div class="carousel-item active">
				  <div class="col-12 col-md-4">
					<div class="card mb-2 bg-transparent">
					  <img class="card-img-top" src="img/pets/sample.png"
						alt="Card image cap" width="200" height="200">
					  <div class="card-body">
						<h4 class="card-title font-weight-bold">Dummy</h4>
						<p class="card-text">Not for selling purpose</p>
						<a class="btn btn-primary btn-md btn-rounded">Dummy</a>
					  </div>
					</div>
				  </div>
				</div>
				<?php while($row=mysqli_fetch_assoc($q_run)){ ?>
				<div class="carousel-item">
				  <div class="col-12 col-md-4">
					<div class="card mb-2 bg-transparent">
					  <img class="card-img-top" src="img/pets/<?php echo $row['pic']; ?>"
						alt="Card image cap" width="200" height="200">
					  <div class="card-body">
						<?php
							$dPrice=$row["discount"];
							if($dPrice>0){
								$newPrice=$row["price"]-$dPrice;
					 ?>
						<h4 class="card-title font-weight-bold">Rs.<span style='color:#fff;text-decoration:line-through'><?php echo $row['price']; ?></span><?php echo $newPrice; ?></h4>
					<?php   }else{
							
					  ?>
						<h4 class="card-title font-weight-bold">Rs.<?php echo $row['price']; ?></h4>
					<?php    } ?>
						<p class="card-text"><?php echo $row['breed']; ?></p>
						<a class="btn btn-primary btn-md btn-rounded" href="viewPet.php?id=<?php echo $row['id']; ?>">View</a>
					  </div>
					</div>
				  </div>
				</div>
				<?php } ?>
			  </div>
			   <a class="carousel-control-prev" href="#carousel-example-multi" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carousel-example-multi" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			  </a>
				
			</div>
			
			<br>
			<?php 
				$con=mysqli_connect("localhost","root","","petshop");
				if(!$con)
					die("error");
				$q="select * from supplies where type='dogfood'";
				$q_run=mysqli_query($con,$q);
				$rows=mysqli_num_rows($q_run);
			?>
			<h3><b>DOG FOOD</b></h3><br>
			<div id="carousel-example-multi" class="carousel slide carousel-multi-item v-2 bg-dark p-5" data-ride="carousel">


			  <!-- Indicators -->
			  <ol class="carousel-indicators">
				<li data-target="#carousel-example-multi" data-slide-to="0" class="active"></li>
				<?php for($i=1;$i<=$rows;$i++){ ?>
				<li data-target="#carousel-example-multi" data-slide-to="<?php echo $i; ?>"></li>
				<?php } ?>
			  </ol>
			  <!--/.Indicators-->

			  <div class="carousel-inner" role="listbox">

				<div class="carousel-item active">
				  <div class="col-12 col-md-4">
					<div class="card mb-2 bg-transparent">
					  <img class="card-img-top" src="img/pets/shopping.jpg"
						alt="Card image cap" width="200" height="200">
					  <div class="card-body">
						<h4 class="card-title font-weight-bold">Dummy</h4>
						<p class="card-text">Not for selling purpose</p>
						<a class="btn btn-primary btn-md btn-rounded">Dummy</a>
					  </div>
					</div>
				  </div>
				</div>
				<?php while($row=mysqli_fetch_assoc($q_run)){ ?>
				<div class="carousel-item">
				  <div class="col-12 col-md-4">
					<div class="card mb-2 bg-transparent">
					  <img class="card-img-top" src="img/pets/<?php echo $row['pic']; ?>"
						alt="Card image cap" width="200" height="200">
					  <div class="card-body">
						<?php
							$dPrice=$row["discount"];
							if($dPrice>0){
								$newPrice=$row["price"]-$dPrice;
					 ?>
						<h4 class="card-title font-weight-bold">Rs.<span style='color:#fff;text-decoration:line-through'><?php echo $row['price']; ?></span><?php echo $newPrice; ?></h4>
					<?php   }else{
							
					  ?>
						<h4 class="card-title font-weight-bold">Rs.<?php echo $row['price']; ?></h4>
					<?php    } ?>
						<p class="card-text"><?php echo $row['item']; ?></p>
						<a class="btn btn-primary btn-md btn-rounded" href="viewSupply.php?id=<?php echo $row['id']; ?>">View</a>
					  </div>
					</div>
				  </div>
				</div>
				<?php } ?>
			  </div>
			   <a class="carousel-control-prev" href="#carousel-example-multi" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carousel-example-multi" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			  </a>
				
			</div>
			
			<br>
			<?php 
				$con=mysqli_connect("localhost","root","","petshop");
				if(!$con)
					die("error");
				$q="select * from supplies where type='aquarium'";
				$q_run=mysqli_query($con,$q);
				$rows=mysqli_num_rows($q_run);
			?>
			<h3><b>AQUARIUM</b></h3><br>
			<div id="carousel-example-multi" class="carousel slide carousel-multi-item v-2 bg-dark p-5" data-ride="carousel">


			  <!-- Indicators -->
			  <ol class="carousel-indicators">
				<li data-target="#carousel-example-multi" data-slide-to="0" class="active"></li>
				<?php for($i=1;$i<=$rows;$i++){ ?>
				<li data-target="#carousel-example-multi" data-slide-to="<?php echo $i; ?>"></li>
				<?php } ?>
			  </ol>
			  <!--/.Indicators-->

			  <div class="carousel-inner" role="listbox">

				<div class="carousel-item active">
				  <div class="col-12 col-md-4">
					<div class="card mb-2 bg-transparent">
					  <img class="card-img-top" src="img/pets/shopping.jpg"
						alt="Card image cap" width="200" height="200">
					  <div class="card-body">
						<h4 class="card-title font-weight-bold">Dummy</h4>
						<p class="card-text">Not for selling purpose</p>
						<a class="btn btn-primary btn-md btn-rounded">Dummy</a>
					  </div>
					</div>
				  </div>
				</div>
				<?php while($row=mysqli_fetch_assoc($q_run)){ ?>
				<div class="carousel-item">
				  <div class="col-12 col-md-4">
					<div class="card mb-2 bg-transparent">
					  <img class="card-img-top" src="img/pets/<?php echo $row['pic']; ?>"
						alt="Card image cap" width="200" height="200">
					  <div class="card-body">
						<?php
							$dPrice=$row["discount"];
							if($dPrice>0){
								$newPrice=$row["price"]-$dPrice;
					 ?>
						<h4 class="card-title font-weight-bold">Rs.<span style='color:#fff;text-decoration:line-through'><?php echo $row['price']; ?></span><?php echo $newPrice; ?></h4>
					<?php   }else{
							
					  ?>
						<h4 class="card-title font-weight-bold">Rs.<?php echo $row['price']; ?></h4>
					<?php    } ?>
						<p class="card-text"><?php echo $row['item']; ?></p>
						<a class="btn btn-primary btn-md btn-rounded" href="viewSupply.php?id=<?php echo $row['id']; ?>">View</a>
					  </div>
					</div>
				  </div>
				</div>
				<?php } ?>
			  </div>
			   <a class="carousel-control-prev" href="#carousel-example-multi" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carousel-example-multi" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			  </a>
				
			</div>
			
			<br>
			<?php 
				$con=mysqli_connect("localhost","root","","petshop");
				if(!$con)
					die("error");
				$q="select * from supplies where type='belts'";
				$q_run=mysqli_query($con,$q);
				$rows=mysqli_num_rows($q_run);
			?>
			<h3><b>BELTS</b></h3><br>
			<div id="carousel-example-multi" class="carousel slide carousel-multi-item v-2 bg-dark p-5" data-ride="carousel">


			  <!-- Indicators -->
			  <ol class="carousel-indicators">
				<li data-target="#carousel-example-multi" data-slide-to="0" class="active"></li>
				<?php for($i=1;$i<=$rows;$i++){ ?>
				<li data-target="#carousel-example-multi" data-slide-to="<?php echo $i; ?>"></li>
				<?php } ?>
			  </ol>
			  <!--/.Indicators-->

			  <div class="carousel-inner" role="listbox">

				<div class="carousel-item active">
				  <div class="col-12 col-md-4">
					<div class="card mb-2 bg-transparent">
					  <img class="card-img-top" src="img/pets/shopping.jpg"
						alt="Card image cap" width="200" height="200">
					  <div class="card-body">
						<h4 class="card-title font-weight-bold">Dummy</h4>
						<p class="card-text">Not for selling purpose</p>
						<a class="btn btn-primary btn-md btn-rounded">Dummy</a>
					  </div>
					</div>
				  </div>
				</div>
				<?php while($row=mysqli_fetch_assoc($q_run)){ ?>
				<div class="carousel-item">
				  <div class="col-12 col-md-4">
					<div class="card mb-2 bg-transparent">
					  <img class="card-img-top" src="img/pets/<?php echo $row['pic']; ?>"
						alt="Card image cap" width="200" height="200">
					  <div class="card-body">
						<?php
							$dPrice=$row["discount"];
							if($dPrice>0){
								$newPrice=$row["price"]-$dPrice;
					 ?>
						<h4 class="card-title font-weight-bold">Rs.<span style='color:#fff;text-decoration:line-through'><?php echo $row['price']; ?></span><?php echo $newPrice; ?></h4>
					<?php   }else{
							
					  ?>
						<h4 class="card-title font-weight-bold">Rs.<?php echo $row['price']; ?></h4>
					<?php    } ?>
						<p class="card-text"><?php echo $row['item']; ?></p>
						<a class="btn btn-primary btn-md btn-rounded" href="viewSupply.php?id=<?php echo $row['id']; ?>">View</a>
					  </div>
					</div>
				  </div>
				</div>
				<?php } ?>
			  </div>
			   <a class="carousel-control-prev" href="#carousel-example-multi" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carousel-example-multi" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			  </a>
				
			</div>
			
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 PET SHOP
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>

    <!--Local Stuff-->
    <script>
		jQuery('.carousel.carousel-multi-item.v-2 .carousel-item').each(function(){
			var next = jQuery(this).next();
			if (!next.length) {
			next = jQuery(this).siblings(':first');
			}
			next.children(':first-child').clone().appendTo(jQuery(this));

			for (var i=0;i<3;i++) { 
				next=next.next(); 
				if (!next.length) { 
					next=jQuery(this).siblings(':first'); 
				}
				next.children(':first-child').clone().appendTo(jQuery(this)); 
		    } 
		});
	</script>
</body>
</html>
