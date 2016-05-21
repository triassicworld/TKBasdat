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

                    if($yeay == "Chef") {
						$sql = "SELECT * FROM foodie.menu_harian ORDER BY waktu DESC";                    
						
                    	$goExe = $conn3->prepare($sql);
	                    $goExe->execute();	                    

						$count = 0;
						while ($count < $resultsPerPage && ($data = $goExe->fetch())) {
							echo "<div class='well'>";
							echo "<strong>".($count+1)."</strong>";
							echo "<hr>";
							echo "Nama menu : <span style='color:red'>".$data['namamenu']."</span>";
							echo "<br>Waktu : <strong>".$data['waktu']."</strong>";
							echo "<br>Jumlah : <strong>".$data['jumlah']."</strong>";
							echo "<br>Email chef : ".$data['emailchef'];
							echo "</div>";
							$count++;
						}
					}
					else if ($yeay == "Kasir") {
						$sql = "SELECT * FROM foodie.pemesanan ORDER BY waktupesan DESC";                    
						
                    	$goExe = $conn3->prepare($sql);
	                    $goExe->execute();	                    

						$count = 0;
						while ($count < $resultsPerPage && ($data = $goExe->fetch())) {
							echo "<div class='well'>";
							echo "<strong>".($count+1)."</strong>";
							echo "<hr>";
							echo "Nomor Nota : <span style='color:red'>".$data['nomornota']."</span>";
							echo "<br>Waktu Pesan : <strong>".$data['waktupesan']."</strong>";
							echo "<br>Waktu Bayar : <strong>".$data['waktubayar']."</strong>";
							echo "<br>Total : <strong>Rp ".$data['total'].",-</strong>";
							echo "<br><br>Email kasir : ".$data['emailkasir'];
							echo "<br>Mode bayar : ".$data['mode'];
							echo "</div>";
							$count++;
						}
					}
					else if ($yeay == "Staf") {
						$sql = "SELECT * FROM foodie.pembelian ORDER BY waktu DESC";

                    	$goExe = $conn3->prepare($sql);
	                    $goExe->execute();	                    

						$count = 0;
						while ($count < $resultsPerPage && ($data = $goExe->fetch())) {
							echo "<div class='well'>";
							echo "<strong>".($count+1)."</strong>";
							echo "<hr>";
							echo "Nomor nota : <span style='color:red'>".$data['nomornota']."</span>";
							echo "<br>Waktu : <strong>".$data['waktu']."</strong>";
							echo "<br>Supplier : <strong>".$data['namasupplier']."</strong>";
							echo "<br><br>Email staf : ".$data['emailstaff'];
							echo "</div>";
							$count++;
						}
					}
					
                ?>
            </div>
        </div>
    </div>

<?php include('footer.php'); ?>
