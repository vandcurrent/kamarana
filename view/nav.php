<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-main-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="?ref=home"><?php brand(); ?></a>
    </div>
    <div class="collapse navbar-collapse" id="nav-main-collapse">
      <!-- <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <div class="input-group">
            <input type="search" class="form-control" placeholder="Pencarian">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-success"><i class="fa fa-search fa-fw"></i></button>
            </span>
          </div>
        </div>              
      </form> -->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="?ref=explore">Jelajah</a></li>

        <?php 
        if(!$_SESSION['haslogin']) {
          echo '<li><a href="#" data-toggle="modal" data-target="#loginModal">Login</a></li>';
          echo '<li><a href="#" class="nav-register" data-toggle="modal" data-target="#regModal">Daftar</a></li>';
        }
        else {
          echo '<li class="dropdown">';        
          echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-fw"></i> '.$_SESSION['fname'].' <b class="caret"></b></a>';
          echo '<ul class="dropdown-menu">';
          echo '<li><a href="?ref=view_profile&u='.$_SESSION['userid'].'">Lihat Profil</a></li>';
          echo '<li><a href="logout.php">Logout</a></li></ul>';
          echo '</li>';
        }
        ?>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gear fa-fw"></i> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="?ref=about">Tentang Kami</a></li>
            <li><a href="./docs/">Dokumentasi</a></li>
          </ul>
        </li>
      </div>
    </div>
  </nav>

  <!-- Login Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="loginModalLabel">Login</h4>
        </div>
        <div class="modal-body">
          <?php login_form(); ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Register Modal -->
  <div class="modal fade" id="regModal" tabindex="-1" role="dialog" aria-labelledby="regModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="regModalLabel">Daftar</h4>
        </div>
        <div class="modal-body">
          <?php register_form(); ?>
        </div>
      </div>
    </div>
  </div>