$(function(){
	if($("a.modify_iframe").length!=0){
	$("a.modify_iframe").fancybox({ //starting fancybox
		'hideOnContentClick': true,
		'type': 'iframe',
		'width'				: '90%',
		'height'			: '100%',
        'autoScale'     	: false,
		helpers: {
			overlay: {
			  locked: false
			}
		  }
	});
	}
	})