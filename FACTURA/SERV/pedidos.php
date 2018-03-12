<?php 
	include("../conexion/server.php");
	$con=new conexion();

  $idp = $_POST['producto'];
  $grabado = $_POST['grabado'];
  $original= $_POST['original'];
  $cancelado= $_POST['cancelado'];
  $pedido= $_POST['pedido'];
  $flage= $_POST['flage'];
  $flagd= $_POST['flagd'];
  $nodo= $_POST['nodo'];
  $idc= $_POST['idc'];
  $ids= $_POST['ids'];

  
   

    for ($i = 0; $i < count($idp); $i++) {
  $idp_save = $idp[$i];
  $grabado_save = $grabado[$i];
  $original_save = $original[$i];
  $cancelado_save = $flage[$i];
  $pedido_save = $pedido[$i];
  $flage_save= $flage[$i];
  $flagd_save = $flagd[$i];
  $nodo_save = $nodo[$i];
  $idc_save = $idc[$i];
  $ids_save = $ids[$i];
 
      	$q = "INSERT INTO pedidos (ID_producto,precio_grabado, precio_original, flag_cancelado,
fechahora_pedido, flag_elaborado, flag_despachado,nodo,
 ID_cuenta, idsucursal)
 values
 ($idp_save,$grabado_save,$original_save,$cancelado_save,'$pedido_save',$flage_save,$flagd_save,'$nodo_save',$idc_save,$ids_save)";
		$bdq = $con->Ejecutar($q) or die ('error');
		ini_set ( 'max_execution_time' ,  300 );
		

		
    
        
    } 

?>