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

    include('headAndNavbar.php');
?>

    <!-- Welcoming -->
    <div id="login" class="container">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4 col-md-10 col-md-offset-1 text-center">
                <div class="well">
                    <h3>Hello, 
                        <?php 
						$yeay = "";
						if($role == "KS")
							$yeay = "Kasir";
						else if($role == "CH")
							$yeay = "Chef";
						else if($role == "ST")
							$yeay = "Staf";
						else
							$yeay = "Manager";
						echo " <span style='color:blue'>".$yeay." ".$nama."</span>"; ?>
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
				<div>
					<form method="GET" action="lihat_pemesanan_makanan.php">
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

						$que=mysql_query("SELECT * FROM `PEMESANAN` WHERE WAKTUPESAN BETWEEN $date1 AND $date2 ORDER BY `WAKTUPESAN` DESC");
						
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
								echo "<br>Email kasir : ".$data['EMAILKASIR'];
								echo "<br>Mode bayar : ".$data['MODE'];
								echo "<br><a href = 'rincian_pemesanan_makanan.php'>Rincian</a>";
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
	<center><button>Next Page</button></center>

<!-- Footer -->
<?php include('footer.php'); ?>
