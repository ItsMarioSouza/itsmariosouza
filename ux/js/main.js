// Main JS File
// jQuery.noConflict();

jQuery(document).ready(function($) {

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
	// AOS Scroll Animations
	––––––––––––––––––––––––––––––––———————————————— */
	// Apply Initial delays
	function staggerFadeIn() {
		//local variables
		var $gridItem = $('.grid__item--blog');

		//apply transition to all items
		$($gridItem).each(function(index) {
			$(this).css({'transition-delay': .1*(0 + index) + 's'});
		});
	};

	//apply transition to all items
	if (window.innerWidth >= 576) {
		staggerFadeIn();
	}

	// Inititate AOS
	$(function() {
		AOS.init({
			offset: 30,
			duration: 750,
			once: 'true'
		});
	});



	/* ––––––––––––––––––––––––––––––––————————————————
	// Work Page Post Filters
	––––––––––––––––––––––––––––––––———————————————— */
	function filterWorkPosts() {
		var $filter = $('#filter');
		var $filterLabelText = $('.grid__filter-label').text();

		$($filter).submit(function() {
			$.ajax({
				url: myAjax.ajaxURL,
				data: $filter.serialize(), // form data
				type: $filter.attr('method'), // POST
				beforeSend: function(xhr) {
					$('.grid__filter-label').text('Loading Posts...');
				},
				success: function(data) {
					setTimeout(function() {
						$('.grid__filter-label').text($filterLabelText);
						$('.grid__list').html(data); // insert data
						staggerFadeIn();
					}, 1000);
				}
			});
			return false;
		});

		$($filter).submit();
	};

	if ($('.contentContainer--blog').length > 0) {
		$('#filter input[type="radio"]').on('click', function() {
			filterWorkPosts();

			$('.grid__filter label').each(function() {
				$(this).removeClass('active');
			});

			$(this).prev().addClass('active');
		});

	}




	/* ––––––––––––––––––––––––––––––––————————————————
	// MISC THINGS
	––––––––––––––––––––––––––––––––———————————————— */
	// Remove empty <p> tags that WYSIWYGs add
	$('p:empty').remove();

}); // document ready function