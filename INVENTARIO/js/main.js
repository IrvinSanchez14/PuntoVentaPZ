(function(){
	// Variables
	var lista = document.getElementById("lista"),
		tareaInput = document.getElementById("tareaInput"),
		btnNuevaTarea = document.getElementById("btn-agregar");
        var can = document.getElementById("can"),
		Canti = document.getElementById("Cantidad"),
		btnNuevaTarea = document.getElementById("btn-agregar");

	// Funciones
	var agregarTarea = function(){
		var tarea = tareaInput.value,
            cantidad = Canti.value,
			nuevaTarea = document.createElement("li"),
			enlace = document.createElement("input"),
            enlace2 = document.createElement("input"),
			contenido = document.createTextNode(tarea),
            cant = document.createTextNode(cantidad);

		if (tarea === "") {
			tareaInput.setAttribute("placeholder", "Agrega una tarea valida");
			tareaInput.className = "error";
			return false;
		}
        
        if (cantidad === "") {
			Canti.setAttribute("placeholder", "Agrega una tarea valida");
			Canti.className = "error";
			return false;
		}

		// Agregamos el contenido al enlace
		enlace.appendChild(cant);
        enlace2.appendChild(contenido);
        
       
		// Le establecemos un atributo href
		//enlace.setAttribute("href", "#");
		enlace.setAttribute("value", tarea);
        enlace.setAttribute("class", "compras");
        enlace.setAttribute("name", "producto[]");
        enlace2.setAttribute("class", "compras");
        enlace2.setAttribute("name", "cantidad[]");
        enlace2.setAttribute("value", cantidad);
        
      
		// Agrergamos el enlace (a) a la nueva tarea (li)
		nuevaTarea.appendChild(enlace);
        nuevaTarea.appendChild(enlace2);
		// Agregamos la nueva tarea a la lista
		lista.appendChild(nuevaTarea);

		tareaInput.value = "";

		for (var i = 0; i <= lista.children.length -1; i++) {
			lista.children[i].addEventListener("click", function(){
				this.parentNode.removeChild(this);
			});
		}

	};
	var comprobarInput = function(){
		tareaInput.className = "";
		teareaInput.setAttribute("placeholder", "Agrega tu tarea");
	};

	var eleminarTarea = function(){
		this.parentNode.removeChild(this);
	};

	// Eventos

	// Agregar Tarea
	btnNuevaTarea.addEventListener("click", agregarTarea);

	// Comprobar Input
	tareaInput.addEventListener("click", comprobarInput);

	// Borrando Elementos de la lista
	for (var i = 0; i <= lista.children.length -1; i++) {
		lista.children[i].addEventListener("click", eleminarTarea);
	}
}());