function switchCheck(codigo) {
	if (document.getElementById(codigo).checked) {
		document.getElementById(codigo).checked = false;
	}
	else {
		document.getElementById(codigo).checked = true;
	}
}

function marcaTurmas(codigo, turmas, qtd, estado) {
	var i;
	var turmas_array = turmas.split(',');
	
	for (i = 0; i < qtd; i++) {
		document.getElementById(codigo + "-" + 
				turmas_array[i]).checked = estado;
	}	
}

function switchMateria(codigo, turmas, qtd) {
	if (!document.getElementById(codigo).checked) {
		marcaTurmas(codigo, turmas, qtd, false);
		document.getElementById('ap' + codigo).style.visibility = 'hidden';	
	}
	else {
		marcaTurmas(codigo, turmas, qtd, true);
		document.getElementById('ap' + codigo).style.visibility = 'visible';
	}
}

function atualizarMateria(check, materia) {
	if (check.checked) {
		document.getElementById(materia).checked = true;
		document.getElementById('ap' + materia).style.visibility = 'visible';
	}
}

function mostraApelidosSelecionados() {
	// TODO: fazer checagens melhores nesta funcao
	var i, objControl, objForm, apelido;

	objForm = document.formulario;

	for (i = 0; i < objForm.elements.length; i++) {
		objControl = objForm.elements[i];
		if (objControl.checked == true) {
			apelido = document.getElementById('ap' + objControl.name);
			if (apelido)
				apelido.style.visibility = 'visible';
		}
	}

	return 0;
}

function esconde(n, bullet)
{
	document.getElementById(n).style.display = "none";
	bullet.innerHTML = "[+]";
}

function mostra(n, bullet)
{
	document.getElementById(n).style.display = "block";
	bullet.innerHTML = '[-]';
}

function alterna(n, bullet)
{
	if (document.getElementById(n).style.display != "none")
		esconde(n, bullet)
	else
		mostra(n, bullet);
}

function escondeTurma(n, bullet)
{
	document.getElementById(n).style.display = "none";
	bullet.innerHTML = "[+]";
}

function mostraTurma(n, bullet)
{
	document.getElementById(n).style.display = "block";
	bullet.innerHTML = '[-]';
}

function alternaTurma(n, bullet)
{
	if (document.getElementById(n).style.display != "block")
		mostraTurma(n, bullet)
	else
		escondeTurma(n, bullet);
}



function escondeArvore(n, bullet)
{
	document.getElementById(n).style.display = "none";
	bullet.innerHTML = "+";
}

function mostraArvore(n, bullet)
{
	document.getElementById(n).style.display = "";
	bullet.innerHTML = "&ndash";
}

function alternaArvore(n, bullet)
{
	if (document.getElementById(n).style.display == "")
		escondeArvore(n, bullet)
	else
		mostraArvore(n, bullet);
}
