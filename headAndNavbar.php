
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Basdat - A12</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="css/beliBahanBakuStyle.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- jQuery -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.livequery.js"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <!-- Javascript -->
    <script type="text/javascript" src="js/myScript.js" ></script>
</head>

<body>
    <nav class="navbar navbar-default" style="background-color:yellow">
      <div class="container-fluid">
        <!-- Mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="home_kasir.php">Basdat - A12</a>
        </div>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="home.php">Home </a></li>
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
            <li><a href="logout.php">Log Out</a></li>
          </ul>
        </div>
      </div>
    </nav>
