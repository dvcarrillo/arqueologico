/*
David Vargas Carrillo
Arturo Cortés Sánchez
Sistemas de Información Basados en Web
Curso 2017 - 2018

Práctica 3
Comportamiento de la seccion de comentarios en un articulo
*/

// Numero de comentarios al inicio
let num_comments = 0;

/** Se llama a esta funcion cuando se cargan todos los elementos de la pagina
*/
window.onload = function () {
	num_comments = document.getElementById("num-comments").innerText
};

/** Modifica el numero de comentarios mostrado en el boton
*/
function updateNumComments(num) {
    document.getElementById("num-comments").innerText = num_comments;
}

/** Muestra u oculta la seccion de comentarios
*/
function showComments() {
    var element = document.getElementById("comments-block");

    if (element.style.display == "block")
        element.style.display = "none";
    else
        element.style.display = "block";
}

/** Comprueba que el email es correcto
*/
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

/** Comprueba que el comentario está correcto
*/
function isCommentOk(name, email, comment){
	var error = "";
	
	if (name == ""){
		error += "El nombre está vacío\n";
	}
	if (!validateEmail(email)){
		error += "El correo especificado es inválido\n";
	}
	if (comment === ""){
		error += "El comentario está vacío\n";
	}
	if (error != ""){
		alert(error);
		return false;
	}
	else{
		return true;
	}
}


/* Muestra u oculta la informacion del autor
*/
function showInfoBox(commentNumber, authorName, imageName) {
    var element = document.getElementById("author-box");

    if (element.style.display == "inline-block")
        element.style.display = "none";
    else {
        document.getElementById("author-info-name").innerHTML = authorName;
        let imagePath = "views/img/avatar/" + imageName;
        document.getElementById("author-info-avatar").src = imagePath;
        if (imageName == "avatar.png") 
            document.getElementById("author-info-subtitle").innerHTML = "Usuario invitado";
        else
            document.getElementById("author-info-subtitle").innerHTML = "Usuario registrado";
        element.style.top = (153 * (commentNumber - 1)) + "px";
        element.style.display = "inline-block";
    }
}

/* Inserta un nuevo comentario
*/
function addComment() {
    var name = document.getElementById("name-field").value;
    var email = document.getElementById("email-field").value;
	var comment = document.getElementById("comment-field").value;
	
	if(isCommentOk(name, email, comment)){

		num_comments++;

		// Guarda la fecha actual
		const MONTH_NAMES = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", 
		"octubre", "noviembre", "diciembre"];
		var date = new Date();

		var day = date.getDate();
		var month = MONTH_NAMES[date.getMonth()];
		var year = date.getFullYear();
		var time = date.toTimeString().split(' ')[0];
		var date_string = " A las " + time + " el " + day + " de " + month + " de " + year;

		// Actualiza la vista con un nuevo bloque de comentario
		var new_comment =
			'<div class="comment" id="comment-' + num_comments + '">\n' +
				'<div class="profile-img">\n' + 
					'<img id="comment-avatar" src="views/img/avatar/avatar.png" alt="avatar" onclick="showInfoBox(' + num_comments + ', \'' + name + '\', \'avatar.png\');">\n' +
				'</div>\n' + 
				'<div class="comment-text">\n' +
					'<p class="comment-author">#<span id="comment-number">' + num_comments + '</span> <span id="author-name" onclick="showInfoBox(' + num_comments + ', \'' + name + '\', \'avatar.png\');">' + name + '</span><!-- : --></p>\n' +
					'<p class="comment-content" id="comment-content">' + comment + '</p>\n' +
					'<p class="comment-date">' + date_string + '</p>\n' +
				'</div>\n' +
			'</div>\n';
		document.getElementById("comment-list").innerHTML += new_comment;

		// Actualiza el numero de comentarios
		updateNumComments(num_comments);

		// Limpia los campos del formulario
		document.getElementById("name-field").value = "";
		document.getElementById("email-field").value = "";
		document.getElementById("comment-field").value = "";
	}
}

/** Censura las palabras prohibidas
*/
function censorBeep(){
	var comment = document.getElementById("comment-field").value;
	var regxp =  /tont.|idiota|mierda|estupid.|imbecil|caca/i;
	var ban = regxp.exec(comment);

	if (ban != null) {
		if (ban[0]!=""){
			comment = comment.replace(ban,'*'.repeat(ban[0].length));
		}
	}

	document.getElementById("comment-field").value = comment; 
}

function banWords(event){
	var char = event.which || event.keyCode;
	if (char == 32)
		censorBeep();
}
