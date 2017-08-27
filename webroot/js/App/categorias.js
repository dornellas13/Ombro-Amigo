$(document).ready(function(){
    categoria.DataTable = new DataTableHelper();
    categoria.DataTable.CarregaDataTable();
});
function Categoria(){}

Categoria.prototype = {
    constructor: Categoria,
    DataTable: null
}

var categoria = new Categoria();