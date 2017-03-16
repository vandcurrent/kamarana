<?php
        echo  "<strong>".$pg."</strong>";
        admin_menu()
?>

<div class="col-lg-10 col-sm-10">
    
        <strong> Tambah Administrator</strong> 
           <hr>
    
    <div id='konten'> 
        <div id='hasil' class='alert_succes' ></div>
    <div class="col-lg-5 col-sm-5">
            <form role="form" name="addsignup" id="addsignup"  action="" method="post" >
                <fieldset>
               		<div class="form-group">
                        <input class="form-control" placeholder="E-mail" name="email" id="email"  type="email" onchange="return userval(this)" autofocus>
                        <div id="alert_email"></div>
                    </div>
                	<div class="form-group">
                        <input class="form-control"  placeholder="name" name="name_user"  id="name_user" type="name" autofocus>
                         <div id="alert_name_user"></div>
                    </div>
                    
                    <div class="form-group">
                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                        <div id="alert_password"></div>
                    </div>

                     <div class="form-group">
                        <input class="form-control" placeholder="Retype-Password" id="repassword" name="repassword" type="password" value="">
                        <div id="alert_repassword"></div>
                    </div>
                   
                    <!-- Change this to a button or input when using this as a form -->
                    <button name="submit" class="btn btn-primary" type="submit">Add</button>
                </fieldset>
            </form>
    </div>
    <div class="col-lg-5 col-sm-5"></div>
 </div>