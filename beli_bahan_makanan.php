<?php
    include('getNama.php');
    include('headAndNavbar.php');

    $pertama = "inline";
    $kedua = "none";
    $ketiga = "none";

    $noNota = "";
    $supplierName = "";
?>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 text-center">
                
                <div id="isi_pertama" style="display:<?php echo $pertama; ?>;">
                    <form action="beli_bahan_makanan.php" name="nota_form" method="POST">
                        <p>Masukkan nomor nota</p>
                        <select name="submitNomorNota">
                            <?php
                                $conn = connectDB();

                                $sql = "SELECT * FROM foodie.pembelian";
                                
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
                        <input type="submit" name="ok1" value="OK">
                    </form>

                    <?php
                        if(isset($_POST['submitNomorNota'])) {
                            $pertama = "none";
                            $kedua = "block";
                            $ketiga = "none";

                            $noNota = $_POST['submitNomorNota'];
                        }
                    ?>
                </div>

                <br>
                <br>
                <br>

                <div id="isi_kedua" style="display:<?php echo $kedua; ?>;">
                    <form action="beli_bahan_makanan.php" name="supplier_form" method="POST">
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
                        <input type="submit" name="ok2" value="OK">
                    </form>

                    <?php
                        if(isset($_POST['namaSupplier'])) {
                            $pertama = "none";
                            $kedua = "none";
                            $ketiga = "block";

                            $supplierName = $_POST['namaSupplier'];
                        }
                    ?>
                </div>
            
                <div id="isi_ketiga" style="display:<?php echo $ketiga; ?>;">
                    <div align="left">
                        <div id="wrap" align="left">
                            <h3>Klik nama bahan baku untuk menambah ke cart</h3>
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