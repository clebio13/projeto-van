function subEsituir() {
		document.getElementById("demo").innerHTML = "Nome de usuário e senha deve ser preenchido!";//innerHTML subistitui o valor do elemento.
	}

function validarform(){
	
	
	if (document.getElementById('login').value == "") {
			document.getElementById('login').style.borderColor = 'red'; // acessando as bordas do input na id=nome.
			document.form.nome.focus();// retorna para o campo vazio.
			return false;
			
		}
	
	}