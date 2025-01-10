<div class="anchor" id="novosti"></div>


<div class="home_sec2 section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper">
                    <?php if (have_rows('sadrzaj_2')) : ?>
                        <?php while (have_rows('sadrzaj_2')) : the_row();

                            $naslov = get_sub_field('naslov');




                        ?>
                            <?php if ($naslov) : ?>
                                <div class="main_heading wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="0.6s">
                                    <h2><?php echo $naslov; ?></h2>
                                </div>
                            <?php endif; ?>



                        <?php endwhile; ?>
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


            $args = array(
                'post_type' => 'novost',
                'posts_per_page' => 3,
            );
            $loop = new WP_Query($args);
            $i = 1;
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

                                        <div class="overlay">

                                        </div>
                                        <div class="iner_image_content">
                                            <div class="date_image">
                                                <p><?php echo translate_date_to_croatian(date_i18n('j. F Y', strtotime(get_the_date()))); ?></p>
                                            </div>
                                            <?php if ($naslov) : ?>
                                                <div class="title_image">
                                                    <h3><?php echo esc_html($naslov); ?></h3>
                                                </div>
                                            <?php else: ?>

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
            <?php $i++;
                endwhile;
            }
            wp_reset_postdata();
            ?>

        </div>
    </div>

</div>