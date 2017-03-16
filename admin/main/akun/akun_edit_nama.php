<?php
        echo  "<strong>".$pg."</strong>";
        akun_menu();
        $sel = mysql_query("select nama from admin where id_admin =".$_SESSION['id_admin']." ",koneksi_db());
        $tsel = mysql_fetch_array($sel);
?>

<div class="col-lg-10 col-sm-10">
    
        <strong> Ganti Nama</strong> 
           <hr>
    
    <div id='konten'> 
        <div id='hasil' class='alert_succes' ></div>
    <div class="col-lg-5 col-sm-5">
            <form role="form" name="gantinama" id="gantinama"  action="" method="post" >
                <fieldset>

                <div class="form-group">
        
                        <input class="form-control"  value="<?php echo $_SESSION['email']; ?>" readonly='readonly' >
                         <div id="alert_name_user"></div>
                    </div>        

                	<div class="form-group">
                    <input class="form-control" name="id_admin" value="<?php echo $_SESSION['id_admin']; ?>"  id="id_admin" readonly='readonly' type="hidden">
                        <input class="form-control"  placeholder="name" name="name_user" value="<?php echo $tsel['nama']; ?>"  id="name_user" type="name" autofocus>
                         <div id="alert_name_user"></div>
                    </div>                   
                    <!-- Change this to a button or input when using this as a form -->
                    <button name="submit" class="btn btn-primary" type="submit">Ganti</button>
                </fieldset>
            </form>
    </div>
    <div class="col-lg-5 col-sm-5"></div>
 </div>