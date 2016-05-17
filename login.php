<?php
    // Global variable
	$resp = "";
    $emailSession = "";
    $role = "";
    // Konek ke database
    require "connectDB.php";
    // Assign ke variables
    $conn = connectDB();
    // Cek login
    if(isset($_POST["email"])) {
        $str = login($_POST["email"], $_POST["password"]);
        if(strlen($str) == 0) {
            session_start();
            $emailSession = $_POST["email"];
            $_SESSION["userLogin"] = $emailSession;
            // Coba bikin koneksi ke database lagi
            $sql = "SELECT * FROM `user` WHERE email='$emailSession'";
            $conn2 = connectDB();
            $haha = "";
            $row = "";
            $haha = $conn2->query($sql);
            // Get role
            if($row = $haha->fetch_assoc()) { 
                $role = $row['ROLE'];
                mysqli_close($conn2);
            }
            header("Location: home.php");
        } else {
            $resp = $str;
        }
    }
    function login($email, $pass) {
        $conn = connectDB();
        $sql = "SELECT * FROM `user` WHERE email='$email' AND password='$pass'";
        $result = mysqli_query($conn, $sql);
        $checkemail = "SELECT * FROM `user` WHERE email='$email'";
        $result2 = mysqli_query($conn, $checkemail);
        $checkPassword = "SELECT * FROM `user` WHERE password='$pass'";
        $result3 = mysqli_query($conn, $checkPassword);
        if(mysqli_num_rows($result2) == 0) {
            mysqli_close($conn);
            return "email tidak valid";
        }
        if(mysqli_num_rows($result3) == 0) {
            mysqli_close($conn);
            return "password tidak valid";
        }
        if(mysqli_num_rows($result) > 0) {
            mysqli_close($conn);
            return "";
        }
    }
?>
