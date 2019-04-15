// Main JS File

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
	function aosDelay() {
		var $gridItem = $('.grid__item--blog');

		// apply transition to all items
		$($gridItem).each(function(index) {
			$(this).css({'transition-delay': .1 * (0 + index) + 's'})
		});

		// apply transition to not yet animated items
		$(document).on('scroll', function() {
			setTimeout(function() {
				var $gridItem2 = $('.grid__item--blog').not('.aos-animate');

				$($gridItem2).each(function(index) {
					$(this).css({'transition-delay': .1 * (0 + index) + 's'});
				});
			}, 500);
		});
	};

	aosDelay();

	AOS.init({
		offset: 30,
		duration: 750,
		once: 'true'
	});


	/* ––––––––––––––––––––––––––––––––————————————————
	// Work Page Post Filters
	––––––––––––––––––––––––––––––––———————————————— */
	$(function() {
		var $filter = $('#filter'),
			$gridList = $('.grid__list'),
			$FilterLabel = $('.grid__filter-label'),
			$filterLabelText = $($FilterLabel).text();

		function filterWorkPosts($category) {
			$($filter).off('submit');

			$($filter).submit(function() {
				$.ajax({
					url: myAjax.ajaxURL,
					data: $filter.serialize(), // Form data
					type: $filter.attr('method'), // POST
					beforeSend: function(xhr) {
						$($FilterLabel).text('Loading Posts...');
					},
					success: function(data) {
						var $gridHeight = $($gridList).height();
						$($gridList).css({'height' : $gridHeight + 'px'});
						$($gridList).children().fadeOut();

						setTimeout(function() {
							$($FilterLabel).text($filterLabelText);
							$($gridList).html(data); // Insert data
							aosDelay();
							$($gridList).css('height', 'auto');
						}, 500);

						window.history.pushState(null, null, '?categoryfilter=' + $category);
					}
				});
				return false;
			});

			$($filter).submit();
		}

		if ($('.contentContainer--blog').length > 0) {
			$($filter).find('input[type="radio"]').on('change', function() {

				var $category = $(this).val();

				filterWorkPosts($category);

				$($filter).find('label').removeClass('active');

				$($filter).find('input').removeAttr('checked');
				$(this).attr('checked', 'checked');

				$(this).prev().addClass('active');
				$($filter).find('input[type="radio"]:checked').prev().addClass('active');
			});
		}

		$($filter).find('input[type="radio"]:checked').prev().addClass('active');
	});


	/* ––––––––––––––––––––––––––––––––————————————————
	// MISC THINGS
	––––––––––––––––––––––––––––––––———————————————— */
	// Remove empty <p> tags that WYSIWYGs add
	$('p:empty').remove();

}); // document ready function