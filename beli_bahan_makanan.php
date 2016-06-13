<?php
    include('getNama.php');
    include('headAndNavbar.php');

    $resp = "";

    if(isset($_GET['step']) && $_GET['step'] == '2') {
    	if(isset($_POST['submitNomorNota'])) {
	        $noNota = $_POST['submitNomorNota'];
	    	
	    	if(strlen($noNota) != 6) {
	            $resp = "Nomor nota harus terdiri dari 6 karakter";
	    	} else {
	            $conn = connectDB();

	            $sql = "SELECT nomornota FROM foodie.pembelian;";
	            
	            $goExec = $conn->prepare($sql);
	            $goExec->execute();

	            $row = "";
	            $tmp = false;

	            while($row = $goExec->fetch()) {
	                if ($row['nomornota'] == $noNota) {
	                	$tmp = true;
	                	break 1;
	                }
	        	}

	        	if($tmp) {
	            	$resp = "Nomor nota sudah ada";
	        	} else {
	        		$_GET['alreadyExist'] = false;
	        	}
	        }
		} else {
			$resp = "Tolong tulis nomor nota";
	    }
	}
	else if(isset($_GET['step']) && $_GET['step'] == '3') {
		$_GET['alreadyExist'] = false;
	}
	else {
		
	}

    $pertama = (isset($_GET['step']) && isset($_GET['alreadyExist'])) ? 'none' : 'block';
    $kedua = ((!isset($_GET['step']) || $_GET['step'] != '2') || (!isset($_GET['alreadyExist']) || $_GET['alreadyExist'] != false)) ? 'none' : 'block';
    $ketiga = (!isset($_GET['step']) || $_GET['step'] != '3') ? 'none' : 'block';

    $noNota = "";
    $supplierName = "";
?>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 text-center">
                
                <div id="isi_pertama" style="display:<?php echo $pertama; ?>;">
                    <form action="beli_bahan_makanan.php?step=2" name="nota_form" method="POST">
                        <p>Masukkan nomor nota (6 digit)</p>
                        <input type="text" name="submitNomorNota">

                        <p>Pastikan nomor nota anda belum ada di list berikut:</p>
                        <select>
                        	<?php
                                $conn = connectDB();
                                $sql = "SELECT nomornota FROM foodie.pembelian ORDER BY nomornota ASC";
                                
                                $goExec = $conn->prepare($sql);
                                $goExec->execute();
                                
                                $row = "";
                                while($row = $goExec->fetch()) {
                                    echo "<option value='".$row['nomornota']."'>";
                                    echo $row['nomornota'];
                                    echo "</option>";
                                }
                            ?>
                        </select>
                        <br>
                        <?php 
                        	echo "<span style='color:red'>".$resp."</span><br>";
                        ?>
                        <input type="submit" name="ok1" value="Create New Nota">
                    </form>
                </div>

                <div id="isi_kedua" style="display:<?php echo $kedua; ?>;">
                    <?php
			            $noNota = $_POST['submitNomorNota']; 
                    	echo "<h4>Nomor nota : " . $noNota . "</h4><br><br>"; 
                	?>
                    <form action="beli_bahan_makanan.php?step=3" name="supplier_form" method="POST">
                        <p>Pilih nama supplier</p>
                        <select name="namaSupplier">
                            <?php
                                $conn = connectDB();

                                $sql = "SELECT namasupplier FROM foodie.pembelian";
                                
                                $goExec = $conn->prepare($sql);
                                $goExec->execute();
                                
                                $row = "";

                                while($row = $goExec->fetch()) {
                                    echo "<option value='".$row['namasupplier']."'>";
                                    echo $row['namasupplier'];
                                    echo "</option>";
                                }
                            ?>
                        </select>
                        <input type="hidden" name="submitNumNota" value="<?php echo $noNota; ?>"> <br>
                        <input type="submit" name="ok2" value="OK">
                    </form>
                </div>
            
                <div id="isi_ketiga" style="display:<?php echo $ketiga; ?>;">
                    <?php
            	        $supplierName = $_POST['namaSupplier'];
				        $noNota = $_POST['submitNumNota'];
                    	echo "<h4>Nomor nota : " . $noNota . "</h4><br>";
                    	echo "<h4>Nama supplier : " . $supplierName . "</h4><br>"; 
                    ?>
                    <div align="left">
                        <div id="wrap" align="left">
                            <h5>Klik nama bahan baku untuk menambah ke cart</h5>
                            <ul class="list-group">
                                <?php
                                    $conn = connectDB();

                                    $sql = "SELECT * FROM foodie.bahan_baku";
                                    
                                    $goExec = $conn->prepare($sql);
                                    $goExec->execute();
                                    
                                    $row = "";
                                    $id = 0;

                                    while($row = $goExec->fetch()) {
                                        echo "<li id='".$id."'><div>";
                                        echo "<span class='namaBahan list-group-item' style='background-color:yellow'>".$row['nama']."</span>";
                                        echo " Rp <span class='price'>".((($id)*8000)%11000 + 1000)."</span>";
                                        echo " per <span class='satuanstok'>".$row['satuanstok']."</span>";
                                        echo "</div></li>";
                                        $id++;
                                    }
                                ?>
                            </ul>
                        </div>
                        
                        <div id="left_bar">
                            <h4>Cart</h4>
                            <form action="rincian_pembelian_bahan_baku.php" id="cart_form" name="cart_form" method="POST">
                                <div class="cart-info"></div>
                                <div class="cart-total">
                                    <b>Total Harga:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> Rp <span>0</span>

                                    <input type="hidden" name="submitNomorNota" value="<?php echo $noNota; ?>" />
                                    <input type="hidden" name="namaSupplier" value="<?php echo $supplierName; ?>" />
                                    
                                    <input type="hidden" name="total-hidden-charges" id="total-hidden-charges" value="0" />
                                    <input type="hidden" name="rincian-hidden" id="rincian-hidden" />
                                </div>
                                <input type="submit" class="btn btn-primary" id="Submit" value="Simpan" name="SimpanRincian" style="color:black;background-color:yellow">
                            </form>
                        </div>

                    </div>
                </div> <!-- form isi_ketiga -->

            </div>
        </div>
    </div>
<?php include('footer.php'); ?>