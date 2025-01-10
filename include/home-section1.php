<?php if (have_rows('sadrzaj_1')) : ?>
    <?php while (have_rows('sadrzaj_1')) : the_row();

    ?>
        <div class="home_sec1 section" id="pocetna">

            <div class="owl-carousel owl-theme header-slider">
                <?php if (have_rows('slider_sadrzaj')) : ?>
                    <?php while (have_rows('slider_sadrzaj')) : the_row();

                        $pozadinska_slika = get_sub_field('pozadinska_slika');
                        $naslov = get_sub_field('naslov');


                    ?>

                        <div class="wrapper" style="background-image: url(<?php echo $pozadinska_slika['sizes']['large']; ?>);">
                            <div class="container">
                                <div class="text_wrap">
                                    <div class="image wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="0.6s">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo1-removebg-preview.png" alt="logo">
                                    </div>
                                    <?php if ($naslov) : ?>
                                        <div class="text wow fadeInUp" data-wow-delay="0.6s" data-wow-duration="0.6s">
                                            <h1><?php echo $naslov; ?></h1>
                                        </div>
                                    <?php endif; ?>

                                    <div class="btn_wrap wow fadeInUp" data-wow-delay="0.8s" data-wow-duration="0.6s">
                                        <?php
                                        $link = get_sub_field('dugme');
                                        if ($link) :
                                            $link_url = $link['url'];
                                            $link_title = $link['title'];
                                            $link_target = $link['target'] ? $link['target'] : '_self';
                                        ?>



                                            <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?> </a><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>




            </div>

            <script>
                $(document).ready(function() {
                    $('.owl-carousel.header-slider').owlCarousel({
                        items: 1,
                        loop: true,

                        //nav:true,
                        dots: false,
                        center: true,
                        autoplay: true,
                        autoplaySpeed: 1000,
                        smartSpeed: 1500,
                        autoplayHoverPause: false,
                        animateOut: 'fadeOut',
                        animateIn: 'fadeIn'


                    });
                });
            </script>


        </div>
    <?php endwhile; ?>
<?php endif; ?>


<div class="home_sec12">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper">
                    <div class="title">
                        <h2>Mladi <span id="typed-text"></span></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

<script>
    var typed = new Typed("#typed-text", {
        strings: ["vjere", "djela", "i molitve"],
        typeSpeed: 50, // Brzina tipkanja
        backSpeed: 30, // Brzina brisanja
        backDelay: 1000, // Pauza prije brisanja
        startDelay: 500, // Pauza prije nego počne tipkati prvi tekst
        loop: true, // Ponavljanje
        showCursor: true, // Prikazivanje kursora
        cursorChar: '|', // Karakter kursora
    });
</script>