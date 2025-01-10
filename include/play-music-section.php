<!-- Dodaj dugme -->

<div class="aud_wrapper">
    <div id="playButton" class="pulse"> </div>
</div>

<!-- Dodaj audio element -->

<?php if (have_rows('sadrzaj_1')) : ?>
    <?php while (have_rows('sadrzaj_1')) : the_row();

        $pozadinska_glazba = get_sub_field('pozadinska_glazba');



    ?>
        <audio id="myAudio">
            <source src="<?php echo $pozadinska_glazba; ?>" type="audio/mpeg">
            Vaš preglednik ne podržava audio element.
        </audio>

    <?php endwhile; ?>
<?php endif; ?>

<script>
    document.getElementById('playButton').addEventListener('click', function() {
        var audio = document.getElementById('myAudio');

        if (audio.paused || audio.ended) {
            // Ako je muzika pauzirana ili završena, pokreni je
            audio.play().catch(function(error) {
                console.log('Greška prilikom pokretanja muzike:', error);
            });
            // Promijeni pozadinsku sliku kad se muzika pokrene
            this.style.backgroundImage = "url('<?php echo get_template_directory_uri(); ?>/img/multimedia-pause-icon-circle-button.svg')";
        } else {
            // Ako muzika svira, pauziraj je
            audio.pause();
            // Promijeni pozadinsku sliku kad se muzika pauzira
            this.style.backgroundImage = "url('<?php echo get_template_directory_uri(); ?>/img/music.svg')";
        }
    });

    // Dodaj event listener za kada muzika završi
    document.getElementById('myAudio').addEventListener('ended', function() {
        var playButton = document.getElementById('playButton');
        // Vrati pozadinsku sliku na početnu
        playButton.style.backgroundImage = "url('<?php echo get_template_directory_uri(); ?>/img/music.svg')";
        // Resetiraj audio tako da se može ponovo pustiti bez osvježavanja stranice
        this.currentTime = 0;
    });
</script>