<?php 
include("conexion/conexion.php");
$con=new conexion();
$q = "SELECT * FROM productos";
$bdq = $con->Ejecutar($q) or die ('error');
$arreglo = array();
while($arreglos = mysql_fetch_array($bdq)){
			$arreglo[]=$arreglos;
			}

?>

<html>
<head>
<title>VENTAS</title>
<link rel="stylesheet" media="screen" href="estilo/estilo.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/1.6.js"></script>
		<script type="text/javascript" src="JS/ddaccordion.js"></script>
<script src="js/jquery-2.2.0.js"></script>	
<script src="js/fechasplan.js"></script>	

</head>
<body>
<center>
<div width="100%">
<h1>PRODUCTOS</h1>
<form id="mesero" METHOD="POST" ACTION="enviar.php">
<table>
<tr>
<td>ID_GRUPO<input type="text" name="idg"></td>
</tr>
<tr>
<tr>
<td>ID_MENU <input type="text" name="idm"></td>
</tr>
<tr>
<td>ORDEN <input type="text" name="orden"></td>
</tr>
<tr>
<td>NOMBRE PRODUCTO <input type="text" name="producto"></td>
</tr>
<tr>
<td>DESCRIPCION <input type="text" name="descripcion"></td>
</tr>
<tr>
<td>PRECIO <input type="text" name="precio"></td>
</tr>
<tr>
<td>NODO_SUGERIDO <input type="text" name="nodo"></td>
</tr>
<tr>
<td>AUTODESPACHO <input type="text" name="auto"></td>
</tr>
<tr>
<td>PRIORIDAD <input type="text" name="prioridad"></td>
</tr>
<tr>
<td>DISPONIBLE <input type="text" name="disponible"></td>
</tr>
<tr>
<td>DESCONTINUADO <input type="text" name="descontinuado"></td>
</tr>
<tr>
<td>COMPLEMENTAR <input type="text" name="complementar"></td>
</t1r>
</TABLE>
<BUTTON>ENVIAR</BUTTON>
</FORM>
	  </div>
	  <div>
	  <?php foreach ($arreglo as $arreglos){ ?>
	  <?php echo $arreglos['nombre'];?>&nbsp&nbsp&nbsp&nbsp<?php echo $arreglos['nodo_sugerido'];?>&nbsp&nbsp&nbsp&nbsp&nbsp
	  <?php echo $arreglos['disponible'];?><br>
	
	  <?php }?>
	  </div>
</center>
</body>
</html>