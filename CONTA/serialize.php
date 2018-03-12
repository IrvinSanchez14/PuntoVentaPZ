
<?php

	include('conexion/rsvc.php');
$fechade = $_REQUEST['fechade'];
$fechaa = $_REQUEST['fechaa'];
 $con=new conexion();
$q = "SELECT date(fechatiempo)as fecha,empresa,descripcion,via,precio from compras where date(fechatiempo) between '$fechade' and '$fechaa'";
$bdq = $con->Ejecutar($q);
$arreglo = array();
while($arreglos = mysql_fetch_array($bdq)){
			$arreglo[]=$arreglos;
			}
$q1 = "SELECT sum(precio)as precio from compras where date(fechatiempo) between '$fechade' and '$fechaa'";
$bdq = $con->Ejecutar($q1);
$arreglo1 = array();
while($arreglos1 = mysql_fetch_array($bdq)){
			$arreglo1[]=$arreglos1;
			}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Easy Admin Panel an Admin Panel Category Flat Bootstrap Responsive Website Template | Tables :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!----webfonts--->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts---> 
 <!-- Meters graphs -->
<script src="js/jquery-1.10.2.min.js"></script>
<!-- Placed js at the end of the document so the pages load faster -->

</head> 
   
 <body class="sticky-header left-side-collapsed"  onload="initMap()">
    <section>
    <!-- left side start-->
		
	<!-- //header-ends -->
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
								<th>Fecha</th>
								<th>Empresa o Persona</th>
								<th>Descipcion</th>
								<th>Tipo de Pago</th>
								<th>Monto</th>
							
							  </tr>
							  <?php foreach ($arreglo as $arreglos) { ?>
							  <tr>
							  <td><?php echo $arreglos['fecha']; ?></td>
							  <td><?php echo $arreglos['empresa']; ?></td>
							  <td><?php echo $arreglos['descripcion']; ?></td>
							  <td><?php echo $arreglos['via']; ?></td>
							  <td><?php echo $arreglos['precio']; ?></td>
							  </tr>
							  <?php } ?>
							</thead>
							<tbody>
							
							  
							</tbody>
						  </table>
						</div><!-- /.table-responsive -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--footer section start-->
			<footer>
			   <p>&copy 2016 La Pizzeria. All Rights Reserved | Design by Irvin Sanchez.</a></p>
			</footer>
        <!--footer section end-->
	</section>
	
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>

