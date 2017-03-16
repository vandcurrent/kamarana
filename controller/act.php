<?php include "../config/conn.php"; session_start(); 
 
switch($_GET["act"]) {

case "new-post":
	$kat = $_POST["kat"];
	if($kat!=NULL) {
		$q = mysql_query("SELECT * FROM barang WHERE kategori = '$kat'");
		$ada = mysql_num_rows($q);
		if($ada==0) {
			$id = $kat."0001";
		}
		else {
			$f = mysql_fetch_array(mysql_query("SELECT * FROM barang WHERE kategori = '$kat' ORDER BY id_barang DESC LIMIT 1"));
			$idlen = strlen(substr($f['id_barang'],2,4))-strlen($ada);
			$idlenn = substr('0000',0,$idlen);
			$idAsli = $ada+1;
			$id = "$kat"."$idlenn"."$idAsli";
		}
	}
	
	echo $id;
break;

}
?>