/* ===================================================================

		Theme Name: Wokoya | Laravel CMS
		Author: Ducor
		Version: 1.0

* ================================================================= */

//alert(location.hostname );
if (location.protocol !== 'https:' && location.hostname != '127.0.0.1') {
    location.replace(`https:${location.href.substring(location.protocol.length)}`);
}


jQuery(document).ready(function () {

	"use strict";

	// Preloader
	// $(window).on("load", function () {
	// 	$('.lds-ellipsis').fadeOut(); // will first fade out the loading animation
	// 	$('.preloader').delay(1).fadeOut('slow'); // will fade out the white DIV that covers the website.
	// 	$('body').delay(1);
	// });

	$(document).ready(function () {
		setTimeout(function () {
			$('.lds-ellipsis').fadeOut(); // will first fade out the loading animation
			$('.preloader').delay(1).fadeOut('slow'); // will fade out the white DIV that covers the website.
			$('body').delay(1);
		 }, 3000);
	});

	// Header Sticky

	$(window).scroll(function () {
		$(window).scrollTop() >= 50 ? $(".sticky").addClass("stickyadd") : $(".sticky").removeClass("stickyadd")
	})

	$(document).on("click", ".navbar-collapse.show", function (e) {
		$(e.target).is("a") && $(this).collapse("hide")
	})

	$(".navbar-nav a, .scroll_down a").click(function (e) {
		var a = $(this);
		$("html, body").stop().animate({
			scrollTop: $(a.attr("href")).offset().top - 0
		}, 1500, "easeInOutExpo"), e.preventDefault()
	})

	$("#navbarCollapse").scrollspy({
		offset: 20
	})



	/* ==================================================
		# Smooth Scroll
	 =============================================== */

	// Sections Scroll
	if ($("body").hasClass("side-header")) {
		$('.smooth-scroll').click(function () {
			event.preventDefault();
			var sectionTo = $(this).attr('href');
			$('html, body').stop().animate({
				scrollTop: $(sectionTo).offset().top
			}, 1500, 'easeInOutExpo');
		});
	} else {
		$('.smooth-scroll').click(function () {
			event.preventDefault();
			var sectionTo = $(this).attr('href');
			$('html, body').stop().animate({
				scrollTop: $(sectionTo).offset().top - 10
			}, 1500, 'easeInOutExpo');
		});
	}

	/* ==================================================
	   # Scroll to top
	=============================================== */
	//Get the button
	var mybutton = document.getElementById("scrtop");

	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function () { scrollFunction() };

	function scrollFunction() {
		if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 10) {
			mybutton.style.display = "block";
		} else {
			mybutton.style.display = "none";
		}
	}

	/*------------------------------------
		WOW animation
	-------------------------------------- */

	$(".wow").each(function () {
		if ($(window).width() > 767) {
			var wow = new WOW({
				boxClass: 'wow',
				animateClass: 'animated',
				offset: 0,
				mobile: true,
				live: true
			});
			new WOW().init();
		}
	});


	/* ==================================================
		Preloader Init
	 ===============================================*/
	$(window).on("load", function () {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");
	});


	/* ==================================================
	   Mouse Animation
   ================================================== */

	function theme_tm_cursor() {

		var myCursor = jQuery('.mouse-cursor');

		if (myCursor.length) {
			if ($("body")) {
				const e = document.querySelector(".cursor-inner"),
					t = document.querySelector(".cursor-outer");
				let n, i = 0,
					o = !1;
				window.onmousemove = function (s) {
					o || (t.style.transform = "translate(" + s.clientX + "px, " + s.clientY + "px)"), e.style.transform = "translate(" + s.clientX + "px, " + s.clientY + "px)", n = s.clientY, i = s.clientX
				}, $("body").on("mouseenter", "a, .cursor-pointer", function () {
					e.classList.add("cursor-hover"), t.classList.add("cursor-hover")
				}), $("body").on("mouseleave", "a, .cursor-pointer", function () {
					$(this).is("a") && $(this).closest(".cursor-pointer").length || (e.classList.remove("cursor-hover"), t.classList.remove("cursor-hover"))
				}), e.style.visibility = "visible", t.style.visibility = "visible"
			}
		}
	};
	theme_tm_cursor()

}); // end document ready function
