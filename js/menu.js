
// TOP MENU
var topmenushow_timeout;

function showTopMenu() {
	//stopTheFlash();
    if(typeof topmenushow_timeout) clearTimeout(topmenushow_timeout);
    var td = $(".hovered-topmenu-td");
    //$(td).find(".absoultesubmenu").stop(true, true).slideDown("slow");
	$(td).find(".absoultesubmenu").show();
	if($(td).find(".absoultesubmenu").length) showbodyfade();
}
function hideTopMenu(td)
{
	//playTheFlash();
    if(typeof topmenushow_timeout) clearTimeout(topmenushow_timeout);
    //$(td).find(".absoultesubmenu").stop(true, true).slideUp(300);
	$(td).find(".absoultesubmenu").hide();
	if($(td).find(".absoultesubmenu").length) hidebodyfade();
}

$(document).ready(function(){
	$(".bodyfade").css('opacity',0);
	
	$(".topmenutd").hover(function(){
		$(this).addClass("hovered-topmenu-td");
		var topmenushow_timeout = setTimeout(function() {
		    showTopMenu();
		}, 1);
		
	}, function(){
		$(this).removeClass("hovered-topmenu-td");
		hideTopMenu(this);
	})
	
	// keep swapped image of main menu when hovering over opened div
	
	
})


var bodyfade_hidden = true;
var hidebg_timeout;

function showbodyfade() {
	if(typeof hidebg_timeout != "undefined") clearTimeout(hidebg_timeout);
	$(".bodyfade").stop(true, true).show().animate({opacity: 0.75}, 800);
}

function hidebodyfade(quick) {
	if(quick) {
		$(".bodyfade").stop(true, true).animate({opacity: 0}, 500, function(){
			$(".bodyfade").hide();
		});
	} else {
		hidebg_timeout = setTimeout(function(){hidebodyfade(true)}, 400);	
	}
}
