<div class="anchor" id="onama"></div>
<?php if (have_rows('sadrzaj_3')) : ?>
    <?php while (have_rows('sadrzaj_3')) : the_row();

        $naslov = get_sub_field('naslov');
        $text = get_sub_field('text');
        $podnaslov = get_sub_field('podnaslov');




    ?>

        <div class="home_sec3 section">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12">
                        <?php if ($naslov) : ?>
                            <div class="main_heading wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="0.6s">
                                <h2><?php echo $naslov; ?></h2>
                            </div>
                        <?php endif; ?>


                        <?php if ($text) : ?>
                            <div class="text_area wow fadeInUp" data-wow-delay="0.6s" data-wow-duration="0.6s">
                                <?php echo $text; ?>
                            </div>
                        <?php endif; ?>



                        <?php if ($podnaslov) : ?>
                            <div class="main_heading subtitle wow fadeInUp" data-wow-delay="0.7s" data-wow-duration="0.6s" id="nas_tim">
                                <h2><?php echo $podnaslov; ?></h2>
                            </div>
                        <?php endif; ?>

                    </div>



                    <?php if (have_rows('clanovi_tima')) : ?>
                        <?php while (have_rows('clanovi_tima')) : the_row();

                            $slika_ = get_sub_field('slika_');
                            $ime = get_sub_field('ime');
                            $funkcija = get_sub_field('funkcija');

                        ?>

                            <div class="col-lg-3 col-md-6">

                                <div class="wrap  wow fadeInUp" data-wow-delay="0.8s" data-wow-duration="0.6s">
                                    <div class="image_wrap" style="background-image: url(<?php echo $slika_['sizes']['medium']; ?>);">
                                        <div class="overlay">
                                            <div class="icon_img">
                                                <img src="<?php echo get_template_directory_uri(); ?>/img/logo1-removebg-preview.png" alt="logo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text_wrap">
                                        <?php if ($ime) : ?>
                                            <div class="name">
                                                <?php echo $ime; ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($funkcija): ?>
                                            <div class="functon">
                                                <p><?php echo $funkcija; ?></p>
                                            </div>
                                        <?php endif; ?>

                                        <div class="info_wrap">

                                            <?php
                                            $link = get_sub_field('broj_telefona');
                                            if ($link) :
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self';
                                            ?>



                                                <a class="tel" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?> </a><?php endif; ?>

                                            <?php
                                            $link = get_sub_field('e-mail');
                                            if ($link) :
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self';
                                            ?>



                                                <a class="email" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?> </a><?php endif; ?>
                                        </div>


                                        <div class="social_icon_wrap">
                                            <?php
                                            $link = get_sub_field('instagram_link');
                                            if ($link) :
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self';
                                            ?>



                                                <a class="instagram" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/img/header-icon-insatgram.svg" alt="instagram">
                                                </a><?php endif; ?>

                                            <?php
                                            $link = get_sub_field('facebook_link');
                                            if ($link) :
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self';
                                            ?>



                                                <a class="facebook" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/img/header-icon-facebook.svg" alt="facebook">
                                                </a><?php endif; ?>

                                            <?php
                                            $link = get_sub_field('youtube_link');
                                            if ($link) :
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self';
                                            ?>



                                                <a class="youtube" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/img/youtube.svg" alt="youtube">
                                                </a><?php endif; ?>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        <?php endwhile; ?>
                    <?php endif; ?>




                </div>
            </div>
        </div>

    <?php endwhile; ?>
<?php endif; ?>