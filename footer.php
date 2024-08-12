</div>

<div class="footer" id="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="logo_wrap">
					<img src="<?php echo get_template_directory_uri(); ?>/img/logo_main.png" alt="">
				</div>
			</div>

			<div class="col-lg-3">
				<div class="wrap wrap1">
					<div class="title">
						<h3>Adresa</h3>
					</div>

					<div class="text">
						<p>Nadbiskupa Čule b.b.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/owlcarousel/owl.carousel.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/wow.js"></script>
<?php wp_footer() ?>

<script>
	$(window).on('load', function() {
		wow = new WOW({
			boxClass: 'wow',
			animateClass: 'animated',
			offset: 5,
			mobile: true,
			live: true
		})
		wow.init();
	});
</script>
</body>

</html>