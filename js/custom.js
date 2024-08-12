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
            scrollTop: target.offset().top - 56,
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
    $(".home_sec3 .wrap").on("mouseenter", ".image_wrap", function () {
      $(this).siblings(".text_wrap").stop(true, true).slideDown(300);
      $(this).css("border-radius", "0"); // Makni border-radius na hover
    });

    $(".home_sec3 .wrap").on("mouseleave", function () {
      $(this).find(".text_wrap").stop(true, true).slideUp(300);
      $(this).find(".image_wrap").css("border-radius", "20px"); // Vrati border-radius kad miš napusti wrap
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
})(jQuery);
