<?php
date_default_timezone_set   ('America/El_Salvador');

require_once 'config.php';
$idi = $_REQUEST['id_producto'];
$cantidad = $_REQUEST['cantidad'];
$id_creador = 1;
$tipos = $_REQUEST['country_no'];
$titulo = "INV".date('Y-m-d');

$insertar_titulo = "INSERT INTO titulo_inventario (titulo) VALUES('$titulo');";
$result = mysqli_query($con, $insertar_titulo)or die("<script>alert('ERROR: SOLO SE PUEDE MANDAR UN INVENTARIO AL DIA');</script>");
$devolver_titulo = "SELECT ID_tituloinv FROM titulo_inventario ORDER BY ID_tituloinv DESC LIMIT 1";
$a = mysqli_query($con, $devolver_titulo)or die("<script>alert('ERROR: NO EXISTEN DATOS');</script>");

while($titulo = mysqli_fetch_array($a)){
	$idt = $titulo['ID_tituloinv'];
	
	for ($i = 0; $i < count($idi); $i++) {
		$idi_save = $idi[$i];
		$cantidad_save = $cantidad[$i];
		$tipo_save = $tipos[$i];
		if($tipo_save == 4){
	 
	 $ingreso_inventario ="INSERT INTO historial_inventario (id_ingrediente,cantidad,ID_tituloinv,unidad) VALUES ($idi_save,$cantidad_save,$idt,$tipo_save)";
	}
	elseif($tipo_save == 5){
	
	  $ingreso_inventario ="INSERT INTO historial_inventario (id_ingrediente,cantidad,ID_tituloinv,unidad) VALUES ($idi_save,$cantidad_save,$idt,$tipo_save)";
	}
	elseif($tipo_save == 6){
	
	  $ingreso_inventario ="INSERT INTO historial_inventario (id_ingrediente,cantidad,ID_tituloinv,unidad) VALUES ($idi_save,$cantidad_save,$idt,$tipo_save)";
	}
	elseif($tipo_save == 7){
	
	  $ingreso_inventario ="INSERT INTO historial_inventario (id_ingrediente,cantidad,ID_tituloinv,unidad) VALUES ($idi_save,$cantidad_save,$idt,$tipo_save)";
	}
	elseif($tipo_save == 8){
	  
	  $ingreso_inventario ="INSERT INTO historial_inventario (id_ingrediente,cantidad,ID_tituloinv,unidad) VALUES ($idi_save,$cantidad_save,$idt,$tipo_save)";
	}
	elseif($tipo_save == 9){
	  
	  $ingreso_inventario ="INSERT INTO historial_inventario (id_ingrediente,cantidad,ID_tituloinv,unidad) VALUES ($idi_save,$cantidad_save,$idt,$tipo_save)";
	}
	elseif($tipo_save == 10){
	 
	  $ingreso_inventario ="INSERT INTO historial_inventario (id_ingrediente,cantidad,ID_tituloinv,unidad) VALUES ($idi_save,$cantidad_save,$idt,$tipo_save)";
	}
	elseif($tipo_save == 13){
	
	  $ingreso_inventario ="INSERT INTO historial_inventario (id_ingrediente,cantidad,ID_tituloinv,unidad) VALUES ($idi_save,$cantidad_save,$id_creador,$tipo_save)";
	}
	else{

		 $ingreso_inventario ="INSERT INTO historial_inventario (id_ingrediente,cantidad,ID_tituloinv,unidad) VALUES ($idi_save,$cantidad_save,$idt,$tipo_save)";
	}
	if($idi_save == 64)
	{
		
		  $ingreso_inventario ="INSERT INTO historial_inventario (id_ingrediente,cantidad,ID_tituloinv,unidad) VALUES (7,$cantidad_save,$idt,$tipo_save),(6,$cantidad_save,$idt,$tipo_save)";
		
	}
	
	if(!mysqli_query($con,$ingreso_inventario)) 
    {
        die( "ERROR: ". mysqli_error($con));
    } 
	
	
	
	}
echo "<script>alert('DATOS GURDADOS EXITOSAMENTE');
	$('.form-control').val('');
		location.reload();</script>";
   }

?>

