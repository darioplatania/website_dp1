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
                  <a href="../index.html">
                      Print3D
                  </a>
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
                    <h1>Print3D Prenotazioni</h1>
                    <p>Le nostre prenotazioni in corso!</p>
                    <?php
                        $connect = mysql_connect("localhost","root", "california");
                        if (!$connect) {
                            die(mysql_error());
                        }
                        mysql_select_db("print3D");
                        $results = mysql_query("SELECT * FROM users LIMIT 10");
                        while($row = mysql_fetch_array($results)) {
                        ?>
                          <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Username</th>
                              <th>Password</th>
                              <th>Email</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><?php echo $row['username']?></td>
                              <td><?php echo $row['password']?></td>
                              <td><?php echo $row['email']?></td>
                            </tr>
                         </tbody>
                        </table>

                        <?php
                        }
                        ?>

                        <?php
                        include ('user_prenotation.php');
                        ?>
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
