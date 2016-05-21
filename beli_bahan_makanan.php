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
            </div>
        </div>
    
        <div align="left">
            <div id="wrap" align="left">
                <ul>
                    <?php
                        $conn = connectDB();

                        $sql = "SELECT * FROM foodie.bahan_baku";
                        
                        $goExec = $conn->prepare($sql);
                        $goExec->execute();
                        
                        $row = "";
                        $id = 1;

                        while($row = $goExec->fetch()) {
                            echo "<li id='".$id."'><div>";
                            echo "<span class='namaBahan'>".$row['nama']."</span>";
                            echo " - Rp <span class='price'>2500</span>";
                            echo "</div></li>";
                            $id++;
                        }
                    ?>
                </ul>
            </div>
            
            <div id="left_bar"> 
                <form action="#" id="cart_form" name="cart_form">
                    <div class="cart-info"></div>
                    <div class="cart-total">
                        <b>Total Harga:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> Rp <span>0</span>
                        <input type="hidden" name="total-hidden-charges" id="total-hidden-charges" value="0" />
                    </div>
                    <button type="submit" class="btn btn-primary" id="Submit">Simpan</button>
                </form>
            </div> 
        </div>
    </div>
<?php include('footer.php'); ?>