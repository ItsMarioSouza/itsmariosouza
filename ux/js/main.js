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
		if ($('.contentContainer--blog').length > 0) {
			var $filter = $('#filter'),
				$gridList = $('.grid__list'),
				$FilterLabel = $('.grid__filter-label'),
				$filterLabelText = $($FilterLabel).text();

			function filterWorkPosts($category) {
				$($filter).off('submit');

				$($filter).on('submit', function() {
					$.ajax({
						url: myAjax.ajaxURL,
						data: $filter.serialize(), // Form data
						type: $filter.attr('method'), // GET
						beforeSend: function(xhr) {
							$($FilterLabel).text('Loading Posts...');
						},
						success: function(data) {
							var $gridHeight = $($gridList).height();

							$($gridList)
								.css({'height' : $gridHeight + 'px'})
								.children()
								.fadeOut();

							setTimeout(function() {
								$($FilterLabel).text($filterLabelText);
								$($gridList).html(data); // Insert data
								aosDelay();
								$($gridList).css('height', 'auto');
							}, 500);
						}
					});
					return false;
				});

				$($filter).submit();
			}

			function getURL() {
				$urlQuery = new URLSearchParams(window.location.search),
				$urlCat = $urlQuery.get('category');

				if ($urlCat) {
					selectRadio($urlCat);
				} else {
					selectRadio('all');
				}
			}

			function selectRadio($category) {
				$($filter).find('input[type="radio"]').attr('checked', '');
				$($filter).find('label').removeClass('active');

				$($filter)
					.find('input[value="' + $category + '"]')
					.attr('checked', 'checked')
					.prev().addClass('active');
			}

			$($filter).find('input[type="radio"]').on('change', function() {
				// Get the category when a radio is selected
				var $category = $(this).val(),
					$categoryQuery = '?category=' + $category;

				// console.log('Radio on change category: ' + $category);

				window.history.pushState($category, null, $categoryQuery);

				selectRadio($category);

				filterWorkPosts($category);
			});

			// Update content with browser back and forward buttons
			window.addEventListener('popstate', function() {
				var $category = history.state;

				// console.log('Popstate... location: ' + document.location + ' & history: ' + history.state);

				// History does not exist is user loads page with query string, history is null
				if ($category) {
					selectRadio($category);
				} else {
					getURL();
				}

				filterWorkPosts($category);
			});

			// Show active state on load
			getURL();
		}
	});



	/* ––––––––––––––––––––––––––––––––————————————————
	// MISC THINGS
	––––––––––––––––––––––––––––––––———————————————— */
	// Remove empty <p> tags that WYSIWYGs add
	$('p:empty').remove();

}); // document ready function