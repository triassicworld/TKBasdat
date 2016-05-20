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
            $sql = "SELECT * FROM foodie.user WHERE 'email'='$emailSession'";
            $conn2 = connectDB();
            $haha = "";
            $row = "";
            $haha = pg_query($conn2, $sql);
            // Get role
            if($row = pg_fetch_assoc($haha)) { 
                $role = $row['ROLE'];
                pg_close($conn2);
            }
            header("Location: home.php");
        } else {
            // $resp = $str;
            $resp = "bacot";
        }
    }
    function login($email, $pass) {
        $conn = connectDB();
        $sql = "SELECT * FROM foodie.user WHERE 'email'='$email' AND 'password'='$pass'";
        $result = pg_query($conn, $sql);
        
        if(pg_num_rows($result) > 0) {
            pg_close($conn);
            return "";
        }
    }
?>
