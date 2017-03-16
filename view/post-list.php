<?php
$cat = $_GET['cat'];
$subcat = $_GET['subcat'];
$query = mysql_query("SELECT post.id_post, post.id_user, post.title, post.totalcost, category.name, subcategory.subcat_name, country.country_name, user.username 
    FROM post, user, category, subcategory, country 
    WHERE cat_id = '$cat' 
    AND post.id_user = user.id_user
    AND post.cat_id = category.id_cat
    AND post.subcat_id = subcategory.id
    AND post.country_id = country.id
    AND post.status = 'published'
    ORDER BY post.post_time DESC LIMIT 10");

$subquery = mysql_query("SELECT post.id_post, post.id_user, post.title, post.totalcost, category.name, subcategory.subcat_name, country.country_name, user.username 
    FROM post, user, category, subcategory, country 
    WHERE subcategory.id = '$subcat' 
    AND post.id_user = user.id_user
    AND post.cat_id = category.id_cat
    AND post.subcat_id = subcategory.id
    AND post.country_id = country.id
    AND post.status = 'published'
    ORDER BY post.post_time DESC LIMIT 10");

$catname_query = mysql_query("SELECT * FROM category WHERE id_cat='$cat'");
$catname = mysql_fetch_array($catname_query);
$subcatname_query = mysql_query("SELECT * FROM subcategory WHERE id='$subcat'");
$subcatname = mysql_fetch_array($subcatname_query);

if (!$_GET['cat'] && !$_GET['subcat']) {
    include('cat-featured.php');
}
else {

if ($_GET['cat']) {
    $catorsubname = $catname['name'];
    $posts = mysql_num_rows($query);
}
else {
    $catorsubname = $subcatname['subcat_name'];
    $posts = mysql_num_rows($subcat_query);
}
?>

<div class="table-responsive space-top2x">
    <table class="table table-striped table-hover">
        <tr>
        <th class="info">Kategori: <b><?php echo $catorsubname ?></b></th>
            <th class="info">Penulis</th>
            <th class="info">Sub Kategori</th>
            <th class="info">Tujuan</th>
            <th class="info">Biaya</th>
        </tr>
        <?php
        if($_GET['cat']) {
            if (mysql_num_rows($query)==0) {            
                echo '<tr>';
                echo '<td>Belum ada tulisan di kategori ini</td>';
                echo '<td>-</td>';
                echo '<td>-</td>';
                echo '<td>-</td>';
                echo '<td>-</td>';
                echo '</tr>';
            }
            else {
                while ($posts = mysql_fetch_array($query)) {
                    echo '<tr>';
                    echo '<td><a href="?ref=view_post&id='.$posts['id_post'].'" class="post-list-title">'.$posts['title'].'</a></td>';
                    echo '<td><a href="?ref=view_profile&u='.$posts['id_user'].'">'.$posts['username'].'</a></td>';
                    echo '<td><a href="?ref=explore&subcat='.$posts['subcat_id'].'">'.$posts['subcat_name'].'</a></td>';
                    echo '<td>'.$posts['country_name'].'</td>';
                    echo '<td>Rp '.number_format($posts['totalcost'], '0', '', '.').'</td>';
                    echo '</tr>';
                }
            }
        }

        if($_GET['subcat']) {
            if (mysql_num_rows($subquery)==0) {            
                echo '<tr>';
                echo '<td>Belum ada tulisan di kategori ini</td>';
                echo '<td>-</td>';
                echo '<td>-</td>';
                echo '<td>-</td>';
                echo '<td>-</td>';
                echo '</tr>';
            }
            else {
                while ($posts = mysql_fetch_array($subquery)) {
                    echo '<tr>';
                    echo '<td><a href="?ref=view_post&id='.$posts['id_post'].'" class="post-list-title">'.$posts['title'].'</a></td>';
                    echo '<td><a href="?ref=view_profile&u='.$posts['id_user'].'">'.$posts['username'].'</a></td>';
                    echo '<td><a href="?ref=explore&subcat='.$posts['subcat_id'].'">'.$posts['subcat_name'].'</a></td>';
                    echo '<td>'.$posts['country_name'].'</td>';
                    echo '<td>Rp '.number_format($posts['totalcost'], '0', '', '.').'</td>';
                    echo '</tr>';
                }
            }
        }       
        ?>
    </table>
</div>
<!-- <ul class="pagination pull-right">
    <li><a href="#">&laquo;</a></li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">&raquo;</a></li>
</ul> -->
<?php } ?>