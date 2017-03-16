<?php
include('../../config/conn.php');

$loadType=$_POST['loadType'];
$loadId=$_POST['loadId'];

if($loadType=="state"){
	$sql="SELECT id, state_name FROM state WHERE country_id = '$loadId' ORDER BY state_name ASC";
}else{
	$sql="SELECT id, city_name FROM city WHERE state_id = '$loadId' ORDER BY city_name ASC";
}
$res=mysql_query($sql);
$check=mysql_num_rows($res);
if($check > 0){
	$HTML="";
	while($row=mysql_fetch_array($res)){
		$HTML.="<option value='".$row['id']."'>".$row['1']."</option>";
	}
	echo $HTML;
}
?>