<?php
	function connectDB() {
        $servername = "localhost";
        $username = "postgres";
        $password = "asdasdasd";
        $dbName = "foodie";

        //Create connection
        // $conn = mysqli_connect($servername, $username, $password, $dbName);
        $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=asdasdasd");

        if(!$conn) {
            // die("Connection failed: ".mysqli_connect_error());
            die("Connection failed: ");
        }

        return $conn;
    }
?>