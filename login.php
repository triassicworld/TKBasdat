<?php
    // Variable untuk menyatakan kesalahan input login
	$resp = "";

    session_start();

    require 'connectDB.php';
    $conn = connectDB();

    if(isset($_POST['enter'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM foodie.user WHERE email='$email' AND password='$password'";
        
        $goExecute = $conn->prepare($sql);
        $goExecute->execute();
        
        $row = "";
        $row = $goExecute->fetch();
        
        if($row == "") {
            // Respon bahwa tidak bisa login
            $resp = "email atau password salah";   
        } 
        else {
            $_SESSION['userLogin'] = $row['email'];
            header("Location: home.php");
        }
    }
?>
