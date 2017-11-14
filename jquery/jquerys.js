$(document).ready(function(){
	$('#mostrar_post').click(function(event){
		$("#div_dinamico_admin").load('mostrarpostadmin.php');
	});
	$('#mostrar_comentarios').click(function(event){
		$("#div_dinamico_admin").load('verpostindex.php');
	});
	$('#ventana_agregar_post').click(function(event){
		$("#div_dinamico_admin").load('ventanacrearpost.php');
	});
	$('#crear_post').click(function(event){
		$("#div_dinamico_admin").load('crearpost.php');
	});
	$('#crear_post_atras').click(function(event){
		$("#div_dinamico_admin").load('mostrarpostadmin.php');
	});
	$('#modificar_post').click(function(event){
		$("#div_dinamico_admin").load('modificarpost.php');
	});
	$('#modificar_post').click(function(event){
		$("#div_dinamico_admin").load('ventanaModificarPost.php');
	});
	$('#filtro_categorias_post').click(function(event){
		alert($('select[name=categoria]').val());
		//Crear AJAX
	});
	//FILTROS-INDEX
	$('#filtro_php').click(function(event){
		var show_id = this.text;
		$('#div_dinamico_index_blog').load('postfiltrado.php?'+$.param({
    		idfiltro: show_id
    	}));
	});
	$('#filtro_javascript').click(function(event){
		var show_id = this.text;
		$('#div_dinamico_index_blog').load('postfiltrado.php?'+$.param({
    		idfiltro: show_id
    	}));
	});
	$('#filtro_jquery').click(function(event){
		var show_id = this.text;
		$('#div_dinamico_index_blog').load('postfiltrado.php?'+$.param({
    		idfiltro: show_id
    	}));
	});
	$('#filtro_tutoriales').click(function(event){
		var show_id = this.text;
		$('#div_dinamico_index_blog').load('postfiltrado.php?'+$.param({
    		idfiltro: show_id
    	}));
	});
	$('#filtro_errores').click(function(event){
		var show_id = this.text;
		$('#div_dinamico_index_blog').load('postfiltrado.php?'+$.param({
    		idfiltro: show_id
    	}));
	});
	$('#filtro_bd').click(function(event){
		var show_id = this.text;
		$('#div_dinamico_index_blog').load('postfiltrado.php?'+$.param({
    		idfiltro: show_id
    	}));
	});
	//FIN-FILTROS-INDEX
	$('#post_cargar').click(function(event){
		var show_id = this.value;
		alert(show_id);
	});
	



	//jqeris de activaciones de menu
	$('#ul_inicio').on("click","li",function(event){
		$("#ul_inicio li").each(function(){
	    	if($(this).hasClass('active')){
	        	$(this).removeClass('active');
	      	}
	    });
	    $(this).addClass('active');
	});
});

window.onload = function(){
	var pathname = window.location.pathname;
	//alert(pathname.substr(-7,7));
	

	if (pathname.substr(-7,7) == "dex.php"){ //index
		$("#ul_inicio li").each(function(){
	        $(this).removeClass('active');
	        $('#inicio').addClass('active');
	    });
	}
	if (pathname.substr(-7,7) == "ros.php"){ //nosotros
		$("#ul_inicio li").each(function(){
	        $(this).removeClass('active');
	 		$('#nosotros').addClass('active');   
	 	});
	}
	if (pathname.substr(-7,7) == "cto.php"){ //contacto
		$("#ul_inicio li").each(function(){
	        $(this).removeClass('active');
	 		$('#contacto').addClass('active');
		});
	}
	if (pathname.substr(-7,7) == "ost.php"){ //servicios
		$("#ul_inicio li").each(function(){
	        $(this).removeClass('active');
	 		$('#post').addClass('active');   	
		});
	}
};
