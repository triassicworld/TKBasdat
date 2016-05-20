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
    $sql = "SELECT * FROM foodie.user WHERE 'email'='$emailSession'";
    $conn2 = connectDB();
    $haha = "";
    $row = "";
    $haha = pg_query($conn2, $sql);
    
    // Get nama
    // if($row = pg_fetch_assoc($haha)) { 
    //     $nama = $row['nama'];
    //     $role = $row['role'];
    //     pg_close($conn2);
    // }

    if($row = pg_fetch_array($haha)) { 
        $nama = $row[1];
        $role = $row[4];
        pg_close($conn2);
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
