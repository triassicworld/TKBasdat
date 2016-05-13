<?php
    $nama = "";
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
        $roleTmp = $row['ROLE'];

        if($roleTmp == 'ST') {
            $roleTmp = 'Staf ';
        } else if($roleTmp == 'KS') {
            $roleTmp = 'Kasir ';
        } else {
            $roleTmp = 'Chef ';
        }

        $nama = $roleTmp . $row['NAMA'];
        mysqli_close($conn2);
    }
?>
