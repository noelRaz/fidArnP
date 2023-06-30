var modalModif = document.getElementById('simpleModalModif');

var modalBtnModif = document.getElementById('modalBtnModif');

var closeBtnModif = document.getElementsByClassName('closeBtnModif')[0];

//Listen for click
modalBtnModif.addEventListener('click', openModalModif);

//Listener for close click
closeBtnModif.addEventListener('click', closeModalModif);

window.addEventListener('click', outsideclick)

function openModalModif() {
	modalModif.style.display = 'block';
}

function closeModalModif(){
	modalModif.style.display = 'none';
}

function outsideclick(e) {
	if (e.target == modalModif) {
		modalModif.style;display = 'none';
	}
}