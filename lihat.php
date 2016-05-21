<?php 
	include ('getNama.php');
	include ('headAndNavbar.php');
?>

<div>
	<form action = "logout.php">
		<input type = "submit" value = "Log Out"></input>
	</form>
</div>

<div>
	<h3>Nama makanan</h3>
	
	<p>
		Gambar : <br>
		Deskripsi : <br>
		Harga : <br>
		Tersedia : <br>
		Kategori : <br>
	</p>
</div>

<?php
	include ('footer.php');
?>