$.tabs = function(selector, start) { 
	$(selector).each(function(i, element) {
		$($(element).attr('tab')).css('display', 'none');
		$(element).click(function() {
			$(selector).each(function(i, element) {
				$(element).removeClass('selected');
				$(element).parent('td').removeClass('selectedtd');
				
				$($(element).attr('tab')).css('display', 'none');
			});
			
			$(this).addClass('selected');
			$(this).parent('td').addClass('selectedtd');
			
			$($(this).attr('tab')).css('display', 'block');
		});
	});
	
	if (!start) {
		start = $(selector + ':first').attr('tab');
	}

	$(selector + '[tab=\'' + start + '\']').trigger('click');
};