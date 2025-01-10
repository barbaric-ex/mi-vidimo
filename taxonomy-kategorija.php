<?php
get_header(); ?>

<div class="home_sec2 section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper">
                    <?php
                    // Prikazivanje naslova trenutne kategorije
                    $current_term = get_queried_object();
                    if ($current_term && !is_wp_error($current_term)) :
                        $naslov = $current_term->name;
                    ?>
                        <div class="main_heading wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="0.6s">
                            <h2><?php echo esc_html($naslov); ?></h2>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php
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

            // Postovi za trenutnu kategoriju
            $args = array(
                'post_type' => 'novost',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'kategorija',
                        'field'    => 'slug',
                        'terms'    => $current_term->slug,
                    ),
                ),
            );
            $loop = new WP_Query($args);
            $i = 1;

            if ($loop->have_posts()) :
                while ($loop->have_posts()) : $loop->the_post();
                    $slika = get_field('slika');
                    $naslov = get_field('naslov');
            ?>
                    <div class="col-lg-4 <?php if ($i % 3 === 0) : ?>col-md-12<?php else : ?>col-md-6<?php endif; ?>">
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
                                            <?php if ($naslov) : ?>
                                                <div class="title_image">
                                                    <h3><?php echo esc_html($naslov); ?></h3>
                                                </div>
                                            <?php else : ?>
                                                <div class="title_image">
                                                    <h3><?php the_title(); ?></h3>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
            <?php
                    $i++;
                endwhile;
            else :
                echo '<p>Nema postova u ovoj kategoriji.</p>';
            endif;

            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>