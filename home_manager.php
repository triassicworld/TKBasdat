<?php
    include('getNama.php');
    include('headAndNavbar.php');
?>

    <!-- Welcoming -->
    <div id="login" class="container">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4 col-md-10 col-md-offset-1 text-center">
                <div class="well">
                    <h3>Hello, manager 
                    	<?php echo " <span style='color:blue'>".$nama."</span>" ?>
                    </h3>
                </div>
                <div>
                    <form action = "logout.php">
 +                      <input type = "submit" value = "Log Out"></input>
 +                  </form>
                </div>
            </div>
        </div>
    </div>

<?php
    include('footer.php');
?>