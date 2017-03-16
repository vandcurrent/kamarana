<?php
	function title() {
		$main_title = 'Kamarana';
		echo $main_title;
	}

	function brand() {
		$brand = 'Kamarana';
		echo $brand;
	}

	function notification() {
		include('config/notif.php');
	}

	function login_form() {
		?>
		<form method="post" role="form" action="controller/login.php">
		    <fieldset>
		        <div class="form-group">
		            <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
		        </div>
		        <div class="form-group">
		            <input class="form-control" placeholder="Password" name="password" type="password">
		        </div>
<!-- 		        <div class="checkbox">
		            <label>
		                <input name="remember" type="checkbox" value="Remember Me">Ingat Saya
		            </label>
		        </div> -->
		        <div class="form-group">
		        	<a href="#" data-toggle="modal" data-target="#regModal">Daftar</a>
		        	<input type="submit" class="btn btn-primary pull-right" value="Masuk">
		    	</div>
		    </fieldset>
		</form>
		<?php
	}

	function register_form() {
		?>
		<form method="post" role="form" action="controller/register.php" class="validate-form">
		    <fieldset>
		        <div class="form-group">
		            <input class="form-control" placeholder="Name Depan" name="firstname" type="text" autofocus value="">
		        </div>
		        <div class="form-group" id="fg-last-name">
		            <input class="form-control" placeholder="Nama Belakang" name="lastname" type="text" value="">
		        </div>
		        <div class="form-group">
		            <div class="radio-inline">
		                <input type="radio" name="gender" id="gender1" value="L" checked>Laki-laki
		            </div>
		            <div class="radio-inline">
		                <input type="radio" name="gender" id="gender2" value="P">Perempuan
		            </div>
		        </div>
		        <div class="form-group">
		            <input class="form-control" placeholder="Username" name="username" type="text">
		        </div>
		        <div class="form-group">
		            <input class="form-control" placeholder="E-mail" name="email" type="email">
		        </div>
		        <div class="form-group">
		            <input class="form-control" placeholder="Password" name="password" type="password" value="">
		        </div> 
		        <div class="form-group">
		            <input class="form-control" placeholder="Ulangi Password" name="confirmPassword" type="password" value="">
		        </div>        
		        <div class="form-group">
		            <p>Dengan mengklik Daftar, Anda menyetujui Ketentuan kami dan bahwa Anda telah membaca <a href="#">Kebijakan Penggunaan Data kami</a></p>
		        </div>
		        <button type="submit" class="btn btn-primary pull-right">Daftar</a>
		    </fieldset>
		</form>
		<?php
	}

	function getheader() {
		include('view/header.php');
	}

	function getcontent() {
		include('includes/ref.php');
	}

	function getposts() {
		include('includes/cat.php');
	}

	function getpostcontent() {
		$post_id = $_GET['id'];
		$getcontent = mysql_query("SELECT * FROM post WHERE id_post = '$post_id'");
		$getdest = mysql_query("SELECT country.country_name, state.state_name, city.city_name FROM country, state, city, post 
			WHERE id_post = '$post_id' AND country.id = post.country_id AND state.id = post.state_id AND city.id = post.city_id");

		$dest = mysql_fetch_array($getdest);
		$data = mysql_fetch_array($getcontent);
		$edit = true;
	}

	function getfooter() {
		include('view/footer.php');
	}

	function getcomments() {
		include('view/comment.php');
	}

	function post_fail() {
		echo "<div class='container'>";
		echo "<div class='row space-top'><div class='col-md-12'>";
		echo "<div class='alert alert-warning' role='alert'><p>Telah terjadi kesalahan, coba lagi</p>";
		echo "<ul><li>Pastikan semua kolom isian telah diisi</li></ul>";
		echo "</div>";
		echo "</div></div></div>";
	}

	function dateID($date) {
		$monthID = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

		$year = substr($date, 0, 4);
		$month = substr($date, 5, 2);
		$day = substr($date, 8, 2);
		$hour = substr($date, 11, 2);
		$minute = substr($date, 14, 2);

		$result = $day . " " . $monthID[(int)$month-1] . " " . $year . " " . $hour . ":" . $minute;
		return($result);
	}
?>