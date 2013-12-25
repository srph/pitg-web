/**
 * Call a modal if JS is enabled.
 * Otherwise, redirect him to the page
 */
function modal() {
	var link = $('a');	// Dive into the DOM and find links
		// When a link is clicked
	link.on('click', function() {
			// Load all from the DOM at once
		var $this = $(this),
			toggle = $this.data('toggle'),
			target = $this.data('target');
			// If data-toggle is a modal
		if(toggle === 'modal') {				
			 // If its target data (data-target) is defined, inherit its value
			if(typeof target !== undefined) $this.attr('href', target);
		}
	});
}

modal();

/**
 * Add an active class if the navigation (URI)
 * matches the current URI
 */
function activeNavigation() {
	var links = $('li');

	links.each(function() {
		var $this = $(this);
		var url = $('a', $(this));
		var url_window = window.location.href

		if(url.attr('href') === url_window) {
			$this.addClass('active');
		}
	});
}

activeNavigation();