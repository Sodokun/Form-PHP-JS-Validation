// DOM
const form = document.getElementById('form');
const inputAreas = document.querySelectorAll('#form input[type=text], input[type=password]');

//  Regular Expretion for valid content of input
const regx = {
	names : /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	email : /^[a-zA-Z0-9.!#$%&'*+=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/, // Email regex w3.org
	password : /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{7,13}[^'\s$@$!%*?&_.:,;]$/ // 8 to 12 Upper+lower+Number
}  


// Confirmation of Validation
var chked = {
	Fname: false,
	Lname: false,
	mail: false,
	pass: false
};

// Event of submit start of validation
form.addEventListener('submit', (e) => {
	
	inputAreas.forEach((input) => {
		validInput(input);
	});

	if(chked.Fname && chked.Lname && chked.pass && chked.mail){
		console.log('Exito Formulario enviado');
		//e.preventDefault();   //Uncomment for test purpose
		//form.reset();          //Reset valur of Form
	} else{
		
		console.log('Error complete correctamente los campos');
		e.preventDefault();
	}
});

// Validation of each Input
function validInput(input) {

	switch (input.id) {
		case 'Fname':
			validEmpty(input.value, 'Fname', input.id, regx.names);
			break;
		case 'Lname':
			validEmpty(input.value, 'Lname', input.id, regx.names);
			break;
		case 'mail':
			validEmpty(input.value, 'mail', input.id, regx.email);
			break;
		case 'pass':
			validEmpty(input.value, 'pass', input.id, regx.password);
			break;

	}
}

// adding mand removing Error Classes
function validEmpty(value, pos, id, pattern) {
	const clean = value.trim();

	if (!clean) {
		document.getElementById(id).classList.add("error");
		document.getElementById(`${id}-ico-g`).classList.remove("inpt-ico-active");
		document.getElementById(`${id}-ico`).classList.add("inpt-ico-active");
		document.getElementById(`${id}-empty`).classList.add("omit-active");
		document.getElementById(`${id}-pat`).classList.remove("omit-active");
		
		if (id == 'mail') {
			document.getElementById('mail').placeholder = "email@example.com";
			document.getElementById('mail').classList.add("ph");
		};

		chked[pos] = false;

	} else {
		document.getElementById(id).classList.remove("error");
		document.getElementById(`${id}-ico`).classList.remove("inpt-ico-active");
		document.getElementById(`${id}-empty`).classList.remove("omit-active");
		document.getElementById('mail').placeholder = "Email Address";
		document.getElementById('mail').classList.remove("ph");

		if(pattern.test(clean)){
			document.getElementById(id).classList.remove("error");
			document.getElementById(`${id}-ico-g`).classList.add("inpt-ico-active");
			document.getElementById(`${id}-pat`).classList.remove("omit-active");

			chked[pos] = true;   //Input validado es aceptado para ser enviado al servidor

		} else {
			document.getElementById(id).classList.add("error");
			document.getElementById(`${id}-ico-g`).classList.remove("inpt-ico-active");
			document.getElementById(`${id}-ico`).classList.add("inpt-ico-active");
			document.getElementById(`${id}-pat`).classList.add("omit-active");

			chked[pos] = false;
		}


	}
}

