(function($){

	// SEARCH BUTTON
	var searchBtn = $('#search-button'),
		searchForm = searchBtn.next(),
		isOpen = false;

	searchBtn.on('click', function(e){

		if(!isOpen){
			searchForm.fadeIn();
			isOpen = true;
		} else {
			searchForm.fadeOut();
			isOpen = false;
		}

	});

})(jQuery);