<link rel="stylesheet" href="../CSS/estilop.css" />
<?php
	include_once('../conexion/connection.php');
	$con=new conexion();
	$diseno = "<style> table {border-collapse: collapse;width:200px;} table, th, td {border: 1px solid black;} </style>";
	echo $diseno;
	$tabla = "<table ><tr><th>Productos</th><th>Inv. Final</th></tr>";
	$bodega = "select nombre,id_ingrediente,SUM(t1.cantidad)as total from historial_inventario t1 left join ingredientes using(ID_ingrediente) left join productos using(ID_producto) group by t1.id_ingrediente order by nombre";
	
	$bdq= $con->Ejecutar($bodega) or die ("error en la consulta bdq");
	
	while($row = mysqli_fetch_array($bdq))
	{
		$id = $row['id_ingrediente'];
		
		$ventas_diarias = "select nombre,id_ingrediente,sum(cantidad)as total2 from ventas_invt t2 left join productos using(id_producto) where t2.id_ingrediente=$id group by t2.id_ingrediente order by nombre;";
		$codigo_venta = "select distinct id_ingrediente,nombre,SUM(t1.cantidad)as total from historial_inventario t1 left join ingredientes using(ID_ingrediente) left join productos using(ID_producto) where not exists (select * from ventas_invt where id_ingrediente=t1.id_ingrediente) group by t1.id_ingrediente order by nombre";
		$bdq2= $con->Ejecutar($ventas_diarias) or die ("error en la consulta bdq2");
		$bdq3= $con->Ejecutar($codigo_venta) or die ("error en la consulta bdq2");
		while($row2 = mysqli_fetch_array($bdq2))
		{			
			$tabla .= "<tr><td>".$row['nombre']."</td><td>".round($row['total'] - $row2['total2'],2)."</td></tr>";
		}
		
	}
	while($row3 = mysqli_fetch_array($bdq3))
		{			
		$tabla .= "<tr><td>".$row3['nombre']."</td><td>".round($row3['total'],2)."</td></tr>";
		}
		
	echo $tabla;
?>
