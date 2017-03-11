<!-- Start of Heaeder -->
		<section class="sec-of-head text-center">
			<div class="cover-op">
				<div class="container">
					<h2><?= $app['app_head_stm'] ?></h2>
                    <button class="btn btn-warning" id="header-btn">Let's Go</button>
				</div>
			</div>
		</section>
		<!-- End of Heaeder -->
		<hr />

		<!-- Start Of Welcome  -->
		<section class="sec-of-welcome text-center">
			<div class="container">
				<h1>Welcome at <span><?= $app['app_name'] ?></span> Website !!</h1>
				<p class="lead"><?=  $app['app_welcoming_stm'] ?></p>
			</div>
		</section>
		<!-- End Of Welcome  -->

		<!-- Start Of Option -->
		<section class="sec-of-option text-center">
			<div class="container">
				<h2 class="h1"><?= $app['app_options_stm'] ?></h2>
				<div class="row">
					<div class="col-md-4 ">
						<div class="option-box">
							<a href="videos" class="head-box"><div class="vid">
								<i class="fa fa-video-camera fa-5x" aria-hidden="true"></i>
								<h5>Videos</h5>
							</div></a>
							<div class="hidden-xs hidden-sm">
								<p><?= $app['description_vid'] ?></p>
								<a href="videos"><button class="btn btn-danger btn-block btn-box">Let's Go</button></a>
							</div>
						</div>
					</div>
					<div class="col-md-4 ">
						<div class="option-box">
							<a href="reading" class="head-box"><div class="read">
								<i class="fa fa-book fa-5x" aria-hidden="true"></i>
								<h5>Reading</h5>
							</div></a>
							<div class="hidden-xs hidden-sm">
								<p><?= $app['description_read'] ?></p>
								<a href="reading"><button class="btn btn-danger btn-block btn-box">Let's Go</button></a>
							</div>
						</div>
					</div>
					<div class="col-md-4 ">
						<div class="option-box">
							<a href="writing"  class="head-box"><div class="write">
								<i class="fa fa-pencil fa-5x" aria-hidden="true"></i>
								<h5>Writing</h5>
							</div></a>
							<div class="hidden-xs hidden-sm">
								<p><?= $app['description_write'] ?></p>
								<a href="writing"><button class="btn btn-danger btn-block btn-box">Let's Go</button></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Of Option -->
        
		