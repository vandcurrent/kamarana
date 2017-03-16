<?php

	function koneksi_db()
	{
		$host		= "localhost";
		$db			= "kamarana_db";
		$user		= "root";
		$password	= "";
		
		$link 		= mysql_connect($host,$user,$password);
		mysql_select_db($db,$link);
		if(!$link)
			echo "Error :".mysql_error();
		return $link;
	}
$link 	= koneksi_db();	

if(empty($_GET['dir']))
{
	$dir = "";
	$pg =  "Tulisan";
}
else
{
	$dir = $_GET['dir'];
}

//info
if(($dir == "ang_vw") or ($dir == "ang_trs")  or ($dir == "ang_sch"))
	{
		$pg =  "Anggota";

	}
if(($dir == "adm_vw") or ($dir == "adm_add") or ($dir == "adm_trs")  or ($dir == "adm_sch"))
	{
		$pg =  "Administrator";
		if($dir == "adm_add")
		{
			$gp="Tambah Administrator";
		}
		else
		{
		
		
		}
	}
if(($dir == "kat_vw") or ($dir == "kat_trs")  or ($dir == "kat_add") or ($dir == "kat_edit"))
	{
		$pg =  "Sub Kategori";

	}
if(($dir == "thr_vw") or ($dir == "thr_trs")  or  ($dir == "thr_sch")  or  ($dir == "thr_dtl"))
	{
		$pg =  "Tulisan";

	}
	if(($dir == "akn_nm") or ($dir == "akn_pwd"))
	{
		$pg =  "Manajemen Akun";

	}

function tulisan_menu()
{
	echo "
	    <hr>
	    <div class='right_menu'>
	         <a href='?dir=thr_vw'><i class='fa fa-bars fa-fw fa-lg'></i> <strong> View </strong></a>
	    </div>

	    <div class='right_menu'>
	         <a href='?dir=thr_sch'><i class='fa fa-search fa-fw fa-lg'></i> <strong> Search </strong></a>
	    </div>

	    <div class='right_menu'>
	         <a href='?dir=thr_trs'><i class='fa fa-trash-o fa-fw fa-lg'></i> <strong> Trash </strong></a>
	    </div>

		</div>";
}

function akun_menu()
{
	echo "
	    <hr>
	    <div class='right_menu'>
	         <a href='?dir=akn_nm'><i class='fa fa-user fa-fw fa-lg'></i> <strong> Ganti Nama </strong></a>
	    </div>

	    <div class='right_menu'>
	         <a href='?dir=akn_pwd'><i class='fa fa-lock fa-fw fa-lg'></i> <strong> Ganti Password </strong></a>
	    </div>
		</div>";
}

function kategori_menu()
{
	echo "
	    <hr>
	    <div class='right_menu'>
	         <a href='?dir=kat_add'><i class='fa fa-plus fa-fw fa-lg'></i> <strong> Add </strong></a>
	    </div>

	    <div class='right_menu'>
	         <a href='?dir=kat_vw'><i class='fa fa-bars fa-fw fa-lg'></i> <strong> View </strong></a>
	    </div>

	    <div class='right_menu'>
	         <a href='?dir=kat_trs'><i class='fa fa-trash-o fa-fw fa-lg'></i> <strong> Trash </strong></a>
	    </div>

		</div>";
}

function admin_menu()
{
	echo "
	    <hr>
	    <div class='right_menu'>
	         <a href='?dir=adm_add'><i class='fa fa-plus fa-fw fa-lg'></i> <strong> Add </strong></a>
	    </div>

	    <div class='right_menu'>
	         <a href='?dir=adm_vw'><i class='fa fa-bars fa-fw fa-lg'></i> <strong> View </strong></a>
	    </div>

	    <div class='right_menu'>
	         <a href='?dir=adm_sch'><i class='fa fa-search fa-fw fa-lg'></i> <strong> Search </strong></a>
	    </div>

	    <div class='right_menu'>
	         <a href='?dir=adm_trs'><i class='fa fa-trash-o fa-fw fa-lg'></i> <strong> Trash </strong></a>
	    </div>

		</div>";
}

function user_menu()
{
	echo "
	    <hr>
	    <div class='right_menu'>
	         <a href='?dir=ang_vw'><i class='fa fa-bars fa-fw fa-lg'></i> <strong> View </strong></a>
	    </div>

	    <div class='right_menu'>
	         <a href='?dir=ang_sch'><i class='fa fa-search fa-fw fa-lg'></i> <strong> Search </strong></a>
	    </div>

	    <div class='right_menu'>
	         <a href='?dir=ang_trs'><i class='fa fa-trash-o fa-fw fa-lg'></i> <strong> Trash </strong></a>
	    </div>

		</div>";
}

if(empty($_GET['kd']))
	{
		$kode ="aa";
	}
	else
	{
		$kode = $_GET['kd'];
	}

if($kode == "add_account")
{
	$email 		= $_POST['email'];
	$name_user 	= $_POST['name_user'];
	$password	= md5($_POST['repassword']);
	
	$sql	= "insert into admin values(null,'$name_user','$email','$password','Active','Admin')";
	$res	= mysql_query($sql,$link);
	if($res)
	{
		echo"<div id='hasil' class='alert_succes' >
		Proses Berhasil
		</div>";
	}
	else
	{
		echo"<div id='hasil' class='alert_error'>
		Proses Gagal
		</div>";
	}
	
}

if($kode == "del_account")
{
	$id_admin	= $_GET['id'];
	
	$sql	= "update admin set status ='Deactive' where id_admin = '$id_admin'";
	$res	= mysql_query($sql,koneksi_db());
	if($res)
	{
		echo"<script type='text/javascript'>alert('Proses Berhasil');document.location='?dir=adm_vw'</script>";
	}
	else
	{
		echo"<script type='text/javascript'>alert('Proses Gagal');document.location='?dir=adm_vw'</script>";
	}
	
}


if($kode == "res_account")
{
	$id_admin	= $_GET['id'];
	
	$sql	= "update admin set status ='Active' where id_admin = '$id_admin'";
	$res	= mysql_query($sql,koneksi_db());
	if($res)
	{
		echo"<script type='text/javascript'>alert('Proses Berhasil');document.location='?dir=adm_trs'</script>";
	}
	else
	{
		echo"<script type='text/javascript'>alert('Proses Gagal');document.location='?dir=adm_trs'</script>";
	}
	
}

if($kode == "del_account_permanen")
{
	$id_admin	= $_GET['id'];
	
	$sql	= "delete from admin where id_admin = '$id_admin'";
	$res	= mysql_query($sql,koneksi_db());
	if($res)
	{
		echo"<script type='text/javascript'>alert('Proses Berhasil');document.location='?dir=adm_trs'</script>";
	}
	else
	{
		echo"<script type='text/javascript'>alert('Proses Gagal');document.location='?dir=adm_trs'</script>";
	}
	
}

if($kode == "del_user")
{
	$id_user	= $_GET['id'];
	
	$sql	= "update user set status ='Deactive' where id_user = '$id_user'";
	$res	= mysql_query($sql,koneksi_db());
	if($res)
	{
		echo"<script type='text/javascript'>alert('Proses Berhasil');document.location='?dir=ang_vw'</script>";
	}
	else
	{
		echo"<script type='text/javascript'>alert('Proses Gagal');document.location='?dir=ang_vw'</script>";
	}
	
}


if($kode == "res_user")
{
	$id_user	= $_GET['id'];
	
	$sql	= "update user set status ='Active' where id_user = '$id_user'";
	$res	= mysql_query($sql,koneksi_db());
	if($res)
	{
		echo"<script type='text/javascript'>alert('Proses Berhasil');document.location='?dir=ang_trs'</script>";
	}
	else
	{
		echo"<script type='text/javascript'>alert('Proses Gagal');document.location='?dir=ang_trs'</script>";
	}
	
}

if($kode == "del_user_permanen")
{
	$id_user	= $_GET['id'];
	
	$sql	= "delete from user where id_user = '$id_user'";
	$res	= mysql_query($sql,koneksi_db());
	if($res)
	{
		echo"<script type='text/javascript'>alert('Proses Berhasil');document.location='?dir=ang_trs'</script>";
	}
	else
	{
		echo"<script type='text/javascript'>alert('Proses Gagal');document.location='?dir=ang_trs'</script>";
	}
	
}

if($kode == "del_kat")
{
	$id	= $_GET['id'];
	
	$sql	= "update subcategory set status ='Deactive' where id = '$id'";
	$res	= mysql_query($sql,koneksi_db());
	if($res)
	{
		echo"<script type='text/javascript'>alert('Proses Berhasil');document.location='?dir=kat_vw'</script>";
	}
	else
	{
		echo"<script type='text/javascript'>alert('Proses Gagal');document.location='?dir=kat_vw'</script>";
	}
	
}


if($kode == "res_kat")
{
	$id	= $_GET['id'];
	
	$sql	= "update subcategory set status ='Active' where id = '$id'";
	$res	= mysql_query($sql,koneksi_db());
	if($res)
	{
		echo"<script type='text/javascript'>alert('Proses Berhasil');document.location='?dir=kat_trs'</script>";
	}
	else
	{
		echo"<script type='text/javascript'>alert('Proses Gagal');document.location='?dir=kat_trs'</script>";
	}
	
}

if($kode == "del_kat_permanen")
{
	$id  = $_GET['id'];
	
	$sql	= "delete from subcategory where id = '$id'";
	$res	= mysql_query($sql,koneksi_db());
	if($res)
	{
		echo"<script type='text/javascript'>alert('Proses Berhasil');document.location='?dir=kat_trs'</script>";
	}
	else
	{
		echo"<script type='text/javascript'>alert('Proses Gagal');document.location='?dir=kat_trs'</script>";
	}
	
}
if($kode == "add_kat")
{
	$nama 		= $_POST['nama'];
	
	$sql	= "insert into subcategory values(null,'$nama','Active')";
	$res	= mysql_query($sql,$link);
	if($res)
	{
		echo"<div id='hasil' class='alert_succes' >
		Proses Berhasil
		</div>";
	}
	else
	{
		echo"<div id='hasil' class='alert_error'>
		Proses Gagal
		</div>";
	}
	
}

if($kode == "edit_kat")
{
	  $nama 		= $_POST['nama'];
	  $id 		= $_POST['id'];
	
	$sql	= "update subcategory set subcat_name ='$nama' where id = '$id'";
	$res	= mysql_query($sql,$link);
	if($res)
	{
		echo"<div id='hasil' class='alert_succes' >
		Proses Berhasil
		</div>";
	}
	else
	{
		echo"<div id='hasil' class='alert_error'>
		Proses Gagal
		</div>";
	}
	
}


if($kode == "del_tulisan")
{
	$id	= $_GET['id'];
	
	$sql	= "update post set deleted = '1' where id_post = '$id'";
	$res	= mysql_query($sql,koneksi_db());
	if($res)
	{
		echo"<script type='text/javascript'>alert('Proses Berhasil');document.location='?dir=thr_vw'</script>";
	}
	else
	{
		echo"<script type='text/javascript'>alert('Proses Gagal');document.location='?dir=thr_vw'</script>";
	}
	
}

if($kode == "res_tulisan")
{
	$id	= $_GET['id'];
	
	$sql	= "update post set deleted = '0' where id_post = '$id'";
	$res	= mysql_query($sql,koneksi_db());
	if($res)
	{
		echo"<script type='text/javascript'>alert('Proses Berhasil');document.location='?dir=thr_trs'</script>";
	}
	else
	{
		echo"<script type='text/javascript'>alert('Proses Gagal');document.location='?dir=thr_trs'</script>";
	}
	
}

if($kode == "del_tulisan_permanen")
{
	$id_post	= $_GET['id'];
	
	$sql	= "delete from post where id_post = '$id_post'";
	$res	= mysql_query($sql,koneksi_db());
	if($res)
	{
		echo"<script type='text/javascript'>alert('Proses Berhasil');document.location='?dir=thr_trs'</script>";
	}
	else
	{
		echo"<script type='text/javascript'>alert('Proses Gagal');document.location='?dir=thr_trs'</script>";
	}
	
}

if($kode == "showUn_komen")
{
	$id_post = $_GET['id_post'];
	$id	 	 = $_GET['id'];
	$status	 = $_GET['st'];
	if($status == '0')
	{
		$status ='1';
	}
	else
	{
		$status ='0';
	}

	
	$sql	= "update comment set status = '$status' where id = '$id'";
	$res	= mysql_query($sql,koneksi_db());
	if($res)
	{
		echo"<script type='text/javascript'>alert('Proses Berhasil');document.location='?dir=thr_dtl&id=$id_post'</script>";
	}
	else
	{
		echo"<script type='text/javascript'>alert('Proses Gagal');document.location='?dir=thr_dtl&id=$id_post'</script>";
	}
	
}

if($kode == "edit_account")
{
	 $id_admin 		= $_POST['id_admin'];
	 $name_user 		= $_POST['name_user'];
	
	$sql	= "update admin set nama ='$name_user' where id_admin = '$id_admin'";
	$res	= mysql_query($sql,koneksi_db());
	if($res)
	{
		echo"<div id='hasil' class='alert_succes' >
		Proses Berhasil
		</div>";
	}
	else
	{
		echo"<div id='hasil' class='alert_error'>
		Proses Gagal
		</div>";
	}
	
}

if($kode == "edit_pwd")
{
	 $id_admin	 		= $_POST['id_admin'];
	 $old_password 		= md5($_POST['old_password']);
	 $repassword 		= md5($_POST['repassword']);
	
	$sql	= "select password from admin where id_admin = '$id_admin'";
	$res	= mysql_query($sql,koneksi_db());
	$tpl 	= mysql_fetch_array($res);

	if(($tpl['password']) == $old_password)
	{
		$sql	= "update admin set password ='$repassword' where id_admin = '$id_admin'";
		$res	= mysql_query($sql,koneksi_db());
		if($res)
		{
			echo"<div id='hasil' class='alert_succes' >
			Proses Berhasil
			</div>";
		}
		else
		{
			echo"<div id='hasil' class='alert_error'>
			Proses Gagal
			</div>";
		}
	}
	else
	{
		echo"<div id='hasil' class='alert_error'>
			Password Lama Tidak Sesuai
			</div>";
	}

	
	
}

?>