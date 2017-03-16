<div class="container">
	<div class="content">
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				<?php
					$status = $_GET['stat']; 
					if ($status=='login_required') {
						echo '<div class="alert alert-danger">Silahkan login terlebih dahulu</div>';
					}
					elseif ($status=='login_failed') {
						echo '<div class="alert alert-danger">Username atau password salah</div>';
					}
					login_form(); 
				?>
			</div>
			<div class="col-md-4">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<hr class="footer">
			</div>
		</div>
	</div>
</div>