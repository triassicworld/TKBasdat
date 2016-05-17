<?php include ('getNama.php');
?>
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
	
	<div>
                    <form action = "logout.php">
						<input type = "submit" value = "Log Out"></input>
					</form>
                </div>
	
	<div>
		<h3>Nama makanan</h3>
		<p>Gambar : <br>
		Deskripsi : <br>
		Harga : <br>
		Tersedia : <br>
		Kategori : <br>
		</p>
	</div>
	
</body>
</html>
