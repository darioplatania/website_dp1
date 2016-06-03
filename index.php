<?php
session_start();
$email = $_SESSION['email'];

if(!$_SESSION['email'])
{

    header("Location: welcome.php");//redirect to login page to secure the welcome page without login access.
}
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Print3D</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <link href="js/bootstrap.min.js" rel="stylesheet">

    <!-- Jquery -->
    <link href="js/jquery.js" rel="stylesheet">
</head>

<body>

    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li>
                    <a>Benvenuto <b><?php echo $email;?></b></a>
                </li>
                <li>
                    <a href="php/prenotazioni.php">Prenotazioni</a>
                </li>
                <li>
                    <a href="php/logout.php">Sign Out</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Print3D WebSite</h1>
                        <p>Il nostro sito Web da la possibilità ai nostri utenti di usufruire di stampanti 3D per la realizzazione dei propri progetti</p>
                        <p>Prenota ora! </p>
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Menu</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
