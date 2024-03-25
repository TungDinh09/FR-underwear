
$(document).ready(function () {
    var zindex = 0;

    $("div.card").click(function (e) {


      var isShowing = false;

      if ($(this).hasClass("show")) {
        isShowing = true;
      }

      if ($("div.cards").hasClass("showing")) {
        // a card is already in view
        $("div.card.show").removeClass("show");

        if (isShowing) {
          // this card was showing - reset the grid
          $("div.cards").removeClass("showing");
        } else {
          // this card isn't showing - get in with it
          $(this).css({ zIndex: zindex }).addClass("show");
        }

      } else {
        // no cards in view
        $("div.cards").addClass("showing");
        $(this).addClass("show");

        }

    });
      $(".menu").click(function(){
      const nav_menu = document.querySelector(".nav-menu");
      nav_menu.classList.toggle("nav-active");
      if ($(".container-menu").hasClass("nav-z-index-off")) {
          $(".remove-btn-menu").addClass("remove-btn-menu-active");
          $(".container-menu").addClass("nav-z-index-on");
          $(".container-menu").removeClass("nav-z-index-off");
      } else {
          $(".remove-btn-menu").removeClass("remove-btn-menu-active");
          $(".container-menu").removeClass("nav-z-index-on");
          $(".container-menu").addClass("nav-z-index-off");
      }
  });

  $(".remove-btn-menu").click(function () {
      const nav_menu = document.querySelector(".nav-menu");
      nav_menu.classList.toggle("nav-active");
      $(".remove-btn-menu").removeClass("remove-btn-menu-active");
      $(".container-menu").removeClass("nav-z-index-on");
      $(".container-menu").addClass("nav-z-index-off");
  });
  });

  $(".show-filter").click(function () {
    $(".check-nav-filter").toggleClass("check-nav-filter-active");
  });
  $(document).click(function (event1) {
    if(event1.target.closest(".btn-filters")) return;
    if(event1.target.closest(".nav-filters")) return;
    $(".nav-filters").removeClass("nav-filters-active");
    $(".container-filters").removeClass("dis-block");

    $(".container-filters").removeClass("nav-z-index-on ");
      $(".container-filters").addClass("nav-z-index-off ");
    $(".container-filters").removeClass(".container-filters-active");
    setTimeout(function(){
      $(".container-filters").addClass("dis-none");
      }, 250);

  });
  $(".remove-btn-filter").click(function (event1) {
    $(".nav-filters").removeClass("nav-filters-active");
    $(".container-filters").removeClass("dis-block");
    setTimeout(function(){
      $(".container-filters").addClass("dis-none");
      }, 250);
    $(".container-filters").removeClass("nav-z-index-on ");
      $(".container-filters").addClass("nav-z-index-off ");
    $(".container-filters").removeClass(".container-filters-active");


  });
  $(".btn-filters").click(function (event1) {
    console.log(1);
    $(".container-filters").removeClass("dis-none");
    $(".container-filters").addClass("dis-block");
    $(".container-filters").removeClass("nav-z-index-off ");
    $(".container-filters").addClass("nav-z-index-on ");

    $(".container-filters").addClass(".container-filters-active");

    setTimeout(function () {
      $(".nav-filters").addClass("nav-filters-active");
    });
  });
