    //Modelo de datos tipo JSON
    var macModels = {
        "p1" : {
            fechade : "2016-01-01",
            fechaa: "2016-01-14"
           
        },
        "p2" : {
        	fechade : "2016-01-15",
        	fechaa : "2016-01-31"
        },
		"p3" : {
        	fechade : "2016-02-01",
        	fechaa : "2016-02-14"
        },
		"p4" : {
        	fechade : "2016-02-15",
        	fechaa : "2016-02-29"
        },
		"p5" : {
        	fechade : "2016-03-01",
        	fechaa : "2016-03-14"
        },
		"p6" : {
        	fechade : "2016-03-15",
        	fechaa : "2016-03-31"
        },
		"p7" : {
        	fechade : "2016-04-01",
        	fechaa : "2016-04-14"
        },
		"p8" : {
        	fechade : "2016-04-15",
        	fechaa : "2016-04-30"
        },
		"p9" : {
        	fechade : "2016-05-01",
        	fechaa : "2016-05-14"
        },
		"p10" : {
        	fechade : "2016-05-15",
        	fechaa : "2016-05-31"
        },
		"p11" : {
        	fechade : "2016-06-01",
        	fechaa : "2016-06-14"
        },
		"p12" : {
        	fechade : "2016-06-15",
        	fechaa : "2016-06-30"
        },
		"p13" : {
        	fechade : "2016-07-01",
        	fechaa : "2016-07-14"
        },
		"p14" : {
        	fechade : "2016-07-15",
        	fechaa : "2016-07-31"
        },
		"p15" : {
        	fechade : "2016-08-01",
        	fechaa : "2016-08-14"
        },
		"p16" : {
        	fechade : "2016-08-15",
        	fechaa : "2016-08-31"
        },
		"p17" : {
        	fechade : "2016-09-01",
        	fechaa : "2016-09-14"
        },
		"p18" : {
        	fechade : "2016-09-15",
        	fechaa : "2016-09-30"
        }
        
    };

    //variable para el modelo elegido
    var modelSelected;

    $(document).ready(function(){ //se ejecuta al cargar la página (OBLIGATORIO)

       $("#mac").on("change", function(){ //se ejecuta al cambiar valor del select
           modelSelected = $(this).val(); //Asignamos el valor seleccionado

           if(modelSelected != ""){ //Si tiene un valor llenamos los campos 1 x 1
               $("#fechade").val(macModels[modelSelected].fechade);
               $("#fechaa").val(macModels[modelSelected].fechaa);
               
           } else { //Si escogieron una opcion no valida ponemos los campos en blanco
               $("#fechade").val("");
               $("#fechaa").val("");
               
           }

       });
    });