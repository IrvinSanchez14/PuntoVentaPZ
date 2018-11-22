
<!DOCTYPE HTML>
<html>
<head>
<title>Contaduria Compras</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<script src="js/Chart.js"></script>
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<script src="js/jquery-1.10.2.min.js"></script>
      <script type = "text/javascript" language = "javascript">
         $(document).ready(function() {
			
            $("#driver").click(function(event){
				
               $.post( 
                  "serialize.php",
                  $("#testform").serialize(),
						
                  function(data) {
                     $('#stage1').html(data);
                  }
						
               );
					
               var str = $("#testform").serialize();
               $("#stage2").text(str);
            });
				
         });
      </script>
	 
</head>

<body >

  <center><h1>Contaduria Compras</h1>   
 <form id = "testform">
<div class="table-responsive">
						  <table class="table table-bordered">
						  <tr>
DE<input type="date" name="fechade"> A<input type="date" name="fechaa"> 
 <input type = "button" id = "driver" value = "Cargar" style='width:100px; height:40px;' />
   </tr>
   </div>
</form>
<div id = "stage1">
         
		 
      </div>
	  </center>
	  </div>
			</div>
</body>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</html>


