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
            <li class="active"><a href="home.php">Home </a></li>
            <?php
			if($yeay == "Chef") {
				echo "<li>"."<a href='lihat_menu.php'>"."Lihat Menu"."</a>"."</li>";
			}
			else if($yeay == "Kasir") {
				echo "<li>"."<a href='lihat_menu.php'>"."Lihat Menu"."</a>"."</li>";
				echo "<li>"."<a href='lihat_pemesanan_makanan.php'>"."Lihat Pemesanan Makanan"."</a>"."</li>";
			}
			else if($yeay == "Staf") {
				echo "<li>"."<a href='lihat_pembelian_bahan_makanan.php'>"."Lihat Pembelian Bahan Makanan"."</a>"."</li>";
				echo "<li>"."<a href='beli_bahan_makanan.php'>"."Beli Bahan Makanan"."</a>"."</li>";
			}
			else {
				echo "";
			}
			?>
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
                    <h3>Hello, 
                        <?php echo " <span style='color:blue'>".$yeay." ".$nama."</span>"; ?>
                    </h3>
                </div>
                <div>
                    <form action = "logout.php">
						<input type = "submit" value = "Log Out"></input>
					</form>
                </div>
				<div id = "menubar">
					<a href = "home_chef.php">Home</a><br>
					<a href = "lihat_menu.php">Lihat Menu</a>
				</div>
            </div>
        </div>
    </div>

    <div id="" class="container">
        <div class="row">
            <hr>
            <div class="col-lg-4 col-lg-offset-4 col-md-10 col-md-offset-1 text-center">
                <?php 
                    //Loadmore configuarion
                    $resultsPerPage = 10;

				    $conn3 = connectDB();

                    // pg_select_db($database, $bd) or die("Database Not Found");
                    if($yeay == "Chef") {
						$que=pg_query($bd, "SELECT * FROM menu_harian ORDER BY `waktu` DESC");                    
						if($que === FALSE) { 
							die(pg_error()); 
						}
						
						$count = 0;
						while ($count < $resultsPerPage && $data = pg_fetch_array($que)) {
								echo "<div class='well'>";
								echo "<strong>".($count+1)."</strong>";
								echo "<hr>";
								echo "Nama menu : <span style='color:red'>".$data['NAMAMENU']."</span>";
								echo "<br>Waktu : <strong>".$data['WAKTU']."</strong>";
								echo "<br>Jumlah : <strong>".$data['JUMLAH']."</strong>";
								echo "<br>Email chef : ".$data['EMAILCHEF'];
								echo "</div>";
								$count++;
						}
					}
					else if ($yeay == "Kasir") {
						$que=pg_query($bd, "SELECT * FROM pemesanan ORDER BY `waktupesan` DESC");                    
						if($que === FALSE) { 
							die(pg_error()); 
						}
						
						$count = 0;
						while ($count < $resultsPerPage && $data = pg_fetch_array($que)) {
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
						}
					}
					else if ($yeay == "Staf") {
						// $sql = pg_query($bd, "SELECT * FROM pembelian ORDER BY waktu DESC");
						$sql = "SELECT * FROM pembelian ORDER BY waktu DESC";

					    $goExecute = $conn3->prepare($sql);
					    $goExecute->execute();
                    
						// if($que === FALSE) { 
						// 	die("Ada Error"); 
						// }
						
						$count = 0;
						// while ($count < $resultsPerPage && $data = pg_fetch_array($que)) {
						while ($count < $resultsPerPage && $data = $goExecute->fetch()) {
							echo "<div class='well'>";
							echo "<strong>".($count+1)."</strong>";
							echo "<hr>";
							echo "Nomor nota : <span style='color:red'>".$data['NOMORNOTA']."</span>";
							echo "<br>Waktu : <strong>".$data['WAKTU']."</strong>";
							echo "<br>Supplier : <strong>".$data['NAMASUPPLIER']."</strong>";
							echo "<br><br>Email staf : ".$data['EMAILSTAFF'];
							echo "</div>";
							$count++;
						}
					}
					
                ?>
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