<?php
$getcomments = mysql_query(
	"SELECT user.id_user, user.first_name, user.last_name, user.profilpic, comment.comment, comment.comment_time 
	FROM user, comment 
	WHERE comment.id_user = user.id_user 
	AND comment.id_post = '$post_id' 
	AND comment.status = '1' 
	ORDER BY comment.comment_time ASC LIMIT 10");

$commentator = $_SESSION['userid'];
$getmypic = mysql_query("SELECT profilpic FROM user WHERE id_user='$commentator'");
$mypic = mysql_fetch_array($getmypic); 

if (isset($_POST['comment_submit'])) {
	$comment_content = mysql_real_escape_string($_POST['comment_content']);
	$insertcomment = mysql_query("INSERT INTO comment (comment, id_user, id_post, status, comment_time) VALUES ('$comment_content', '$commentator', '$post_id', '1', now())");

	if ($insertcomment) {
		echo '<script>location.reload();</script>';
	}
}
?>

<div class="row" id="commentList">
	<div class="col-md-3">
	</div>
	<div class="col-md-9">
		<?php while ($comment = mysql_fetch_array($getcomments)) { ?>
		<div class="well">
			<div class="media">
				<a class="pull-left" href="#">
					<div class="comment-img">
						<?php if(!$user['profilpic']) { ?>
							<img src="themes/images/default_user.jpg">
						<?php }
						else { ?>
							<img src="<?php echo $comment['profilpic'] ?>">
						<?php } ?>
					</div>
				</a>
				<div class="media-body">
					<h4 class="media-heading"><?php echo '<a href="?ref=view_profile&u='.$comment['id_user'].'">'?><?php echo $comment['first_name'].' '.$comment['last_name'] ?></a>
						<!-- <span class="comment-ctrl pull-right"><a href="#"><i class="fa fa-trash-o fa-fw"></i></a></span>
						<span class="comment-ctrl pull-right"><a href="#"><i class="fa fa-edit fa-fw"></i></a></span> -->
					</h4>
					<p><?php echo $comment['comment'] ?></p>
					<p class="text-muted small"><?php echo dateID($comment['comment_time'])?></p>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>

<div class="row">
	<div class="col-md-3">
	</div>
	<div class="col-md-9">
		<div class="well">
			<?php if($_SESSION['haslogin']) { ?>
			<div class="media">
				<a class="pull-left" href="#">
					<div class="comment-img">
						<?php if(!$mypic['profilpic']) { ?>
							<img src="themes/images/default_user.jpg">
						<?php }
						else { ?>
							<img src="<?php echo $mypic['profilpic'] ?>">
						<?php } ?>
					</div>
				</a>
				<div class="media-body">
					<form method="post" action="" role="form">
						<div class="form-group">
							<textarea class="form-control" placeholder="Tuliskan komentar..." name="comment_content"></textarea>
						</div>
						<button type="submit" class="btn btn-sm btn-primary pull-right" name="comment_submit">Kirim</button>
					</form>
				</div>
			</div>
			<?php }
			else {
				echo '<p>Silahkan <a href="#" data-toggle="modal" data-target="#loginModal">Login</a> untuk memberikan komentar</p>';
			} ?>
		</div>
	</div>
</div>