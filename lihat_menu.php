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
                <!-- <div class="well"> -->
				<div>
					<form method="GET" action="lihat_menu.php">
					<input name = 'tanggal' type = 'date' value = 'tes'></input> <br>
					<input type = 'submit'></input> 
					</form>
				</div>
				<?php
                    //Loadmore configuarion
                    $resultsPerPage = 15;
					$conn = connectDB();

					if(isset($_GET["tanggal"])){
						$que="SELECT * FROM foodie.menu WHERE nama IN(SELECT namamenu FROM foodie.menu_harian WHERE WAKTU BETWEEN $date1 AND $date2 )ORDER BY nama ASC";
						$goExe = $conn->prepare($que);
	                    $goExe->execute();
						$count = 0;

						echo '	<div id="" class="container">
					        	<div class="row">
					        	<table class="table">
					            <thead>
					              <tr>
					                <th>Nama</th>
					                <th>Deskripsi</th>
					                <th>Harga</th>
					                <th>Jumlah Tersedia</th>
					                <th>Kategori</th>
					              </tr>
					            </thead><tbody>';

					    $count = 0;
					    while(($bb = $goExe->fetch()) && $count < 15) {
						        echo'<tr>
					                <td>'.$bb['nama'].'</td>
					                <td>'.$bb['deskripsi'].'</td>
					                <td>'.$bb['harga'].'</td>
					                <td>'.$bb['jumlahtersedia'].'</td>
					                <td>'.$bb['kategori'].'</td>
					                <td><a href="lihat.php?nama='.$bb['nama'].'">LIHAT<a></td>
					            </tr>
					          ';
					          $count++;
					    }
					    echo '<tbody></table>';
					}
                ?>
                <!-- </div> -->
            
        </div>
    </div>

<?php 
    include('footer.php');
?>
