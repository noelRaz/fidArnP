var modal1 = document.getElementById('simpleModal1');

var modalBtn1 = document.getElementById('modalBtn1');

var closeBtn = document.getElementsByClassName('closeBtn')[0];

//Listen for click
modalBtn1.addEventListener('click', openModal);

//Listener for close click
closeBtn.addEventListener('click', closeModal);

window.addEventListener('click', outsideclick)

function openModal() {
	modal1.style.display = 'block';
}

function closeModal(){
	modal1.style.display = 'none';
}

function outsideclick(e) {
	if (e.target == modal1) {
		modal1.style;display = 'none';
	}
}