<?php
    function connectDB() {
        // Jangan lupa sesuaikan nama database, username, dan password
        $dsn = "pgsql:host=localhost;port=5432;dbname=postgres;user=postgres;password=asdasdasd";
        
        $pdo = new PDO($dsn);

        return $pdo;
    }
?>