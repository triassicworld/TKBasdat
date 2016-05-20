<?php
	function connectDB() {
        //Create connection
        // $conn = mysqli_connect($servername, $username, $password, $dbName);
        $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=asdasdasd");

        if(!$conn) {
            // die("Connection failed: ".mysqli_connect_error());
            die("Connection failed: ");
        }

        $Conn->exec('SET search_path TO accountschema');

        return $conn;
    }
?>