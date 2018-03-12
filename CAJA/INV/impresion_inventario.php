<?php
include_once("../modal/modelo.php");
$datos_bebidas=venta_bebidas();
$datos_mozarella = venta_mozarella();
$datos_entradas = inventario_abs();
foreach ($datos_bebidas as $arreglos => $key)
{
     $key['nombre']."  ";
     $key['cantidad']."<br>";
}
foreach ($datos_mozarella as $mozarellav)
{
     $mozarellav['nombre']."  ";
     $mozarellav['onzas']."onz<br>";
}
foreach ($datos_entradas as $entradasp)
{
    $entradasp['id_ingrediente']."---------";
     $entradasp['cantidad']."<br>";
    
}
foreach($datos_bebidas as $key => $value){
    foreach($datos_entradas as $value2){
		if($value['id_ingrediente'] === $value2['id_ingrediente']){
            $datos_bebidas[$key]['cantidad'] = $value2['cantidad'];
			$sum = $value2['cantidad'] - $value['cantidad'];
            echo $value['nombre']."                ";
	 echo $sum."<br>";
        } 
        
        } 
	 } 
		
?>