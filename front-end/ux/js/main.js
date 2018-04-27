// Main JS File

$(document).ready(function() {

	/* ––––––––––––––––––––––––––––––––————————————————
	// GLOBAL VARIABLES
	––––––––––––––––––––––––––––––––———————————————— */
	var html = $('html');
	var body = $('body');


	/* ––––––––––––––––––––––––––––––––————————————————
	// Open & Close Mobile Nav
	––––––––––––––––––––––––––––––––———————————————— */
	$(function() {
		var navicon = $('.navicon-js');
		var modal = $('.modal-js');

		function openNav() {
			$(html).addClass('nav-open').removeClass('nav-closed');
			$(modal).addClass('is-active');
		}

		function closeNav() {
			$(html).addClass('nav-closed').removeClass('nav-open');
			$(modal).removeClass('is-active');
		}

		$(navicon).on('click', function() {
			$(this).toggleClass("is-active");

			if ( $(html).hasClass('nav-open') ) {
				closeNav();
			} else if ( $(html).hasClass('nav-closed') ) {
				openNav();
			}
		});
	});


	/* ––––––––––––––––––––––––––––––––————————————————
	// Inititiate AOS Scroll Animations
	––––––––––––––––––––––––––––––––———————————————— */
	$(function() {
		//local variables
		var $gridItem = $('.grid__item--blog');

		//apply transition to all items
		if (window.innerWidth >= 576) {
			$($gridItem).each(function(index) {
				$(this).css({'transition-delay': .1*(0 + index) + 's'});

				console.log("initial delay applied");
			});
		}

		//inititate AOS
		AOS.init({
			offset: 25,
			duration: 750,
			once: 'true'
		});

		//Check and delay new elemets that have not been animated
		if (window.innerWidth >= 576) {
			$(document).on('scroll', function() {
				var $gridItem2 = $('.grid__item--blog').not('.aos-animate');

				$($gridItem2).each(function(index) {
					$(this).css({'transition-delay': .1*(0 + index) + 's'});

					console.log("secondary delay applied");
				});
			});
		}
	});




	/* ––––––––––––––––––––––––––––––––————————————————
	// MISC THINGS
	––––––––––––––––––––––––––––––––———————————————— */
	// Remove empty <p> tags that WYSIWYGs add
	$('p:empty').remove();

}); // document ready function
