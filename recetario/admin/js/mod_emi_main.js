$(document).ready(function(){
    function update(type){
          return type;
    }
    var tipo
    //slider1
	$("div.colum_main_top").on('click','div:nth-child(1) p', function(){ $("div#modal_img").show("slow"); tipo=1; });
	//slider 2
	$("div.colum_main_top").on('click','div:nth-child(2) p', function(){ $("div#modal_img").show("slow"); tipo=2; });
	//slider 3
	$("div.colum_main_top").on('click','div:nth-child(3) p', function(){ $("div#modal_img").show("slow"); tipo=3; });
     //vienbenidos
	$("div.colum_main_bottom").on('click','div:nth-child(1) p', function(){ $("div#modal_contain").slideDown("slow"); tipo=4; });
	//contenido
	$("div.colum_main_bottom").on('click','div:nth-child(2) p', function(){ $("div#modal_contain").slideDown("slow"); tipo=5; });
	//acerca de
	$("div.colum_main_bottom").on('click','div:nth-child(3) p', function(){ $("div#modal_contain").slideDown("slow"); tipo=6; });
	//un gusto
	$("div.colum_main_bottom").on('click','div:nth-child(4) p', function(){ $("div#modal_img").slideDown("slow"); tipo=7; });
	//un arte
	$("div.colum_main_bottom").on('click','div:nth-child(5) p', function(){ $("div#modal_img").slideDown("slow"); tipo=8; });
	

	//btn actualizar
	$("div#modal_contain form").on('click','div:nth-child(3) button#chose_option1', function(){
	       if($("textarea#dato").val() == "" ){  
                      confirm("Aun no a puesto datos");
                      return false;
	        }
	        else if($("textarea#dato").val() != "" ){
                var value=$(this).parent().parent().children("div#modal_contain_container").children(" textarea#dato").val();
                var update= tipo;
		        $.ajax({
		        	type:'POST',
		        	url:"../modificar/mod_main_modificar.php",
		        	data:{"valor": value, "tipo": update},
		        	//beforeSend: function () {$("#resultado").html("Procesando, espere por favor...");    },
		        	success:function(err){
		        		var err= $.parseJSON(err);
		        		if(err==0){
		        			 $("div#modal_contain").children("div.mmessage_error" ).remove();
		        			var mistake="<div class='mmessage_error'>Es nesesario que para esta actualizacion ponga porlomenos 200 caracteres</div>";
		        			$("div#modal_contain").prepend(mistake); 
                             remove_message_err();	  
		        		}else {
		        			 $("div.message_success").remove();
                            var success="<div class='message_success'>actualizacion completada</div>";
                            $("div#modal_contain").prepend(success);
		                    hiddenSuccess();
		                }
		        	} 
		        });
               return false; 
		    }
	});    
	 //btn mostrar
	$("div#modal_contain form").on('click','div:nth-child(3) button#chose_option2', function(){
	       		var value=$(this).parent().parent().children("div#modal_contain_container").children("textarea#dato");
                var update= tipo;
		        $.ajax({
		        	type:'POST',
		        	url:"../modificar/mod_main_reload.php",
		        	data:{"tipo": update},
		        	//beforeSend: function () {$("#resultado").html("Procesando, espere por favor...");    },
		        	success:function(reload){
		        		var reload= $.parseJSON(reload); 	 
                        value.val(reload);
		        	}
		        });	
		        return false;
	 });    
   
     //btn subir file   
    $("div#modal_img form").on('click','input#chose_option1',function(){	
		
		if($("input#select_file").val() == "" ){  
				confirm("Aun no a subido una imagen");
			    return false;
		}else{
			
			var update= tipo;
			var data = new FormData($('form#form')[0]);
			    data.append('tipo',update);
				$.ajax({
					type: 'POST',
					url: "../modificar/mod_main_modificar.php", 
					data: data,
					contentType: false,
					processData: false,
					success: function(file_result){
						file_result= $.parseJSON(file_result);
                        if(file_result.update_success==1){
                        	var success="<div style='text-align:center;' class='message_success'>actualizacion completada</div>";
                            $("div#modal_img").prepend(success);
		                    hiddenSuccess();
		                    $("div#modal_img_container").load("../modificar/mod_main.php div#children_modal_img");
		                    limpiarInputfile();

                        }
                        else{
                        	
                           // var final_mesage=file_result.file_exists.trim()+file_result.file_only_img.trim()+file_result.file_size.trim()+file_result.flie_extensions.trim();
                        	var mistake="<div class='mmessage_error'><Strong>"+file_result.file_rezons+"</strong></div>";
		        			$("div#modal_img").prepend(mistake); 
                        	if(file_result.file_exists != null){var one ="<p style='display: block;-webkit-margin-before: 0px;-webkit-margin-after: 0px;-webkit-margin-start: 0px;-webkit-margin-end: 0px;'>"+file_result.file_exists+"</p>";}
                        	if(file_result.file_only_img != null){var two ="<p style='display: block;-webkit-margin-before: 0px;-webkit-margin-after: 0px;-webkit-margin-start: 0px;-webkit-margin-end: 0px;'>"+file_result.file_only_img+"</p>";}
                        	if(file_result.file_size != null){var three ="<p style='display: block;-webkit-margin-before: 0px;-webkit-margin-after: 0px;-webkit-margin-start: 0px;-webkit-margin-end: 0px;'>"+file_result.file_size+"</p>";}
                        	if(file_result.flie_extensions != null){var four ="<p style='display: block;-webkit-margin-before: 0px;-webkit-margin-after: 0px;-webkit-margin-start: 0px;-webkit-margin-end: 0px;'>"+file_result.flie_extensions+"</p>";}
                            $("div.mmessage_error").append(one);
                            $("div.mmessage_error").append(two);
                            $("div.mmessage_error").append(three);
                            $("div.mmessage_error").append(four);
                            remove_message_err();
                             
                        }

					}  
				});
			return false;
		}
	});


  //btn mostrar files
    $("div#modal_img").delegate('form input#chose_option2','click',function(){	
    	$("div#modal_img form").children("input#chose_option3").show("slow");
       	$("div#modal_img form div#modal_img_container").children("div#children_modal_img").slideDown("slow");
        $("div#modal_img form").children("label").hide("slow");
        $("div#modal_img form").children("input#chose_option1").hide("slow");
        $("div#modal_img form").children("input#select_file").hide("slow");
         

      return false;
    });
    // btn elimimnar files
    $("div#modal_img").delegate('form input#chose_option3','click',function(){	
        //var data_errase=$(this).parent().children("div#modal_img_container").children("div#children_modal_img").children("div").children("div").children("input");
        var data_errase=$("form#form").serialize();
     
        if(data_errase==""){
        	alert(data_errase);
            return false;
        }
        else{
            $.ajax({
		        type:'POST',
		        url:"../modificar/mod_main_delete.php",
		        data:data_errase,
		        //beforeSend: function () {$("#resultado").html("Procesando, espere por favor...");    },
		        success:function(reload){
		        	var fnd =$.parseJSON(reload);
		        	if(fnd==1){
		        		var success="<div style='text-align:center;' class='message_success'>Imegen(s) borrada(s) con exito</div>";
                            $("div#modal_img").prepend(success);
		                    $("div#modal_img_container").load("../modificar/mod_main.php div#children_modal_img");
		                    $("div#modal_img form").children("input#chose_option1").show("slow");
           					$("div#modal_img form").children("input#select_file").show("slow");
           				    $("div#modal_img form").children("input#chose_option3").hide("slow");
           				    limpiarInputfile();
		                    hiddenSuccess();
		                    

		        	}
		        	else{
		        		var mistake="<div class='mmessage_error'><Strong>Es posible que la imagen no exista o aya sido borrada previamente</strong></div>";
		        			$("div#modal_img").prepend(mistake); 
		        			remove_message_err();

		        	}
		        
		        }
		    });	
          return false;
        } 
    });
   //hidde modal img
	 $("div#modal_img form").on('click','p', function(){
           $("div#modal_img").slideUp("slow");
           $("div#modal_img form").children("input#chose_option3").hide("slow");
       	   $("div#modal_img form div#modal_img_container").children("div#children_modal_img").slideUp("slow");
       	   $("div#modal_img form").children("label").show("slow");
       	   $("div#modal_img form").children("input#chose_option1").show("slow");
           $("div#modal_img form").children("input#select_file").show("slow");
           $("div#modal_img_container").load("../modificar/mod_main.php div#children_modal_img");
           limpiarInputfile();
           
	 });
	 //hidde modal contain
	 $("div#modal_contain form").on('click','div p', function(){
           confirm("Esta seguro que desea cerrar la ventana esto eliminara toda accion echa");
           $("div#modal_contain").hide("slow");
	       $("div#modal_contain_container").children("textarea").val("");
	 });
	 	 function hiddenSuccess(){
	 	setTimeout(function(){
	            $("div.message_success").remove();
	            $("div#modal_contain_container").children("textarea").val("");
				$("div#modal_contain").hide("slow");
			},2500);
	 	
	 }
	 function remove_message_err(){
        setTimeout(function(){
				$("div#modal_contain").children("div.mmessage_error" ).remove();
			},4000);
        setTimeout(function(){
				$("div#modal_img").children("div.mmessage_error" ).remove();
			},6000);
	 	
	 }
	  function limpiarInputfile() {
        var input = $("input#select_file");
        var nuevoValor = "";
        input.val(nuevoValor);    // Establecemos un nuevo valor
    }

});