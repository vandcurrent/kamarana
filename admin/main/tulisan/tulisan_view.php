<?php
        echo  "<strong>".$pg."</strong>";
        tulisan_menu()
?>

<div class="col-lg-10 col-sm-10">
    
        <strong> List Active Tulisan</strong> 
           <hr>
    <div id='hasil' class='alert_succes' ></div>
    <div id='konten'> 
<?php
    
	   $sql	= "select a.*, b.name, c.subcat_name, d.username, e.country_name    from 
                post a, category b, subcategory c, user d, country e where a.deleted = '0'
                and a.cat_id = b.id_cat and a.subcat_id = c.id and a.id_user = d.id_user and a.country_id = e.id ";
	   $res	= mysql_query($sql,koneksi_db());
       if(mysql_num_rows($res) != 0)
       {

           $i=1;
           
           echo"<table border='1' width='100%' cellpadding='0' cellspacing='0'>
                <tr align='center' bgcolor='#999999'>
                    <td>No</td>
                    <td>Judul</td>
                    <td>Kategori</td>
                    <td>Sub Kategori</td>
                    <td>Username</td>
                    <td>Country</td>
                     <td colspan=2>Action</td>
                </tr>";
    		while($data_history=mysql_fetch_array($res))
    		{
                $id = $data_history['id_post'];
                 if($i%2==0){ 
                    echo"<tr align='center' bgcolor='#e8580f'>";} else { echo"<tr align='center'>";} 
                       echo" <td>".$i."</td>
                        <td>".$data_history['title']."</td>
                        <td>".$data_history['name']."</td>
                        <td>".$data_history['subcat_name']."</td>
                        <td>".$data_history['username']."</td>
                        <td>".$data_history['country_name']."</td>
                        <td><a href='?dir=pg&id=$id&kd=del_tulisan' title='Delete' ><i class='fa fa-trash-o fa-fw fa-lg'></i></a></td>
                         <td><a href='?dir=thr_dtl&id=$id' title='Detail Tulisan'  ><i class='fa fa-list-alt fa-fw fa-lg'></i></a></td>
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