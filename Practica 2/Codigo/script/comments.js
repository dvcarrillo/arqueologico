/*
David Vargas Carrillo
Arturo Cortés Sánchez
Sistemas de Información Basados en Web
Curso 2017 - 2018

Práctica 2
Comportamiento de la seccion de comentarios en un articulo
*/

// Numero de comentarios al inicio
let num_comments = 2;

/* Se llama a esta funcion cuando se cargan todos los elementos de la pagina
*/
window.onload = function () {
    console.log("Ventana cargada, hay " + num_comments + " comentarios!");
    document.getElementById("num-comments").innerText = num_comments;
};

/* Muestra u oculta la seccion de comentarios
*/
function showComments() {
    var element = document.getElementById("comments-block");

    if (element.style.display == 'block') {
        element.style.display = 'none';
    } else {
        element.style.display = 'block';
    } 
}

/* Inserta un nuevo comentario
*/
function addComment() {
    var name = document.getElementById("name-field").value;
    var email = document.getElementById("email-field").value;
    var comment = document.getElementById("comment-field").value;
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

    var new_comment =
        '<div class="comment">\n' +
            '<div class="profile-img">\n' + 
                '<img src="img/avatar/avatar.png" alt="avatar">\n' +
            '</div>\n' + 
            '<div class="comment-text">\n' +
                '<p class="comment-author">#<span id="comment-number">' + num_comments + '</span> <span id="author-name">' + name + '</span><!-- : --></p>\n' +
                '<p class="comment-content" id="comment-content">' + comment + '</p>\n' +
                '<p class="comment-date">' + date_string + '</p>\n' +
            '</div>\n' +
        '</div>\n';

    document.getElementById("comment-list").innerHTML += new_comment;

    document.getElementById("name-field").value = "";
    document.getElementById("email-field").value = "";
    document.getElementById("comment-field").value = "";

    console.log(name + " (" + email + ") ha comentado: " + comment);
}
