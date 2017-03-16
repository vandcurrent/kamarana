<?php
if (!$_SESSION['haslogin']) {
    echo "<script>window.top.location='?ref=auth&stat=login_required';</script>";
}
else {
include ('config/conn.php');

$getsubcat = mysql_query("SELECT * FROM subcategory");
$sqlCountry="SELECT id, country_name FROM country ORDER BY country_name ASC";
$resCountry=mysql_query($sqlCountry);
$checkCountry=mysql_num_rows($resCountry);
$target = "uploads/";

if (!empty($_GET['id'])) {
    $post_id = $_GET['id'];
    $getcontent = mysql_query("SELECT * FROM post WHERE id_post = '$post_id'");
    $data = mysql_fetch_array($getcontent);
    if ($data['state_id']<'0') {
        $getdest = mysql_query("SELECT country.country_name FROM country, post 
            WHERE id_post = '$post_id' AND country.id = post.country_id");
    }
    elseif ($data['city_id']<'0') {
        $getdest = mysql_query("SELECT country.country_name, state.state_name FROM country, state, post 
            WHERE id_post = '$post_id' AND country.id = post.country_id AND state.id = post.state_id");
    }
    else {
        $getdest = mysql_query("SELECT country.country_name, state.state_name, city.city_name FROM country, state, city, post 
            WHERE id_post = '$post_id' AND country.id = post.country_id AND state.id = post.state_id AND city.id = post.city_id");
    }
    $dest = mysql_fetch_array($getdest);
    $edit = true;
}

if (isset($_POST['btnSubmit'])) {
    switch ($_POST['btnSubmit']) {
        case 'publish':
            $country = $_POST['country'];
            if ($country == '64') {
                $cat = '1';
            } else {
                $cat = '2';
            }

            $user = $_SESSION['userid'];
            $title = $_POST['title'];
            $content = mysql_real_escape_string($_POST['content']);
            $subcat = $_POST['subcat'];
            $state = $_POST['state'];
            $city = $_POST['city'];
            $date_start = $_POST['date_start'];
            $date_end = $_POST['date_end'];
            $total_days = $_POST['total_days'];
            $total_cost  = $_POST['total_cost'];

            $query = mysql_query("INSERT INTO post (id_user, title, content, cat_id, subcat_id, longtrip, country_id, state_id, city_id, date_start, date_end, post_time, totalcost, status) 
            VALUES ('$user', '$title', '$content', '$cat', '$subcat', '$total_days', '$country', '$state', '$city', '$date_start', '$date_end', now(), '$total_cost', 'published')");

            if ($query) {
                $last_id = mysql_insert_id();
                if(!empty($_FILES['featpic']['name']))
                { 
                    $featpic_tmp   = $_FILES['featpic']['type'];
                    $pch= explode("/", $featpic_tmp);
                    $type = "uploads/fp".$last_id.".".$pch[1];
                    $loc = $target.basename($_FILES['featpic']['name']=$type);
                    $upload = move_uploaded_file($_FILES['featpic']['tmp_name'],$loc);
                    if(!$upload)
                      {
                        print "File gagal di upload";
                        exit(1);
                      }
                  $fileName  = $_FILES['featpic']['name']=$type;
                  mysql_query("UPDATE post SET featpic ='$fileName' WHERE id_post ='$last_id'");
                }
                echo "<script>window.top.location='?ref=edit_post&id=$last_id&stat=published';</script>";       
            }
            else {
                echo "<script>window.history.back();</script>";
                post_fail();
            }
            break;
        case 'update':
            $country = $_POST['country'];

            if ($country == $data['country_id']) {
                $country = $data['country_id'];
            }

            if ($country == '64') {
                $cat = '1';
            } else {
                $cat = '2';
            }

            if ($state == $data['state_id']) {
                $state = $data['state_id'];
            }

            if ($city == $data['city_id']) {
                $city = $data['city_id'];
            }

            $title = $_POST['title'];
            $content = mysql_real_escape_string($_POST['content']);
            $subcat = $_POST['subcat'];
            $state = $_POST['state'];
            $city = $_POST['city'];
            $date_start = $_POST['date_start'];
            $date_end = $_POST['date_end'];
            $total_days = $_POST['total_days'];
            $total_cost  = $_POST['total_cost'];

            $query = mysql_query("UPDATE post SET 
            title='$title',
            content='$content', 
            cat_id='$cat', 
            subcat_id='$subcat', 
            longtrip='$total_days', 
            country_id='$country', 
            state_id='$state', 
            city_id='$city', 
            date_start='$date_start',
            date_end='$date_end',
            totalcost='$total_cost' WHERE id_post='$post_id'");

            if ($query) {
                if(!empty($_FILES['featpic']['name']))
                { 
                    $featpic_tmp   = $_FILES['featpic']['type'];
                    $pch= explode("/", $featpic_tmp);
                    $type = "uploads/fp".$post_id.".".$pch[1];
                    $loc = $target.basename($_FILES['featpic']['name']=$type);
                    $upload = move_uploaded_file($_FILES['featpic']['tmp_name'],$loc);
                    if(!$upload)
                      {
                        print "File gagal di upload";
                        exit(1);
                      }
                  $fileName  = $_FILES['featpic']['name']=$type;
                  mysql_query("UPDATE post SET featpic ='$fileName' WHERE id_post ='$post_id'");
                }
                echo "<script>window.top.location='?ref=edit_post&id=$post_id&stat=updated';</script>"; 
            }
            else {
                post_fail();
            }
            break;
        case 'save':
            $country = $_POST['country'];

            if ($country == $data['country_id']) {
                $country = $data['country_id'];
            }

            if ($country == '64') {
                $cat = '1';
            } else {
                $cat = '2';
            }

            if ($state == $data['state_id']) {
                $state = $data['state_id'];
            }

            if ($city == $data['city_id']) {
                $city = $data['city_id'];
            }

            $title = $_POST['title'];
            $content = mysql_real_escape_string($_POST['content']);
            $subcat = $_POST['subcat'];
            $state = $_POST['state'];
            $city = $_POST['city'];
            $date_start = $_POST['date_start'];
            $date_end = $_POST['date_end'];
            $total_days = $_POST['total_days'];
            $total_cost  = $_POST['total_cost'];

            if (!$_GET['id']) {
            $query = mysql_query("INSERT INTO post (
              id_user, 
              title, 
              content, 
              cat_id, 
              subcat_id, 
              longtrip, 
              country_id, 
              state_id, 
              city_id, 
              date_start, 
              date_end, 
              post_time, 
              totalcost, 
              status) 
              VALUES (
                  '$user', 
                  '$title', 
                  '$content', 
                  '$cat', 
                  '$subcat', 
                  '$total_days', 
                  '$country', 
                  '$state', 
                  '$city', 
                  '$date_start', 
                  '$date_end', 
                  now(), 
                  '$total_cost', 
                  'saved')");
            $last_id = mysql_insert_id();
            }
            else {
            $query = mysql_query("UPDATE post SET 
              title='$title',
              content='$content', 
              cat_id='$cat', 
              subcat_id='$subcat', 
              longtrip='$total_days', 
              country_id='$country', 
              state_id='$state', 
              city_id='$city', 
              date_start='$date_start',
              date_end='$date_end',
              totalcost='$total_cost' 
              status='saved'
              WHERE id_post='$post_id'");
            }
            if ($query) {
                if(!empty($_FILES['featpic']['name']))
                { 
                    $featpic_tmp   = $_FILES['featpic']['type'];
                    $pch= explode("/", $featpic_tmp);
                    $type = "uploads/fp".$post_id.".".$pch[1];
                    $loc = $target.basename($_FILES['featpic']['name']=$type);
                    $upload = move_uploaded_file($_FILES['featpic']['tmp_name'],$loc);
                    if(!$upload)
                      {
                        print "File gagal di upload";
                        exit(1);
                      }
                  $fileName  = $_FILES['featpic']['name']=$type;
                  mysql_query("UPDATE post SET featpic ='$fileName' WHERE id_post ='$post_id'");
                }
                echo "<script>window.top.location='?ref=edit_post&id=$last_id&stat=saved';</script>";   
            }
            else {
                post_fail();
            }
            break;
        case 'delete':
            $query = mysql_query("UPDATE post SET status='deleted' WHERE id_post='$post_id'");
            if ($query) {
                echo "<script>window.top.location='?ref=create_post&stat=deleted';</script>";    
            }
            else {
                post_fail();
            }
    }
    die();
}
?>

<div class="container">
    <?php $status = $_GET['stat']; ?>
    <div class="row space-top">
        <?php
            if ($status=='published') {
                echo "<div class='col-md-12'><div class='alert alert-success' role='alert'>Tulisan berhasil dibuat. <a href='?ref=view_post&id=$post_id' class='alert-link'>Lihat tulisan</a></div></div>";
            }
            elseif ($status=='updated') {
                echo "<div class='col-md-12'><div class='alert alert-success' role='alert'>Tulisan berhasil diperbaharui. <a href='?ref=view_post&id=$post_id' class='alert-link'>Lihat tulisan</a></div></div>";
            }
            elseif ($status=='saved') {
                echo "<div class='col-md-12'><div class='alert alert-success' role='alert'>Tulisan berhasil disimpan. <a href='?ref=view_post&id=$post_id&mode=preview' class='alert-link'>Lihat tulisan</a></div></div>";
            }
            elseif ($status=='deleted') {
                echo "<div class='col-md-12'><div class='alert alert-success' role='alert'>Tulisan berhasil dihapus. <a href='?ref=trash' class='alert-link'>Lihat tempat sampah</a></div></div>";
            }
        ?>
    </div>
    <div class="row">
        <div class="col-md-12"><a href="?ref=create_post"><h3 class="page-header">Buat Tulisan Baru</h3></a></div>
    </div>
    <div class="row">
        <form method="post" role="form" enctype="multipart/form-data">
            <div class="col-md-8">                    
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Masukkan judul disini" value="<?php echo $data['title'] ?>">
                </div>
                <div class="form-group">
                    <textarea name="content" class="postContentEditor"><?php echo $data['content'] ?></textarea>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Gambar Utama</label>
                            <div class="col-md-4">
                                <?php 
                                if($data['featpic']!=NULL) { ?>
                                    <img class="img-thumbnail" src="<?php echo $data['featpic'] ?>">
                                <?php }
                                else { ?>
                                    <img src="http://placehold.it/170x70">
                                <?php } ?>
                            </div>  
                            <div class="col-md-4">
                                <p><input type="file" name="featpic"></p>
                                <p class="text-muted">Ukuran yang disarankan 900 x 600 px</p>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Sub Kategori</label>
                            <select name="subcat" class="form-control">
                                <?php
                                while ($row = mysql_fetch_array($getsubcat)) { ?>
                                <option value="<?php echo $row['id']?>" <?php if($row['id']==$data['subcat_id']) echo 'selected'; ?>><?php echo $row['subcat_name']?></option><?php
                            }
                            ?>
                        </select>
                    </div>

                    <?php
                    if($checkCountry > 0){
                        ?>
                        <div class="form-group">                            
                            <label>Negara</label>
                            <select name="country" class="form-control" id="country_dropdown" onchange="selectCity(this.options[this.selectedIndex].value)">
                                <option value="-1">Pilih negara tujuan</option>
                                <?php
                                while($rowCountry=mysql_fetch_array($resCountry)){
                                    ?>
                                    <option value="<?php echo $rowCountry['id']?>"><?php echo $rowCountry['country_name']?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <?php if($edit){echo '<p class="help-block">'.$dest['0'].'</p>';} ?>
                        </div>
                        <div class="form-group">                            
                            <label>Provinsi</label>
                            <select name="state" class="form-control" id="state_dropdown" onchange="selectState(this.options[this.selectedIndex].value)">
                                <option value="-1">Pilih provinsi tujuan</option>
                            </select>
                            <span id="state_loader"></span>
                            <?php if($edit){echo '<p class="help-block">'.$dest['1'].'</p>';} ?>
                        </div>
                        <div class="form-group">                            
                            <label>Kota</label>
                            <select name="city" class="form-control" id="city_dropdown">
                                <option value="-1">Pilih kota tujuan</option>
                            </select>
                            <span id="city_loader"></span>
                            <?php if($edit){echo '<p class="help-block">'.$dest['2'].'</p>';} ?>
                        </div>
                        <?php
                    }else{
                        echo 'Tidak ada negara ditemukan';
                    }
                    ?>

                    <div class="form-group">
                        <label>Tanggal Berangkat</label>
                        <div class="input-group date">
                            <input type="text" name="date_start" class="form-control" placeholder="Pilih tanggal berangkat" value="<?php echo $data['date_start'] ?>"><span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pulang</label>
                        <div class="input-group date">
                            <input type="text" name="date_end" class="form-control" placeholder="Pilih tanggal pulang" value="<?php echo $data['date_end'] ?>"><span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                        </div>
                        <input type="hidden" name="total_days" value="<?php echo $data['longtrip'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Total Biaya</label>
                        <input type="text" class="form-control" name="total_cost" placeholder="Masukan total biaya" value="<?php echo $data['totalcost'] ?>">
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-right">
                        <div id="daysCounter"></div>
                        <button class="btn btn-danger pull-left" type="submit" name="btnSubmit" value="delete">Hapus</button>
                        <button class="btn btn-default" type="submit" name="btnSubmit" value="save">Simpan</button>
                        <?php
                        if ($edit) {
                            echo '<button class="btn btn-primary" type="submit" name="btnSubmit" value="update">Perbaharui</button>';
                        }
                        else {
                            echo '<button class="btn btn-primary" type="submit" name="btnSubmit" value="publish">Terbitkan</button>';
                        }

                        ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-md-12">
            <hr class="footer">
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    function selectCity(country_id){
        if(country_id!="-1"){
            loadData('state',country_id);
            $("#city_dropdown").html("<option value='-1'>Pilih kota tujuan</option>");  
        }else{
            $("#state_dropdown").html("<option value='-1'>Pilih provinsi tujuan</option>");
            $("#city_dropdown").html("<option value='-1'>Pilih kota tujuan</option>");      
        }
    }

    function selectState(state_id){
        if(state_id!="-1"){
            loadData('city',state_id);
        }else{
            $("#city_dropdown").html("<option value='-1'>Pilih kota tujuan</option>");      
        }
    }

    function loadData(loadType,loadId){
        var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
        $("#"+loadType+"_loader").show();
        $("#"+loadType+"_loader").fadeIn(400).html('Tunggu...');
        $.ajax({
            type: "POST",
            url: "lib/data/loadData.php",
            data: dataString,
            cache: false,
            success: function(result){
                $("#"+loadType+"_loader").hide(); 
                $("#"+loadType+"_dropdown").append(result);  
            }
        });
    }
</script>

<?php } ?>