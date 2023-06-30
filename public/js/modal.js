var modal = document.getElementById('simpleModal');

var modalBtn = document.getElementById('modalBtn');

var closeBtn = document.getElementsByClassName('closeBtn')[0];

//Listen for click
modalBtn.addEventListener('click', openModal);

//Listener for close click
closeBtn.addEventListener('click', closeModal);

window.addEventListener('click', outsideclick)

function openModal() {
	modal.style.display = 'block';
}

function closeModal(){
	modal.style.display = 'none';
}

function outsideclick(e) {
	if (e.target == modal) {
		modal.style;display = 'none';
	}
}

/*Modification*/
