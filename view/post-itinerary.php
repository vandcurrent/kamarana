<?php
$total_days = $_POST['total_days'];

for($i=1;$i<=$total_days;$i++) { ?>
<div class="panel panel-default">
	<div class="panel-heading"><h4>HARI <?php echo $i ?></h4></div>
	<div class="panel-body">
		<div class="form-horizontal">
			<div class="itinerary-form">
				<div class="form-group">
					<label class="col-md-4 control-label" for=<?php echo "lodging-$i"; ?>>Penginapan</label>  
					<div class="col-md-8">
						<input name="lodging-$i" type="text" placeholder="Nama Penginapan" class="form-control input-md">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for=<?php echo "lodging-addr-$i"; ?>>Alamat Penginapan</label>  
					<div class="col-md-8">
						<input name=<?php echo "lodging-addr-$i"; ?> type="text" placeholder="Alamat Penginapan" class="form-control input-md">                                    
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for=<?php echo "lodging-cost-$i"; ?>>Biaya Penginapan</label>
					<div class="col-md-8">
						<div class="input-group">
							<span class="input-group-addon">Rp</span>
							<input name=<?php echo "lodging-cost-$i"; ?> class="form-control" type="text">
						</div>                                    
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for=<?php echo "transport-cost-$i"; ?>>Biaya Transportasi</label>
					<div class="col-md-8">
						<div class="input-group">
							<span class="input-group-addon">Rp</span>
							<input name=<?php echo "transport-cost-$i"; ?> class="form-control" type="text">
						</div>                                    
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for=<?php echo "meal-cost-$i"; ?>>Biaya Makan</label>
					<div class="col-md-8">
						<div class="input-group">
							<span class="input-group-addon">Rp</span>
							<input name=<?php echo "meal-cost-$i"; ?> class="form-control" type="text">
						</div>                                    
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for=<?php echo "tour-cost-$i"; ?>>Biaya Wisata</label>
					<div class="col-md-8">
						<div class="input-group">
							<span class="input-group-addon">Rp</span>
							<input name=<?php echo "tour-cost-$i"; ?> class="form-control" type="text">
						</div>                                    
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for=<?php echo "misc-cost-$i"; ?>>Biaya Lain-lain</label>
					<div class="col-md-8">
						<div class="input-group">
							<span class="input-group-addon">Rp</span>
							<input name=<?php echo "misc-cost-$i"; ?> class="form-control" type="text">
						</div>                                    
					</div>
				</div>
				<hr></hr>
			</div>
		</div>
	</div>
</div>
</div>
<?php
}
?>
<script type="javascript">
	$('#post-tab a:first').tab('show');
</script>
