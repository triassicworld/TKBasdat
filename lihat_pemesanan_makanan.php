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
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="home_kasir.php">TK Basdat</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#">Home </a></li>
	        <li><a href="#">Lihat Menu </a></li>
	        <li class="active"><a href="#">Lihat Pemesanan Makanan </a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
  		          <?php echo "<span style='color:blue'>".$nama."</span>"; ?>
	    	      <span class="caret"></span>
	          </a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Profile</a></li>
	            <li><a href="#">Setting</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="logout.php">Log Out</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

    <!-- Welcoming -->
    <div id="login" class="container">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4 col-md-10 col-md-offset-1 text-center">
                <div class="well">
                    <h3>Hello, kasir 
                        <?php echo " <span style='color:blue'>".$nama."</span>"; ?>
                    </h3>
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

                    $que=mysql_query("SELECT * FROM `PEMESANAN` ORDER BY `WAKTUPESAN` DESC");
                    
                    if($que === FALSE) { 
                        die(mysql_error()); 
                    }
                    
                    $count = 0;
                    while ($count < $resultsPerPage && $data = mysql_fetch_array($que)) {
                        // if ($data['EMAILKASIR'] == $emailSession) {
                            echo "<div class='well'>";
                            echo "<strong>".($count+1)."</strong>";
                            echo "<hr>";
                            echo "Nomor Nota : <span style='color:red'>".$data['NOMORNOTA']."</span>";
                            echo "<br>Waktu Pesan : <strong>".$data['WAKTUPESAN']."</strong>";
                            echo "<br>Waktu Bayar : <strong>".$data['WAKTUBAYAR']."</strong>";
                            echo "<br>Total : <strong>Rp ".$data['TOTAL'].",-</strong>";
                            echo "<br><br>Email kasir : ".$data['EMAILKASIR'];
                            echo "<br>Mode bayar : ".$data['MODE'];
                            echo "</div>";
                            $count++;
                        // }
                    }
                ?>
                <!-- </div> -->
            </div>
        </div>
    </div>

    <!-- Footer -->
    <<?php include('footer.php'); ?>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Javascript -->
    <script type="text/javascript" src="js/myScript.js" ></script>

</body>
</html>
