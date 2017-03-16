<?php
        echo  "<strong>".$pg."</strong>";
        user_menu()
?>

<div class="col-lg-10 col-sm-10">
    
        <strong> List Active Anggota</strong> 
           <hr>
    <div id='hasil' class='alert_succes' ></div>
    <div id='konten'> 
<?php
    
      $sql  = "select * from user where status = 'Active'";
       $res = mysql_query($sql,koneksi_db());
       if(mysql_num_rows($res) != 0)
       {

           $i=1;
           
           echo"<table border='1' width='100%' cellpadding='0' cellspacing='0'>
                <tr align='center' bgcolor='#999999'>
                    <td>No</td>
                    <td>Name</td>
                    <td>Username</td>
                    <td>Email</td>
                    <td>Lokasi</td>
                    <td>Lahir</td>
                    <td>HP</td>
                    <td>JK</td>
                     <td colspan=2>Action</td>
                </tr>";
            while($data_history=mysql_fetch_array($res))
            {
                $id =$data_history['id_user'];
                 if($i%2==0){ 
                    echo"<tr align='center' bgcolor='#e8580f'>";} else { echo"<tr align='center'>";} 
                       echo" <td>".$i."</td>
                        <td>".$data_history['first_name']." ".$data_history['last_name']."</td>
                        <td>".$data_history['username']."</td>
                        <td>".$data_history['email']."</td>
                        <td>".$data_history['location']."</td>
                        <td>".$data_history['tgl_lahir']."</td>
                        <td>".$data_history['no_hp']."</td>
                        <td>".$data_history['gender']."</td>
                        <td><a href='?dir=pg&id=$id&kd=del_user' ><i class='fa fa-trash-o fa-fw fa-lg'></i></a></td>
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