<?php
        echo  "<strong>".$pg."</strong>";
        kategori_menu()
?>

<div class="col-lg-10 col-sm-10">
    
        <strong> List Deactive Sub Kategori</strong> 
           <hr>
    <div id='hasil' class='alert_succes' ></div>
    <div id='konten'> 
    <div class="col-lg-7 col-sm-7">
<?php
    
	   $sql	= "select * from subcategory where status ='Deactive' ";
	   $res	= mysql_query($sql,koneksi_db());
       if(mysql_num_rows($res) != 0)
       {

           $i=1;
           
           echo"<table border='1' width='100%' cellpadding='0' cellspacing='0'>
                <tr align='center' bgcolor='#999999'>
                    <td>No</td>
                    <td>Sub Kategori</td>
                    <td> Status</td>
                     <td colspan=2>Action</td>
                </tr>";
    		while($data_history=mysql_fetch_array($res))
    		{
                $id = $data_history['id'];
                 if($i%2==0){ 
                    echo"<tr align='center' bgcolor='#e8580f'>";} else { echo"<tr align='center'>";} 
                       echo" <td>".$i."</td>
                        <td>".$data_history['subcat_name']."</td>
                        <td>".$data_history['status']."</td>
                        <td><a href='?dir=pg&id=$id&kd=del_kat_permanen' "; ?> 
                       onClick="return confirm('Yakin akan dihapus permanen ?')" title='Delete' ><i class='fa fa-trash-o fa-fw fa-lg'></i></a>
                        | <?php echo " <a href='?dir=pg&id=$id&kd=res_kat' title='Restore Data'><i class='fa fa-undo fa-fw fa-lg'></i></a></td>
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
</div>