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
        var $textWrap = $(this).siblings(".text_wrap");
        $textWrap.stop(true, true).slideToggle(300); // Toggla otvaranje i zatvaranje

        var currentRadius = $(this).css("border-radius");
        $(this).css("border-radius", currentRadius === "0px" ? "20px" : "0"); // Toggla border-radius
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
})(jQuery);
