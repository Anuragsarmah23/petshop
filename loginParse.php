<?php
	session_start();
	$con=mysqli_connect('localhost','root','','petshop');
	if(!$con)
 			die("CONNECTION NOT FOUND".mysqli_error());
		$uid=mysqli_real_escape_string($con,$_POST['uid']);
		$pass=mysqli_real_escape_string($con,$_POST['password']);
		$q="select * from customer WHERE id='$uid' AND password='$pass'";
		$q1="select * from admin where id='$uid' AND password='$pass'";
		$q_run=mysqli_query($con,$q);
		if(mysqli_num_rows($q_run)>0){
			$_SESSION['customerID']=$uid;
			$datamsg="true";
		}
		else{
			$q1_run=mysqli_query($con,$q1);
			if(mysqli_num_rows($q1_run)>0){
				$_SESSION['adminID']=$uid;
				$datamsg="admin";
			}
			else{
				$q2="select * from customer WHERE id='$uid'";
				$q2_run=mysqli_query($con,$q2);
				if(mysqli_num_rows($q2_run)>0)
					$datamsg ="passError";
				else
					$datamsg="idError";
			}	
		}	
		echo json_encode($datamsg);
?>  