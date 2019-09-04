<?php 
session_start();

	if (isset($_SESSION['usuario'])) {
		
	
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Articulos</title>
	<?php require_once "menu.php"; ?>
</head>
<body>
	<div class="container">
		<h1>Artículos</h1>
		<div class="row">
			<div class="col-sm-4">
				<form id="frmArticulos" enctype="multipart/form-data">
					<label></label>
				<select class="form-control input-sm" id="categoriaSelect" name="categoriaSelect">
					<option value="A">Seleciona Categoría</option>
				</select>
				<label>Nombre</label>
				<input type="text" class="form-control input-sm" name="nombre" id="nombre">
				<label>Descripción</label>
				<input type="text" class="form-control input-sm" name="descripcion" id="descripcion">
				<label>Cantidad</label>
				<input type="text" class="form-control input-sm" name="cantidad" id="cantidad">
				<label>Precio</label>
				<input type="text" class="form-control input-sm" name="precio" id="precio">
				<label>Imagen</label>
				<input type="file" name="imagen" id="imagen">
				<p></p>
				<span id="btnAgregaArticulo" class="btn btn-primary">Agregar</span>
				</form>
			</div>
			<div class="col-sm-8">
				<div id="tablaArticulosLoad"></div>
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaArticulosLoad').load('articulos/tablaArticulos.php');
		$('#btnAgregaArticulo').click(function(){

			vacios = validarFormVacio('frmArticulos');
		if (vacios > 0) {
			alert("Debes llenar todos los campos!");
			alertify.alert("Debes llenar todos los campos!");
			return false;
		}
		datos=$('#frmArticulos').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"../procesos/articulos/agregaArticulos.php",
			success:function(r){
				if (r==1) {
					alertify.success("Agregado con éxito");
				}else{
					alertify.error("No se pudo agregar");
				}
			}
		});
	});
	});
</script>
<?php 
	}else{
		header("Location:../index.php");
	}
 

 ?>