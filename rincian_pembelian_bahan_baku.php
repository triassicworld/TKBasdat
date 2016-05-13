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
	
	<center>
		<h3>FOODIE - RINCIAN PEMBELIAN BAHAN MAKANAN</h3>
		<h5>Nomor Nota: </h5>
		<h5>Supplier: </h5>
		<h5>Waktu:</h5>
		<h5>Total:</h5>
		<h5>Staf:</h5>
		
		<hr>
		<hr>
		
		<table width="80%">
			<tr>
				<td><Strong>Nama Bahan</Strong></td>
				<td><Strong>Harga Satuan</Strong></td>
				<td><Strong>Satuan</Strong></td>
				<td><Strong>Jumlah</Strong></td>
				<td><Strong>Total</Strong></td>				
			</tr>
				<td>Dummy</td>
				<td>Dummy</td>
				<td>Dummy</td>
				<td>Dummy</td>
				<td>Dummy</td>
			<tr>
			</tr>
			<tr>
			</tr>
			<tr>
			</tr>
		</table>
	</center>
	
	<?php /* 
		$hostname = "localhost";
		$user = "root";
		$password = "";
		$database = "foodie";

		//Loadmore configuarion
		$resultsPerPage = 10;
		$bd = mysql_connect($hostname, $user, $password) or die("Failed to connect to database");
		mysql_select_db($database, $bd) or die("Database Not Found");

		$que=mysql_query("SELECT * FROM `PEMBELIAN_BAHAN_BAKU` WHERE NOMORNOTA = );
		
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
				echo "<br>Waktu  : <strong>".$data['WAKTU']."</strong>";
				echo "<br>Nama Supplier  : <strong>".$data['NAMASUPPLIER']."</strong>";
				echo "<br>Email Staf  : <strong>".$data['EMAILSTAFF']."</strong>";
				echo "<br><a href = 'rincian_pembelian_bahan_baku.php'>Rincian</a>";
				echo "</div>";
				
				$count++;
			// }
		}*/
	?>
	
	
</body>
</html>