<?php
        echo  "<strong>".$pg."</strong>";
        kategori_menu();
        $id =  $_GET['id'];

        $sel= mysql_query("select * from subcategory where id ='$id' ",$link);
        $tsel= mysql_fetch_array($sel);
         $nama =  $tsel['subcat_name'];

?>

<div class="col-lg-10 col-sm-10">
    
        <strong> Edit Sub Kategori</strong> 
           <hr>
    
    <div id='konten'> 
        <div id='hasil' class='alert_succes' ></div>
    <div class="col-lg-5 col-sm-5">
            <form role="form" name="editkategori" id="editkategori"  action="" method="post" >
                <fieldset>
               		<div class="form-group">
                    <input class="form-control" value="<?php echo $id ;?>" name="id" id="id" type='text' >
                        <input class="form-control" value="<?php echo $nama ;?>" placeholder="Nama Subkategori" name="nama" id="nama"  onchange="return kategori_cek(editkategori)" autofocus>
                        <div id="alert_nama"></div>
                    </div>                   
                    <!-- Change this to a button or input when using this as a form -->
                    <button name="edit" class="btn btn-primary" type="submit">Edit</button>
                </fieldset>
            </form>
    </div>
    <div class="col-lg-5 col-sm-5"></div>
 </div>