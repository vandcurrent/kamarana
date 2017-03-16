<?php
        echo  "<strong>".$pg."</strong>";
        akun_menu()
?>

<div class="col-lg-10 col-sm-10">
    
        <strong> Tambah Administrator</strong> 
           <hr>
    
    <div id='konten'> 
        <div id='hasil' class='alert_succes' ></div>
    <div class="col-lg-5 col-sm-5">
            <form role="form" name="gantipassword" id="gantipassword"  action="" method="post" >
                <fieldset>                    
                    <div class="form-group">
                        <input class="form-control" placeholder="new Password" name="password" type="password" value="">
                        <div id="alert_password"></div>
                    </div>

                     <div class="form-group">
                        <input class="form-control" placeholder="Retype-Password" id="repassword" name="repassword" type="password" value="">
                        <div id="alert_repassword"></div>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="Old Password" name="old_password" id="old_password" type="password" >
                        <div id="alert_old_password"></div>
                    </div>
                    <input class="form-control" name="id_admin" value="<?php echo $_SESSION['id_admin']; ?>"  id="id_admin" readonly='readonly' type="hidden">
                    <!-- Change this to a button or input when using this as a form -->
                    <button name="submit" class="btn btn-primary" type="submit">Ganti</button>
                </fieldset>
            </form>
    </div>
    <div class="col-lg-5 col-sm-5"></div>
 </div>