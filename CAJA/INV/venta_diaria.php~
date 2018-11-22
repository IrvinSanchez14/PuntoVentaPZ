<?php
date_default_timezone_set   ('America/El_Salvador');
include_once('../conexion/connection.php');
$con = new Conexion();
$fecha = date('Y-m-d');
ini_set('max_execution_time', 300);


$venta_bebidas = "SELECT t3.id_unidad,t2.id_producto,t3.id_ingrediente,count(t2.id_pedido)as cantidad from cuentas t1
	   left join pedidos t2 on t2.ID_cuenta = t1.ID_cuenta left join ingredientes t3 on t3.id_producto=t2.id_producto  
		where date(fechahora_pagado)='$fecha' and nodo='bebidas' 
	  and flag_cancelado=0 and flag_anulado=0  group by t3.id_ingrediente,t2.id_pedido;";
$bdq= $con->Ejecutar($venta_bebidas) or die ("error en la consulta");

while($bebidas = mysqli_fetch_array($bdq)){
	$ingrediente = $bebidas['id_ingrediente'];
	
		$idp_save = $bebidas['id_producto']; 
		$cantidad_save = $bebidas['cantidad'];
		$unidad_save = $bebidas['id_unidad'];
		
		$ingreso_bebidas ="INSERT INTO ventas_invt (id_producto,id_ingrediente,cantidad,fecha_creacion,unidad) VALUES ($idp_save,$ingrediente,$cantidad_save,'$fecha 00:00:00',$unidad_save);";
		$bdq1= $con->Ejecutar($ingreso_bebidas) or die ("<script>alert('ERROR: No se permite datos duplicados 1')</script>");
	
}

$venta_masa ="select t2.ID_pedido,t3.id_ingrediente,t2.ID_producto,sum(t3.cantidad)as total,t3.id_unidad from cuentas t1 
left join pedidos t2 on t2.ID_cuenta=t1.ID_cuenta left join formula t3 on t3.id_producto=t2.ID_producto
	where date(fechahora_pagado)='$fecha' and flag_cancelado=0 and flag_anulado=0
	  group by t3.id_ingrediente,t2.id_pedido,t3.id_formula;";
$bdq2= $con->Ejecutar($venta_masa) or die ("error en la consulta");

while($masa = mysqli_fetch_array($bdq2)){
	$idm = $masa['id_ingrediente'];
	if($idm != ""){
		
			$idmp = $masa['ID_producto'];
			$totalm = $masa['total'];
			$unidadm = $masa['id_unidad'];
			$ingreso_masa ="INSERT INTO ventas_invt (id_producto,id_ingrediente,cantidad,fecha_creacion,unidad) VALUES ($idmp,$idm,$totalm,'$fecha 00:00:00',$unidadm);";
			$bdq3= $con->Ejecutar($ingreso_masa) or die ("<script>alert('ERROR: No se permite datos duplicados')</script>");
		
	}
}

$venta_masa_adicional = "	select t4.id_unidad,t4.id_ingrediente,t2.ID_producto,sum(t4.cantidad)as total from cuentas t1
	 left join pedidos t2 on t2.ID_cuenta=t1.ID_cuenta left join pedidos_adicionales t3 on t3.ID_pedido=t2.ID_pedido 
	 left join ingredientes_adicionales t4 on t3.ID_adicional=t4.ID_adicional where date(fechahora_pagado)='$fecha' 
	and flag_cancelado=0 and flag_anulado=0 and t3.tipo='poner' group by t4.id_ingrediente,t2.id_pedido";
$bdq2= $con->Ejecutar($venta_masa_adicional) or die ("error en la consulta");
while($row2 = mysqli_fetch_array($bdq2)){
		$ingrediente = $row2['id_ingrediente'];
		if($ingrediente == '')
		{
			
		}
		else{
			
			
			$id_a = $row2['ID_producto'];
			$cantidad_save = $row2['total'];
			$unidad = $row2['id_unidad'];
			
		$ingreso_bebidas ="INSERT INTO ventas_invt(id_producto,id_ingrediente,cantidad,fecha_creacion,unidad) VALUES ($id_a,$ingrediente,$cantidad_save,'$fecha 00:00:00',$unidad);";
		$bdq1= $con->Ejecutar($ingreso_bebidas) or die ("<script>alert('ERROR: No se permite datos duplicados')</script>");
		}
}

$venta_masa_adicionala = "select t4.id_unidad,t4.id_ingrediente,t2.ID_producto,sum(-t4.cantidad)as total from cuentas t1 left join pedidos t2 on t2.ID_cuenta=t1.ID_cuenta left join pedidos_adicionales t3 on t3.ID_pedido=t2.ID_pedido left join ingredientes_adicionales t4 on t3.ID_adicional=t4.ID_adicional where date(fechahora_pagado)='$fecha' and flag_cancelado=0 and flag_anulado=0 and t3.tipo='quitar' group by t4.id_ingrediente,t4.id_unidad";
$bdq2= $con->Ejecutar($venta_masa_adicionala) or die ("error en la consulta");
while($row2 = mysqli_fetch_array($bdq2)){
		$ingrediente = $row2['id_ingrediente'];
		if($ingrediente == '')
		{
			
		}
		else{
			
			
			$id_a = $row2['ID_producto'];
			$cantidad_save = $row2['total'];
			$unidad = $row2['id_unidad'];
			
		$ingreso_bebidas ="INSERT INTO ventas_invt (id_producto,id_ingrediente,cantidad,fecha_creacion,unidad) VALUES ($idmp,$idm,$totalm,'$fecha 00:00:00',$unidadm);";
		$bdq1= $con->Ejecutar($venta_masa_adicionala) or die ("<script>alert('ERROR: No se permite datos duplicados')</script>");
		}
}

echo "VENTA ENVIADA";

	
?>
