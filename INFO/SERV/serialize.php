<?php 
include("../conexion/conexion.php");
$con=new conexion();
$fecha = date("Y-m-d");
$fechade = $_POST['fechade'];
$fechaa = $_POST['fechaa'];
$nuevafecha = strtotime ( '-1 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
$q = "SELECT * from cortez where date(fechatiempo) between '$nuevafecha' and '$fecha'";
$bdq = $con->Ejecutar($q);
$arreglo = array();
while($arreglos = mysql_fetch_array($bdq)){
			$arreglo[]=$arreglos;
			}
			
			$q1 = "SELECT * from cuentas where fechahora_pagado between '$fechade' and '$fechaa' ";
$bdq = $con->Ejecutar($q1);
$arreglo1 = array();
while($arreglos1 = mysql_fetch_array($bdq)){
			$arreglo1[]=$arreglos1;
			}
			
			$q2 = "SELECT * from pedidos where fechahora_pedido between '$fechade' and '$fechaa'";
$bdq = $con->Ejecutar($q2);
$arreglo2 = array();
while($arreglos2 = mysql_fetch_array($bdq)){
			$arreglo2[]=$arreglos2;
			}
?>
<?php echo date("Y-m-d"); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Server</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="../css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="../css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<!-- chart -->
<script src="../js/Chart.js"></script>
<!-- //chart -->
<!--animate-->
<link href="../css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="../js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!----webfonts--->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts---> 
 <!-- Meters graphs -->
<script src="../js/jquery-1.10.2.min.js"></script>
<!-- Placed js at the end of the document so the pages load faster -->

</head> 
   
 <body class="sticky-header left-side-collapsed"  onload="initMap()">
 <form method="post" action="enviar.php">
 <div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Compras</h3>
					 <div class="xs tabls">
						
						<div class="bs-example4" data-example-id="simple-responsive-table">
						<!-- /.table-responsive -->
						<div class="table-responsive">
						  <table class="table table-bordered">
							<thead>
							<tr>
							<th>Total Cuadrad</th>
							<th>Total Cuadrad</th>
							<th>Total Cuadrad</th>
							<th>Total Cuadrad</th>
							<th>Total Cuadrad</th>
							<th>Total Cuadrad</th>
							<th>Total Cuadrad</th>
							<th>Total Cuadrad</th>
							</tr>
<?php foreach($arreglo as $arreglos){ ?>
<tr>	
	<td><input type="text" value="<?php echo $arreglos['total_a_cuadrar'];?>" name="cuadrar"></td>
	<td><input type="text" value="<?php echo $arreglos['total_descuentos'];?>" name="des"></td>
	<td><input type="text" value="<?php echo $arreglos['total_diferencia'];?>" name="dife"></td>
	<td><input type="text" value="<?php echo $arreglos['total_efectivo'];?>" name="efec"></td>
	<td><input type="text" value="<?php echo $arreglos['total_pos'];?>" name="pos"></td>
	<td><input type="text" value="<?php echo $arreglos['total_compras'];?>" name="compr"></td>
	<td><input type="text" value="<?php echo $arreglos['total_caja'];?>" name="caja"></td>
	<td><input type="text" value="<?php echo $arreglos['fechatiempo'];?>" name="fecha"></td>
	<td><input type="text" value="1" name="ids"></td>
<tr>
<?php } ?>
</table>
<button>ENVIAR</button>
</form>
</div>
</div>
<br>
<div class="bs-example4" data-example-id="simple-responsive-table">
						<!-- /.table-responsive -->
						<div class="table-responsive">
<form method="post" action="cuentas.php" >
<table class="table table-bordered">
<thead>
<tr>
<th>Cuenta</th>
<th>Mesa</th>
<th>Pagado</th>
<th>Propina</th>
<th>Extento</th>
<th>Tiquetado</th>
<th>Anulado</th>
<th>Mesero</th>
<th>Feacha Pagado</th>
<th>Fecha Anulado</th>
<th>Sucursal</th>
</tr>
<?php foreach($arreglo1 as $arreglos1){ ?>
<tr>	
	<td><input type="text" value="<?php echo $arreglos1['ID_cuenta'];?>" name="cuenta[]"></td>
	<td><input type="text" value="<?php echo $arreglos1['ID_mesa'];?>" name="mesa[]"></td>
	<td><input type="text" value="<?php echo $arreglos1['flag_pagado'];?>" name="pagado[]"></td>
	<td><input type="text" value="<?php echo $arreglos1['flag_nopropina'];?>" name="nopro[]"></td>
	<td><input type="text" value="<?php echo $arreglos1['flag_exento'];?>" name="exento[]"></td>
	<td><input type="text" value="<?php echo $arreglos1['flag_tiquetado'];?>" name="tiquet[]"></td>
	<td><input type="text" value="<?php echo $arreglos1['flag_anulado'];?>" name="anulado[]"></td>
	<td><input type="text" value="<?php echo $arreglos1['ID_mesero'];?>" name="mesero[]"></td>
	<td><input type="text" value="<?php echo $arreglos1['fechahora_pagado'];?>" name="fechap[]"></td>
	<td><input type="text" value="<?php echo $arreglos1['fechahora_anulado'];?>" name="fechaa[]"></td>
	<td><input type="text" value="1" name="ids[]"></td>
<tr>
<?php } ?>
</table>
<button>ENVIAR</button>
</form>
</div>
</div>
<br>
<div class="bs-example4" data-example-id="simple-responsive-table">
						<!-- /.table-responsive -->
						<div class="table-responsive">
<form method="post" action="pedidos.php" >
<table class="table table-bordered">
<thead>
<tr>
<th>Producto</th>
<th>Precio Grabado</th>
<th>Precio Original</th>
<th>Cancelado</th>
<th>Fecha Pedido</th>
<th>Elaborado</th>
<th>Despacho</th>
<th>Nodo</th>
<th>Cuenta</th>
<th>Sucursal</th>
</tr>
<?php foreach($arreglo2 as $arreglos2){ ?>
<tr>	
	<td><input type="text" value="<?php echo $arreglos2['ID_producto'];?>" name="producto[]"></td>
	<td><input type="text" value="<?php echo $arreglos2['precio_grabado'];?>" name="grabado[]"></td>
	<td><input type="text" value="<?php echo $arreglos2['precio_original'];?>" name="original[]"></td>
	<td><input type="text" value="<?php echo $arreglos2['flag_cancelado'];?>" name="cancelado[]"></td>
	<td><input type="text" value="<?php echo $arreglos2['fechahora_pedido'];?>" name="pedido[]"></td>
	<td><input type="text" value="<?php echo $arreglos2['flag_elaborado'];?>" name="flage[]"></td>
	<td><input type="text" value="<?php echo $arreglos2['flag_despachado'];?>" name="flagd[]"></td>
	<td><input type="text" value="<?php echo $arreglos2['nodo'];?>" name="nodo[]"></td>
	<td><input type="text" value="<?php echo $arreglos2['ID_cuenta'];?>" name="idc[]"></td>
	<td><input type="text" value="1" name="ids[]"></td>
<tr>
<?php } ?>
</table>
<button>ENVIAR</button>
</form>
</div>
</div>
</body>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   </html>
