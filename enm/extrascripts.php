<script>
function change_account_location(x){
	if(x!=''){
		window.location=x
	}
}

jQuery(window).bind("pageshow", function(event) {
    jQuery(".pagechange").hide();
});

jQuery(function($j) {
    
     jQuery(".pageshower").click(function(){
        var cont='1';
        if(cont=='1'){
		//jQuery('.pagechange').show()
        }
		})
    
    
    jQuery("b").click(function(){
        return true;
        var cont='1';
        if(jQuery(this).parent().hasClass("product__inside__image")){
            cont='0';
            
            }
            if(jQuery(this).attr("href")=='#off-canvas-menu'){
                  cont='0';
                  
                }
                
                if(jQuery(this).attr("rel")=='itsacart'){
                  cont='0';
                  
                }
                
                if(jQuery(this).attr("data-zoom-image")!=''  && jQuery(this).attr("data-zoom-image")!=undefined){
                  cont='0';
                  
                }
                
                
                 if(jQuery(this).attr("href")=='javascript:history.go(-1)'){
                  cont='0';
                }
        
        if(cont=='1'){
		jQuery('.pagechange').show()
        }
		})
	
	jQuery(".menuholder").click(function(){
		jQuery(this).next('.expander-list').toggle(500)
		})
		
	if ( jQuery( "a.inlinevid" ).length ) {	
	jQuery("a.inlinevid").fancybox({ //for the send to a friend
		'hideOnContentClick': true,
		'padding'           :0,
        'type': 'iframe',
		'overlayShow':false
		
	});	
    }
    
    if ( jQuery( "a.inline" ).length ) {
    
    	jQuery("a.inline").fancybox({ //for the send to a friend
		'hideOnContentClick': true,
		'padding'           :0,
		'overlayShow':false
		
	});	
    }
    
    if ( jQuery( "a.inline_i" ).length ) {
	
	jQuery("a.inline_i").fancybox({ //for the send to a friend
		'hideOnContentClick': true,
		'padding'           :0,
		'overlayShow':false,
		 'type':'iframe',
		  helpers: {
			overlay: {
			  locked: false
			}
		  }
		
	});
    }
    
    var clickCount = 0;
    jQuery(".footeritem").click(function(e){
        
        if(clickCount == 0)
                   {
                       clickCount++;
                       return true;
                   }
                   else
                   {
                       return false;
                   }
        
        
    })
	
	jQuery('.showcateg').hover(function(){
		                         var id=jQuery(this).attr('id')
		                        jQuery('.showcatdata').hide()
								 jQuery('.'+id).show()
								 
		                        }
						     ,function(){
								 })
                                 
                                 
                                 	jQuery('.footerhover').hover(function(){
		                          jQuery(this).addClass("mactive")
								 
		                        }
						     ,function(){
						      jQuery(this).removeClass("mactive")
								 })
                                 
                                 
	
	jQuery('.shopping-cart').hover(function(){
		                         
		                        jQuery(this).find('.mshoppingcart_data').show()
								 jQuery.post( "topcart.php", function( data ) {
									   jQuery('.mshoppingcart_content').html( data );
									});
		                        }
						     ,function(){
								  jQuery(this).find('.mshoppingcart_data').hide()
								 //$( ".mshoppingcart_content" ).html( "<div>Loading...</div>" );
								 })
								 
								 
								 
								 jQuery('.signholder').hover(function(){
		                         
		                        jQuery('.signcontent').show()
		                        }
						     ,function(){
								 jQuery('.signcontent').hide()
								 })
                                 
                                  jQuery('.footerhover').hover(function(){
		                         
		                        jQuery(this).attr("src",jQuery(this).attr("hover"))
		                        }
						     ,function(){
								 jQuery(this).attr("src",jQuery(this).attr("normal"))
								 })
								 
								 
	})
	
	
								 
								 
	
</script>