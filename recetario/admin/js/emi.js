$(document).ready(function(){

$("a#link").hover(function() {
  
    var link_l=$(this).find("img:last");
    var link_f=$(this).find("img:first");
    link_l.addClass( "visible").removeClass("hiden");
    link_f.addClass("hiden").removeClass("visible");
  });

  $("a#link").mouseleave(function(){
  	 var link_f=$(this).find("img:first");
     var link_l=$(this).find("img:last");
     link_f.addClass("visible").removeClass("hiden");
     link_l.addClass("hiden").removeClass("visible");
  });
});