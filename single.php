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
                            <div class="main_heading title_single">
                                <h2><?php echo ($naslov); ?></h2>
                            </div>
                        <?php else: ?>

                            <div class="main_heading title_single">
                                <h2><?php the_title(); ?></h2>
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

                    <?php
                    $images = get_field('galerija');
                    if ($images) : ?>

                        <div class="gallery_wrap">

                            <div class="main_heading">
                                <h2>Galerija</h2>
                            </div>

                            <div class="main_gal_wrap">

                                <?php
                                $images = get_field('galerija');
                                if ($images) : ?>
                                    <div class="arr arr_left">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/nextarr.svg" alt="strelica">
                                    </div>

                                    <div class="arr arr_right">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/nextarr.svg" alt="strelica">
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

                    <?php endif; ?>

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


                        $('.main_gal_wrap .arr.arr_right img').click(function() {
                            $('.owl-carousel.single-slider').trigger('next.owl.carousel');
                        })

                        $('.main_gal_wrap .arr.arr_left img').click(function() {
                            $('.owl-carousel.single-slider').trigger('prev.owl.carousel');
                        })
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

                    <div class="main_gal_wrap2">
                        <div class="arr arr_left">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/nextarr.svg" alt="">
                        </div>

                        <div class="arr arr_right">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/nextarr.svg" alt="">
                        </div>
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


                <?php
                    endwhile;
                }
                wp_reset_postdata();
                ?>


            </div>


            <script>
                $(window).on('load', function() {
                    var $owl2 = $('.owl-carousel.news-slider');
                    $owl2.children().each(function(index) {
                        $(this).attr('data-position', index); // NB: .attr() instead of .data()
                    });
                    let owl2 = $('.owl-carousel.news-slider').owlCarousel({

                        loop: true,
                        margin: 20,
                        //nav:true,
                        dots: false,
                        autoplay: true,
                        autoplaySpeed: 500,

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

                    var counter = 0;
                    owl2.on('changed.owl.carousel.header2-slider', function(property) {

                        var current = property.item.index;
                        var numberr = $(property.target).find(".owl-item").eq(current).find(".image_wrap").data('num');




                        $(".home_sec1 .numbers_wrap .first ").text(numberr);



                    });



                    $('.main_gal_wrap2 .arr.arr_right img').click(function() {
                        $('.owl-carousel.news-slider').trigger('next.owl.carousel');
                    })

                    $('.main_gal_wrap2 .arr.arr_left img').click(function() {
                        $('.owl-carousel.news-slider').trigger('prev.owl.carousel');
                    })
                });
            </script>





        </div>
    </div>

</div>


<?php get_footer(); ?>