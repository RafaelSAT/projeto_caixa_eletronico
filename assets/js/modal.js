var modalDeposito = document.getElementById('modalDeposito');
var btnModalDeposito = document.getElementById("btnModalDeposito");

var modalSaque = document.getElementById('modalSaque');
var btnModalSaque = document.getElementById("btnModalSaque");

btnModalSaque.onclick = function() {
    modalSaque.style.display = "block";
}

btnModalDeposito.onclick = function() {
    modalDeposito.style.display = "block";
}

window.onclick = function(e) {
    if (e.target == modalDeposito || e.target == modalSaque) {
        modalDeposito.style.display = "none";
		modalSaque.style.display = "none";
    }
}