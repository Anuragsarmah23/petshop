<?php
	session_start();
	if(!isset($_SESSION["adminID"]))
		header("location:index.php");
?><html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADMIN|PET SHOP</title>
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
	<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/fixedcolumns/3.2.6/css/fixedColumns.bootstrap4.min.css" rel="stylesheet">


   <style>
        .traffic-chart {
            min-height: 335px;
        }
       
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
		}
    </style>
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel" style="background:#c725e3;">
        <nav class="navbar navbar-expand-sm navbar-default" style="background:#c725e3;">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="menu-title">
                        <a href="dashAdmin.php" class="text-light"><i class="menu-icon fa fa-laptop text-light"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">
						<a href="customers.php" class="text-light"><i class="menu-icon fa fa-users text-light"></i>Customers</a>
					</li>
                    <li class="menu-title">
						<a href="products.php" class="text-light"><i class="menu-icon fa fa-paw text-light"></i>Products</a>
					</li>
					<li class="active">
						<a href="transactions.php"><i class="menu-icon fa fa-history"></i>Transactions</a>
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
			<div class="row">
            <div class="card" style="min-height:82vh;padding:20px;margin-top:-1px;width:100%;">
							<div class="card-header">TRANSACTIONS</div><br>
							<?php
								//Radhe
								$con=mysqli_connect("localhost","root","","petshop");
								if(!$con)
									die("Error");
								$q="select * from transaction";
								$q_run=mysqli_query($con,$q);
								$rows=mysqli_num_rows($q_run);
								if($rows > 0){
							?>
								<table id="customersList" class="table table-striped table-bordered bg-white" style="width:100%">
								
									<thead>
										<tr>
											<th>ID</th>
											<th>CUSTOMER ID</th>
											<th>PET</th>
											<th>SUPPLY</th>
											<th>TOTAL AMOUNT(Rs.)</th>
											<th>STATUS</th>
											<th>MARK AS COMPLETED</th>
											<th>DEL</th>
										</tr>
									</thead>
									<tbody>
									<?php
										while($row=mysqli_fetch_assoc($q_run)){
											$petID=$row["petID"];
											$q23="select * from pets where id='$petID'";
											$q23_run=mysqli_query($con,$q23);
											$row23=mysqli_fetch_assoc($q23_run);
											$supplyID=$row["supplyID"];
											$q33="select * from supplies where id='$supplyID'";
											$q33_run=mysqli_query($con,$q33);
											$row33=mysqli_fetch_assoc($q33_run);
									?>
										<tr>
											<td><?php echo $row["id"]; ?></td>
											<td><?php echo $row["customerID"];?></td>
											<td><?php echo $row23["breed"]; ?></td>
											<td><?php echo $row33["item"]; ?></td>
											<td><?php echo $row["totalAmount"]; ?></td>
											<td><?php echo $row["status"]; ?></td>
											<form method="post" action="updateTransactions.php">
											<input type="hidden" name="tid" value="<?php echo $row['tid']; ?>">
											<td><button type="submit" style="border:none;outline:none;background:none;cursor:pointer;"><i class="fa fa-check editI"></i>&nbsp;<span style="color:blue;font-size:18px;">UPDATE</span></button></td>
											</form>
											<td><a href="delTransactions.php?tid=<?php echo $row['tid']; ?>"><i class="fa fa-trash delI"></i></a></td>
										</tr>	
									<?php
										}
									?>	
									</tbody>
									
								</table>
							<?php
								}else{
									echo "<b>No records to display</b>";
								}
							?>	
						</div>
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
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
	<script>
		jQuery(document).ready(function() {
			jQuery('#customersList').DataTable({
				scrollX:true,
				fixedColumns:   true,
			});
		} );
	</script>
   
</body>
</html>
