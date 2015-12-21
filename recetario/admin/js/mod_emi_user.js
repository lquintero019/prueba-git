$(document).ready(function(){
    var tipo
    //usuario
    $("div.colum_main_top").on('click','div:nth-child(1) p', function(){ $("div#modal_contain").show("slow"); tipo=1; LoadInput();});
	//contraseña
	$("div.colum_main_top").on('click','div:nth-child(2) p', function(){ $("div#modal_contain").show("slow"); tipo=2; LoadInput();});
    //nombre
	$("div.colum_main_bottom").on('click','div:nth-child(1) p', function(){ $("div#modal_contain").slideDown("slow"); tipo=3; LoadInput();});
	//correo
	$("div.colum_main_bottom").on('click','div:nth-child(2) p', function(){ $("div#modal_contain").slideDown("slow"); tipo=4; LoadInput();});
	//estatus
	$("div.colum_main_bottom").on('click','div:nth-child(3) p', function(){ $("div#modal_contain_status").slideDown("slow"); tipo=5; });
    
     // mostrar usuario
	function LoadInput(){
       var update= tipo;
	        $.ajax({
			   type:'POST',
			   url:"../modificar/mod_user_reload.php",
			   data:{"tipo": update},
			    //beforeSend: function () {$("#resultado").html("Procesando, espere por favor..."); },
			    success:function(reload){
			      var reload= $.parseJSON(reload); 	 
	              $("div#modal_contain form").children("div#modal_contain_container").children().val(reload);
			    }
	        });
	}
	
	//altas y bajas de usuarios mostrar usuarios
	$("div#modal_contain_status form").on('click','div:nth-child(3) button#chose_option1', function(){
         $("table.dinamic").remove();
         if (tipo==5) {
	         var update= tipo;
		        $.ajax({
				   type:'POST',
				   url:"../modificar/mod_user_modificar.php",
				   data:{"tipo": update},
				    //beforeSend: function () {$("#resultado").html("Procesando, espere por favor..."); },
				    success:function(reload){
				     var reload= $.parseJSON(reload); 	 
				      
				        for (var i = 0; i < reload.length; i++) {
				     	 var DATE="<table id='dinamic' class='dinamic' style='width: 100%; border-style: double;'>"+
				     	 			   "<tbody class='t_body'>"+
					     	              "<tr>"+
					     	                "<th style='border-right: black 1px solid;'>Num usuario </th>"+
					     	                "<th style='border-right: black 1px solid;'>Usuario</th>"+
					     	                "<th style='border-right: black 1px solid;'>Nombre</th>"+
					     	                "<th style='border-right: black 1px solid;'>Correo</th>"+
					     	                "<th style='border-right: black 1px solid;'>Estado Actual</th>"+
					     	                "<th>Accion</th>"+
					     	              "</tr>"+
	                                      "<tr class='tr_last' style='text-align: center;'>"+
					     	                  "<td style='border-top: black 1px solid; border-right: black 1px solid;'>"+reload[i].id+"</td>"+
					     	                  "<td style='border-top: black 1px solid; border-right: black 1px solid;'> "+reload[i].usuario+"</td>"+
					     	                  "<td style='border-top: black 1px solid; border-right: black 1px solid;'>"+reload[i].nombre+"</td>"+
					     	                  "<td style='border-top: black 1px solid; border-right: black 1px solid;'>"+reload[i].correo+"</td>"+
					     	                  "<td class='estatus' style='border-top: black 1px solid; border-right: black 1px solid;'>"+reload[i].estatus+"</td>"+
					     	                  "<td class='td_last'>"+
					     	                  	"<div id='AB' style='cursor: pointer; border-style: groove; background-color: lightgray;' >Bajas y Altas</div>"+
					     	                  "</td>"+
					     	               "</tr>"+
				     	               "<tbody>"+
				     	 			"</table> ";
				     	 			$("div#modal_contain_status form").children("div#modal_contain_container").append(DATE);      
							          /* aun no funciona
							           if($("td.estatus").html()==0){
											 $("td.td_last div").html("Alta");
									   }else if($("td.estatus").html()==1){
										 	 $("td.td_last div").html("Baja");
										}*/
				        };

				    }
	            });
				    return false;
         }else{
         	//alert("error");
         }
	});		
//No debes de reptir ID #AB esta mal usarlo
      $('div#modal_contain_status').delegate('form div#modal_contain_container table tbody.t_body tr.tr_last td.td_last div','click',function(){
      	///Lo traigo con .html() por que .val() es para atributos value x.x
     	    var tipo=5;
     	    var update=tipo;
      		var status=$(this).parent().parent().children("td.estatus").html();
      		var id_user=$(this).parent().parent().children("td:nth-child(1)").html();		
      		$.ajax({
                url:"../modificar/mod_user_reload.php",
				data:{"tipo": update, "estatus": status, "id":id_user},
                success:function(message){
                     var message=$.parseJSON(message);
                     if(message.sqlupdata==1){
                         alert("Usuario "+message.tipeupdate);
                         $("table.dinamic").remove();
                     }else{
                        alert("Hubo un error al modificar en la base de datos");
                     }
                }

      		});
                
         return false;
      });
	//actualizar usuario
	$("div#modal_contain form").on('click','div:nth-child(3) button#chose_option1', function(){
	      var update=tipo;
	      var value= $(this).parent().parent().children("div#modal_contain_container").children("input").val();
	       
	        if(tipo==2){
              if(value==""){
              	    alert("Campo contraseña bacio");
              	    return false;

              }else{

                confirm("Esta es su nueva contraseña : " +value);
                $.ajax({
		        	type:'POST',
		        	url:"../modificar/mod_user_modificar.php",
		        	data:{"valor": value, "tipo": update},
		        	//beforeSend: function () {$("#resultado").html("Procesando, espere por favor...");    },
		        	success:function(error){
		        		error= $.parseJSON(error);	
		        		if(error==0){
                          var mistake="<div class='mmessage_error'>Error al actualizar</div>";
		        			$('div#modal_contain form').append(mistake);
							remove_message_err();
		        		}
		        		else{
							
							var mistake="<div class='message_success'>Actualizacion exitosa contraseña : </div>";
							var pass="<div class='message_success'><strong>"+value+"</stromg></div>";
		        			$('div#modal_contain form').append(mistake).append(pass);
							hiddenSuccess();
		        		}
		        		        
		        	} 
		        });	
				return false;
		     }
	       }if(tipo==1 || tipo== 3 || tipo== 4){
               
	       		if(value==""){
              	    alert("Campo bacio");
              	    return false;
                }else{
	               $.ajax({
			        	type:'POST',
			        	url:"../modificar/mod_user_modificar.php",
			        	data:{"valor": value, "tipo": update},
			        	//beforeSend: function () {$("#resultado").html("Procesando, espere por favor...");    },
			        	success:function(error){
			        		error= $.parseJSON(error);	
			        		if(error==0){
			        			var mistake="<div class='message_error'>Correo no valido tiene que tener el sigiente formato ' algo@algo.algo '</div>";
			        			$('div#modal_contain form').append(mistake);
	                             remove_message_err();
	                         
			        		}
			        		else{
								var mistake="<div class='message_success'>Actualizacion exitosa</div>";
			        			$('div#modal_contain form').append(mistake);
								hiddenSuccess();
							
			        		}
			        		        		
			        	} 
			        });
			    }	
	               return false;
	       }
            
	});    
     //hidde modal contain
	 $("div#modal_contain form").on('click','div p', function(){
           confirm("Esta seguro que desea cerrar la ventana esto eliminara toda accion echa");
           $("div#modal_contain").hide("slow");
	       $("div#modal_contain_container").children("input").val("");
	 });
	 // hidde modal contain status
	  $("div#modal_contain_status form").on('click','div p', function(){
           confirm("Esta seguro que desea cerrar la ventana esto eliminara toda accion echa");
	       $("table.dinamic").remove();
           $("div#modal_contain_status").hide("slow");

	 });
	 function hiddenSuccess(){
	 	setTimeout(function(){
				$("div#modal_contain").hide("slow");
	            $("div#modal_contain_container").children("input").val("");
	            $("div.message_success").remove();
			},2500);
	 	
	 }
	 function remove_message_err(){
        setTimeout(function(){
				$( "div.message_error" ).remove();
			},4000);
	 	
	 }

});