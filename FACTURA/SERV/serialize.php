<?php 
include("../conexion/conexionli.php");
$con=new conexioni();
$fecha = date("Y-m-d");
$cuenta = $_POST['cuenta'];
$suma = 0;
$q = "select count(nombre)as cant,nombre,precio_grabado from cuentas
inner join pedidos using(ID_cuenta)
inner join productos using(ID_producto)
where ID_cuenta=$cuenta and flag_cancelado=0 
group by ID_producto";
$bdq = $con->Ejecutari($q);
$arreglo = array();
while($arreglos = mysql_fetch_array($bdq)){
			$arreglo[]=$arreglos;
			}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>FACTURA</title>
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
					<h3 class="blank1">FACTURA</h3>
					 <div class="xs tabls">
						
						<div class="bs-example4" data-example-id="simple-responsive-table">
						<!-- /.table-responsive -->
						<div class="table-responsive">
						  <table class="table table-bordered">
							<thead>
							<tr>
							<th>Total Cuadrad</th>
							<th>Total Cuadrad</th>
						<th>dasd</th>
							</tr>
<?php

 foreach($arreglo as $arreglos){ ?>
<tr>	
	<td><input type="text" value="<?php echo $arreglos['cant'];?>" name="cuadrar"></td>
	<td><input type="text" value="<?php echo $arreglos['nombre'];?>" name="des"></td>
	<td><input type="text" value="<?php echo $pro = round(($arreglos['precio_grabado']/1.15),2);?>" name="dife"></td>
	<?php $suma += $pro;?>
<tr>
<?php } ?>
</table>
<?php $total = $suma; echo $total; ?>
<button>Generar EXCEL</button>
</form>
</div>
</div>
</div>
</div>
</body>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   </html>
