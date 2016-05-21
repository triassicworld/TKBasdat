<?php
    include('getNama.php');
    include('headAndNavbar.php');

	$semua_rincian = "";
	$harga_Total = "";

	if(isset($_POST['SimpanRincian'])) {
		$noNota = $_POST['submitNomorNota'];
		$namaSupplier = $_POST['namaSupplier'];
		$semua_rincian = $_POST['rincian-hidden'];
		$harga_Total = $_POST['total-hidden-charges'];

		$array_rincian = explode(",", $semua_rincian);
	}
?>

	<center>
		<h3>FOODIE - RINCIAN PEMBELIAN BAHAN MAKANAN</h3>
		<!-- <h5>Nomor Nota: <?php #echo $noNota; ?></h5> -->
		<h5>Nomor Nota: <?php echo '742220'; ?></h5>
		<h5>Supplier: <?php echo $namaSupplier; ?></h5>
		<h5>Waktu: <?php echo(date("Y-m-d",time())); ?></h5>
		<h5>Total: <?php echo $harga_Total; ?></h5>
		<h5>Staf: <?php echo $nama; ?></h5>
		
		<hr>
		<hr>
		
		<table class="table table-responsive" width="80%">
			<thead>
				<td><Strong>Nama Bahan</Strong></td>
				<td><Strong>Harga Satuan</Strong></td>
				<td><Strong>Satuan</Strong></td>
				<td><Strong>Jumlah</Strong></td>
				<td><Strong>Total</Strong></td>				
			</thead>
			<tbody>
				<?php
					$i = 0;
					$arLen = sizeof($array_rincian);

					if($arLen > 1) {
						$conn = connectDB(); // siap2 konek database
						
						while ($i < $arLen) {
							$i++;
							echo "<tr>";
							while(($i % 6) > 0) {
								echo "<td>";
								echo $array_rincian[$i];
								echo "</td>";
								$i++;
							}
							echo "</tr>";
						}
					}

                                // $sql = "INSERT INTO foodie.pembelian_bahan_baku (namabahanbaku, notapembelian, jumlahpembelian, satuanpembelian, hargasatuan) VALUES ('Wortel', '132116', 5, 'gram', 123);";
                                
                                // $goExec = $conn->prepare($sql);
                                // $goExec->execute();
				?>
			</tbody>
		</table>
	</center>
	
<?php 
	include('footer.php');
?>
