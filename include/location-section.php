<?php if (have_rows('sadrzaj_5')) : ?>
    <?php while (have_rows('sadrzaj_5')) : the_row();
        $naslov = get_sub_field('naslov');
        $google_karta = get_sub_field('google_karta');
        $velika_paralex_slika = get_sub_field('velika_paralex_slika');


    ?>

        <?php if ($velika_paralex_slika) : ?>
            <div class="section_paralex">
                <div class="sec_big_image bac_wrap">
                    <img class="thumbnail" src="<?php echo $velika_paralex_slika['sizes']['large']; ?>" alt="">
                </div>
            </div>
        <?php endif; ?>

        <script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.5.1/dist/simpleParallax.min.js"></script>

        <script>
            var image = document.getElementsByClassName('thumbnail');
            new simpleParallax(image, {
                delay: .6,
                transition: 'cubic-bezier(0,0,0,1)'
            });
        </script>


        <div class="home_lokacija" id="lokacija">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="map_mega_wrap">
                            <?php if ($naslov) : ?>
                                <div class="main_heading wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="0.6s">
                                    <h2><?php echo $naslov; ?></h2>
                                </div>
                            <?php endif; ?>

                            <?php if ($google_karta) : ?>
                                <div class="mapa">
                                    <?php echo $google_karta; ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>