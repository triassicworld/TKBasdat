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

<?php 
    include('footer.php');
?>