function lightuprow(x){
	var yy='#chk'+x
	var xx='#tr'+x
	if($(yy).is(':checked')){
		 //$(xx).addClass("checkbox_lightup")
		 $(xx+" td").addClass("checkbox_lightup")
	}else{
		 $(xx+" td").removeClass("checkbox_lightup")
	}
}

function checkall(checked,countt){
	for(i=0;i<countt;i++){
		x="chk"+i
		document.form2[x].checked=checked
		if(checked){
		jQuery("#tr"+i+" td").addClass("checkbox_lightup")
		}else{
	    jQuery("#tr"+i+" td").removeClass("checkbox_lightup")		
		}
	}
	//$("input:checkbox").each(function(){this.checked=checked});
}

function confirm_me(text){
	return confirm(text)
}

function onlynumbers(evt) {
    evt = (evt) ? evt : window.event
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false
    }
    return true
}

function onlynumbers_dot(evt) {
    evt = (evt) ? evt : window.event
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode!=46) {
        return false
    }
    return true
}

function onlynumbers_minus(evt) {
    evt = (evt) ? evt : window.event
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode!=45 && charCode!=43) {
        return false
    }
    return true
}

function onlynumbers_minus_dot(evt) {
    evt = (evt) ? evt : window.event
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode!=45 && charCode!=46) {
        return false
    }
    return true
}


function validemail(val){
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   if(reg.test(val) == false) {
      return false;
   }else{
	   return true;
   }

}

function open_window(url,name,width,height,left,top){
	window.open(url,name,'width='+width+',height='+height+',top='+top+',left='+left+',menubar=no,status=no,location=no,toolbar=no,scrollbars=yes,resizable=yes')
}



function ajaxx(firstid,targetid,path){
  ff=$.ajax({
      beforeSend: function(){$(firstid).text(lang['please_wait'])},
      type: "post",
	  url: path,
	  dataType: "html",
	  //data: "id=1",
	  timeout:"10000",
	  success: function(html){
		         $(firstid).text(''),
	             $(targetid).html(html)
               },
	  error: function(xhr,err,e){
	    if(err=="timeout"){
		 $(targetid).html(lang['timeout_error'])
		}else{
		  $(targetid).html(xhr+" "+err+" "+e)
		}
	  }
	  })
  
}



//-------------------------custom functions------------------------------------------
function ajaxx_en(firstid,targetid,path){
  ff=$.ajax({
      beforeSend: function(){$(firstid).text("Please wait")},
      type: "post",
	  url: path,
	  dataType: "html",
	  //data: "id=1",
	  timeout:"10000",
	  success: function(html){
		         $(firstid).text(''),
	             $(targetid).html(html)
               },
	  error: function(xhr,err,e){
	    if(err=="timeout"){
		 $(targetid).html(lang['timeout_error'])
		}else{
		  $(targetid).html(xhr+" "+err+" "+e)
		}
	  }
	  })
  
}

function ajaxx_ar(firstid,targetid,path){
  ff=$.ajax({
      beforeSend: function(){$(firstid).text("الرجاء الانتظار")},
      type: "post",
	  url: path,
	  dataType: "html",
	  //data: "id=1",
	  timeout:"10000",
	  success: function(html){
		         $(firstid).text(''),
	             $(targetid).html(html)
               },
	  error: function(xhr,err,e){
	    if(err=="timeout"){
		 $(targetid).html(lang['timeout_error'])
		}else{
		  $(targetid).html(xhr+" "+err+" "+e)
		}
	  }
	  })
  
}

function promfilerename(filename,filepath,filedisplay,textdisplay){
							 var n=prompt("Please enter filename",filename)
							 if(n==''){
							  alert("Please enter a value")
							  return false
							  }
							 if(n.indexOf("/")!='-1' || n.indexOf("\\")!='-1' || n.indexOf("'")!='-1' || n.indexOf("\"")!='-1'){
							  alert("Please enter valid filename")
							  return false
							  } 
							 if(n==null){
							 }else{
							 
						 	 ajaxxrenamefile("#msg","#msg","ajax/ajax.php?filerename=1&filepath=../"+filepath+"&oldfile="+filename+"&newfile="+n,filedisplay,filepath,n,textdisplay)
							  }
						}

function ajaxxdeletefile(firstid,targetid,path){
  ff=$.ajax({
      beforeSend: function(){$(firstid).text(lang['please_wait'])},
      type: "post",
	  url: path,
	  dataType: "html",
	  //data: "id=1",
	  timeout:"10000",
	  success: function(html){
		          if(html=='error'){
		               $(firstid).text('Error Deleting File')
				  }else{
					   $(firstid).text(''),
					   $(targetid).html(html)
				  }
               },
	  error: function(xhr,err,e){
	    if(err=="timeout"){
		 $(targetid).html(lang['timeout_error'])
		}else{
		  $(targetid).html(xhr+" "+err+" "+e)
		}
	  }
	  })
  
}

//this is used
function ajaxx_additional(firstid,targetid,path){
	 //window.location=path
	 //return false
  ff=$.ajax({
      beforeSend: function(x){
		               $('#additionaldivholder').show()
		               $(firstid).text(lang['please_wait'])
					   },
      type: "post",
	  url: path,
	  dataType: "json",
	  //data: "id=1",
	  timeout:"10000",
	  success: function(html,textStatus,jqXHR){
		  //eval('('+html+')')
		  $(firstid).html(html.message)
		  $(targetid).html(html.value)
				 
               },
	  error: function(xhr,err,e){
	    if(err=="timeout"){
		 $(firstid).html(lang['timeout_error'])
		}else{
		  $(firstid).html(xhr+" "+err+" "+e)
		}
	  }
	  })
  
}

function overr(x,y1,y2,y3){
	$("#one").attr("background",y1)
	$("#two").attr("background",y2)
	$("#three").attr("background",y2)
	$("#four").attr("background",y2)
	$("#five").attr("background",y2)
	$("#six").attr("background",y3)
	
	$("#one,#two,#three,#four,#five,#six").attr("bgcolor",'transparent')
	$("#one a:first,#two a:first,#three a:first,#four a:first,#five a:first,#six a:first").css("color",'#ffffff')
	
	$("#"+x).attr("background",'none')
	$("#"+x).attr("bgcolor",'#ffffff')
	$("#"+x+" a:first").css("color",'#000000')

}
function outt(x,y){
	//$("#"+x).attr("background",y)
	//$("#"+x).attr("bgcolor",'transparent')
	//$("#"+x+" a:first").css("color",'#ffffff')
    
}

function getClockTime()
{
   var now    = new Date();
   var hour   = now.getHours();
   var minute = now.getMinutes();
   var second = now.getSeconds();
   var ap = "AM";
   if (hour   > 11) { ap = "PM";             }
   if (hour   > 12) { hour = hour - 12;      }
   if (hour   == 0) { hour = 12;             }
   if (hour   < 10) { hour   = "0" + hour;   }
   if (minute < 10) { minute = "0" + minute; }
   if (second < 10) { second = "0" + second; }
   var timeString = hour +
                    ':' +
                    minute +
                    ':' +
                    second +
                    " " +
                    ap;
   //return timeString;
   $('#time').html(timeString)
} // function getClockTime()

function createMarker(latlng,name,html,category,mapp,gicons,gmarkers,infowindow) {
    var contentString = html;
    var marker = new google.maps.Marker({
        position: latlng,
        icon: gicons[category],
        //shadow: iconShadow,
        map: mapp,
        title: name,
        zIndex: Math.round(latlng.lat()*-100000)<<5
        });
        // === Store the category and name info as a marker properties ===
        marker.mycategory = category;                                 
        marker.myname = name;
        gmarkers.push(marker);
   google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(contentString); 
        infowindow.open(mapp,marker);
        });

}

var xmlHttp;
function initxm(){

try
  {  // Firefox, Opera 8.0+, Safari
    xmlHttp=new XMLHttpRequest(); 
	}
catch (e)
  {  // Internet Explorer
    try
    {    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");    }
  catch (e)
    {    try
      {      xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");      }
    catch (e)
      {   return false;      }    }  }
}



function open_window(url,name,width,height,left,top){
	window.open(url,name,'width='+width+',height='+height+',top='+top+',left='+left+',menubar=no,status=no,location=no,toolbar=no,scrollbars=yes,resizable=yes')
}

function printpage(url){
	window.open(decodeURIComponent(url),'printpage','menubar=no,status=no,location=no,toolbar=no,scrollbars=yes,resizable=yes')
}

function ajaxfilemanager(field_name, url, type, win) {
			var ajaxfilemanagerurl = "../js/tinymce/plugins/ajaxfilemanager/ajaxfilemanager.php";
			var view = 'detail';
			switch (type) {
				case "image":
				view = 'thumbnail';
					break;
				case "media":
					break;
				case "flash": 
					break;
				case "file":
					break;
				default:
					return false;
			}
            tinyMCE.activeEditor.windowManager.open({
                url: "../js/tinymce/plugins/ajaxfilemanager/ajaxfilemanager.php?view=" + view,
                width: 782,
                height: 440,
                inline : "yes",
                close_previous : "no"
            },{
                window : win,
                input : field_name
            });
            
/*            return false;			
			var fileBrowserWindow = new Array();
			fileBrowserWindow["file"] = ajaxfilemanagerurl;
			fileBrowserWindow["title"] = "Ajax File Manager";
			fileBrowserWindow["width"] = "782";
			fileBrowserWindow["height"] = "440";
			fileBrowserWindow["close_previous"] = "no";
			tinyMCE.openWindow(fileBrowserWindow, {
			  window : win,
			  input : field_name,
			  resizable : "yes",
			  inline : "yes",
			  editor_id : tinyMCE.getWindowArg("editor_id")
			});
			
			return false;*/
		}
		

function createNormalMarker(latlng,name,html,category) {
    var contentString = html;
    var marker = new google.maps.Marker({
        position: latlng,
        icon: gicons[category],
        //shadow: iconShadow,
        map: map1,
        title: name,
        zIndex: Math.round(latlng.lat()*-100000)<<5
        });
        // === Store the category and name info as a marker properties ===
        marker.mycategory = category;   
		gmarkers.push(marker);   
		
		google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(html); 
        infowindow.open(map1,marker);           
		});
}


function createNormalMarkerAdmin(latlng,name,html,category) {
    var contentString = html;
    var marker = new google.maps.Marker({
        position: latlng,
        icon: gicons[category],
        //shadow: iconShadow,
        map: map,
        title: name,
        zIndex: Math.round(latlng.lat()*-100000)<<5
        });
        // === Store the category and name info as a marker properties ===
        marker.mycategory = category;   
		gmarkers.push(marker);   
		
		google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(html); 
        infowindow.open(map,marker);           
		});
}

function createLiveMarker(latlng,name,html,category) {
    var contentString = html;
    var marker = new google.maps.Marker({
        position: latlng,
        icon: gicons[category],
        //shadow: iconShadow,
        map: map1,
        title: name,
        zIndex: Math.round(latlng.lat()*-100000)<<5
        });
        // === Store the category and name info as a marker properties ===
        marker.mycategory = category;   
		gmarkers.push(marker);    
		google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(html); 
        infowindow.open(map1,marker);           
		});
		
}

      	  