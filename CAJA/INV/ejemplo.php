<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>jQuery Print Plugin</title>
    <script src="../js/jquery-1.4.4.min.js" type="text/javascript"></script>
    <script src="../js/jquery.printPage.js" type="text/javascript"></script>

  <script>  
  $(document).ready(function() {
    $(".btnPrint").printPage();
  });
  </script>
	</head>
	<body>
		<h3>This is a print button example</h3>
		<p>When you hit the button it will load your print template in an iframe and print it!</p>
		<p><button class="btnPrint" href='venta_diaria.php'>Print!</button></p>
    <p><a class="btnPrint" href='iframes/iframe2.html'>Print second page!</a></p>
	</body>
</html>