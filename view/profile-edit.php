<?php
include('config/conn.php');

$userid = $_SESSION['userid'];

$query = mysql_query("SELECT * FROM user WHERE id_user = '$userid'");
$user = mysql_fetch_array($query);

if (isset($_POST['btn-save'])) {
	$userid = $_SESSION['userid'];
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$location = $_POST['location'];
	$email = $_POST['email'];
	$nohp = $_POST['nohp'];
	$tgl_lahir = $_POST['tgl_lahir'];

	$query = mysql_query("UPDATE user SET first_name='$fname', last_name='$lname', location='$location', email='$email', no_hp='$nohp', tgl_lahir='$tgl_lahir' WHERE id_user='$userid'");

	if ($query) {
		$target = "uploads/";
		if(!empty($_FILES['profilpic']['name']))
		{ 
		    $profilpic_tmp   = $_FILES['profilpic']['type'];
		    $pch= explode("/", $profilpic_tmp);
		    $type = "uploads/pp".$userid.".".$pch[1];
			$loc = $target.basename($_FILES['profilpic']['name']=$type);
			$upload = move_uploaded_file($_FILES['profilpic']['tmp_name'],$loc);
			if(!$upload)
			  {
			    print "File gagal di upload";
			    exit(1);
			  }
		  $fileName  = $_FILES['profilpic']['name']=$type;
		  mysql_query("UPDATE user SET profilpic ='$fileName' WHERE id_user ='$userid'");
		}
		if(!empty($_FILES['coverpic']['name']))
		{ 
		    $coverpic_tmp   = $_FILES['coverpic']['type'];
		    $c_pch= explode("/", $coverpic_tmp);
		    $c_type = "uploads/cp".$userid.".".$c_pch[1];
			$c_loc = $target.basename($_FILES['coverpic']['name']=$c_type);
			$c_upload = move_uploaded_file($_FILES['coverpic']['tmp_name'],$c_loc);
			if(!$c_upload)
			  {
			    print "File gagal di upload";
			    exit(1);
			  }
		  $c_fileName  = $_FILES['coverpic']['name']=$c_type;
		  mysql_query("UPDATE user SET coverpic ='$c_fileName' WHERE id_user ='$userid'");
		}
		echo "<script>window.top.location='?ref=edit_profile&stat=saved';</script>";
	}
	else {
		echo '<div class="alert alert-warning">';
		echo 'Terjadi kesalahan dalam penyimpanan';
		echo '</div>';
	}
}		
?>

<div class="container">
	<div class="content">
		<div class="row">
			<div class="col-md-3">
			</div>
			<div class="col-md-6">
				<?php
				$fname = $user['first_name'];
				$status = $_GET['stat'];
				if ($status=='saved') {
					echo "<div class='alert alert-success' role='alert'>Profil berhasil disimpan. <a href='?ref=view_profile' class='alert-link'> Lihat profil</a></div>";
				}
				elseif ($status=='reg_complete') {
					echo "<div class='alert alert-success' role='alert'>Selamat datang <strong>$fname</strong>! Silahkan lengkapi data profil kamu atau langsung<a href='?ref=explore' class='alert-link'> menjelajah</a></div>";
				}
				?>	
				<form method="POST" class="validate-form" enctype="multipart/form-data">
					<div class="form-horizontal">
						<div class="form-group">
							<label class="col-md-4 control-label" for="profile-pic">Foto Profil</label>
							<div class="col-md-2">
								<?php 
								if($user['profilpic']!=NULL) { ?>
									<img class="img-thumbnail" src="<?php echo $user['profilpic'] ?>">
								<?php }
								else { ?>
									<img src="http://placehold.it/70x70">
								<?php } ?>
							</div>  
							<div class="col-md-6">
								<p><input type="file" name="profilpic"></p>
								<p class="text-muted">Ukuran yang disarankan 200 x 200 px</p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="cover-pic">Foto Cover</label>  
							<div class="col-md-2">
								<?php 
								if($user['coverpic']!=NULL) { ?>
									<img class="img-thumbnail" src="<?php echo $user['coverpic'] ?>">
								<?php }
								else { ?>
									<img src="http://placehold.it/70x70">
								<?php } ?>
							</div>  
							<div class="col-md-6">
								<p><input type="file" name="coverpic"></p>
								<p class="text-muted">Ukuran yang disarankan 1366 x 320 px</p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="first-name">Nama Depan</label>  
							<div class="col-md-8">
								<input name="firstname" type="text" class="form-control input-md" value="<?php echo $user['first_name'] ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="last-name">Nama Belakang</label>  
							<div class="col-md-8">
								<input name="lastname" type="text" class="form-control input-md" value="<?php echo $user['last_name'] ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="location">Lokasi</label>  
							<div class="col-md-8">
								<input name="location" type="text" class="form-control input-md" value="<?php echo $user['location'] ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="email">E-mail</label>  
							<div class="col-md-8">
								<input name="email" type="text" class="form-control input-md" value="<?php echo $user['email'] ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="no-hp">No Handphone</label>  
							<div class="col-md-8">
								<input name="nohp" type="text" class="form-control input-md" value="<?php echo $user['no_hp'] ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="tgl-lahir">Tanggal Lahir</label>  
							<div class="col-md-8">
								<div class="input-group date">
									<input type="text" name="tgl_lahir" class="form-control" placeholder="Pilih tanggal lahir" value="<?php echo $user['tgl_lahir'] ?>">
									<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4"></div>
							<div class="col-md-8">
								<div class="input-group">
									<input type="submit" class="btn btn-primary" name="btn-save" value="Simpan perubahan">
								</div>                                    
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-3">
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<hr class="footer">
		</div>
	</div>
</div>
</div>	

<!-- 	// $pp_file = $_FILES['profile-pic']['tmp_name'];
	// $pp_image = addslashes(file_get_contents($_FILES['profile-pic']['tmp_name']));
	// $pp_image_name = addcslashes($_FILES['profile-pic']['name']};
	// $pp_image_size = getimagesize($_FILES['profile-pic']['tmp_name']);

	// $cp_file = $_FILES['cover-pic']['tmp_name'];
	// $cp_image = addslashes(file_get_contents($_FILES['cover-pic']['tmp_name']));
	// $cp_image_name = addcslashes($_FILES['cover-pic']['name']};
	// $cp_image_size = getimagesize($_FILES['cover-pic']['tmp_name']);

	// if (($pp_image_size && $cp_image_size) == FALSE) {
	// 	echo "Bukan merupakan file gambar, pilih lagi"
	// }
	// else {
	// 	$query = mysql_query("INSERT INTO uploads VALUES ('', '$_SESSION['userid', '')")
	// } -->
