<?php include('../config/conn.php');

$f_name = $_POST['firstname'];
$l_name = $_POST['lastname'];
$username = $_POST['username'];
$pass = md5($_POST['password']);
$email = $_POST['email'];
$gender = $_POST['gender'];

$query1 = mysql_query("INSERT INTO user (first_name, last_name, username, password, email, gender) VALUES ('$f_name', '$l_name', '$username', '$pass', '$email', '$gender')");

if ($query1) {
	$last_id = mysql_insert_id();
	$query2 = mysql_query("SELECT * FROM user WHERE id_user = '$last_id'");
	$data=mysql_fetch_array($query2);
	session_start();
	$_SESSION['userid'] = $last_id;
	$_SESSION['fname'] = $data['first_name'];
	$_SESSION['lname'] = $data['last_name'];
	$_SESSION['haslogin'] = true;
	header("Location: ../?ref=edit_profile&stat=reg_complete");
}

else {
	header("Location: ../?ref=auth");
}
?>