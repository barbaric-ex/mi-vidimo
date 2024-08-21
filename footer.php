<?php if (have_rows('footer', 'options')) : ?>
	<?php while (have_rows('footer', 'options')) : the_row();

		$naslov_1 = get_sub_field('naslov_1');

		$adresa = get_sub_field('adresa');




		$naslov_2 = get_sub_field('naslov_2');
		$naslov_3 = get_sub_field('naslov_3');


	?>

		<div class="footer" id="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-3">
						<div class="logo_wrap wrap">
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo_main.png" alt="">
						</div>
					</div>

					<div class="col-lg-3">
						<div class="wrap wrap1">
							<?php if ($naslov_1) : ?>
								<div class="title">
									<h3><?php echo $naslov_1 ?></h3>
								</div>
							<?php endif; ?>


							<?php if ($adresa) : ?>
								<div class="text">
									<p><?php echo $adresa ?></p>
								</div>
							<?php endif; ?>

						</div>
					</div>

					<div class="col-lg-3">
						<div class="wrap wrap2">

							<?php if ($naslov_2) : ?>
								<div class="title">
									<h3><?php echo $naslov_2 ?></h3>
								</div>
							<?php endif; ?>


							<div class="linkovi">
								<?php
								$link = get_sub_field('broj_telefona');
								if ($link) :
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
								?>



									<a class="tel" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?>
									</a>
								<?php endif; ?>
								<?php
								$link = get_sub_field('email');
								if ($link) :
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
								?>



									<a class="email" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?>
									</a>
								<?php endif; ?>
							</div>
						</div>
					</div>

					<div class="col-lg-3">
						<div class="wrap wrap3">

							<?php if ($naslov_3) : ?>
								<div class="title">
									<h3><?php echo $naslov_3 ?></h3>
								</div>
							<?php endif; ?>


							<div class="social_icon_wrap">
								<?php
								$link = get_sub_field('instagram');
								if ($link) :
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
								?>



									<a class="instagram" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
										<img src="<?php echo get_template_directory_uri(); ?>/img/header-icon-insatgram.svg" alt="">
									</a>
								<?php endif; ?>

								<?php
								$link = get_sub_field('facebook');
								if ($link) :
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
								?>



									<a class="facebook" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
										<img src="<?php echo get_template_directory_uri(); ?>/img/header-icon-facebook.svg" alt="">
									</a>
								<?php endif; ?>

								<?php
								$link = get_sub_field('youtube');
								if ($link) :
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
								?>



									<a class="youtube" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
										<img src="<?php echo get_template_directory_uri(); ?>/img/youtube.svg" alt="">
									</a>
								<?php endif; ?>
							</div>


						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
<?php endif; ?>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/owlcarousel/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
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