<?php
   include('session.php');
   $user = $_SESSION['login_user'];
?>
<html>

   <head>
     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
     <!-- jQuery library -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
     <!-- Latest compiled JavaScript -->
     <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

     <title>Print3d</title>
   </head>

   <body>
     <nav class="navbar navbar-default">
       <div class="container-fluid">
         <!-- Brand and toggle get grouped for better mobile display -->
         <div class="navbar-header">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href="#">Print3D</a>
         </div>

         <!-- Collect the nav links, forms, and other content for toggling -->

         <!-- Inizio Parte Login -->
         <ul class="nav navbar-nav navbar-right">
           <!--<li><a href="#">Link</a></li>-->
           <li class="dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome <?php echo $user; ?>
               <span class="caret"></span></a>
             <ul class="dropdown-menu">
               <li><a href = "logout.php">Sign Out</a></li>
             </ul>
           </li>
         </ul>
        <!-- Fine Parte Login -->
       </div><!-- /.container-fluid -->
     </nav>

   </body>

</html>
