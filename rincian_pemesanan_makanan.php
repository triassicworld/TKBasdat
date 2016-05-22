<?php
    include('getNama.php');
    include('headAndNavbar.php');
?>

<?php
    $conn = connectDB();

    $sql = "SELECT * FROM foodie.pemesanan_menu_harian WHERE nomornota='".$_GET["nomornota"]."' ORDER BY namamenu ASC";
    $sql2 = "SELECT * FROM foodie.pemesanan WHERE nomornota='".$_GET["nomornota"]."'";
    $sql3 = "SELECT * FROM foodie.menu, foodie.pemesanan, foodie.pemesanan_menu_harian WHERE menu.nama = pemesanan_menu_harian.namamenu AND pemesanan.nomornota = pemesanan_menu_harian.nomornota AND pemesanan.nomornota='".$_GET["nomornota"]."'";
    //$sql2 = "SELECT * FROM foodie.kasir, foodie.pemesanan WHERE email=emailkasir AND "

    $goExec = $conn->prepare($sql);
    $goExec->execute();

    $goExec2 = $conn->prepare($sql2);
    $goExec2->execute();
    

    $bb = "";
    $cc = "";
    $dd = "";
    $id = 1;


    while($cc = $goExec2->fetch()) {
    	echo '<center><h4><strong>FOODIE RINCIAN PEMESANAN</strong></h4></center>';
	    echo '<hr>';

	    echo '<div id="" class="container">
	        	<div class="row">
	        	<table class="table">
	            <thead>
	            	<tr>
		                <th>Nomor Nota  : '.$cc['nomornota'].'</th>
		                <th>Total: '.$cc['total'].'</th>
	            	</tr>
	            	<tr>
		                <th>Waktu Pesan: '.$cc['waktupesan'].'</th>
		                <th>Kasir: '.$cc['emailkasir'].'</th>
	                </tr>
	            	<tr>
	                	<th>Waktu Bayar : '.$cc['waktubayar'].'</th>
	                	<th>Mode Pembayaran: '.$cc['mode'].'</th>
	              	</tr>
	            </thead>';
    }
    
    echo '	<div id="" class="container">
        	<div class="row">
        	<table class="table">
            <thead>
              <tr>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
              </tr>
            </thead><tbody>';

    $count = 0;
    while(($bb = $goExec->fetch()) && $count < 15) {
        $harga = "";
        $goExec3 = $conn->prepare($sql3);
    	$goExec3->execute();
        while($dd = $goExec3->fetch()) {
    		$harga = $dd["harga"];
    	}
        echo'<tr>
                <td>'.$bb['namamenu'].'</td>
                <td>'.$harga.'</td>
                <td>'.$bb['jumlah'].'</td>
                <td>'.($harga*$bb['jumlah']).'</td>
            </tr>
          ';
          $count++;
    }
    echo '<tbody></table>';

    if($count>15) {
        echo '<center><button>Next Page</button></center>';
    }
    echo ' <hr></div></div>';
?>
	
<?php
    include('footer.php');
?>
