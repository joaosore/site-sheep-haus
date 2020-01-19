export function getPercent(value, percent) {
    var n = (typeof value === 'number') ? value : parseFloat(value);
    n = n.toFixed(2).toString();
    var numero = n.split('.');
    numero[0] = "R$ " + numero[0].split(/(?=(?:...)*$)/).join('.');
    return numero.join(',');
}

export function isNumeric(val) {
    return !isNaN(parseFloat(val)) && 'undefined' !== typeof val ? parseFloat(val) : false;
}

export function percentage(partialValue, totalValue) {
    let partial = (100 * partialValue) / totalValue;
    return 100 - partial;
} 