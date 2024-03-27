<?php
session_start();
include 'connect.php';
$strSQL = "SELECT * FROM tb_member WHERE member_email= '" . mysqli_real_escape_string($con, $_POST['member_email']) . "' 
	and member_pass = '" . mysqli_real_escape_string($con, $_POST['member_pass']) . "'";
$objQuery = mysqli_query($con, $strSQL);
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
if (!$objResult) {
	var_dump($_POST);
	echo "Username and Password Incorrect!";
} else {
	// ตั้งค่า session
	$_SESSION["member_id"] = $objResult["member_id"];
	$_SESSION["member_view"] = $objResult["member_view"];
	$_SESSION["member_comment"] = $objResult["member_comment"];
	$_SESSION["member_edits"] = $objResult["member_edits"];
	$_SESSION["member_approve"] = $objResult["member_approve"];
	$_SESSION["member_signoff"] = $objResult["member_signoff"];
	$_SESSION["member_email"] = $objResult["member_email"];
	session_write_close();
	// ส่วนนี้ใช้สำหรับ redirect ไปยังหน้าที่ต้องการหลังจาก login
	header("Location: ../menu.php");
	exit();
}

mysqli_close($con);
?>