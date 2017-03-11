<!-- Start Of Footer -->
		<footer class="text-center">
			<h3>Copyright &copy; <?= date('Y') ?> <a href="index"><?= $app['app_name'] ?></a></h3>
		</footer>
		<!-- End Of Footer -->
        
        
		<!-- Start Scroll To Top -->
        <div id="scroll-top">
          <i class="fa fa-chevron-up fa-3x"></i>
        </div>
        <!-- End Scroll To Top -->
        
        <!-- Start Of Loading -->
        <section class="load-screen">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </section>
        <!-- End Of Loading -->

		<script src="<?= $resourcesJs ?>jquery-1.12.3.js"></script>
		<script src="<?= $resourcesJs ?>bootstrap.min.js"></script>
		<script src="<?= $resourcesJs ?>script.js"></script>
		<script src="<?= $resourcesJs ?>jquery.nicescroll.min.js"></script>
        <script src="<?= $resourcesJs ?>jquery.easy-overlay.js"></script>

	</body>
</html>


