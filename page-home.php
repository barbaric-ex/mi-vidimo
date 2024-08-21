<?php
/*
Template Name: Page Home
*/
get_header(); ?>


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
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo1-removebg-preview.png" alt="">
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


                    });
                });
            </script>


        </div>
    <?php endwhile; ?>
<?php endif; ?>


<div class="home_sec2 section" id="novosti">
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

                    </div>
            <?php $i++;
                endwhile;
            }
            wp_reset_postdata();
            ?>






        </div>
    </div>

</div>

<?php if (have_rows('sadrzaj_3')) : ?>
    <?php while (have_rows('sadrzaj_3')) : the_row();

        $naslov = get_sub_field('naslov');
        $text = get_sub_field('text');
        $podnaslov = get_sub_field('podnaslov');




    ?>

        <div class="home_sec3 section" id="onama">
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
                            <div class="main_heading subtitle wow fadeInUp" data-wow-delay="0.7s" data-wow-duration="0.6s">
                                <h2><?php echo $podnaslov; ?></h2>
                            </div>
                        <?php endif; ?>

                    </div>

                    <?php if (have_rows('clanovi_tima')) : ?>
                        <?php while (have_rows('clanovi_tima')) : the_row();

                            $slika_ = get_sub_field('slika_');
                            $ime = get_sub_field('ime');





                        ?>

                            <div class="col-lg-3 col-md-6">

                                <div class="wrap wow fadeInUp" data-wow-delay="0.8s" data-wow-duration="0.6s">
                                    <div class="image_wrap" style="background-image: url(<?php echo $slika_['sizes']['medium']; ?>);">
                                        <div class="overlay">
                                            <div class="icon_img">
                                                <img src="<?php echo get_template_directory_uri(); ?>/img/logo1-removebg-preview.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text_wrap">
                                        <?php if ($ime) : ?>
                                            <div class="name">
                                                <?php echo $ime; ?>
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
                                                    <img src="<?php echo get_template_directory_uri(); ?>/img/header-icon-insatgram.svg" alt="">
                                                </a><?php endif; ?>

                                            <?php
                                            $link = get_sub_field('facebook_link');
                                            if ($link) :
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self';
                                            ?>



                                                <a class="facebook" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/img/header-icon-facebook.svg" alt="">
                                                </a><?php endif; ?>

                                            <?php
                                            $link = get_sub_field('youtube_link');
                                            if ($link) :
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self';
                                            ?>



                                                <a class="youtube" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/img/youtube.svg" alt="">
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

<?php if (have_rows('event_content')) : ?>
    <?php while (have_rows('event_content')) : the_row();
        $naslov = get_sub_field('naslov');


    ?>
        <div class="home_sec_events section" id="events">
            <div class="container">

                <?php if ($naslov) : ?>
                    <div class="main_heading wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="0.6s">
                        <h2><?php echo $naslov; ?></h2>
                    </div>
                <?php endif; ?>
                <div class="big_wrapper_cal">
                    <div class="row">
                        <div class="col-lg-5 small-calendar">
                            <div class="date_wrapper">
                                <h4></h4>
                                <p></p>
                            </div>
                            <div id='calendar'></div>

                        </div>

                        <div class="col-lg-7">

                            <div class="con_wrap">
                                <div class="main_title">
                                    <h2>Kliknite na događaj u kalendaru da bih se prikazao</h2>
                                </div>

                                <div class="event_box">
                                    <div class="image">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/po.jpg" alt="">
                                    </div>

                                    <div class="title">
                                        <h3>Neki Title</h3>
                                    </div>

                                    <div class="date">
                                        <p></p>
                                    </div>

                                    <div class="event_text">
                                        <p>test</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var events = [];
                var defaultEvent;

                // PHP kod za dobivanje prvog nadolazećeg događaja
                <?php if (have_rows('date_event_box')) :
                    $first_event = null;
                    $current_date = date('Y-m-d');
                    while (have_rows('date_event_box')) : the_row();
                        $event_date = get_sub_field('event_date');
                        if (strtotime($event_date) >= strtotime($current_date)) {
                            if ($first_event === null || strtotime($event_date) < strtotime($first_event['date'])) {
                                $first_event = array(
                                    'date' => $event_date,
                                    'title' => html_entity_decode(get_sub_field('event_title'), ENT_QUOTES, 'UTF-8'),
                                    'image' => get_sub_field('event_image')['url'],
                                    'text' => strip_tags(html_entity_decode(get_sub_field('event_text'), ENT_QUOTES, 'UTF-8')) // Dekodiranje HTML entiteta i uklanjanje HTML tagova
                                );
                            }
                        }
                    endwhile;
                    if ($first_event) :
                ?>
                        defaultEvent = {
                            date: '<?php echo esc_js($first_event['date']); ?>',
                            title: '<?php echo esc_js($first_event['title']); ?>',
                            image: '<?php echo esc_js($first_event['image']); ?>',
                            text: '<?php echo esc_js($first_event['text']); ?>'
                        };
                    <?php endif; ?>
                <?php endif; ?>

                // Funkcija za uklanjanje HTML tagova
                function stripHtmlTags(html) {
                    return html.replace(/<\/?[^>]+>/gi, ''); // Uklanja HTML tagove
                }

                // Postavljanje prvotnog događaja
                if (defaultEvent) {
                    document.querySelector('.event_box .image img').src = defaultEvent.image;
                    document.querySelector('.event_box .title h3').textContent = defaultEvent.title;
                    document.querySelector('.event_box .date p').textContent = defaultEvent.date;
                    document.querySelector('.event_box .event_text p').textContent = stripHtmlTags(defaultEvent.text); // Koristi funkciju za uklanjanje HTML tagova
                }

                // Konfiguracija kalendara
                <?php if (have_rows('date_event_box')) :
                    while (have_rows('date_event_box')) : the_row();
                        $event_date = get_sub_field('event_date');
                        $event_title = html_entity_decode(get_sub_field('event_title'), ENT_QUOTES, 'UTF-8');
                        $event_image = get_sub_field('event_image');
                        $event_text = strip_tags(html_entity_decode(get_sub_field('event_text'), ENT_QUOTES, 'UTF-8')); // Dekodiranje HTML entiteta i uklanjanje HTML tagova
                ?>
                        events.push({
                            title: '<?php echo esc_js($event_title); ?>',
                            start: '<?php echo esc_js(date('Y-m-d', strtotime($event_date))); ?>',
                            image: '<?php echo esc_js($event_image['url']); ?>',
                            text: '<?php echo esc_js($event_text); ?>'
                        });
                    <?php endwhile; ?>
                <?php endif; ?>

                var monthEl = document.querySelector('.date_wrapper h4');
                var dateEl = document.querySelector('.date_wrapper p');

                var today = new Date();
                var optionsMonth = {
                    month: 'long'
                };
                var optionsDate = {
                    weekday: 'long',
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric'
                };
                var optionsYear = {
                    year: 'numeric'
                };

                var currentMonth = today.toLocaleDateString('hr-HR', optionsMonth);
                var currentDate = today.toLocaleDateString('hr-HR', optionsDate)
                    .replace(/(\d{2})\./g, '$1.').replace(/(\d{2})\.(\d{2})\./g, '$1.$2.');
                var currentYear = today.toLocaleDateString('hr-HR', optionsYear);

                if (monthEl) {
                    monthEl.textContent = currentMonth;
                }

                if (dateEl) {
                    dateEl.textContent = currentDate;
                }

                function updateMonthDisplay() {
                    var currentCalendarMonth = calendar.view.currentStart;
                    var newMonth = currentCalendarMonth.toLocaleDateString('hr-HR', optionsMonth);
                    var newYear = currentCalendarMonth.toLocaleDateString('hr-HR', optionsYear);
                    monthEl.textContent = newMonth;

                    if (newMonth === currentMonth) {
                        dateEl.textContent = currentDate;
                    } else {
                        dateEl.textContent = newYear;
                    }
                }

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'hr',
                    events: events,
                    headerToolbar: {
                        left: '',
                        center: 'prev,title,next',
                        right: ''
                    },
                    titleFormat: {
                        month: 'long'
                    },
                    eventClick: function(info) {
                        var event = info.event.extendedProps;

                        var eventBox = document.querySelector('.event_box');
                        eventBox.classList.add('slide-out');

                        setTimeout(function() {
                            document.querySelector('.event_box .image img').src = event.image;
                            document.querySelector('.event_box .title h3').textContent = info.event.title;
                            document.querySelector('.event_box .date p').textContent = info.event.startStr;
                            document.querySelector('.event_box .event_text p').textContent = stripHtmlTags(event.text); // Koristi funkciju za uklanjanje HTML tagova
                            eventBox.classList.remove('slide-out');
                        }, 300); // Animacija traje 300ms
                    }
                });

                calendar.render();

                document.querySelectorAll('.fc-toolbar-chunk button.fc-button.fc-button-primary').forEach(function(button) {
                    button.addEventListener('click', updateMonthDisplay);
                });
            });
        </script>















        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>

    <?php endwhile; ?>
<?php endif; ?>




<script>
    document.addEventListener('scroll', function() {
        const scrollPosition = window.scrollY;
        const documentHeight = document.body.scrollHeight - window.innerHeight;
        const scrollPercentage = scrollPosition / documentHeight;

        const colors = ['#daddd8', '#d5e7c8', '#d3f2bc', '#9ae4e5', '#88eff1', '#5cf2f5'];

        const colorIndex = Math.floor(scrollPercentage * (colors.length - 1));
        const nextColorIndex = (colorIndex + 1) < colors.length ? colorIndex + 1 : colorIndex;

        const color1 = colors[colorIndex];
        const color2 = colors[nextColorIndex];

        const colorTransitionPercentage = (scrollPercentage * (colors.length - 1)) % 1;

        const newColor = blendColors(color1, color2, colorTransitionPercentage);

        document.body.style.backgroundColor = newColor;
    });

    function blendColors(color1, color2, percentage) {
        const [r1, g1, b1] = hexToRgb(color1);
        const [r2, g2, b2] = hexToRgb(color2);

        const r = Math.round(r1 + percentage * (r2 - r1));
        const g = Math.round(g1 + percentage * (g2 - g1));
        const b = Math.round(b1 + percentage * (b2 - b1));

        return `rgb(${r}, ${g}, ${b})`;
    }

    function hexToRgb(hex) {
        const bigint = parseInt(hex.slice(1), 16);
        const r = (bigint >> 16) & 255;
        const g = (bigint >> 8) & 255;
        const b = bigint & 255;
        return [r, g, b];
    }
</script>


<?php if (have_rows('sadrzaj_5')) : ?>
    <?php while (have_rows('sadrzaj_5')) : the_row();
        $naslov = get_sub_field('naslov');
        $google_karta = get_sub_field('google_karta');
        $velika_paralex_slika = get_sub_field('velika_paralex_slika');


    ?>

        <?php if ($velika_paralex_slika) : ?>
            <div class="sec_big_image" style="background-image: url(<?php echo $velika_paralex_slika['sizes']['large']; ?>);">

            </div>
        <?php endif; ?>


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


<?php get_footer(); ?>