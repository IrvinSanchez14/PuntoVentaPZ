<script src="../js/jquery-1.4.4.min.js" type="text/javascript"></script>
<script src="../js/jquery.printPage.js" type="text/javascript"></script>
  <script>  
  $(document).ready(function() {
    $(".btnPrint").printPage();
	$(".btnPrint").click(function(){
       var timeoutID = window.setTimeout(function () {
      location.reload();
  }, 3000);
    });
  });
  </script>
<?php
	include_once("../modal/modelo.php");
	$fecha = date('Y-m-d');
	
	$click_but = boton_click();
	foreach ($click_but as $boton)
	{
		if ($boton['estado'] == 1 && $boton['fecha'] == $fecha )
		{
			echo "bloqueado";
		}
		else
		{
			echo "<form method='post' action='prueba.php'>";
			echo "<p><button class='btnPrint' href='venta_diaria.php' >Imprimir Corte!</button></p>";
			echo "</form>";
		}
	}
	
?>