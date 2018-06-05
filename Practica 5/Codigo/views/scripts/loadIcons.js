/*
David Vargas Carrillo
Arturo Cortés Sánchez
Sistemas de Información Basados en Web
Curso 2017 - 2018

Práctica 4
Define los comportamientos de los botones al pulsar sobre ellos
*/

function swapByLoadingIcon() {
    let previousHTML = document.getElementById("loading-button").innerHTML;
    document.getElementById("loading-button").innerHTML = "<i class=\"fas fa-sync fa-spin\"></i>";
    setTimeout(
        function() {
            document.getElementById("loading-button").innerHTML = previousHTML;
        }, 2000);
}