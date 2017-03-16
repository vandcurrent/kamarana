<?php
        echo  "<strong>".$pg."</strong>";
        admin_menu()
?>

<div class="col-lg-10 col-sm-10">
    
        <strong> Cari Administrator</strong> 
           <hr>
    
    <div id='konten'> 
        <div id='hasil' class='alert_succes' ></div>
    <div class="col-lg-5 col-sm-5">
            <form role="form" name="search_admin" id="search_admin"  action="" method="post" >
                <fieldset>
               		<div class="form-group">
                        <select name="kriteria_admin" id="kriteria_admin" class="form-control" onchange="return search_for_admin()">
                            <option value="nama">Nama</option>
                            <option value="email">Email</option>
                            <option value="status">Status</option>
                        </select>
                    </div>
                	<div class="form-group">
                        <input class="form-control"  placeholder="Kata" name="kata_admin" id="kata_admin" 
                        onchange="return search_for_admin()">
                         
                    </div>
                </fieldset>
            </form>
    </div>
    <div id='konten_admin'> 
    </div>
    <div class="col-lg-5 col-sm-5"></div>
 </div>