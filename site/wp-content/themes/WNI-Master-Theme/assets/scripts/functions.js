/**
* WebsiteNI Joints
* WebsiteNI Starter Theme built on JointsWP; http://jointswp.com/.
* Created by WebsiteNI.
*/
(function ($) {
	$(document).ready(function () {
		afterPageLoad();
		//blacklist();
	});

	 document.addEventListener('DOMContentLoaded', () => {

	gsap.to('.pagefadein', {
		  autoAlpha: 1,  // fades in & sets visibility to visible
		  duration: 0.55,
		  ease: 'power1.out',
		  delay: 0.1
		});

  });

	function afterPageLoad() {

		 let smoother = ScrollSmoother.create({
      wrapper: '#smooth-wrapper',
      content: '#smooth-content',
      smooth: 1.3,
      effects: true
    });

		if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
			gsap.registerPlugin(ScrollTrigger);
		}

		function initFadeInUpAnimations() {
			if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
				return;
			}

			$('.fade-in-up').removeAttr('data-fade-in-up-animated');

			$('.fade-in-up').each(function () {
				var $group = $(this).parent().children('.fade-in-up').filter(function () {
					return !this.hasAttribute('data-fade-in-up-animated');
				});

				if ($group.length <= 1) {
					return;
				}

				$group.attr('data-fade-in-up-animated', 'true');

				gsap.fromTo($group.toArray(),
					{
						autoAlpha: 0,
						y: 40
					},
					{
						autoAlpha: 1,
						y: 0,
						duration: 0.8,
						ease: 'power2.out',
						stagger: 0.18,
						scrollTrigger: {
							trigger: $group.parent()[0],
							start: 'top 85%',
							toggleActions: 'play none none none',
							once: true
						}
					}
				);
			});

			gsap.utils.toArray('.fade-in-up').forEach(function (element) {
				if (element.hasAttribute('data-fade-in-up-animated')) {
					return;
				}

				element.setAttribute('data-fade-in-up-animated', 'true');

				gsap.fromTo(element,
					{
						autoAlpha: 0,
						y: 40
					},
					{
						autoAlpha: 1,
						y: 0,
						duration: 0.8,
						ease: 'power2.out',
						scrollTrigger: {
							trigger: element,
							start: 'top 85%',
							toggleActions: 'play none none none',
							once: true
						}
					}
				);
			});
		}

		function initProjectsCardsAnimation() {
			if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
				return;
			}

			gsap.utils.toArray('.projects-cards-row').forEach(function (row) {
				var cards = row.querySelectorAll('.project-card');
				var isDesktop = window.matchMedia('(min-width: 1024px)').matches;

				if (!cards.length) {
					return;
				}

				gsap.fromTo(cards,
					{
						autoAlpha: 0,
						filter: 'blur(18px)',
						scale: 0.96,
						y: function (index) {
							return isDesktop && index === 0 ? 240 : 0;
						}
					},
					{
						autoAlpha: 1,
						filter: 'blur(0px)',
						scale: 1,
						y: function (index) {
							return isDesktop && index === 0 ? 100 : 0;
						},
						duration: 1.05,
						ease: 'power3.out',
						stagger: 0.16,
						scrollTrigger: {
							trigger: row,
							start: 'top 85%',
							toggleActions: 'play none none none',
							once: true
						}
					}
				);
			});
		}


		function benefitsGridAnimation() {
  const slider = document.querySelector('.benefitsSwiper');
  if (!slider || typeof gsap === 'undefined') return;

  const cards = slider.querySelectorAll('.benefit-card');
  const icons = slider.querySelectorAll('.benefits-grid-icon-wrap');
  const numbers = slider.querySelectorAll('.benefits-grid-number');

  gsap.set(cards, { opacity: 0, y: 50 });
  gsap.set(icons, { opacity: 0, scale: 0.8 });
  gsap.set(numbers, { opacity: 0, y: 20 });

  const tl = gsap.timeline({
    scrollTrigger: {
      trigger: slider,
      start: 'top 80%',
      once: true
    }
  });

  tl.fromTo(
    slider,
    { opacity: 0, y: 30 },
    { opacity: 1, y: 0, duration: 0.6, ease: 'power2.out' }
  )
    .to(cards, {
      opacity: 1,
      y: 0,
      duration: 0.7,
      stagger: 0.12,
      ease: 'power3.out'
    }, '-=0.3')
    .to(icons, {
      opacity: 1,
      scale: 1,
      duration: 0.45,
      stagger: 0.1,
      ease: 'back.out(1.7)'
    }, '-=0.45')
    .to(numbers, {
      opacity: 1,
      y: 0,
      duration: 0.45,
      stagger: 0.1,
      ease: 'power2.out'
    }, '-=0.5');
}


		function moveCompanyOverviewActions() {
			var $actions = $('.company-overview-actions');
			var $desktopHost = $('.company-overview-actions-host--desktop');
			var $mobileHost = $('.company-overview-actions-host--mobile');

			if (!$actions.length || !$desktopHost.length || !$mobileHost.length) {
				return;
			}

			var $targetHost = window.matchMedia('(min-width: 1024px)').matches ? $desktopHost : $mobileHost;

			if (!$actions.parent().is($targetHost)) {
				$actions.appendTo($targetHost);
			}
		}

		function equalizeBenefitCardHeights(swiper) {
			if (!swiper || !swiper.slides || !swiper.slides.length) {
				return;
			}

			var visibleSlides = swiper.visibleSlides && swiper.visibleSlides.length
				? swiper.visibleSlides
				: swiper.slides;
			var maxHeight = 0;

			$(swiper.slides).find('.card-inner').css('height', '');

			$(visibleSlides).each(function () {
				var $cardInner = $(this).find('.card-inner');

				if (!$cardInner.length) {
					return;
				}

				maxHeight = Math.max(maxHeight, $cardInner.outerHeight());
			});

			if (!maxHeight) {
				return;
			}

			$(visibleSlides).find('.card-inner').css('height', maxHeight + 'px');
		}

		moveCompanyOverviewActions();
		initFadeInUpAnimations();
		initProjectsCardsAnimation();
		benefitsGridAnimation();
		$(window).on('resize', moveCompanyOverviewActions);



		// First Swiper - banner-swiper
		if ($('.bannerSwiper').length) {
			var swiper1 = new Swiper('.bannerSwiper', {
				slidesPerView: 1,
				spaceBetween: 20,
				loop: true,
				effect: 'fade', // Add fade effect
				fadeEffect: {
					crossFade: true // Smooth crossfade
				},
				pagination: {
					el: '.bannerSwiper .swiper-pagination',
					clickable: true,
				},
				navigation: {
					nextEl: '.bannerSwiper .swiper-button-next',
					prevEl: '.bannerSwiper .swiper-button-prev',
				},
				autoplay: false
			});
		}

		// Benefits Swiper
		if ($('.benefitsSwiper').length) {
			var benefitsSwiper = new Swiper('.benefitsSwiper', {
				slidesPerView: 1,
				spaceBetween: 20,
				loop: true,

				slidesOffsetBefore: 30,
				slidesOffsetAfter: 30,
				breakpoints: {
					640: {
						slidesPerView: 1.8,
						spaceBetween: 20,
						slidesOffsetBefore: 0,
						slidesOffsetAfter: 0
					},
					1024: {
						slidesPerView: 2.4,
						spaceBetween: 24,
						slidesOffsetBefore: 0,
						slidesOffsetAfter: 0
					},
					1440: {
						slidesPerView: 3,
						spaceBetween: 26,
						slidesOffsetBefore: 0,
						slidesOffsetAfter: 0
					}
				},
				on: {
					init: function () {
						equalizeBenefitCardHeights(this);
					},
					resize: function () {
						equalizeBenefitCardHeights(this);
					},
					breakpoint: function () {
						equalizeBenefitCardHeights(this);
					},
					slideChangeTransitionEnd: function () {
						equalizeBenefitCardHeights(this);
					}
				}
			});

			equalizeBenefitCardHeights(benefitsSwiper);
		}
		// Second Swiper - mySwiper-2
		// if ($('.mySwiper-2').length) {
		//     var swiper2 = new Swiper('.mySwiper-2', {
		//         slidesPerView: 3,
		//         spaceBetween: 30,
		//         loop: false,
		//         pagination: {
		//             el: '.mySwiper-2 .swiper-pagination',
		//             clickable: true,
		//         },
		//         navigation: {
		//             nextEl: '.mySwiper-2 .swiper-button-next',
		//             prevEl: '.mySwiper-2 .swiper-button-prev',
		//         },
		//         breakpoints: {
		//             640: {
		//                 slidesPerView: 2,
		//                 spaceBetween: 20,
		//             },
		//             1024: {
		//                 slidesPerView: 3,
		//                 spaceBetween: 30,
		//             },
		//         },
		//     });
		// }


		/* Make WordPress, Foundation and AJAX (Page Transition) play nice together. */
		var body = $('body'), _window = $(window);

		$('.accordion').foundation();

		$('.accordion p:empty, .orbit p:empty').remove();

		$('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').each(function () {
			if ($(this).innerWidth() / $(this).innerHeight() > 1.5) {
				$(this).wrap("<div class='widescreen responsive-embed'/>");
			} else {
				$(this).wrap("<div class='responsive-embed'/>");
			}
		});


		/* Hamburger. */
		// $('.hamburger').on('click', function() {
		// 	$(this).toggleClass('is-active');
		// 	$('.navigation-overlay').toggleClass('is-active');
		// 	$('.wrapper').toggleClass('hamburger-is-active');
		// });
		// $('.navigation-overlay .primary-menu').prepend('<a class="close" href="#"><img src="/site/wp-content/themes/WNI-Master-Theme/assets/images/header/close.svg" alt="Close menu"/></a>');

		$('.navigation-overlay .close').click(function () {
			$('.navigation-overlay').removeClass('is-active');
			$('.wrapper').removeClass('hamburger-is-active');
			$('.hamburger').removeClass('is-active');
		});

		$('.hamburger').on('click', function () {
			var $overlay = $('.navigation-overlay');

			$(this).toggleClass('is-active');
			$overlay.toggleClass('is-active');
			$('.wrapper').toggleClass('hamburger-is-active');
		});

		$('li.menu-item-has-children a').on('click', function () {
			$(this).toggleClass('is-active');
			$(this).next('.sub-menu').toggleClass('sub-menu-is-active');
		});

		/* Cookie Policy. */
		if (localStorage.getItem('popState') != 'shown') {
			$('.cookie-policy').delay(2500).fadeIn();
			localStorage.setItem('popState', 'shown');
		}

		$('.cookie-policy, .cookie-policy-close').click(function (event) {
			$('.cookie-policy').fadeOut();
		});

		/* Search (including Voice Search). */
		$('.search-open').on('click', function () {
			$('.wrapper').addClass('search-is-active');

			setTimeout(function () {
				$('.search-input').focus();
			}, 500);
		});

		$('.search-close').on('click', function () {
			$('.wrapper').removeClass('search-is-active');
		});


		$('.mfp_gallery_image').magnificPopup({
			type: 'image',
			image: {
				titleSrc: 'name'
			},
			gallery: {
				enabled: true
			}
		});

		$(function () {
			activate('img[src*=".svg"]');

			function activate(string) {
				jQuery(string).each(function () {
					var $img = jQuery(this);
					var imgID = $img.attr('id');
					var imgClass = $img.attr('class');
					var imgURL = $img.attr('src');

					if ($(this).hasClass("editsvg")) {

						jQuery.get(imgURL, function (data) {
							// Get the SVG tag, ignore the rest
							var $svg = jQuery(data).find('svg');

							// Add replaced image's ID to the new SVG
							if (typeof imgID !== 'undefined') {
								$svg = $svg.attr('id', imgID);
							}
							// Add replaced image's classes to the new SVG
							if (typeof imgClass !== 'undefined') {
								$svg = $svg.attr('class', imgClass + ' replaced-svg');
							}

							// Remove any invalid XML tags as per http://validator.w3.org
							$svg = $svg.removeAttr('xmlns:a');

							// Replace image with new SVG
							$img.replaceWith($svg);

						}, 'xml');
					}
				});
			}
		});

		/* Magnific Popup. */
		$('.mfp-instance').magnificPopup({
			preloader: false,
			mainClass: 'mfp-fade',
			type: 'inline',
			removalDelay: 250,
			fixedContentPos: true
		});

		// /* Wow. */
		// var wow = new WOW({mobile: false});

		// wow.init();
	}


})(jQuery);
