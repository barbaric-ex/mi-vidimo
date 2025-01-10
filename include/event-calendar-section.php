<div class="anchor" id="events"></div>


<?php if (have_rows('event_content')) : ?>
    <?php while (have_rows('event_content')) : the_row();
        $naslov = get_sub_field('naslov');


    ?>

        <div class="home_sec_events section">
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
                            <div class="anchor" id="con_event_wrap"></div>
                            <div class="con_wrap">
                                <div class="main_title">
                                    <h2>Kliknite na događaj u kalendaru da bih se prikazao</h2>
                                </div>

                                <div class="main_title2">
                                    <h2>Trenutno nema događaja</h2>
                                </div>

                                <div class="event_box">
                                    <div class="image">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/og-img.jpg" alt="name">
                                        <div class="logo_img_sm">
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/logo1-removebg-preview.png" alt="name">
                                        </div>
                                    </div>

                                    <div class="title">
                                        <h3></h3>
                                    </div>

                                    <div class="date">
                                        <p></p>
                                    </div>

                                    <div class="event_text">

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
                var noEventsMessage = document.querySelector('.main_title2');
                var hasEventsMessage = document.querySelector('.main_title');

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
                                    'text' => get_sub_field('event_text') // Prikazivanje originalnog HTML sadržaja
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
                            text: `<?php echo wp_kses_post($first_event['text']); ?>` // Koristi HTML sadržaj bez strip tagova
                        };
                    <?php endif; ?>
                <?php endif; ?>

                // Funkcija za uklanjanje HTML tagova


                // Funkcija za formatiranje datuma u željeni format
                function formatDate(dateString) {
                    var date = new Date(dateString);
                    return date.toLocaleDateString('hr-HR', {
                        day: '2-digit',
                        month: '2-digit',
                        year: 'numeric'
                    }).replace(/(\d{2})\.(\d{2})\.(\d{4})/, '$1. $2. $3');
                }

                // Postavljanje prvotnog događaja
                if (defaultEvent) {
                    document.querySelector('.event_box .image img').src = defaultEvent.image;
                    document.querySelector('.event_box .title h3').textContent = defaultEvent.title;
                    document.querySelector('.event_box .date p').textContent = formatDate(defaultEvent.date);
                    document.querySelector('.event_box .event_text').innerHTML = defaultEvent.text; // Koristi innerHTML umjesto textContent za prikaz HTML sadržaja
                }

                // Konfiguracija kalendara
                <?php if (have_rows('date_event_box')) :
                    while (have_rows('date_event_box')) : the_row();
                        $event_date = get_sub_field('event_date');
                        $event_title = html_entity_decode(get_sub_field('event_title'), ENT_QUOTES, 'UTF-8');
                        $event_image = get_sub_field('event_image');
                        $event_text = get_sub_field('event_text'); // Prikazivanje originalnog HTML sadržaja
                ?>
                        events.push({
                            title: '<?php echo esc_js($event_title); ?>',
                            start: '<?php echo esc_js(date('Y-m-d', strtotime($event_date))); ?>',
                            image: '<?php echo esc_js($event_image['url']); ?>',
                            text: `<?php echo wp_kses_post($event_text); ?>` // HTML sadržaj bez uklanjanja tagova
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
                            document.querySelector('.event_box .date p').textContent = formatDate(info.event.startStr);
                            document.querySelector('.event_box .event_text').innerHTML = event.text; // innerHTML umjesto textContent za HTML sadržaj
                            eventBox.classList.remove('slide-out');
                        }, 300); // Animacija traje 300ms

                        // Provjera širine prozora i skrolanje na dio s ID-om 'con_event_wrap' ako je manja od 991px
                        if (window.innerWidth < 991) {
                            var conEventWrap = document.getElementById('con_event_wrap');
                            conEventWrap.scrollIntoView({
                                behavior: 'smooth'
                            });
                        }
                    }
                });

                calendar.render();

                // Funkcija za ažuriranje mjeseca i godine u .date_wrapper
                document.querySelectorAll('.fc-toolbar-chunk button.fc-button.fc-button-primary').forEach(function(button) {
                    button.addEventListener('click', function() {
                        var currentCalendarMonth = calendar.view.currentStart;
                        var newMonth = currentCalendarMonth.toLocaleDateString('hr-HR', {
                            month: 'long'
                        });
                        var newYear = currentCalendarMonth.toLocaleDateString('hr-HR', {
                            year: 'numeric'
                        });
                        var monthEl = document.querySelector('.date_wrapper h4');
                        var yearEl = document.querySelector('.date_wrapper p');

                        monthEl.textContent = newMonth;

                        // Prikazuje godinu ako je novi mjesec različit od tekućeg mjeseca
                        if (newMonth === currentMonth) {
                            yearEl.textContent = currentDate;
                        } else {
                            yearEl.textContent = newYear;
                        }
                    });
                });

                // Prikazivanje ili skrivanje poruka o događajima
                if (events.length > 0) {
                    noEventsMessage.style.display = 'none';
                    hasEventsMessage.style.display = 'block';
                } else {
                    noEventsMessage.style.display = 'block';
                    hasEventsMessage.style.display = 'none';
                }
            });
        </script>





        <style>

        </style>


        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>

    <?php endwhile; ?>
<?php endif; ?>