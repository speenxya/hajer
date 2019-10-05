$(document).ready(function(){
  // Reset Font Size
  if($.cookie("userFontSize")){
	  $('html').css('font-size', $.cookie("userFontSize"));
  }
  
  //var originalFontSize = $('html').css('font-size');  we disable this cause theres cookie
  var originalFontSize = "16px"
  $(".resetfont").click(function(){
  $('html').css('font-size', originalFontSize);
  $.cookie('userFontSize', originalFontSize)
  });
  // Increase Font Size
  $(".increasefont").click(function(){
  	var currentFontSize = $('html').css('font-size');
 	var currentFontSizeNum = parseFloat(currentFontSize, 10);
    var newFontSize = currentFontSizeNum*1.2;
	$('html').css('font-size', newFontSize);
	$.cookie('userFontSize', newFontSize+"px")
	return false;
  });
  // Decrease Font Size
  $(".decreasefont").click(function(){
  	var currentFontSize = $('html').css('font-size');
 	var currentFontSizeNum = parseFloat(currentFontSize, 10);
    var newFontSize = currentFontSizeNum*0.8;
	$('html').css('font-size', newFontSize);
	$.cookie('userFontSize', newFontSize+"px")
	return false;
  });
});
