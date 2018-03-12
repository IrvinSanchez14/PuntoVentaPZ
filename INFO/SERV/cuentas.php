<?php 
	include("../conexion/server.php");
	$con=new conexion();

  $idm = $_POST['mesa'];
  $flagp = $_POST['pagado'];
  $flagnp= $_POST['nopro'];
  $flage= $_POST['exento'];
  $flagt= $_POST['tiquet'];
  $flaga= $_POST['anulado'];
  $idme= $_POST['mesero'];
  $fechap= $_POST['fechap'];
  $fechaa= $_POST['fechaa'];
  $ids= $_POST['ids'];
  $idc = $_POST['cuenta'];
  
   

    for ($i = 0; $i < count($idc); $i++) {
  $idm_save = $idm[$i];
  $flagp_save = $flagp[$i];
  $flagnp_save = $flagnp[$i];
  $flage_save = $flage[$i];
  $flagt_save = $flagt[$i];
  $flaga_save = $flaga[$i];
  $idme_save = $idme[$i];
  $fechap_save = $fechap[$i];
  $fechaa_save = $fechaa[$i];
  $ids_save = $ids[$i];
  $idc_save = $idc[$i];
      	$q = "INSERT INTO cuentas (ID_mesa, flag_pagado, flag_nopropina, flag_exento,
flag_tiquetado, flag_anulado, ID_mesero,fechahora_pagado,
 fechahora_anulado, idsucursal,cuentas_suc)
 values
 ($idm_save,$flagp_save,$flagnp_save,$flage_save,$flagt_save,$flaga_save,$idme_save,'$fechap_save','$fechaa_save',$ids_save,$idc_save)";
		$bdq = $con->Ejecutar($q) or die ('error');
		ini_set ( 'max_execution_time' ,  300 );
		

		
    
        
    } 

?>