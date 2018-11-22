<?php 
include("conexion/conexion.php");
$con=new conexion();
$idg = $_POST['idg'];
$idm = $_POST['idm'];
$orden = $_POST['orden'];
$producto = $_POST['producto'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$nodo = $_POST['nodo'];
$auto = $_POST['auto'];
$prioridad = $_POST['prioridad'];
$disponible = $_POST['disponible'];
$descontinuado = $_POST['descontinuado'];
$complementar = $_POST['complementar'];

$q = "INSERT into productos(ID_grupo, ID_menu,orden, nombre, descripcion,
 precio, nodo_sugerido, autodespacho, prioridad, disponible, descontinuado,
 complementar) values($idg,$idm,$orden,'$producto','$descripcion',$precio,'$nodo',$auto,'$prioridad',$disponible,$descontinuado,$complementar)";
$bdq = $con->Ejecutar($q) or die ('error');
?>

