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
                <?php 
                    //Loadmore configuarion
                    $resultsPerPage = 10;
				    $conn3 = connectDB();
                    if($yeay == "Chef") {
						$sql = "SELECT * FROM foodie.menu_harian ORDER BY waktu DESC";                    
						
                    	$goExec = $conn3->prepare($sql);
	                    $goExec->execute();	                    
						$count = 0;
						
						$bb = "";
	                    $id = 1;

	                    echo '<table class="table">
	                            <thead>
	                              <tr>
	                                <th>Nama Menu</th>
	                                <th>Waktu</th>
	                                <th>Jumlah</th>
	                                <th>Email Chef</th>
	                              </tr>
	                            </thead><tbody>';

	                    $count = 0;
	                    while(($bb = $goExec->fetch()) && $count<10) {
	                        
	                        echo'<tr>
	                                <td>'.$bb['namamenu'].'</td>
	                                <td>'.$bb['waktu'].'</td>
	                                <td>'.$bb['jumlah'].'</td>
	                                <td>'.$bb['emailchef'].'</td>
	                            </tr>
	                          ';
	                          $count++;
	                    }
	                    echo '<tbody></table>';
					}
					else if ($yeay == "Kasir") {
						$sql = "SELECT * FROM foodie.pemesanan ORDER BY waktupesan DESC";                    
						
                    	$goExec = $conn3->prepare($sql);
	                    $goExec->execute();	                    
						$count = 0;
						
						$bb = "";
	                    $id = 1;

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
	                    while(($bb = $goExec->fetch()) && $count<10) {
	                        
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
					}
					else if ($yeay == "Staf") {
						$sql = "SELECT * FROM foodie.pembelian ORDER BY waktu DESC";
                    	
                    	$goExec = $conn3->prepare($sql);
	                    $goExec->execute();	                    
						$count = 0;
						
						$bb = "";
	                    $id = 1;

	                    echo '<table class="table">
	                            <thead>
	                              <tr>
	                                <th>Nomor Nota</th>
	                                <th>Waktu</th>
	                                <th>Supplier</th>
	                                <th>Email Staf</th>
	                                <th></th>
	                              </tr>
	                            </thead><tbody>';

	                    $count = 0;
	                    while(($bb = $goExec->fetch()) && $count<10) {
	                        
	                        echo'<tr>
	                                <td>'.$bb['nomornota'].'</td>
	                                <td>'.$bb['waktu'].'</td>
	                                <td>'.$bb['namasupplier'].'</td>
	                                <td>'.$bb['emailstaff'].'</td>
	                                <td><a href="rincian_pemesanan_makanan.php?nomornota='.$bb['nomornota'].'">RINCIAN<a></td>
	                            </tr>
	                          ';
	                          $count++;
	                    }
	                    echo '<tbody></table>';
					}
                ?>
        </div>
    </div>

<?php include('footer.php'); ?>
