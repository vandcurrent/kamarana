<?php
        echo  "<strong>".$pg."</strong>";
        kategori_menu()
?>

<div class="col-lg-10 col-sm-10">
    
        <strong> Tambah Sub Kategori</strong> 
           <hr>
    
    <div id='konten'> 
        <div id='hasil' class='alert_succes' ></div>
    <div class="col-lg-5 col-sm-5">
            <form role="form" name="addkategori" id="addkategori"  action="" method="post" >
                <fieldset>
               		<div class="form-group">
                        <input class="form-control" placeholder="Nama Subkategori" name="nama" id="nama"  onchange="return kategori_cek(this)" autofocus>
                        <div id="alert_nama"></div>
                    </div>                   
                    <!-- Change this to a button or input when using this as a form -->
                    <button name="submit" class="btn btn-primary" type="submit">Add</button>
                </fieldset>
            </form>
    </div>
    <div class="col-lg-5 col-sm-5"></div>
 </div>