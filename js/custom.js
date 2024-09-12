(function ($) {
  "use strict";

  $('a[href*="#"]:not([href="#"])').click(function () {
    if (
      location.pathname.replace(/^\//, "") ==
        this.pathname.replace(/^\//, "") &&
      location.hostname == this.hostname
    ) {
      var target = $(this.hash);
      target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
      if (target.length) {
        $("html, body").animate(
          {
            scrollTop: target.offset().top - 40,
          },
          1000,
          "easeInOutExpo"
        );
        return false;
      }
    }
  });

  $(".js-scroll-trigger").click(function () {
    $(".navbar-collapse").collapse("hide");
  });

  $("body").scrollspy({
    target: "#mainNav",
    offset: 56,
  });

  $(window).on("load scroll", function (e) {
    if ($(".navbar").offset().top > 100) {
      $(".navbar").addClass("top-nav-collapse");
    } else {
      $(".navbar").removeClass("top-nav-collapse");
    }
  });

  $(document).ready(function () {
    $(".navbar-nav li a").click(function () {
      var windowWidth = $(window).width();
      if (windowWidth < 991) {
        $(".navbar-collapse").removeClass("navbar250");
        $(".c-hamburger").removeClass("is-active");
        $(".dark-overly").removeClass("active");
      }
    });

    function handleDesktopEvents() {
      $(".home_sec3 .wrap").on("mouseenter", ".image_wrap", function () {
        $(this).siblings(".text_wrap").stop(true, true).slideDown(300);
        $(this).css("border-radius", "0"); // Makni border-radius na hover
      });

      $(".home_sec3 .wrap").on("mouseleave", function () {
        $(this).find(".text_wrap").stop(true, true).slideUp(300);
        $(this).find(".image_wrap").css("border-radius", "20px"); // Vrati border-radius kad miš napusti wrap
      });
    }

    function handleMobileEvents() {
      $(".home_sec3 .wrap").off("mouseenter mouseleave"); // Ukloni hover događaje

      $(".home_sec3 .wrap").on("click", ".image_wrap", function () {
        var $wrap = $(this).closest(".wrap");
        var $textWrap = $(this).siblings(".text_wrap");
        $textWrap.stop(true, true).slideToggle(300); // Toggla otvaranje i zatvaranje

        var currentRadius = $(this).css("border-radius");
        $(this).css("border-radius", currentRadius === "0px" ? "20px" : "0"); // Toggla border-radius

        // Dodaj klasu 'active' ako je otvoreno, makni ako je zatvoreno
        $wrap.toggleClass("active");
      });
    }

    function applyEvents() {
      if ($(window).width() < 991) {
        handleMobileEvents();
      } else {
        handleDesktopEvents();
      }
    }

    applyEvents(); // Primijeni događaje pri učitavanju stranice

    $(window).resize(function () {
      $(".home_sec3 .wrap").off(); // Ukloni sve prethodno dodane događaje
      applyEvents(); // Ponovno primijeni događaje prilikom promjene veličine prozora
    });
  });

  jQuery(function ($) {
    if ($(window).width() < 991) {
      $(".navbar .dropdown > a").click(function () {
        location.href = this.href;
      });
    }
  });

  $(document).ready(function () {
    $(".menu-btn button").click(function () {
      $(".navbar-collapse").toggleClass("navbar250");
      $(".c-hamburger").toggleClass("is-active");
      $(".dark-overly").toggleClass("active");
    });
    $(".menu-btn-close").click(function () {
      $(".navbar-collapse").removeClass("navbar250");
      $(".menu-btn").removeClass("active");
      $(".dark-overly").removeClass("active");
    });
    $(".navbar-nav li a").click(function () {
      var windowWidth = $(window).width();
      if (windowWidth < 768) {
        $(".navbar-collapse").removeClass("navbar250");
        $(".c-hamburger").removeClass("is-active");
        $(".dark-overly").removeClass("active");
      }
    });

    $(".search-main-btn").click(function () {
      $(".search-fixed-wrap").addClass("active");
      $(".search-fixed-wrap input[type='text']").focus();
    });

    $(".close-btn-search").click(function () {
      $(".search-fixed-wrap").removeClass("active");
    });
  });

  $(".navbar .dropdown > a").click(function () {
    location.href = this.href;
  });

  $(window).on("load scroll", function (e) {
    if ($(window).scrollTop() > 500) {
      $(".to-top img").show(100);
    } else {
      $(".to-top img").hide(100);
    }
  });
  $(".to-top").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 800, "easeInOutExpo");
  });

  document.addEventListener("DOMContentLoaded", function () {
    const headings = document.querySelectorAll(".main_heading h2");

    const observer = new IntersectionObserver(
      function (entries) {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.parentElement.classList.add("in-view");
          } else {
            entry.target.parentElement.classList.remove("in-view");
          }
        });
      },
      {
        threshold: 0.1, // 10% od elementa mora biti vidljivo prije nego što se klasa primijeni
      }
    );

    headings.forEach((heading) => {
      observer.observe(heading);
    });
  });

  document.addEventListener("DOMContentLoaded", function () {
    // Ukloni 'active' klasu sa svih li elemenata na početku
    document.querySelectorAll(".navbar-nav li").forEach(function (item) {
      item.classList.remove("active");
    });

    // Dodaj 'active' klasu na osnovu trenutnog hash dijela URL-a
    const currentHash = window.location.hash;
    if (currentHash) {
      const activeLink = document.querySelector(
        `.navbar-nav a[href="${currentHash}"]`
      );
      if (activeLink) {
        activeLink.closest("li").classList.add("active");
      }
    }

    // Dodaj 'active' klasu na klik na navigacijske linkove
    document.querySelectorAll(".navbar-nav a").forEach(function (link) {
      link.addEventListener("click", function () {
        document.querySelectorAll(".navbar-nav li").forEach(function (item) {
          item.classList.remove("active");
        });
        this.closest("li").classList.add("active");
      });
    });
  });

  /*****************************************/

  document.addEventListener("DOMContentLoaded", function () {
    // Provjera podržava li preglednik Web Speech API
    if ("webkitSpeechRecognition" in window && "speechSynthesis" in window) {
      const recognition = new webkitSpeechRecognition();
      const synth = window.speechSynthesis; // SpeechSynthesis API
      recognition.lang = "hr-HR"; // Postavi jezik na hrvatski
      recognition.continuous = true; // Pokušava slušati kontinuirano
      recognition.interimResults = false;

      let isListening = false;

      // Funkcija za pokretanje/zaustavljanje mikrofona
      function toggleVoiceNavigation() {
        const btnText = document.querySelector(".inner_btn span");
        const innerBtn = document.querySelector(".inner_btn");

        if (isListening) {
          recognition.stop();
          isListening = false;
          btnText.textContent = "Upali glasovnu navigaciju";
          innerBtn.classList.remove("active");
        } else {
          try {
            recognition.start();
            isListening = true;
            btnText.textContent = "Ugasi glasovnu navigaciju";
            innerBtn.classList.add("active");
          } catch (error) {
            console.error(
              "Došlo je do greške prilikom pokretanja prepoznavanja glasa:",
              error
            );
            alert(
              "Došlo je do greške prilikom pokretanja prepoznavanja glasa. Molimo pokušajte ponovno."
            );
          }
        }
      }

      // Obradi glasovne naredbe
      recognition.onresult = function (event) {
        const transcript = event.results[event.results.length - 1][0].transcript
          .trim()
          .toLowerCase();

        // Glasovne naredbe
        if (
          [
            "novosti",
            "vijesti",
            "novost",
            "vijest",
            "zadnje vijesti",
            "zadnje novosti",
          ].includes(transcript)
        ) {
          document
            .getElementById("novosti")
            .scrollIntoView({ behavior: "smooth" });
        } else if (["o nama", "naš tim", "tim"].includes(transcript)) {
          document
            .getElementById("onama")
            .scrollIntoView({ behavior: "smooth" });
        } else if (
          [
            "događaji",
            "eventi",
            "događanja",
            "kalendar",
            "skori događaji",
          ].includes(transcript)
        ) {
          document
            .getElementById("events")
            .scrollIntoView({ behavior: "smooth" });
        } else if (
          ["mapa", "karta", "lokacija", "gdje se nalazimo"].includes(transcript)
        ) {
          document
            .getElementById("lokacija")
            .scrollIntoView({ behavior: "smooth" });
        } else if (
          [
            "kontakt",
            "info",
            "adresa",
            "broj telefona",
            "email adresa",
            "društvene mreže",
            "socijalne mreže",
          ].includes(transcript)
        ) {
          document
            .getElementById("footer")
            .scrollIntoView({ behavior: "smooth" });
        } else if (
          [
            "početna",
            "početak",
            "vrh stranice",
            "vrati na vrh",
            "vrati na početak",
            "početna stranica",
          ].includes(transcript)
        ) {
          document
            .getElementById("pocetna")
            .scrollIntoView({ behavior: "smooth" });
        } else if (
          [
            "pozovi",
            "zovni",
            "zovi",
            "okreni broj",
            "kontaktiraj",
            "pozovi broj telefona",
          ].includes(transcript)
        ) {
          document.querySelector(".linkovi .tel").click();
        } else if (
          ["pošalji email", "email", "mail", "pošalji poruku"].includes(
            transcript
          )
        ) {
          document.querySelector(".linkovi .email").click();
        } else if (transcript === "instagram") {
          document.querySelector(".instagram").click();
        } else if (transcript === "facebook") {
          document.querySelector(".facebook").click();
        } else if (transcript === "youtube") {
          document.querySelector(".youtube").click();
        }
      };

      // Ako se prepoznavanje zaustavi, pokušaj ga ponovo pokrenuti
      recognition.onend = function () {
        if (isListening) {
          recognition.start();
        }
      };

      // Obradi greške
      recognition.onerror = function (event) {
        console.error("Greška u prepoznavanju glasa:", event.error);
        if (
          event.error === "not-allowed" ||
          event.error === "service-not-allowed"
        ) {
          alert(
            "Pristup mikrofonu je odbijen ili nije dostupan. Molimo provjerite postavke."
          );
        }
      };

      // Dodaj event listener za klik na dugme
      const voiceOpenBtn = document.querySelector(".voice_open_btn");
      if (voiceOpenBtn) {
        voiceOpenBtn.addEventListener("click", toggleVoiceNavigation);
      } else {
        console.warn("Element s klasom .voice_open_btn nije pronađen.");
      }
    } else {
      alert("Vaš preglednik ne podržava glasovnu navigaciju.");
    }
  });
})(jQuery);
