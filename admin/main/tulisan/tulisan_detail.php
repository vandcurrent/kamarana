<?php
        echo  "<strong>".$pg."</strong>";
        tulisan_menu();
        $post_id =$_GET['id'];

        $sql    = "select a.*, b.name, c.subcat_name, d.*, e.country_name    from 
                post a, category b, subcategory c, user d, country e where  id_post ='$post_id'
                and a.cat_id = b.id_cat and a.subcat_id = c.id and a.id_user = d.id_user and a.country_id = e.id ";
       $res = mysql_query($sql,koneksi_db());
       $data_history=mysql_fetch_array($res);

       $getdest = mysql_query("SELECT country.country_name, state.state_name, city.city_name FROM country, state, city, post 
        WHERE id_post = '$post_id' AND country.id = post.country_id AND state.id = post.state_id AND city.id = post.city_id");
        $dest = mysql_fetch_array($getdest);
        if (!$dest['1']) {$state = "-";} else {$state=$dest['1'];}
        if (!$dest['2']) {$city = "-";} else {$city=$dest['2'];}
?>

<div class="col-lg-10 col-sm-10">
    
        <strong> Detail <?php echo $data_history['title']; ?> </strong> 
           <hr>
    <div id='hasil' class='alert_succes' ></div>
    <div id='konten'> 
        
        <div class="row">
            <div class="col-md-3">
                <div class="post-info">
                    <img src="http://placehold.it/165x165" class="img-rounded space-bottom">
                    <h4><a href="#"><?php echo $data_history['first_name'].' '.$data_history['last_name'] ?></a></h4>
                    <hr>
                    <table class="table table-striped table-bordered">
                        <tr><th>Tujuan</th><td><?php echo $city ?></td></tr>
                        <tr><th>Provinsi</th><td><?php echo $state ?></td></tr>
                        <tr><th>Negara</th><td><?php echo $data_history['country_name'] ?></td></tr>
                        <tr class="info"><th>Total Biaya</th><td>Rp <?php echo number_format($data_history['totalcost'], '0', '', '.') ?></td></tr>
                    </table>
                </div>
            </div>
            <div class="col-md-9">
                <div class="post">
                    <div class="post-title">
                        <h3><?php echo $data_history['title'] ?></h3>
                        <p class="text-muted small">Diposkan pada <?php echo ($data_history['post_time']).' '.date("g:i A"); ?></p>
                        <hr>
                    </div>
                    <div class="post-content">
                        <div class="feat-img">
                            <img src="../uploads/dummy/posts/1.jpg">
                        </div>
                        <div class="post-text text-justify">
                            <?php echo $data_history['content']; ?>
                        </div>
                    </div>
                </div>
                <hr>
          
        

        <?php
        $getcomments = mysql_query("SELECT user.first_name, user.last_name, comment.comment , comment.id , comment.status FROM 
                    user, comment WHERE comment.id_user = user.id_user AND comment.id_post = '$post_id' 
                    ORDER BY comment.id ASC");
        while ($comment = mysql_fetch_array($getcomments)) { 
            $id = $comment['id']; 
             $status = $comment['status']; ?>
        <div class="well">
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/70x70">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><a href="#"><?php echo $comment['first_name'].' '.$comment['last_name'] ?></a>
                        <span class="comment-ctrl pull-right">
                        <a href='<?php  echo "?dir=pg&id=$id&kd=showUn_komen&st=$status&id_post=$post_id" ?>' title="Delete Komentar">

                        <i class="<?php if( $status == 1) { echo'fa fa-minus-square'; } else { echo'fa fa-check-square' ;} ?>"></i></a></span>
                    </h4>
                    <p><?php echo $comment['comment'] ?></p>
                </div>
            </div>
        </div>
        <?php } ?>

        </div>
    </div>  
</div>