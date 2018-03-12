<?php
require_once 'config.php';
$recetas =$_REQUEST['recetas_preparadas'];
$estiro_masas = $_REQUEST['masas_estiradas'];
$desecho = $_REQUEST['desperdicio'];
$idi = 63;
$unidad = 3;
$suma = 0;
for ($i = 0; $i < count($recetas); $i++) {
    $receta_save = $recetas[$i];
	$estiro_masas_save = $estiro_masas[$i];
	$desecho_save = $desecho[$i];
	$ingreso_masa = "INSERT INTO masap (numero_recetas,numero_estiradas,numero_desperdicio,id_ingrediente) VALUES ($receta_save,$estiro_masas_save,$desecho_save,$idi);";
	
	if(!mysqli_query($con,$ingreso_masa)) 
    {
        die( "ERROR: ". mysqli_error($con));
    } 
	$suma = $estiro_masas_save + $suma;
	
	
    }
	$add_masap = "INSERT INTO historial_inventario (id_ingrediente,cantidad,ID_tituloinv,unidad) VALUES($idi,$suma,0,$unidad)";
	if(!mysqli_query($con,$add_masap)) 
    {
        die( "ERROR: ". mysqli_error($con));
    } 
	echo "<script>alert('PRODUCCION DE MASA GUARDADO EXITOSAMENTE!!');</script>";
		echo "<script>alert('TOTAL DE MASAS ECHAS: ".$suma."');
		$('.form-control').val('');
		location.reload();
		</script>";
	

?>