<?php
/*
Template Name: Page
 */
get_header();

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

$slika = get_field('slika');
$glavni_text = get_field('glavni_text');
$naslov = get_field('naslov');
$galerija = get_field('galerija');
?>

<div class="single_header" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/po.jpg);"></div>

<div class="sing_sec2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper">
                    <div class="datum">
                        <p><?php echo translate_date_to_croatian(date_i18n('j. F Y', strtotime(get_the_date()))); ?></p>
                    </div>

                    <div class="title">
                        <?php if ($naslov) : ?>
                            <div class="main_heading">
                                <h2><?php echo ($naslov); ?></h2>
                            </div>
                        <?php endif; ?>

                    </div>
                    <?php if ($slika) : ?>
                        <div class="image" style="background-image: url(<?php echo esc_url($slika['sizes']['medium']); ?>);"></div>
                    <?php endif; ?>

                    <?php if ($glavni_text) : ?>
                        <div class="text">
                            <?php echo ($glavni_text); ?>

                        </div>
                    <?php endif; ?>

                    <div class="gallery_wrap">
                        <?php
                        $images = get_field('galerija');
                        if ($images) : ?>
                            <div class="main_heading">
                                <h2>Galerija</h2>
                            </div>
                        <?php endif; ?>
                        <div class="owl-carousel owl-theme single-slider">
                            <?php
                            $images = get_field('galerija');
                            if ($images) : ?>

                                <?php foreach ($images as $image) : ?>
                                    <a href="<?php echo esc_url($image['url']); ?>" data-lightbox="gallery" data-title="<?php echo esc_attr($image['caption']); ?>">
                                        <div class="image" style="background-image: url(<?php echo esc_url($image['sizes']['large']); ?>);"></div>
                                    </a>
                                <?php endforeach; ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        $('.owl-carousel.single-slider').owlCarousel({
                            items: 3,
                            loop: true,
                            margin: 20,
                            //nav:true,
                            dots: false,
                            center: true,
                            autoplay: true,
                            autoplaySpeed: 1000,
                            smartSpeed: 1500,
                            autoplayHoverPause: false,
                            responsive: {
                                0: {
                                    items: 1, // 1 item for screen width 0px and up
                                    center: false
                                },
                                800: {
                                    items: 2, // 2 items for screen width 600px and up
                                    center: false
                                },
                                1200: {
                                    items: 3, // 3 items for screen width 1000px and up
                                    center: true
                                }
                            }


                        });
                    });
                </script>


            </div>
        </div>
    </div>
</div>

<div class="home_sec2 section single_all_news" id="novosti">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper">

                    <div class="main_heading wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="0.6s">
                        <h2>Ostale Novosti</h2>
                    </div>







                </div>
            </div>

            <div class="owl-carousel owl-theme news-slider">
                <?php


                $args = array(
                    'post_type' => 'novost',
                    'posts_per_page' => -1,
                );
                $loop = new WP_Query($args);

                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                        $slika = get_field('slika');
                        $kratki_text = get_field('kratki_text');
                        $naslov = get_field('naslov');

                ?>



                        <a href="<?php the_permalink(); ?>">

                            <div class="news_wrap ">
                                <?php if ($slika) : ?>
                                    <div class="image" style="background-image: url(<?php echo esc_url($slika['sizes']['medium']); ?>);">

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
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>


                            </div>
                        </a>


                <?php
                    endwhile;
                }
                wp_reset_postdata();
                ?>

                <script>
                    $(document).ready(function() {
                        $('.owl-carousel.news-slider').owlCarousel({

                            loop: true,
                            margin: 0,
                            dots: false,
                            autoplay: true,
                            autoplaySpeed: 300,
                            smartSpeed: 300,
                            autoplayHoverPause: false,
                            responsive: {
                                0: {
                                    items: 1,
                                },
                                800: {
                                    items: 2,
                                },
                                1200: {
                                    items: 3,
                                }
                            }


                        });

                    });
                </script>
            </div>







        </div>
    </div>

</div>


<?php get_footer(); ?>