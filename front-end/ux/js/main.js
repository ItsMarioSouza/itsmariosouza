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
	// MISC THINGS
	––––––––––––––––––––––––––––––––———————————————— */
	// Remove empty <p> tags that WYSIWYGs add
	$('p:empty').remove();

}); // document ready function
