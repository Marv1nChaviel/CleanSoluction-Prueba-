$('#formulario-agregarcliente').submit(function(e) {
    e.preventDefault();

    const Datos = {
        nombre_cliente: $("#nombre_cliente").val(),
        cedula_rif: $("#cedula_rif").val(),
        Telefono: $("#Telefono").val(),
        direccion: $("#direccion").val(),
        
    };

    $.post('./register_clients.php', Datos, function(
        respuesta) { // metodo post del query 

        if (respuesta == "Ejecutado") {
                $('#formulario-agregarcliente')[0].reset();
        } else {

        }

    });
    
});


//REgistrar Vendedores ---------------------------
$('#formulario-agregarvendedor').submit(function(e) {
    e.preventDefault();

    const Datos = {
        nombre_vendedor: $("#nombre_vendedor").val(),
        email: $("#email").val(),
        password: $("#password").val(),
        
    };

    $.post('./register_seller.php', Datos, function(
        respuesta) { // metodo post del query igualmente funcional que el anterior

        if (respuesta == "Ejecutado") {
            $('#formulario-agregarvendedor')[0].reset();
        } else {

        }

    });
    
});

// registro producto ---------------------------------------

$('#formulario-agregarproducto').submit(function(e) {
    e.preventDefault();

    const Datos = {
        category: $("#selected-category").val(),
        producto: $("#producto").val(),
        precio_base: $("#precio_base").val(),
        Descuento: $("#Descuento").val(),
        
    };

    $.post('./register_products.php', Datos, function(
        respuesta) { // metodo post del query igualmente funcional que el anterior

        if (respuesta == "Ejecutado") {
            $('#formulario-agregarproducto')[0].reset();
        } else {

        }

    });
    $('#producto-table').DataTable().ajax.reload();
});

// Registrar Venta --------------------------------

$('#formulario-agregarventa').submit(function(e) {
    e.preventDefault();

    const Datos = {
        producto: $("#product-select").val(),
        cliente: $("#client-select").val(),
        vendedor: $("#vendedor-select2").val(),
        
    };

    $.post('./register_sale.php', Datos, function(
        respuesta) { // metodo post del query igualmente funcional que el anterior

        if (respuesta == "Ejecutado") {
            $('#formulario-agregarventa')[0].reset();
            
        } else {
           
        }

    });
    $('#producto-table').DataTable().ajax.reload();
});
