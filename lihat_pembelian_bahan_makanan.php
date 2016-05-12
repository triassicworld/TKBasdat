<?php
    include('getNama.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TK Basdat</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Welcoming -->
    <div id="login" class="container">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4 col-md-10 col-md-offset-1 text-center">
                <div class="well">
                    <h3>Hello, staf 
                        <?php echo " <span style='color:blue'>".$nama."</span>"; ?>
                    </h3>
                </div>
                <div>
                    <form action = "logout.php">
 +                      <input type = "submit" value = "Log Out"></input>
 +                  </form>
                </div>
            </div>
        </div>
    </div>

    <div id="" class="container">
        <div class="row">
            <hr>
            <div class="col-lg-4 col-lg-offset-4 col-md-10 col-md-offset-1 text-center">
                <!-- <div class="well"> -->
                <?php 
                    $hostname = "localhost";
                    $user = "root";
                    $password = "";
                    $database = "foodie";

                    //Loadmore configuarion
                    $resultsPerPage = 10;
                    $bd = mysql_connect($hostname, $user, $password) or die("Failed to connect to database");
                    mysql_select_db($database, $bd) or die("Database Not Found");

                    $que=mysql_query("SELECT * FROM `PEMBELIAN` ORDER BY `WAKTU` DESC");
                    
                    if($que === FALSE) { 
                        die(mysql_error()); 
                    }
                    
                    $count = 0;
                    while ($count < $resultsPerPage && $data = mysql_fetch_array($que)) {
                        // if ($data['EMAILKASIR'] == $emailSession) {
                            echo "<div class='well'>";
                            echo "<strong>".($count+1)."</strong>";
                            echo "<hr>";
                            echo "Nomor nota : <span style='color:red'>".$data['NOMORNOTA']."</span>";
                            echo "<br>Waktu : <strong>".$data['WAKTU']."</strong>";
                            echo "<br>Supplier : <strong>".$data['SUPPLIER']."</strong>";
                            echo "<br><br>Email staf : ".$data['EMAILSTAF'];
                            echo "</div>";
                            $count++;
                        // }
                    }
                ?>
                <!-- </div> -->
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Javascript -->
    <script type="text/javascript" src="js/myScript.js" ></script>

</body>
</html>
