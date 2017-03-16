<?php
        echo  "<strong>".$pg."</strong>";
        tulisan_menu()
?>

<div class="col-lg-10 col-sm-10">
    
        <strong> Cari Tulisan</strong> 
           <hr>
    
    <div id='konten'> 
        <div id='hasil' class='alert_succes' ></div>
    <div class="col-lg-5 col-sm-5">
            <form role="form" name="search_tulisan" id="search_tulisan"  action="" method="post" >
                <fieldset>
               		<div class="form-group">
                        <select name="kriteria_admin" id="kriteria_tulisan" class="form-control" onchange="return search_for_tulisan()">
                            <option value="a.title">Judul</option>
                            <option value="b.name">Kategori</option>
                            <option value="c.subcat_name">Sub Kategori</option>
                            <option value="d.username">Username</option>
                            <option value="e.country_name">Negara</option>
                        </select>
                    </div>
                	<div class="form-group">
                        <input class="form-control"  placeholder="Kata" name="kata_tulisan" id="kata_tulisan" 
                        onchange="return search_for_tulisan()">
                         
                    </div>
                </fieldset>
            </form>
    </div>
    <div id='konten_tulisan'> 
    </div>
    <div class="col-lg-5 col-sm-5"></div>
 </div>