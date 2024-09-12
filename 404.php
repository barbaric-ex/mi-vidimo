<?php get_header(); ?>

<div class="single_header" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/po.jpg);"></div>

<section class="standard-content">
	<div class="container">
		<div class="row">
			<div class="col-md-12 animsition-link">
				<h2>404</h2>
				<h2> <a href="<?php echo home_url(); ?>"><?php _e('Vrati na početnu?', 'html5blank'); ?></a></h2>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>