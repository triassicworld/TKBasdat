<?php
    $nama = "";
	$role = "";
    $emailSession = "";
    session_start();
    if(!isset($_SESSION["userLogin"])) {
        header("Location: index.php");
    }
    $emailSession = $_SESSION["userLogin"];
    require "connectDB.php";
    $sql = "SELECT * FROM `user` WHERE email='$emailSession'";
    $conn2 = connectDB();
    $haha = "";
    $row = "";
    $haha = $conn2->query($sql);
    // Get nama
    if($row = $haha->fetch_assoc()) { 
        $nama = $row['NAMA'];
		$role = $row['ROLE'];
		$realrole = "";
        mysqli_close($conn2);
    }
	$yeay = "";
	if($role === "KS") {
		$yeay = "Kasir";
	}
	else if($role === "CH") {
		$yeay = "Chef";
	}
	else if($role === "ST") {
		$yeay = "Staf";
	}
	else {
		$yeay = "Manager";
	}
	
?>
