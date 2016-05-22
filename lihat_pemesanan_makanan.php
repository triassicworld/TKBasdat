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
				<center><div>
					<form method="GET" action="lihat_pemesanan_makanan.php">
					<input name = 'tanggal' type = 'date' value = 'tes'></input>
					<input type = 'submit'></input> 
					</form>
				</div></center>
                <hr>

                <?php
                    $conn = connectDB();

                    $sql = "SELECT * FROM foodie.pemesanan WHERE waktupesan BETWEEN ".$date1." AND ".$date2." ORDER BY waktupesan DESC";
                    

                    $goExec = $conn->prepare($sql);
                    $goExec->execute();
                    
                    $bb = "";
                    $id = 1;

                    if($date1 != null){
                        echo '<table class="table">
                                <thead>
                                  <tr>
                                    <th>Nomor Nota</th>
                                    <th>Waktu Pesan</th>
                                    <th>Waktu Bayar</th>
                                    <th>Total</th>
                                    <th>Kasir</th>
                                    <th>Mode Bayar</th>
                                    <th></th>
                                  </tr>
                                </thead><tbody>';

                        $count = 0;
                        while(($bb = $goExec->fetch()) && $count < 15) {
                            
                            echo'<tr>
                                    <td>'.$bb['nomornota'].'</td>
                                    <td>'.$bb['waktupesan'].'</td>
                                    <td>'.$bb['waktubayar'].'</td>
                                    <td>'.$bb['total'].'</td>
                                    <td>'.$bb['emailkasir'].'</td>
                                    <td>'.$bb['mode'].'</td>
                                    <td><a href="rincian_pemesanan_makanan.php?nomornota='.$bb['nomornota'].'">RINCIAN<a></td>
                                </tr>
                              ';
                              $count++;
                        }
                        echo '<tbody></table>';

                        if($count>15) {
                            echo '<center><button>Next Page</button></center>';
                        }
                        echo ' <hr>';
                    }
                ?>
        </div>
    </div>

<!-- Footer -->
<?php include('footer.php'); ?>
