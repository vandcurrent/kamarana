<?php
        echo  "<strong>".$pg."</strong>";
        user_menu()
?>

<div class="col-lg-10 col-sm-10">
    
        <strong> Cari Anggota</strong> 
           <hr>
    
    <div id='konten'> 
        <div id='hasil' class='alert_succes' ></div>
    <div class="col-lg-5 col-sm-5">
            <form role="form" name="search_admin" id="search_admin"  action="" method="post" >
                <fieldset>
               		<div class="form-group">
                        <select name="kriteria_anggota" id="kriteria_anggota" class="form-control" onchange="return search_for_anggota()">
                        <option value="location">Lokasi</option>
                            <option value="first_name">Nama Depan</option>
                            <option value="last_name">Nama Belakang</option>
                            <option value="username">Username</option>
                            <option value="email">Email</option>
                            <option value="gender">Jenis Kelamin</option>
                            <option value="status">Status</option>
                        </select>
                    </div>
                	<div class="form-group">
                        <input class="form-control"  placeholder="Kata" name="kata_anggota" id="kata_anggota" 
                        onchange="return search_for_anggota()">
                         
                    </div>
                </fieldset>
            </form>
    </div>
    <div id='konten_anggota'> 
    </div>
    <div class="col-lg-5 col-sm-5"></div>
 </div>