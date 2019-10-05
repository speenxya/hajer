<script>
function change_account_location(x){
	if(x!=''){
		window.location=x
	}
}
jQuery(function($j) {
	
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
	
	jQuery('.showcateg').hover(function(){
		                         var id=jQuery(this).attr('id')
		                        jQuery('.showcatdata').hide()
								 jQuery('.'+id).show()
								 
		                        }
						     ,function(){
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
								 
								 
	})
	
	
								 
								 
	
</script>