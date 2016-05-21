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
    $sql = "SELECT * FROM foodie.user WHERE email='$emailSession'";
    $conn2 = connectDB();
    
    $goExecute = $conn2->prepare($sql);
    $goExecute->execute();

    $row = "";
    $row = $goExecute->fetch();

	$role = $row['role'];
    $nama = $row['nama'];
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
