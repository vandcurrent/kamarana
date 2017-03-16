<?php
include("lib_func.php");
$email = stripslashes(mysql_real_escape_string(mysql_escape_string(addslashes($_POST['email']))));
$password = stripslashes(mysql_real_escape_string(mysql_escape_string(addslashes(md5($_POST['password'])))));



$sql="SELECT
			id_admin,
			nama,
			email,
			status,
			level
			
		FROM
			admin
		WHERE
			email = '$email'
		AND 
			password = '$password'
		AND 
			status = 'Active'";
			

$res=mysql_query($sql,koneksi_db()) or die(mysql_error());
	if(mysql_num_rows($res)==1) 
	{
		$data=mysql_fetch_array($res);
		session_start();
		
		$_SESSION['id_admin']			= $data['id_admin']; 
		$_SESSION['nama']				= $data['nama']; 
		$_SESSION['email']				= $data['email']; 
		$_SESSION['status']				= $data['status'];
		$_SESSION['level']				= $data['level'];
		
		header("Refresh: 0.1; url=../"); 
	}
	else
	{
		header("Refresh: 0.1; url=../login/?st=FG"); 
	}
?>