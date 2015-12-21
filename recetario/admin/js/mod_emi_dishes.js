$(document).ready(function(){
	$("#tables").on("click",".movie",function(){
		$("div").toggle();
		$("#editar").toggle();
		$i=$(this).parent().children("#id").text();
		mymovie = $(this);
		$.ajax({
			type:"post",
			url:'<?= base_url("index.php/cine_c/cinesbuscar")?>',
			datatype:'json',
			data:"id="+ mymovie.data("id"),
			success:function(respuesta){
				respuesta=$.parseJSON(respuesta);
				console.log(respuesta);
				$("#id").val(respuesta.id);
				$("#titulo").val(respuesta.titulo);
				$("#descripcion").val(respuesta.descripcion);
			}
		});
	});
});