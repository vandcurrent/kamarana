<?php
        echo  "<strong>".$pg."</strong>";
        admin_menu();
?>

<div class="col-lg-10 col-sm-10">
   
        <strong> List Deactive Admin</strong> 
        
           <hr>
    <div id='hasil' class='alert_succes' ></div>
    <div id='konten'> 
<?php
    
	   $sql	= "select * from admin where level ='Admin' and status='Deactive' ";
	   $res	= mysql_query($sql,koneksi_db());
       if(mysql_num_rows($res) != 0)
       {

           $i=1;
           
           echo"<table border='1' width='100%' cellpadding='0' cellspacing='0'>
                <tr align='center' bgcolor='#999999'>
                    <td>No</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Status</td>
                     <td colspan=2>Action</td>
                </tr>";
    		while($data_history=mysql_fetch_array($res))
    		{
                $id = $data_history['id_admin'];
                 if($i%2==0){ 
                    echo"<tr align='center' bgcolor='#e8580f'>";} else { echo"<tr align='center'>";} 
                       echo" <td>".$i."</td>
                        <td>".$data_history['nama']."</td>
                        <td>".$data_history['email']."</td>
                        <td>".$data_history['status']."</td>
                         <td><a href='?dir=pg&id=$id&kd=del_account_permanen' "; ?> 
                       onClick="return confirm('Yakin akan dihapus permanen ?')" title='Delete' ><i class='fa fa-trash-o fa-fw fa-lg'></i></a>
                        | <?php echo " <a href='?dir=pg&id=$id&kd=res_account' title='Restore Data'><i class='fa fa-undo fa-fw fa-lg'></i></a></td>
                        ";
                        
                $i++;
            }
    	   echo"</table>";
    }
    else
    {
        echo "Data Tidak Ditemukan";
    }
?>
</div>