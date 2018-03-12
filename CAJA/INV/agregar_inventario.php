<?php
date_default_timezone_set('America/El_Salvador');
include_once('../modal/modelo.php');
$fecha = date('d-m-Y');
$idi=$_POST['id_producto'];
$cantidad=$_POST['cantidad'];
$idt = "INV ".$fecha;
$objsal = new inventario();
$objsal -> Titulo_Inventario($idt);
$datos_docente = nombre_titulo();
$datos_inventario = sumas_inventario();


foreach ($datos_inventario as $sumas){
    for ($i = 0; $i < count($idi); $i++) {
        $sum = $sumas['id_ingrediente'];
        $tot = $sumas['total'];
        if($idi[$i] == $sum )
        {
            $idi_save = $idi[$i];
            $totalinv = $cantidad[$i]+$tot;
            
            $objsal -> Ingresar_Inventario($idi_save,$totalinv);
        }
        }
}
foreach ($datos_docente as $titulo1){

    for ($i = 0; $i < count($idi); $i++) {
    $titulo= $titulo1['id_tituloinv'];
   $idi_save = $idi[$i];
   $cantidad_save = $cantidad[$i];
   
 $objsal = new inventario();
echo $idi_save.$cantidad_save.$titulo;
$objsal -> Ingresar_InventarioHis($idi_save,$cantidad_save,$titulo);
}
}
?>