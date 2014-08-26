/**
 * @author jackson
 */
function substituir() {
		document.getElementById("substitui").innerHTML = "Preencha Usuário e Senha";//innerHTML subistitui o valor do elemento.
	}

function validaForm(form){
	if (document.getElementById('login').value == "") {
		document.getElementById('login').style.borderColor = 'red'; // acessando as bordas do input na id=nome.
		document.form.login.focus();// retorna para o campo vazio.
		substituir();
		return false;		
	}else if(document.getElementById('login').value.length <=5 || document.getElementById('login').value.length > 12){
		document.getElementById("substitui").innerHTML = "Senha e/ou usuário incorretos!";
		document.getElementById('login').style.borderColor = 'red'; // acessando as bordas do input na id=nome.
		document.form.login.focus();// retorna para o campo vazio.
		return false;
		
		
	}else

		form.submit();

	}

function submeter(){
	form.submit();
}