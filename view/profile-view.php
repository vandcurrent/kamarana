<?php
include('config/conn.php');

$userid = $_GET['u'];

$query = mysql_query("SELECT user.location, post.id_post, post.title, post.content, post.featpic 
	FROM user, post WHERE user.id_user = '$userid' AND user.id_user = post.id_user AND post.status='published' ORDER BY post.post_time DESC LIMIT 10");
$totalpost = mysql_num_rows($query);

$userquery = mysql_query("SELECT * FROM user WHERE id_user = '$userid'");
$user = mysql_fetch_array($userquery);					

?>

<div class="profile-cover">
	<div class="container">
		<div class="profile-img">
			<?php if(!$user['profilpic']) { ?>
				<img src="themes/images/default_user.jpg">
			<?php }
			else { ?>
				<img src="<?php echo $user['profilpic'] ?>">
			<?php } ?>
		</div>
		<div class="profile-name">
			<h3><?php echo $user['first_name']." ".$user['last_name']; ?></h3>
		</div>
		<?php
		if ($_SESSION['haslogin']) { ?>
		<div class="btn-edit-profile">
			<a href="?ref=edit_profile" class="btn btn-sm btn-default pull-right">Ubah Profil</a>
		</div>
		<?php } ?>
	</div>
	<div class="cover-img">
		<img src="<?php echo $user['coverpic']; ?>" />
	</div>
</div>
<div class="container">
	<div class="row">
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="profile-info">
				<address>
					<strong><?php echo $user['username'] ?></strong><br>
					<?php
					if ($user['location']!=NULL) { ?>
					<i class="fa fa-map-marker fa-fw"></i> <?php echo $user['location'] ?><br>
					<?php } ?>
					<i class="fa fa-pencil fa-fw"></i>
					<?php
					if ($totalpost==0) { ?>
					<?php echo "0 Tulisan" ?><br>
					<?php }
					else { ?>
					<?php echo "$totalpost Tulisan" ?><br>
					<?php } ?>
					
				</address>
			</div>
		</div>
		<div class="col-md-9">
			<div class="profile-menu">
				<ul class="nav nav-tabs" role="tablist" id="profileTab">
					<li class="active"><a href="#posts" role="tab" data-toggle="tab">Tulisan</a></li>
					<li><a href="#profile" role="tab" data-toggle="tab">Profil</a></li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane fade in active post-list" id="posts">
					<?php
					if ($totalpost==0) {
						echo '<p>Kamu belum punya tulisan, <a href="?ref=create_post">mulai membuat tulisan sekarang</a></p>';
					}
					else {
						while ($data = mysql_fetch_array($query)) { ?> 
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="post-list-item">
									<div class="media">
										<a class="pull-left" href="#">
											<div class="post-item-img">
												<?php if(!$data['featpic']) { ?>
													<img src="./themes/images/default_post.jpg">
												<?php }
												else { ?>
													<img src="<?php echo $data['featpic'] ?>">
												<?php } ?>
											</div>
										</a>
										<div class="media-body">
											<?php
											$post_id = $data['id_post'];
											$post_title = $data['title'];
											echo '<h4 class="media-heading"><a href="?ref=view_post&id='.$post_id.'">'.$post_title.'</a>';
											if ($_SESSION['haslogin']) {
												echo '<span class="comment-ctrl pull-right"><a href="?ref=edit_post&id='.$post_id.'" title="Edit tulisan">';
												echo '<i class="fa fa-edit fa-fw"></i></a></span>';
											}
											echo '</h4>';
											$string = $data['content'];
											$post_id = $data['id_post'];
											if (strlen($string) > 250) {
												$stringCut = substr($string, 0, 250);
												$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="?ref=view_post&id='.$post_id.'">Selanjutnya</a>'; 
											}
											?>
											<p><?php echo $string ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php }
					}
					?>				
				</div>
				<div class="tab-pane fade profile" id="profile">
					<div class="panel panel-default">
						<div class="panel-body">
							<address>
								<strong>Nama Lengkap</strong><br>
								<?php echo $user['first_name'].' '.$user['last_name']; ?>
							</address>

							<address>
								<strong>Tanggal Lahir</strong><br>
								<?php
								if ($user['tgl_lahir'] != NULL) {
									echo $user['tgl_lahir'];
								}
								else {
									echo "-";
								}
								?>
							</address>

							<address>
								<strong>Kontak</strong><br>
								<?php
								if ($user['no_hp'] != NULL) {
									echo $user['no_hp'];
								}
								else {
									echo "-";
								}
								?>
							</address>

							<address>
								<strong>Alamat Surel</strong><br>
								<a href="mailto:#"><?php echo $user['email'] ?></a>
							</address>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<hr class="footer">
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function () {
		$('#profileTab a:first').tab('show');

		// var profImg = $('#prof-img');
  //       profImg.load(function() {
  //           var imgW = profImg.width();
  //           var imgH = profImg.height();
  //           if(imgH > imgW) {
  //               profImg.css({'width':'200'});
  //               var dHeightNow = (profImg.height()-200)/2;
  //               profImg.css({'margin-top':-dHeightNow});
  //           }
  //           else {
  //               profImg.css({'height':'200'});
  //               var dWidthNow = (profImg.width()-200)/2;
  //               profImg.css({'margin-left':-dWidthNow});
  //           }
  //       });
	});
</script>