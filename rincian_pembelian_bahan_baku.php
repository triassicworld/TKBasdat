<?php
    include('getNama.php');
    include('headAndNavbar.php');

	$semua_rincian = "";
	$harga_Total = "";
	$result = "";

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
		<br>
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

							echo "<td>";
							echo $array_rincian[$i]; // nama bahan
							echo "</td>";
							$a = $array_rincian[$i++];

							echo "<td>";
							echo $array_rincian[$i]; // harga per satuan
							echo "</td>";
							$b = $array_rincian[$i++];

							echo "<td>";
							echo $array_rincian[$i]; // satuan
							echo "</td>";
							$c = $array_rincian[$i++];

							echo "<td>";
							echo $array_rincian[$i]; // jumlah
							echo "</td>";
							$d = $array_rincian[$i++];

							echo "<td>";
							echo $array_rincian[$i]; // total harga
							echo "</td>";
							$e = $array_rincian[$i++];
							echo "</tr>";
							
                            $sql = "INSERT INTO foodie.pembelian_bahan_baku (namabahanbaku, notapembelian, jumlahpembelian, satuanpembelian, hargasatuan) VALUES (";
							$sql .= "'".$a."','742220',".$d.",'".$c."',".$b.");";
                            
							$result = "";
							try {
	                            $goExec = $conn->prepare($sql);
								
								if($goExec) {
									$aaa = $goExec->execute();
								}
							} catch (PDOExeption $e) {
								$result = $e->getMessage();
							}
						}
					}

				?>
			</tbody>
		</table>
		<?php echo $result; ?>
	</center>
	
<?php 
	include('footer.php');
?>
