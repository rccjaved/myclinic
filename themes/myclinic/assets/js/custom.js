// View All Speciali Home Page

//   if (window.matchMedia("(max-width: 700px)").matches) {
//     // Viewport is less or equal to 700 pixels wide
//   } else {
//     // Viewport is greater than 700 pixels wide
//   }

$(".btn-mc-city-group").on("click", ".btn-mc-city", function () {
    $(".btn-mc-city-group .btn-mc-city.active").removeClass("active");
    $(this).addClass("active");
});
jQuery(".targetLocation").hide();
jQuery("#location1").show();
jQuery(function () {
    jQuery("").click(function () {
        jQuery(".targetLocation").show();
    });
    jQuery(".showLocation").click(function () {
        jQuery(".targetLocation").hide();
        jQuery("#location" + $(this).attr("target")).show();
    });
});

$(document).ready(function () {
    $(".card-slider").slick({
        dots: false,
        arrows: true,
        slidesToShow: 26,
        infinite: false,
        responsive: [
            // {
            //     breakpoint: 1600,
            //     settings: {
            //       slidesToShow: 24
            //     }
            //   },

            {
                breakpoint: 1601,
                settings: {
                    slidesToShow: 22,
                },
            },
            {
                breakpoint: 1280,
                settings: {
                    slidesToShow: 18,
                },
            },
            {
                breakpoint: 1140,
                settings: {
                    slidesToShow: 14,
                },
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 12,
                },
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 10,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 8,
                },
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 8,
                },
            },
        ],
    });
});

$(".card-slider").on("click", ".special-letter", function () {
    $(".card-slider .special-letter.active").removeClass("active");
    $(this).addClass("active");
});

jQuery(".targetSpecial").hide();
jQuery("#special1").show();
jQuery(function () {
    jQuery("").click(function () {
        jQuery(".targetSpecial").show();
    });
    jQuery(".showSpecial").click(function () {
        jQuery(".targetSpecial").hide();
        jQuery("#special" + $(this).attr("target")).show();
    });
});

//   $(function () {
//     $(".mc-specl").slice(0, 8).show();

//     $("body").on('click touchstart', '.btn-view-all-specl', function (e) {
//         e.preventDefault();
//         $(".mc-specl:hidden").slice(0, 30).slideDown();
//         if ($(".mc-specl:hidden").length == 0) {
//             $(".load-more").css('visibility', 'hidden');
//         }

//     });
// });

// View All Programs Home Page
$(function () {
    if (window.matchMedia("(max-width: 700px)").matches) {
        $(".mc-hide-pro").slice(0, 5).show();
    } else {
        $(".mc-hide-pro").slice(0, 8).show();
    }
    $("body").on("click touchstart", ".btn-view-all-pro", function (e) {
        e.preventDefault();
        $(".mc-hide-pro:hidden").slice(0, 3).slideDown();
        if ($(".mc-hide-pro:hidden").length == 0) {
            $(".load-more").css("visibility", "hidden");
        }
    });
});

// $(function () {
// 	$(".mc-hide").slice(0, 2).show();
// 	$("body").on('click touchstart', '.btn-view-all', function (e) {
// 		e.preventDefault();
// 		$(".mc-hide:hidden").slice(0, 30).slideDown();
// 		if ($(".mc-hide:hidden").length == 0) {
// 			$(".load-more").css('visibility', 'hidden');
// 		}

// 	});
// });

$(function () {
    // Initially show only first 4 doctor elements
    var $hiddenDoctors = $(".mc-hide-2");
    $hiddenDoctors.slice(0, 4).show();
    
    // Hide "View more" button if 4 or fewer doctors exist
    if ($hiddenDoctors.length <= 4) {
        $(".view-more-dr").hide();
    }

    // Click/touch handler for the "View more" button
    $("body").on("click touchstart", ".view-more-dr", function (e) {
        e.preventDefault();
        
        // Show next 30 hidden doctor elements
        var $remainingHidden = $(".mc-hide-2:hidden");
        $remainingHidden.slice(0, 30).slideDown();
        
        // Hide button if no more hidden elements exist
        if ($remainingHidden.length <= 30) {
            $(this).hide();
        }
    });
});

// Plans
$(document).ready(function () {
    $(".offerItemTitle").click(function () {
        $(this)
            .parents(".offerslide")
            .children(".offerItem")
            .removeClass("active");
        $(this)
            .parents(".offerslide")
            .children(".offerItem")
            .children(".offerItemTitle")
            .removeClass("hide");
        $(this).parent(".offerItem").addClass("active");
        $(this).addClass("hide");
    });
});
$(document).on("mousedown", function (event) {
    var offerSlide = $(".offerslide");

    // Check if the click is outside the .offerslide element
    if (
        !offerSlide.is(event.target) &&
        offerSlide.has(event.target).length === 0
    ) {
        // Close all items
        $(".offerItem").removeClass("active");
        $(".offerItemTitle").removeClass("hide");
    }
});

$(".offerItemTitle").click(function () {
    $(this).parents(".offerslide").children(".offerItem").removeClass("active");
    $(this)
        .parents(".offerslide")
        .children(".offerItem")
        .children(".offerItemTitle")
        .removeClass("hide");
    $(this).parent(".offerItem").addClass("active");
    $(this).addClass("hide");
});

// More & Less

// requires jquery
$(document).ready(function () {
    if (
        /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)
    ) {
        // nothing
    } else {
        (function () {
            var showChar = 50;
            var ellipsestext = "...";

            $(".truncate").each(function () {
                var content = $(this).html();
                if (content.length > showChar) {
                    var c = content.substr(0, showChar);
                    var h = content;
                    var html =
                        '<div class="truncate-text" style="display:block">' +
                        c +
                        '<span class="moreellipses">' +
                        ellipsestext +
                        '&nbsp;&nbsp;<a href="" class="moreless more">more</a></span></span></div><div class="truncate-text" style="display:none">' +
                        h +
                        '<a href="" class="moreless less">Less</a></span></div>';

                    $(this).html(html);
                }
            });

            $(".moreless").click(function () {
                var thisEl = $(this);
                var cT = thisEl.closest(".truncate-text");
                var tX = ".truncate-text";

                if (thisEl.hasClass("less")) {
                    cT.prev(tX).toggle();
                    cT.slideToggle();
                } else {
                    cT.toggle();
                    cT.next(tX).fadeToggle();
                }
                return false;
            });
            /* end iffe */
        })();
    }

    /* end ready */
});

//Start Login Modal Script

// Get all links that start with #modal
const modalLinks = document.querySelectorAll('a[href^="#book-now"]');

modalLinks.forEach(function (modalLink, index) {
    // Get modal ID to match the modal
    const modalId = modalLink.getAttribute("href");

    // Click on link
    modalLink.addEventListener("click", function (event) {
        // Get modal element
        const modal = document.querySelector(modalId);
        // If modal with an ID exists
        if (modal) {
            // Get close button
            const closeBtn = modal.querySelector(".dialog__close");
            event.preventDefault();
            modal.showModal(); // Open modal

            // Close modal on click
            closeBtn.addEventListener("click", function (event) {
                modal.close();
            });

            // Close modal when clicking outside modal
            document.addEventListener(
                "click",
                function (event) {
                    const dialogEl = event.target.tagName;
                    const dialogElId = event.target.getAttribute("id");
                    if (dialogEl == "DIALOG") {
                        // Close modal
                        modal.close();
                    }
                },
                false
            );

            // If modal ID not exists
        } else {
            console.log("Modal doesn't exist");
        }
    });
});

//End Login Modal Script

//Based on https://codepen.io/zuraizm/pen/vGDHl pen by zuraiz
// jQuery(document).ready(function ($) {

//   startSlider($('#slider'), 30); // Slide container ID, SlideShow interval

//   function startSlider(obj, timer) {

//     var obj, timer;
//     var id = "#" + obj.attr("id");
//     var slideCount = obj.find('ul li').length;
//     slideWidth = obj.attr("data-width");
//     var sliderUlWidth = (slideCount + 1) * slideWidth;
//     var time = 2;
//     var $bar,

//       isPause,
//       tick,
//       percentTime;
//     isPause = false; //false for auto slideshow

//     $bar = obj.find('.progress .bar');

//     function startProgressbar() {
//       resetProgressbar();
//       percentTime = 0;
//       tick = setInterval(interval, timer);
//     }

//     function interval() {
//       if (isPause === false) {
//         percentTime += 1 / (time + 0.1);
//         $bar.css({
//           width: percentTime + "%"
//         });
//         if (percentTime >= 100) {
//           moveRight();
//           startProgressbar();
//         }
//       }
//     }

//     function resetProgressbar() {
//       $bar.css({
//         width: 0 + '%'
//       });
//       clearTimeout(tick);
//     }

//     function startslide() {

//       $(id + ' ul li:last-child').prependTo(id + ' ul');
//       obj.find('ul').css({ width: sliderUlWidth + 'vw', marginLeft: - slideWidth + 'vw' });

//       obj.find('ul li:last-child').appendTo(obj.attr('id') + ' ul');

//     }

//     if (slideCount > 1) {
//       startslide();
//       startProgressbar();
//     }
//     else { // hade navigation buttons for 1 slide only
//       $(id + ' button.control_prev').hide();
//       $(id + ' button.control_next').hide();
//     }

//     function moveLeft() {
//       $(id + ' ul').css({
//         transition: "1s",
//         transform: "translateX(" + slideWidth + "vw)"
//       });

//       setTimeout(function () {

//         $(id + ' ul li:last-child').prependTo(id + ' ul');
//         $(id + ' ul').css({
//           transition: "none",
//           transform: "translateX(" + 0 + "vw)"
//         });

//         $('li.actslide').prev().addClass('actslide').next().removeClass('actslide');
//       }, 1000);

//     }

//     function moveRight2() { // fix for only 2 slades
//       $(id + ' ul li:first-child').appendTo(id + ' ul');

//       $(id + ' ul').css({ transition: "none", transform: "translateX(100vw)" }).delay();

//       setTimeout(function () {

//         $(id + ' ul').css({ transition: "1s", transform: "translateX(0vw)" });

//       }, 100, setTimeout(function () {

//         $(id + ' ul').css({ transition: "none", transform: "translateX(0vw)" });
//         $('li.actslide').next().addClass('actslide').prev().removeClass('actslide');

//       }, 1000));

//     }

//     function moveRight() {
//       if (slideCount > 2) {
//         $(id + ' ul').css({
//           transition: "1s",
//           transform: "translateX(" + (-1) * slideWidth + "vw)"
//         });

//         setTimeout(function () {

//           $(id + ' ul li:first-child').appendTo(id + ' ul');
//           $(id + ' ul').css({
//             transition: "none",
//             transform: "translateX(" + 0 + "vw)"
//           });

//           $('li.actslide').next().addClass('actslide').prev().removeClass('actslide');
//         }, 1000);
//       }
//       else {
//         moveRight2();
//       }
//     }

//     $(id + ' button.control_prev').click(function () {
//       moveLeft();
//       startProgressbar();
//     });

//     $(id + ' button.control_next').click(function () {

//       moveRight();

//       startProgressbar();
//     });

//     $(id + ' .progress').click(function () {
//       if (isPause === false) {
//         isPause = true;
//       }
//       else {
//         isPause = false;
//       }
//     });
//   };
// });

// $(document).ready(function(){

//   $('.offerItemTitle').click(function(){

//     $(this).parents('.offerslide').children('.offerItem').removeClass('active');
//     $(this).parents('.offerslide').children('.offerItem').children('.offerItemTitle').removeClass('hide');
//     $(this).parent('.offerItem').addClass('active');
//     $(this).addClass('hide');

//   });

// });

// Alpha Slider

// const tabsBox = document.querySelector(".tabs-box"),
//   allTabs = tabsBox.querySelectorAll(".tab"),
//   arrowIcons = document.querySelectorAll(".icon i");

// let isDragging = false;

// const handleIcons = (scrollVal) => {
//   let maxScrollableWidth = tabsBox.scrollWidth - tabsBox.clientWidth;
//   arrowIcons[0].parentElement.style.display = scrollVal <= 0 ? "none" : "flex";
//   arrowIcons[1].parentElement.style.display =
//     maxScrollableWidth - scrollVal <= 1 ? "none" : "flex";
// };

// arrowIcons.forEach((icon) => {
//   icon.addEventListener("click", () => {
//     // if clicked icon is left, reduce 350 from tabsBox scrollLeft else add
//     let scrollWidth = (tabsBox.scrollLeft += icon.id === "left" ? -340 : 340);
//     handleIcons(scrollWidth);
//   });
// });

// allTabs.forEach((tab) => {
//   tab.addEventListener("click", () => {
//     tabsBox.querySelector(".active").classList.remove("active");
//     tab.classList.add("active");
//   });
// });

// const dragging = (e) => {
//   if (!isDragging) return;
//   tabsBox.classList.add("dragging");
//   tabsBox.scrollLeft -= e.movementX;
//   handleIcons(tabsBox.scrollLeft);
// };

// const dragStop = () => {
//   isDragging = false;
//   tabsBox.classList.remove("dragging");
// };

// tabsBox.addEventListener("mousedown", () => (isDragging = true));
// tabsBox.addEventListener("mousemove", dragging);
// document.addEventListener("mouseup", dragStop);

// /* ------------------------ Watermark (Please Ignore) ----------------------- */
// const createSVG = (width, height, className, childType, childAttributes) => {
//   const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");

//   const child = document.createElementNS(
//     "http://www.w3.org/2000/svg",
//     childType
//   );

//   for (const attr in childAttributes) {
//     child.setAttribute(attr, childAttributes[attr]);
//   }

//   svg.appendChild(child);

//   return { svg, child };
// };

// document.querySelectorAll(".generate-button").forEach((button) => {
//   const width = button.offsetWidth;
//   const height = button.offsetHeight;

//   const style = getComputedStyle(button);

//   const strokeGroup = document.createElement("div");
//   strokeGroup.classList.add("stroke");

//   const { svg: stroke } = createSVG(width, height, "stroke-line", "rect", {
//     x: "0",
//     y: "0",
//     width: "100%",
//     height: "100%",
//     rx: parseInt(style.borderRadius, 10),
//     ry: parseInt(style.borderRadius, 10),
//     pathLength: "30"
//   });

//   strokeGroup.appendChild(stroke);
//   button.appendChild(strokeGroup);

//   const stars = gsap.to(button, {
//     repeat: -1,
//     repeatDelay: 0.5,
//     paused: true,
//     keyframes: [
//       {
//         "--generate-button-star-2-scale": ".5",
//         "--generate-button-star-2-opacity": ".25",
//         "--generate-button-star-3-scale": "1.25",
//         "--generate-button-star-3-opacity": "1",
//         duration: 0.3
//       },
//       {
//         "--generate-button-star-1-scale": "1.5",
//         "--generate-button-star-1-opacity": ".5",
//         "--generate-button-star-2-scale": ".5",
//         "--generate-button-star-3-scale": "1",
//         "--generate-button-star-3-opacity": ".5",
//         duration: 0.3
//       },
//       {
//         "--generate-button-star-1-scale": "1",
//         "--generate-button-star-1-opacity": ".25",
//         "--generate-button-star-2-scale": "1.15",
//         "--generate-button-star-2-opacity": "1",
//         duration: 0.3
//       },
//       {
//         "--generate-button-star-2-scale": "1",
//         duration: 0.35
//       }
//     ]
//   });

//   button.addEventListener("pointerenter", () => {
//     gsap.to(button, {
//       "--generate-button-dots-opacity": "1",
//       duration: 0.5,
//       onStart: () => {
//         setTimeout(() => stars.restart().play(), 500);
//       }
//     });
//   });

//   button.addEventListener("pointerleave", () => {
//     gsap.to(button, {
//       "--generate-button-dots-opacity": "0",
//       "--generate-button-star-1-opacity": ".25",
//       "--generate-button-star-1-scale": "1",
//       "--generate-button-star-2-opacity": "1",
//       "--generate-button-star-2-scale": "1",
//       "--generate-button-star-3-opacity": ".5",
//       "--generate-button-star-3-scale": "1",
//       duration: 0.15,
//       onComplete: () => {
//         stars.pause();
//       }
//     });
//   });
// });

//Testimonials Slider

// var multipleCardCarousel = document.querySelector("#carouselExampleControls");
// function goToPreviousSlide() {
//     if (scrollPosition < carouselWidth - cardWidth * 3) {
//         scrollPosition += cardWidth;
//         $("#carouselExampleControls .carousel-inner").animate(
//             { scrollLeft: scrollPosition },
//             600
//         );
//     } else {
//         scrollPosition = 0;
//     }
// }
// if (window.matchMedia("(min-width: 576px)").matches) {
//     var carousel = new bootstrap.Carousel(multipleCardCarousel, {
//         interval: false,
//     });
//     var carouselWidth = $(".carousel-inner")[0].scrollWidth;
//     var cardWidth = $(".carousel-item").width();
//     var scrollPosition = 0;
//     $("#carouselExampleControls .carousel-control-next").on(
//         "click",
//         function () {
//             if (scrollPosition < carouselWidth - cardWidth * 3) {
//                 scrollPosition += cardWidth;
//                 $("#carouselExampleControls .carousel-inner").animate(
//                     { scrollLeft: scrollPosition },
//                     600
//                 );
//             }
//         }
//     );
//     $("#carouselExampleControls .carousel-control-prev").on(
//         "click",
//         function () {
//             goToPreviousSlide();
//             if (scrollPosition > 0) {
//                 scrollPosition -= cardWidth;
//                 $("#carouselExampleControls .carousel-inner").animate(
//                     { scrollLeft: scrollPosition },
//                     600
//                 );
//             }
//         }
//     );
// } else {
//     $(multipleCardCarousel).addClass("slide");
// }
// setInterval(goToPreviousSlide, 3000);

// var multipleCardCarousel = document.querySelector("#carouselExampleControls");

// if (window.matchMedia("(min-width: 576px)").matches) {
//   var carousel = new bootstrap.Carousel(multipleCardCarousel, {
//     interval: true
//   });
//   var carouselWidth = $(".carousel-inner")[0].scrollWidth;
//   var cardWidth = $(".carousel-item").width();
//   var scrollPosition = 0;
//   $("#carouselExampleControls .carousel-control-next").on("click", function () {
//     if (scrollPosition < carouselWidth - cardWidth * 5) {
//       scrollPosition += cardWidth;
//       $("#carouselExampleControls .carousel-inner").animate(
//         { scrollLeft: scrollPosition },
//         600
//       );
//     }
//   });
//   $("#carouselExampleControls .carousel-control-prev").on("click", function () {
//     if (scrollPosition > 0) {
//       scrollPosition -= cardWidth;
//       $("#carouselExampleControls .carousel-inner").animate(
//         { scrollLeft: scrollPosition },
//         600
//       );
//     }
//   });
// } else {
//   $(multipleCardCarousel).addClass("slide");
// }

// ------ Searchable Select

// ----------------------- onlick
