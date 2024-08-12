<?php
/*
Template Name: Page Home
*/
get_header(); ?>

<div class="home_sec1" id="pocetna">

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



<div class="home_sec2" id="novosti">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper">
                    <div class="main_heading">
                        <h2>Novosti</h2>
                    </div>
                    <div class="text">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="home_sec3" id="onama">
    <div class="container">
        <div class="row">

            <div class="col-lg-3">

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

            <div class="col-lg-3">

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
        <div class="home_sec_events" id="events">
            <div class="container">
                <div class="main_heading">
                    <h2>Novosti</h2>
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

        const colors = ['#bcb9b2', '#d0c7b2', '#e7d6b0', '#f4dba3', '#f7d58a', '#fcc137'];

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

<div></div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php get_footer(); ?>