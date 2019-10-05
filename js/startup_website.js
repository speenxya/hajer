$(function(){
	//animate to the text
	//var scrollpos=$('.subtitle').offset().top
	//alert($('.printable').height())
	//if($('.printable').height()>190){
	//$('body').animate({'scrollTop':scrollpos},'500')
	//}
	
	
	
	 $('.box1').hover(function(){
							  $(this).stop().animate({'height':'220px'},500)
							  }
							  ,
					  function(){
						  $(this).stop().animate({'height':'92px'},500)
					  })
	 
	 $('.box2').hover(function(){
							  $(this).stop().animate({'height':'215px'},500)
							  }
							  ,
					  function(){
						  $(this).stop().animate({'height':'62px'},500)
					  }) 
	
	$('.menuu').hover(function(e){
			if($(this).attr("go")=='1'){
				//$(this).attr("background",'../images/menu-over.jpg')
				$(this).find('span').css("display",'block')
				$(this).find('a:first').css("color",'#000000')
			}
		},
		function(e){
		
				if($(this).attr("go")=='1'){
					$(this).find('span').css("display",'none')
					$(this).find('a:first').css("color",'#666666')
					//$(this).attr("background",'../images/menu.jpg')
					//$(this).attr("bgcolor",'transparent')
				}
		}
		)
		
		
		$('.submenuable').click(function(e){
			
				if($(this).children('div:first').is(':hidden')){
					var goon="1"
				}else{
					var goon="0"
				}
			$('.submenuable').each(function(){	
			$(this).children('div:first').slideUp()
			})
			
			//e.preventDefault();
		    //e.stopPropagation();
			if(goon=="1"){
			$(this).children('div:first').slideDown()
			}
			})
		
	})


