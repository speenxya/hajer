$.tabs1 = function(selector, start,slider1,slider2,slider3,slider4) { 
	$(selector).each(function(i, element) {
		$($(element).attr('tab')).css('display', 'none');
		$(element).click(function() {
			$(selector).each(function(i, element) {
				$(element).removeClass('selected1');
				$(element).parent('td').removeClass('selectedtd1');
				
				$($(element).attr('tab')).css('display', 'none');
			});
			
			$(this).addClass('selected1');
			$(this).parent('td').addClass('selectedtd1');
			
			$($(this).attr('tab')).css('display', 'block');
			//alert($(this).attr('tab'))
			//if($(this).attr('tab')=='#flexible'){
											//alert("gwt")
											//slider1.destroySlider()
				
				 slider1.reloadSlider()
				 slider2.reloadSlider()
				 slider3.reloadSlider()
				 slider4.reloadSlider()
  
 			//}
				
			//}
			
			
		});
	});
	
	if (!start) {
		start = $(selector + ':first').attr('tab');
	}

	$(selector + '[tab=\'' + start + '\']').trigger('click');
};

  function animateme1(){
	  $('.menu1 a').off('click')
	  var x=$(this).attr('number')
	  
	  $('.page').removeClass("selected")
    slider1.goToSlide(x)
	$('#page'+x).addClass("selected")
}
