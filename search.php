<?php
/*
Template Name: Search Page
*/
?>
<?php get_header(); ?>
<div class="single_header" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/po.jpg);"></div>

<section class="standard-page search search_page">
	<div class="container">
		<div class="title line">
			<h1>Pretraga</h1>
		</div>
		<div class="item-wrap search-list">
			<div class="row">

				<?php
				// Get the search term
				$search = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';

				// Function to translate date to Croatian
				function translate_date_to_croatian($date_string)
				{
					$english_months = array(
						'January',
						'February',
						'March',
						'April',
						'May',
						'June',
						'July',
						'August',
						'September',
						'October',
						'November',
						'December'
					);
					$croatian_months = array(
						'siječnja',
						'veljače',
						'ožujka',
						'travnja',
						'svibnja',
						'lipnja',
						'srpnja',
						'kolovoza',
						'rujna',
						'listopada',
						'studenog',
						'prosinca'
					);
					return str_replace($english_months, $croatian_months, $date_string);
				}

				// Define args for the query
				$args = array(
					'post_type' => 'novost',
					's' => $search,
					'posts_per_page' => 3,
					'post_status' => 'publish'
				);
				$loop = new WP_Query($args);
				$i = 1;

				// Check if there are posts that match the query
				if ($loop->have_posts()) {
					while ($loop->have_posts()) : $loop->the_post();
						$slika = get_field('slika');
						$kratki_text = get_field('kratki_text');
						$naslov = get_field('naslov');
				?>

						<div class="col-lg-4 <?php if ($i == 3) : ?>col-md-12 <?php endif; ?>col-md-6">
							<a href="<?php the_permalink(); ?>">
								<div class="news_wrap wow fadeInUp" data-wow-delay="0.7s" data-wow-duration="0.6s">
									<?php if ($slika) : ?>
										<div class="image" style="background-image: url(<?php echo esc_url($slika['sizes']['medium']); ?>);">
											<div class="small_logo">
												<img src="<?php echo get_template_directory_uri(); ?>/img/logo1-removebg-preview.png" alt="logo">
											</div>

											<div class="overlay"></div>
											<div class="iner_image_content">
												<div class="date_image">
													<p><?php echo translate_date_to_croatian(date_i18n('j. F Y', strtotime(get_the_date()))); ?></p>
												</div>
												<div class="title_image">
													<h3><?php echo esc_html($naslov ? $naslov : get_the_title()); ?></h3>
												</div>
											</div>
										</div>
									<?php endif; ?>
								</div>
							</a>
						</div>

				<?php
						$i++;
					endwhile;
				} else {
					// If no results found
					echo '<p>Nema rezultata za pretragu.</p>';
				}
				wp_reset_postdata();
				?>

			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>