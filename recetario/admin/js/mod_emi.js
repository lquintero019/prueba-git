$(document).ready(function(){
     
     $("div.slide_efect").click(function(){
         //$("div.colum_left").fadeToggle('slow',"linear");
         $("div.colum_left").slideToggle("slow");
         $( "div.colum_left div:nth-child(1)").fadeToggle(1500);
         $( "div.colum_left div:nth-child(2)").fadeToggle(3000);
         $( "div.colum_left div:nth-child(3)").fadeToggle(3500);
         $( "div.colum_left div:nth-child(4)").fadeToggle(4000);
                
      });
     $("div.colum_main").on('click','div.slide_efect', function(){
        
        var width_div =$(this).parent();
        var width_img =$(this);
         width_div.toggleClass('div_70');
         width_img.toggleClass('slide_efect_100');
      });
     
     $("div.colum_left").on("click","div#main",function(){
          alert("Redireccionando esto tardara 2 segundos");
         setTimeout ("location='http://localhost/recetario/admin/modificar/mod_main.php'", 2000);
     });
     $("div.colum_left").on("click","div#admin",function(){
           alert("Redireccionando esto tardara 2 segundos");
            setTimeout (" location='http://localhost/recetario/admin/welcome.php'", 2000);
        
     });
    $("div.colum_left").on("click","div#dishes",function(){
           alert("Redireccionando esto tardara 2 segundos");
           setTimeout ("location='http://localhost/recetario/admin/modificar/mod_dishes.php'", 2000);
        
     });
    $("div.colum_left").on("click","div#contact",function(){
        alert("Redireccionando esto tardara 2 segundos");
        setTimeout ("location='http://localhost/recetario/admin/modificar/mod_contact.php'", 2000);
        
     });
    $("div.colum_left").on("click","div#users",function(){
         alert("Redireccionando esto tardara 2 segundos");
        setTimeout ("location='http://localhost/recetario/admin/modificar/mod_user.php'", 2000);
     });
    $("div.colum_main_top").on('click','div', function(){
        var DIV=$(this);
        DIV.children("p.p_hidden:nth-child(2)").slideToggle("slow");
        DIV.children("p.p_hidden:nth-child(3)").slideToggle(1000);
        DIV.children("p.p_hidden:nth-child(4)").slideToggle(1500);
        DIV.children("p.p_hidden:nth-child(5)").slideToggle(2000);

    });
    
});