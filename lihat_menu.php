<?php
    include('getNama.php');
	date_default_timezone_set('Asia/Jakarta');
	$date = date('Y-m-d', time());
	$date1 = "";
	$date2 = "";
	 if(isset($_GET["tanggal"])) {
		$date = $_GET["tanggal"];
		$date1 = "'".$date." 00:00:01'";
		$date2 = "'".$date." 23:59:59'";
	 }
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
        <!-- Mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="home_kasir.php">TK Basdat</a>
        </div>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#">Home </a></li>
            <li><a href="lihat_menu.php">Lihat Menu </a></li>
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
        </div>
      </div>
    </nav>
    <!-- Welcoming -->
    <div id="login" class="container">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4 col-md-10 col-md-offset-1 text-center">
                <div class="well">
                    <h3>Hello, chef
                        <?php echo " <span style='color:blue'>".$nama."</span>"; ?>
                    </h3>
                </div>
                <div>
                    <form action = "logout.php">
						<input type = "submit" value = "Log Out"></input>
					</form>
                </div>
				<div id = "lihat_menu">
					<a href = "home_chef.php">Back to Home</a><br>
				</div>
            </div>
        </div>
    </div>

    <div id="" class="container">
        <div class="row">
            <hr>
            <div class="col-lg-4 col-lg-offset-4 col-md-10 col-md-offset-1 text-center">
                <!-- <div class="well"> -->
				<div>
					<form method="GET" action="lihat_menu.php">
					<input name = 'tanggal' type = 'date' value = 'tes'></input>
					<input type = 'submit'></input> 
					</form>
				</div>
				<?php
                    $hostname = "localhost";
                    $user = "root";
                    $password = "";
                    $database = "foodie";
                    //Loadmore configuarion
                    $resultsPerPage = 15;
                    $bd = mysql_connect($hostname, $user, $password) or die("Failed to connect to database");
					if(isset($_GET["tanggal"])){
						mysql_select_db($database, $bd) or die("Database Not Found");
						$que=mysql_query("SELECT * FROM MENU WHERE nama IN(SELECT namamenu FROM MENU_HARIAN WHERE WAKTU BETWEEN $date1 AND $date2 )ORDER BY NAMA ASC");
						
						if($que === FALSE) { 
							die(mysql_error()); 
						}
						
						$count = 0;
						while ($count < $resultsPerPage && $data = mysql_fetch_array($que)) {
							// if ($data['EMAILKASIR'] == $emailSession) {
								echo "<div class='well'>";
								echo "<strong>".($count+1)."</strong>";
								echo "<hr>";
								echo "Nama : <span style='color:red'>".$data['NAMA']."</span>";
								echo "<br>Deskripsi : <strong>".$data['DESKRIPSI']."</strong>";
								echo "<br>Harga : <strong>".$data['HARGA']."</strong>";
								echo "<br>Jumlah Tersedia : <strong>".$data['JUMLAHTERSEDIA']."</strong>";
								echo "<br>Kategori : ".$data['KATEGORI'];
								echo "<br><a href = 'lihat.php'> LIHAT </a>";
								echo "</div>";
								$count++;
							// }
						}
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
