function ponerInfoProductEnModal(accion) {
    var fila = accion.parentNode.parentNode;
    id_articulo = fila.cells[0].innerText;
    nombre = fila.cells[1].innerText;
    precio = fila.cells[2].innerText;
    imagen = fila.cells[4].innerText;
    stock = fila.cells[5].innerText;
    categoria = fila.cells[6].innerText;
    $("#nombreEA").val(nombre);
    $("#nombreE").val(nombre);
    $("#precioE").val(precio);
    $("#imagenEA").val(imagen);
    $("#stockE").val(stock);
    $("#categoriaE").val(categoria);
}
