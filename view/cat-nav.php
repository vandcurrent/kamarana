<a href="?ref=create_post" class="btn btn-success btn-block space-bottom" role="button">Buat cerita baru &raquo;</a>
<ul class="nav nav-pills nav-stacked">
	<?php
		$query = mysql_query("SELECT * FROM category");
		$subquery = mysql_query("SELECT * FROM subcategory WHERE status='Active'");

		if (mysql_num_rows($query) == 0) {
			echo '<li>Tidak ada kategori</li>';
		}
		else {
			while ($row = mysql_fetch_array($query)) {
				echo '<li><a href="?ref=explore&cat='.$row['id_cat'].'">'.$row['name'].'</a></li>';
			}
		}

		echo "<li><hr></li>";
		
		if (mysql_num_rows($subquery) == 0) {
			echo '<li>Tidak ada sub kategori</li>';
		}
		else {
			while ($subrow = mysql_fetch_array($subquery)) {
				echo '<li><a href="?ref=explore&subcat='.$subrow['id'].'">'.$subrow['subcat_name'].'</a></li>';
			}
		}		
	?>
</ul>