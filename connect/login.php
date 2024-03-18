<?php
	session_start();
	include 'connect.php';

	$strSQL = "SELECT * FROM tb_member WHERE member_user= '".mysqli_real_escape_string($con,$_POST['txtUsername'])."' 
	and member_password = '".mysqli_real_escape_string($con,$_POST['txtPassword'])."'";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	if(!$objResult)
	{
			echo "Username and Password Incorrect!";
	}
	else
	{
			$_SESSION["member_id"] = $objResult["member_id"];
			$_SESSION["member_roll"] = $objResult["member_roll"];

			session_write_close();
			
			if($objResult["member_roll"] == "ADMIN")
			{
				header("location:../dashboard.php");
			}
			else if($objResult["member_roll"] == "EMPLOYEE")
			{
				header("location:../dashboard.php");
			}
			else {
				header("location:../index.php");
			}
	}
	mysqli_close($con);
?>