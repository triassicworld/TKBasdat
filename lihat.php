<?php 
	include ('getNama.php');
	include ('headAndNavbar.php');
?>


<div>
<?php
	
	if(isset($_GET['nama']))
	{
		$conn = connectDB();
		
		
		$nama = $_GET['nama'];
		$sql = "SELECT * FROM FOODIE.MENU WHERE NAMA='$nama'";
		
		$goExe = $conn->prepare($sql);
	    $goExe->execute();	        
		//$result = pg_query($conn, $sql);
		if($row = $goExe->fetch())
		{	
			echo "<h3>Nama makanan : ".$row['nama']."</h3>";		
			echo "<p>Gambar : ".$row['gambar']."<br>
				Deskripsi : ".$row['deskripsi']."<br>
				Harga : ".$row['harga']."<br>
				Tersedia : ".$row['jumlahtersedia']."<br>
				Kategori : ".$row['kategori']."<br>
			</p>";
		}
	}
?>
</div>

<?php
	include ('footer.php');
?>
