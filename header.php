<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?><?php if (wp_title('', false)) {
										echo ' :';
									} ?> <?php bloginfo('name'); ?></title>
	<link href="//www.google-analytics.com" rel="dns-prefetch">
	<link href="<?php echo get_template_directory_uri(); ?>/favicon.ico" rel="shortcut icon">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/css/animate.css" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/owlcarousel/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/owlcarousel/owl.theme.default.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
	<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>">
	<meta property="og:title" content="<?php echo get_bloginfo('name'); ?>" />
	<meta property="og:image" itemprop="image" content="<?php echo get_template_directory_uri(); ?>/img/og-img.jpg">
	<meta property="og:type" content="website" />

	<!-- Schema.org for SEO -->
	<script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "Organization",
			"url": "<?php echo home_url(); ?>",
			"name": "<?php echo get_bloginfo('name'); ?>",
			"logo": "<?php echo get_template_directory_uri(); ?>/img/logo1-removebg-preview.png"
		}
	</script>

	<?php wp_head() ?>

	<script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>

</head>

<body id="page-top" <?php body_class(); ?>>
	<div class="page-wrap">

		<!-- <?php if (is_front_page()) : ?>
			<div class="voice_open_btn">
				<div class="inner_btn">
					<span>Upali glasovnu navigaciju</span>
					<img src="<?php echo get_template_directory_uri(); ?>/img/free-microphone-icon-342-thumb.png" alt="">
				</div>
			</div>
		<?php endif; ?> -->

		<?php if (have_rows('footer', 'options')) : ?>
			<?php while (have_rows('footer', 'options')) : the_row();




			?>
				<div class="fixed_info">
					<div class="phone info_gl">
						<?php
						$link = get_sub_field('broj_telefona');
						if ($link) :
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
						?>



							<a class="tel" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/phone-round1.png" alt=""></a>
						<?php endif; ?>

					</div>

					<div class="email info_gl">
						<?php
						$link = get_sub_field('email');
						if ($link) :
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
						?>



							<a class="email" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/email-round1.png" alt=""></a>
						<?php endif; ?>

					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
		<div class="search-fixed-wrap">
			<div class="close-btn-search">
				<img src="<?php echo get_template_directory_uri(); ?>/img/iconx.png">
			</div>
			<div class="search-wrap">
				<form role="search" method="get" action="/" id="searchform">

					<input type="text" value="" name="s" id="s" placeholder="Pretraži novosti...">

				</form>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-default fixed-top " id="mainNav">
			<div class="container">
				<div class="menu-btn"><button class="c-hamburger c-hamburger--htx"><span>toggle menu</span> </button></div>
				<div class="logo animsition-link"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo_main2.png" alt="Name"></a></div>
				<div class="collapse navbar-collapse " id="navbarResponsive">

					<div class="right_logo_inner">
						<img src="<?php echo get_template_directory_uri(); ?>/img/logo1-removebg-preview.png" alt="Name">
					</div>

					<?php
					wp_nav_menu(array(
						'theme_location'  => 'primary',
						'depth'           => 2,
						'container'       => 'div',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'bs-example-navbar-collapse-1',
						'menu_class'      => 'navbar-nav ml-auto animsition-link',
						'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
						'walker'          => new WP_Bootstrap_Navwalker(),
					));
					?>

					<div class="search-wrap search-big-wrap">
						<form role="search" method="get" id="searchform" class="searchform" action="/">
							<input type="text" name="s" placeholder="Pretraži novosti">
							<div class="search-icon">
								<img src="<?php echo get_template_directory_uri(); ?>/img/menue-bar-loupe-white.svg">

							</div>
						</form>
					</div>
				</div>

				<div class="search_icon">
					<div class="icone search-main-btn">
						<img src="<?php echo get_template_directory_uri(); ?>/img/menue-bar-loupe-white.svg" alt="">
					</div>
				</div>
			</div>
		</nav>