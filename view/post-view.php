<?php
include ('config/conn.php');

$post_id = $_GET['id'];
$getcontent = mysql_query("SELECT * FROM post WHERE id_post = '$post_id'");
$data = mysql_fetch_array($getcontent);
$breadcrumb = mysql_query("SELECT category.name, subcategory.subcat_name FROM category, subcategory, post
	WHERE id_post = '$post_id' AND category.id_cat = post.cat_id AND subcategory.id = post.subcat_id");
$bc = mysql_fetch_array($breadcrumb);
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

if (!$dest['1']) {$state = "-";} else {$state=$dest['1'];}
if (!$dest['2']) {$city = "-";} else {$city=$dest['2'];}

$getusername = mysql_query("SELECT user.first_name, user.last_name, user.profilpic FROM user, post WHERE user.id_user = post.id_user AND id_post = '$post_id'");
$user = mysql_fetch_array($getusername);

?>
<div class="container">
	<div class="content">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li><a href="<?php echo '?ref=explore&cat='.$data['cat_id']?>"><?php echo $bc['name'] ?></a></li>
					<li class="active"><?php echo $bc['subcat_name'] ?></li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="post-info">
					<div class="post-info-img">
						<img src="<?php echo $user['profilpic'] ?>" class="img-rounded space-bottom">
					</div>
					<h4><?php echo '<a href="?ref=view_profile&u='.$data['id_user'].'">'?><?php echo $user['0'].' '.$user['1'] ?></a></h4>
					<hr>
					<table class="table table-striped table-bordered">
						<tr><th>Tujuan</th><td><?php echo $city ?></td></tr>
						<tr><th>Provinsi</th><td><?php echo $state ?></td></tr>
						<tr><th>Negara</th><td><?php echo $dest['0'] ?></td></tr>
						<tr class="info"><th>Total Biaya</th><td>Rp <?php echo number_format($data['totalcost'], '0', '', '.') ?></td></tr>
					</table>
				</div>
			</div>
			<div class="col-md-9">
				<div class="post">
					<div class="post-title">
						<h3><?php echo $data['title'] ?>
							<?php
							if ($_SESSION['haslogin']) {
								echo '<span class="comment-ctrl pull-right"><a href="?ref=edit_post&id='.$post_id.'" title="Edit tulisan">';
								echo '<i class="fa fa-edit fa-fw"></i></a></span>';
							}	
							?>
						</h3>
						<p class="text-muted small">Diposkan pada <?php echo dateID($data['post_time'])?></p>
						<hr>
					</div>
					<div class="post-content">
						<div class="feat-img">
							<?php if(!$data['featpic']) { ?>
								<img src="./themes/images/default_post.jpg">
							<?php }
							else { ?>
								<img src="<?php echo $data['featpic'] ?>">
							<?php } ?>
						</div>
						<div class="post-text text-justify">
							<?php echo $data['content'] ?>
						</div>
					</div>
				</div>
				<hr>
			</div>
		</div>
		<?php include ('comment.php'); ?>
		<div class="row">
			<div class="col-md-12">
				<hr class="footer">
			</div>
		</div>
	</div>
</div>