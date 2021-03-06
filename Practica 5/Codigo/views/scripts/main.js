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

/** Se llama a esta funcion cuando se cargan todos los elementos de la pagina
*/
window.onload = function () {
    console.log("Ventana cargada, hay " + num_comments + " comentarios!");
    num_comments = document.getElementById("num-comments").innerText;

    if (num_comments === "Sin") {
        num_comments = 0;
    }
};

/** Modifica el numero de comentarios mostrado en el boton
*/
function updateNumComments() {
    document.getElementById("num-comments").innerText = num_comments;
}

/** Muestra u oculta la seccion de comentarios
*/
function showComments() {
    let element = document.getElementById("comments-block");

    if (element.style.display == "block")
        element.style.display = "none";
    else
        element.style.display = "block";
}

/** Muestra u oculta la seccion de comparticion
*/
function showShare() {
    let element = document.getElementById("share-block");
    if (element.style.display == "block")
        element.style.display = "none";
    else
        element.style.display = "block";
}

/** Acciones para compartir en las redes sociales
 */
function twitterShare() {
    let message = prompt("Se publicará en Twitter el siguiente mensaje:");
    if (message !== "") {
        alert("Tweet publicado:\n\n" + message + "\nhttps://www.arqueologicogranada.es");
    }
    else {
        alert("Su tweet no se ha publicado porque no ha introducido texto");
    }
}
function facebookShare() {
    let message = prompt("Se publicará en Facebook el siguiente mensaje:");
    if (message !== "") {
        alert("Publicación creada:\n\n" + message + "\nhttps://www.arqueologicogranada.es");
    }
    else {
        alert("Su publicación no se ha creado porque no ha introducido texto");
    }
}

/** Comprueba que el email es correcto
 */
function validateEmail(email) {
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

/** Comprueba que el comentario está correcto
 */
function isCommentOk(name, email, comment) {
    let error = "";

    if (name == "") {
        error += "El nombre está vacío\n";
    }
    if (!validateEmail(email)) {
        error += "El correo especificado es inválido\n";
    }
    if (comment === "") {
        error += "El comentario está vacío\n";
    }
    if (error != "") {
        alert(error);
        return false;
    }
    else {
        return true;
    }
}


/** Muestra u oculta la informacion del autor
*/
function showInfoBox(commentNumber, authorName, imageName) {
    let element = document.getElementById("author-box");

    if (element.style.display == "inline-block")
        element.style.display = "none";
    else {
        document.getElementById("author-info-name").innerHTML = authorName;
        let imagePath = "views/img/avatar/" + imageName;
        document.getElementById("author-info-avatar").src = imagePath;
        element.style.top = (153 * (commentNumber - 1)) + "px";
        element.style.display = "inline-block";
    }
}

/** Inserta un nuevo comentario
*/
function addComment() {
    let name = document.getElementById("name-field").value;
    let email = document.getElementById("email-field").value;
    let comment = document.getElementById("comment-field").value;

    if (isCommentOk(name, email, comment)) {

        num_comments++;

        // Guarda la fecha actual
        const MONTH_NAMES = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre",
            "octubre", "noviembre", "diciembre"];
        let date = new Date();

        let day = date.getDate();
        let month = MONTH_NAMES[date.getMonth()];
        let year = date.getFullYear();
        let time = date.toTimeString().split(' ')[0];
        let time_formatted;

        for (let i = 0; i < time.length - 2; i++) {
            time_formatted += time[i];
        }

        let date_string = " A las " + time_formatted + " el " + day + " de " + month + " de " + year;

        // Actualiza la vista con un nuevo bloque de comentario
        let new_comment =
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
function censorBeep() {
    let comment = document.getElementById("comment-field").value;
    let regxp = /tont.|idiota|mierda|estupid.|imbecil|caca/i;
    let ban = regxp.exec(comment);

    if (ban != null) {
        if (ban[0] != "") {
            comment = comment.replace(ban, '*'.repeat(ban[0].length));
        }
    }

    document.getElementById("comment-field").value = comment;
}

function banWords(event) {
    let char = event.which || event.keyCode;
    if (char == 32)
        censorBeep();
}

/** Muestra el formulario de edicion de comentario
 */
function displayEditCommentForm(id_comment) {
    let lookfor = "edit-comment-form-" + id_comment;
    let element = document.getElementById(lookfor);
    if (element.style.display == "block")
        element.style.display = "none";
    else
        element.style.display = "block";
}

/** Muestra el formulario de adicion/edicion de articulo
 */
function displayNewArticleForm() {
    let element = document.getElementById("new-article");
    if (element.style.display === "block")
        element.style.display = "none";
    else
        element.style.display = "block";
}
function displayEditArticleForm() {
    let element = document.getElementById("edit-article");
    if (element.style.display === "block")
        element.style.display = "none";
    else
        element.style.display = "block";
}

/** Muestra/oculta la barra de búsqueda
 */
function displaySearchBar() {
    let search = document.getElementById('search-bar');
    let searchField = document.getElementById('search-field');
    let searchIcon = document.getElementById('search-icon');
    let results = document.getElementById('results');

    if (search.style.display === "none") {
        if(searchField.value != "") {
            hideArticles();
        } else if (results.innerHTML != "") {
            hideArticles();
        }
        search.style.display = "block";
        searchIcon.style.color = 'black';
    }
    else {
        showArticles();
        search.style.display = "none";
        searchIcon.style.color = 'grey';
    }
}

/** Muestra/oculta todos los articulos de la pagina principal
 */
function hideArticles() {
    document.getElementById("centralbox").style.display = "none";
    let elements = document.getElementsByClassName("box secondary");
    for (let i = 0; i < elements.length; i++) {
        elements[i].style.display = "none";
    }
}
function showArticles() {
    document.getElementById("centralbox").style.display = "block";
    let elements = document.getElementsByClassName("box secondary");
    for (let i = 0; i < elements.length; i++) {
        elements[i].style.display = "inline-block";
    }
}

/** Funciones dedicadas a la busqueda
 */

function cleanList() {
    let listElement = document.getElementById('results');
    while (listElement.firstChild) {
        listElement.removeChild(listElement.firstChild);
    }
}

function actualizarLista(data) {
    let results = document.getElementById('results');
    let result = document.createElement("div");
    result.setAttribute("class", "box secondary");
    result.setAttribute("id", "secondarybox");
    result.innerHTML = "<a href=\"?option=show&item=" +data.id_art+ "\" >" + "\n" + "<img src=\"views/img/" + data.imagen_principal + "\""+ " style=\"margin-left: auto; margin-right:auto;\">" + "\n" + "</a>" + "\n" + "<div id=\"img-strip\">" + "\n" + "<h2><a href='?option=show&item=" + data.id_art + "'>" + data.titulo + "</a></h2>" + "\n" + "<p>" + data.subtitulo + "</p>" + "\n" + "</div> ";
    results.appendChild(result);
}

