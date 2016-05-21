<?php
    include('getNama.php');
    include('headAndNavbar.php');
?>

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

					    $conn3->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
					    $goExe = $conn3->query($sql);
					    // $goExe->execute();
                    
						// if($que === FALSE) { 
						// 	die("Ada Error"); 
						// }
						
						$count = 0;
						// while ($count < $resultsPerPage && $data = pg_fetch_array($que)) {
						while ($count < $resultsPerPage && ($data = $goExe->fetch(PDO::FETCH_ASSOC))) {
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

<?php include('footer.php'); ?>
