<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-example-generic" data-slide-to="1"></li>
		<li data-target="#carousel-example-generic" data-slide-to="2"></li>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner">
		<div class="item active">
			<!-- <img src="./uploads/dummy/featured-posts/1.jpg" alt="image1"> -->
			<div style="background:url(./uploads/fp122.jpeg) center center; background-size:cover;" class="slider-size">
				<div class="carousel-caption">
					<h3><a class="btn btn-lg btn-warning" href="?ref=view_post&id=122">Explore Bangkok - Day 1</a></h3>
				</div>
			</div>
		</div>
		<div class="item">
			<!-- <img src="./uploads/dummy/featured-posts/2.jpg" alt="image2"> -->
			<div style="background:url(./uploads/fp162.jpeg) center center; background-size:cover;" class="slider-size">
				<div class="carousel-caption">
					<h3><a class="btn btn-lg btn-danger" href="?ref=view_post&id=162">Explore Bangkok - Day 2</a></h3>
				</div>
			</div>
		</div>
		<div class="item">
			<!-- <img src="./uploads/dummy/featured-posts/3.jpg" alt="image3"> -->
			<div style="background:url(./uploads/fp167.jpeg) center center; background-size:cover;" class="slider-size">
				<div class="carousel-caption">
					<h3><a class="btn btn-lg btn-info" href="?ref=view_post&id=167">Jalan Jalan Men ! Korea Selatan - Part 1</a></h3>
				</div>
			</div>
		</div>
	</div>

	<!-- Controls -->
	<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
	</a>
	<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
	</a>
</div>

<script type="javasript">
	$('.carousel').carousel({
		interval: 1500;
	});
</script>