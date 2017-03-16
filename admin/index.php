<?php
	session_start();
    error_reporting("E_ALL ^ E_NOTICE");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>kamarana</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/admin.css" rel="stylesheet">
    <!-- Custom CSS for the 'Business Frontpage' Template -->
    <link href="css/business-frontpage.css" rel="stylesheet">
    <link href="css/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.js"></script>
</head>

<body>
	
   <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-main-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">Kamarana</a>
    </div>
    <div class="collapse navbar-collapse" id="nav-main-collapse">
      <ul class="nav navbar-nav navbar-right">
      <li><a href="?dir=thr_vw">Tulisan</a></li>
       <li><a href="?dir=kat_vw">Kategori</a></li>
        <?php 
               if(empty($_SESSION['level']))
               {
                    header("Refresh: 0.1; url=login/"); 
               }
          if($_SESSION['level'] == "Master" )
          {
            echo"<li><a href='?dir=adm_vw'>Admin</a></li>";
          }
          ?>
      
        <li><a href="?dir=ang_vw">Anggota</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gear fa-fw"></i> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li class="divider"></li>
            <li><a href="?dir=akn_nm"> <i class='fa fa-users '></i> Manajemen Akun</a></li>
            <li class="divider"></li>
            <li><a href="?dir=akn_lgt"><i class='fa fa-power-off '></i> Keluar</a></li>
            <li class="divider"></li>
          </ul>
        </li>
      </div>
    </div>
  </nav>

    

<div class="container">
    <div class="row">
        <div class="col-lg-2 col-sm-2">
        
        <?php
            include"include/lib_func.php";
            include"include/validation_func.php";
            include"include/page.php";
        ?>
            
        </div>
    </div>       
    <hr>

    <div class="row">
        <div class="col-md-4">
            <p>Kamarana &copy; <?php echo date("Y") ?> | <a href="#">Bahasa Indonesia</a></p>
        </div>
        <div class="col-md-8">
            <div class="social text-right">
                <a href="#"><i class="fa fa-facebook fa-fw fa-lg"></i></a>
                <a href="#"><i class="fa fa-twitter fa-fw fa-lg"></i></a>
                <a href="#"><i class="fa fa-youtube fa-fw fa-lg"></i></a>
            </div>
        </div>
    </div>

</body>

</html>
