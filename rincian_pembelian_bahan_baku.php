<?php
    include('getNama.php');
    include('headAndNavbar.php');

	$semua_rincian = "";
	$harga_Total = "";
	$result = "";

	if(isset($_POST['SimpanRincian'])) {
		$noNota = $_POST['submitNomorNota'];
		$namaSupplier = $_POST['namaSupplier'];
		$array_rincian = json_decode($_POST['rincian-hidden']);
		$harga_Total = $_POST['total-hidden-charges'];

		// ----- Berikut insert ke tabel pembelian -----

		date_default_timezone_get('Indonesia/Jakarta');
		$date = date('m/d/Y h:i', time());

		$insertToPembelian = "INSERT INTO foodie.pembelian (NomorNota,Waktu,NamaSupplier,EmailStaff) 
		VALUES (".$noNota.",'".$date."','".$namaSupplier."','".$emailSession."');";

		$conn = connectDB(); // konek database
		$resultToPembelian = "";

		try {
            $goExec = $conn->prepare($insertToPembelian);
			
			if($goExec) {
				$goExec->execute();
				$resultToPembelian = "Nomor nota baru sudah berhasil ditambahkan ke database";
			} else {
				$resultToPembelian = "gagal eksekusi";
			}
		} catch (PDOExeption $e) {
			$resultToPembelian = $e->getMessage();
		}
	}
?>

	<center>
		<h3>FOODIE - RINCIAN PEMBELIAN BAHAN MAKANAN</h3>
		<br>
		<h5>Nomor Nota: <?php echo $noNota; ?></h5>
		<h5>Supplier: <?php echo $namaSupplier; ?></h5>
		<h5>Waktu: <?php echo $date; ?></h5>
		<h5>Total: <?php echo $harga_Total; ?></h5>
		<h5>Staf: <?php echo $nama; ?></h5>
		<hr>
		<hr>
		<?php 
			echo $resultToPembelian; 
		?>
		<table class="table table-responsive" width="80%">
			<thead>
				<td><Strong>Kode Bahan</Strong></td>
				<td><Strong>Nama Bahan</Strong></td>
				<td><Strong>Harga Satuan</Strong></td>
				<td><Strong>Satuan</Strong></td>
				<td><Strong>Jumlah</Strong></td>
				<td><Strong>Total</Strong></td>				
			</thead>
			<tbody>
				<?php
					foreach ($array_rincian as $item) {
						$conn = connectDB(); // konek database
						echo "<tr>";
						foreach ($item as $value) {
							echo "<td>";
							echo $value;
							echo "</td>";
						}
						echo "</tr>";
						
                        $sql = "INSERT INTO foodie.pembelian_bahan_baku (namabahanbaku, notapembelian, jumlahpembelian, satuanpembelian, hargasatuan) VALUES (";
						$sql .= "'".$item[1]."','".$noNota."',".$item[4].",'".$item[3]."',".$item[2].");";

						$result = "";
						try {
                            $goExec = $conn->prepare($sql);
							
							if($goExec) {
								$goExec->execute();
							} else {
								$result = "gagal eksekusi";
							}
						} catch (PDOExeption $e) {
							$result = $e->getMessage();
						}
					}
				?>
			</tbody>
		</table>
		<?php 
			echo $result; 
		?>
	</center>
	
<?php 
	include('footer.php');
?>
