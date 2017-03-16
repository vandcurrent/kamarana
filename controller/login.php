<?php include('../config/conn.php');

$username = $_POST['username'];
$pass = md5($_POST['password']);

$query = mysql_query("SELECT * FROM user WHERE username = '$username' && password = '$pass'");

if (mysql_num_rows($query) == 1) {
    $data=mysql_fetch_array($query);
    session_start();
    $_SESSION['userid'] = $data['id_user'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['fname'] = $data['first_name'];
    $_SESSION['lname'] = $data['last_name'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['tgllahir'] = $data['tgl_lahir'];
    $_SESSION['gender'] = $data['gender'];
    $_SESSION['nohp'] = $data['no_hp'];
    $_SESSION['location'] = $data['location'];
    $_SESSION['haslogin'] = true;
    header("Location: ../?ref=explore");
}

else {
    header("Location: ../?ref=auth&stat=login_failed");
}
?>