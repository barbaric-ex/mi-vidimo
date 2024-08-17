<?php
/*
Template Name: Page Home
*/
get_header(); ?>



<div class="home_sec1 section" id="pocetna">

    <div class="owl-carousel owl-theme header-slider">


        <div class="wrapper" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/po.jpg);">
            <div class="container">
                <div class="text_wrap">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo1-removebg-preview.png" alt="">
                    </div>

                    <div class="text">
                        <h2>Mi vidimo</h2>
                    </div>
                    <div class="btn_wrap">
                        <a href="#footer">Kontaktiraj nas</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/po.jpg);">
            <div class="container">
                <div class="text_wrap">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo1-removebg-preview.png" alt="">
                    </div>

                    <div class="text">
                        <h2>Mi vidimo</h2>
                    </div>
                    <div class="btn_wrap">
                        <a href="#footer">Kontaktiraj nas</a>
                    </div>
                </div>
            </div>
        </div>


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



<div class="home_sec2 section" id="novosti">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper">
                    <div class="main_heading">
                        <h2>Novosti</h2>
                    </div>



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
                        <div class="news_wrap">
                            <?php if ($slika) : ?>
                                <a href="<?php the_permalink(); ?>">
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
                                </a>
                            <?php endif; ?>


                        </div>
                    </div>
            <?php $i++;
                endwhile;
            }
            wp_reset_postdata();
            ?>






        </div>
    </div>

</div>

<div class="home_sec3 section" id="onama">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="main_heading">
                    <h2>O Nama</h2>
                </div>

                <div class="text_area">
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>
                </div>

                <div class="main_heading subtitle">
                    <h2>Naš Tim</h2>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">

                <div class="wrap">
                    <div class="image_wrap" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/team1.jpg);">
                        <div class="overlay">
                            <div class="icon_img">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/logo1-removebg-preview.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="text_wrap">
                        <div class="name">
                            Emil Bevanda
                        </div>

                        <div class="info_wrap">
                            <a class="tel" href="#">+063 555 555</a>
                            <a class="email" href="#">testmail@gmail.com</a>
                        </div>


                        <div class="social_icon_wrap">
                            <a class="instagram" href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/header-icon-insatgram.svg" alt=""></a>
                            <a class="facebook" href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/header-icon-facebook.svg" alt=""></a>
                            <a class="youtube" href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/youtube.svg" alt=""></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="wrap">
                    <div class="image_wrap" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/team1.jpg);">
                        <div class="overlay">
                            <div class="icon_img">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/logo1-removebg-preview.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="text_wrap">
                        <div class="name">
                            Emil Bevanda
                        </div>

                        <div class="info_wrap">
                            <a class="tel" href="#">+063 555 555</a>
                            <a class="email" href="#">testmail@gmail.com</a>
                        </div>


                        <div class="social_icon_wrap">
                            <a class="instagram" href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/header-icon-insatgram.svg" alt=""></a>
                            <a class="facebook" href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/header-icon-facebook.svg" alt=""></a>
                            <a class="youtube" href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/youtube.svg" alt=""></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="wrap">
                    <div class="image_wrap" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/team1.jpg);">
                        <div class="overlay">
                            <div class="icon_img">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/logo1-removebg-preview.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="text_wrap">
                        <div class="name">
                            Emil Bevanda
                        </div>

                        <div class="info_wrap">
                            <a class="tel" href="#">+063 555 555</a>
                            <a class="email" href="#">testmail@gmail.com</a>
                        </div>


                        <div class="social_icon_wrap">
                            <a class="instagram" href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/header-icon-insatgram.svg" alt=""></a>
                            <a class="facebook" href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/header-icon-facebook.svg" alt=""></a>
                            <a class="youtube" href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/youtube.svg" alt=""></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="wrap">
                    <div class="image_wrap" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/team1.jpg);">
                        <div class="overlay">
                            <div class="icon_img">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/logo1-removebg-preview.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="text_wrap">
                        <div class="name">
                            Emil Bevanda
                        </div>

                        <div class="info_wrap">
                            <a class="tel" href="#">+063 555 555</a>
                            <a class="email" href="#">testmail@gmail.com</a>
                        </div>


                        <div class="social_icon_wrap">
                            <a class="instagram" href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/header-icon-insatgram.svg" alt=""></a>
                            <a class="facebook" href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/header-icon-facebook.svg" alt=""></a>
                            <a class="youtube" href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/youtube.svg" alt=""></a>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>



<?php if (have_rows('event_content')) : ?>
    <?php while (have_rows('event_content')) : the_row();


    ?>
        <div class="home_sec_events section" id="events">
            <div class="container">
                <div class="main_heading">
                    <h2>Događaji</h2>
                </div>
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
                                    <h2>Klikni na događaj u kalendaru da bih ga prikazao</h2>
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
                                    'title' => get_sub_field('event_title'),
                                    'image' => get_sub_field('event_image')['url'],
                                    'text' => strip_tags(get_sub_field('event_text')) // Uklanja HTML tagove
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
                        $event_title = get_sub_field('event_title');
                        $event_image = get_sub_field('event_image');
                        $event_text = strip_tags(get_sub_field('event_text')); // Uklanja HTML tagove
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

        const colors = ['#daddd8', '#d5e7c8', '#d3f2bc', '#abd78b', '#85bc5d', '#63b02b'];

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

<div class="home_lokacija" id="lokacija">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="map_mega_wrap">
                    <div class="main_heading">
                        <h2>Gdje se nalazimo</h2>
                    </div>

                    <div class="mapa">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5803.076328060768!2d17.795815097382278!3d43.34485238688282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x134b43b18de394db%3A0x1928f9d3a19dbf8e!2sBiskupski%20ordinarijat%20Mostar!5e0!3m2!1sen!2sba!4v1723715826372!5m2!1sen!2sba" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>