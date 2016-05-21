<?php
    include('getNama.php');
    include('headAndNavbar.php');
?>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 text-center">
                <form>
                    <input type="text" name="nomorNota" placeholder="Nomor Nota">
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Supplier<span class="caret"></span></button>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div>
                </form>

                <div class="well">
                    <form action="beli_bahan_makanan.php">
                        <table border="1" style="width:100%">
                            <tr>
                                <th>Nama Bahan</th>
                                <th>Harga Satuan</th>
                                <th>Satuan</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </tr>
                            <?php
                                if (isset($_GET['tambahBahan'])) {
                                    runMyFunction();
                                }

                                function runMyFunction() {
                                    include('tambah_bahan.php');
                                }
								if (isset($_GET['simpanBahan'])) {
									header('Location : rincian_pembelian_bahan_makanan.php');
								}
                            ?>
                        </table>
                        
                        <input type="submit" class="btn btn-default" name="tambahBahan" value="Tambah Bahan"/>
                        <input type="submit" class="btn btn-default" name="simpanBahan" value="Simpan" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div align="left">
        <div id="wrap" align="left">
            <ul>
                <?php
                    $conn = connectDB();

                    $sql = "SELECT * FROM foodie.pembelian_bahan_baku";
                    
                    $goExec = $conn->prepare($sql);
                    $goExec->execute();
                    
                    $bb = "";
                    $id = 1;

                    while($bb = $goExec->fetch()) {
                        echo "<li id='".$id."'><div>";
                        echo "<span class='name'>".$bb['namabahanbaku']."</span>";
                        echo " - Rp <span class='price'>".$bb['hargasatuan']."</span>";
                        echo "</div></li>";
                        $id++;
                    }
                ?>
                <li id="1">
                    <div><span class="name">Mac/OS X </span>: $<span class="price">800</span> </div>
                </li>
                <li id="2">
                    <div><span class="name">IPhone 3GS </span>: $<span class="price">500 </span></div>
                </li>
                <li id="3">
                    <div><span class="name">Apple IPad </span>: $<span class="price">450</span></div>
                </li>
                <li id="4">
                    <div><span class="name">Mac NoteBook </span>: $<span class="price">1200 </span></div>
                </li>
                <li id="5">
                    <div> <span class="name">Bag : Buy Now Price </span>: $<span class="price">65</span></div>
                </li>
                <li id="6">
                    <div><span class="name">IPhone 4GS </span>: $<span class="price">800</span> </div>
                </li>
                <li id="7">
                    <div><span class="name"> Bag : Buy Now Price </span>: $<span class="price">45</span></div>
                </li>
                <li id="8">
                    <div><span class="name">Mac NoteBook </span>: $<span class="price">900 </span></div>
                </li>
                <li id="9">
                    <div><span class="name">Sony Super Ear Phone </span>: $<span class="price">20</span></div>
                </li>
            </ul>
        </div>
        
        <div id="left_bar"> 
            <form action="#" id="cart_form" name="cart_form">
                <div class="cart-info"></div>
                <div class="cart-total">
                    <b>Total Charges:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> $<span>0</span>
                    <input type="hidden" name="total-hidden-charges" id="total-hidden-charges" value="0" />
                </div>
                <button type="submit" id="Submit">CheckOut</button>
            </form>
        </div> 
    </div>

<?php include('footer.php'); ?>