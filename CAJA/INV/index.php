<link rel="stylesheet" href="../CSS/estilop.css" />
<?php
	date_default_timezone_set   ('America/El_Salvador');
	include_once('../conexion/connection.php');
	$fecha = '2016-08-18';//date('Y-m-d');
	$con=new conexion();
	$diseno = "<style> table {border-collapse: collapse;width:200px;} table, th, td {border: 1px solid black;} </style>";
	echo $diseno;
	$total_3 = 0;
	$tabla = "<center><table ><tr><th>ID</th><th>Productos</th><th>Sistema</th><th>Sucursal</th><th>Diferencia</th></tr>";
	$bodega = "select nombre,id_ingrediente,SUM(t1.cantidad)as total from historial_inventario t1 left join ingredientes using(ID_ingrediente) left join productos using(ID_producto) group by t1.id_ingrediente order by nombre";
	
	$bdq= $con->Ejecutar($bodega) or die ("error en la consulta bdq");
	
	while($row = mysqli_fetch_array($bdq))
	{
		$id = $row['id_ingrediente'];
		
		$ventas_diarias = "select nombre,id_ingrediente,sum(cantidad)as total2 from ventas_invt t2 left join productos using(id_producto) where t2.id_ingrediente=$id group by t2.id_ingrediente order by nombre;";
		$codigo_venta = "select distinct id_ingrediente,nombre,SUM(t1.cantidad)as total from historial_inventario t1 left join ingredientes using(ID_ingrediente) left join productos using(ID_producto) where not exists (select * from ventas_invt where id_ingrediente=t1.id_ingrediente) group by t1.id_ingrediente order by nombre";
		$datos_sucursal = "SELECT id_ingrediente,sum(cantidad)as total_sucursal from existencia_sucursal where id_ingrediente=$id and date(fechahora_enviado)='$fecha' group by id_ingrediente;";
		
		
		$bdq2= $con->Ejecutar($ventas_diarias) or die ("error en la consulta bdq2");
		$bdq3= $con->Ejecutar($codigo_venta) or die ("error en la consulta bdq2");
		$bdq4= $con->Ejecutar($datos_sucursal) or die ("error en la consulta bdq4");
		
		while($row2 = mysqli_fetch_array($bdq2))
		{			
			$tabla .= "<tr><td>".$id."</td><td>".$row['nombre']."</td><td>".$total_1 =round($row['total'] - $row2['total2'],2)."</td>";
			while($row4 = mysqli_fetch_array($bdq4)){
			$tabla .= "<td>".$total_2 = $row4['total_sucursal']."</td>";
			$tabla .= "<td>".round($total_1 - $total_2,2)."</td></tr>";
		}
		}
			
		
	}	
	while($row3 = mysqli_fetch_array($bdq3)){
		$id1 = $row3['id_ingrediente'];
		
			$tabla .= "<tr bgcolor='#FF0000'><td title='no se han movido desde ultimo abastecimiento' bgcolor='#FF0000' >".$row3['id_ingrediente']."</td><td>".$row3['nombre']."</td><td>".$total_4 = $row3['total']."</td>";
			$codigo_vperdida ="select distinct id_ingrediente,nombre,SUM(t1.cantidad)as total from existencia_sucursal t1 left join ingredientes using(ID_ingrediente) left join productos using(ID_producto)  where not exists (select * from ventas_invt where id_ingrediente=t1.id_ingrediente) and id_ingrediente=$id1 AND date(fechahora_enviado)='$fecha'  group by t1.id_ingrediente order by nombre;";
		
		$bdq5= $con->Ejecutar($codigo_vperdida) or die ("error en la consulta bdq5");
	while($row5 =  mysqli_fetch_array($bdq5)){
		
		
			$tabla .= "<td>".$total_3 = $row5['total']."</td>";
			$tabla .= "<td>".round($total_4 - $total_3,2)."</td></tr>";
		
	}
		
	}
	echo $tabla;
?>