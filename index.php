<?php
    include 'login.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Basdat - A12</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Javascript -->
    <script type="text/javascript" src="js/myScript.js" ></script>
</head>

<body>
    <div id="bottom_of_page" class="bg-primary" style="background-color:yellow">
        <br>
        <br>
    </div>
    <br>
    <br>

    <!-- Log In -->
    <div id="login" class="container">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4 col-md-10 col-md-offset-1 text-center">
                <div class="well">
                    <h4>Log In</h4>
                    <form method="POST" action="index.php" role="form">
                        <div class="form-group"><br>
                            Email<br>
                            <input type="email" placeholder="Email" class="form-control" id="email" name="email"/><br>
                            Password<br>
                            <input value="" placeholder="Password" class="form-control" id="password" type="password" name="password" /><br><br>
                            <input id="button" class="btn btn-primary" name="enter" type="submit" value="Enter" style="color:black;background-color:yellow">
                        </div>
                    </form>
                    <?php echo "<span style='color:red'>".$resp."</span>"; ?>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

<?php include('footer.php'); ?>