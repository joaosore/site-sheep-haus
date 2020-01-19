export function numberToReal(value) {
	var n = (typeof value === 'number') ? value : parseFloat(value);
	n = n.toFixed(2).toString();
	var numero = n.split('.');
	numero[0] = "R$ " + numero[0].split(/(?=(?:...)*$)/).join('.');
	return numero.join(',');
}

export function numberToDollar(value) {
	var n = (typeof value === 'number') ? value : parseFloat(value);
	n = n.toFixed(2).toString();
	var numero = n.split('.');
	numero[0] = "$ " + numero[0].split(/(?=(?:...)*$)/).join(',');
	return numero.join('.');
}