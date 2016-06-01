<?php
   include('session.php');
   include("config.php");
   $user = $_SESSION['login_user'];

   /*query per vedere se ci sono prenotazioni*/
   $sql = "SELECT * FROM prenotazioni";
   $result = mysqli_query($db,$sql);
   //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   $active = $row['active'];
   $count = mysqli_num_rows($result);
   mysqli_close($db);
?>

<html>

<title>Prenotazioni</title>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Print3D</title>

  <!-- Bootstrap Core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../css/simple-sidebar.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
  <div id="wrapper">

      <!-- Sidebar -->
      <div id="sidebar-wrapper">
          <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a>Benvenuto <b><?php echo $user;?></b></a>
            </li>
              <li>
                  <a href="prenotazioni.php">Prenotazioni</a>
              </li>
              <li>
                  <a href="logout.php">Sign Out</a>
              </li>
          </ul>
      </div>
      <!-- /#sidebar-wrapper -->

      <!-- Page Content -->
      <div id="page-content-wrapper">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12">
                    <? if ($count >= 1): ?>
                    <h1>Print3D Prenotazioni</h1>
                    <p>Le nostre prenotazioni in corso!</p>
                    <?php
                        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                        ?>
                        <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Inizio</th>
                            <th>Durata</th>
                            <th>Macchina</th>
                            <th>Prenotato da</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><?php echo $row['inizio']?></td>
                            <td><?php echo $row['durata']?></td>
                            <td><?php echo $row['macchina']?></td>
                            <td><?php echo $row['prenotazione']?></td>
                            <? if ($row['prenotazione'] == $user): ?>
                              <td class="glyphicon glyphicon-trash" aria-hidden="true"></td>
                            <? else: ?>
                              <td class="glyphicon glyphicon-lock"></td>
                            <? endif; ?>
                          </tr>
                       </tbody>
                      </table>

                        <?php
                        }
                        ?>
                        <?php
                        include ('user_prenotation.php');
                        ?>
                        <?php
                        include ('gestione.php');
                        ?>
                      <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Menu</a>
                  </div>
                <? else: ?>
                <h1>Print3D Prenotazioni</h1>
                <p>Spiacenti non sono presenti prenotazioni al momento!</p>
                <? endif; ?>
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
