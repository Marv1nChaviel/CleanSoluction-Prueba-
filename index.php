<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="./css/responsive.dataTables.min.css">
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
    <title>CleanSoluction|Gestion de Ventas
    </title>
</head>
<body> 
     <!--LOGO  -->
    <div class="logo">
        <img src="./favicon.ico" alt="">
        <div class="title-logo">CleanSoluction</div>
    </div>
    
                                        <!-- Formularios -->
   <section class="form-section">
   <!-- FORMULARIO DE CLIENTES-->
   <div id="form">

    <form class="form-style" id="formulario-agregarcliente">
        <h2 class="form-title">Registrar Clientes</h2>

        <p class="form-text" ><input type="text:" id="nombre_cliente" placeholder="Nombre" required></input></p>

        <p class="form-text" ><input type="text:" id="cedula_rif" placeholder="Cedula/Rif" required></input></p>

        <p class="form-text" ><input type="tel" id="Telefono" pattern="0[1-5]{3}[0-9]{7}" title="Ejemplo: 04141231231" placeholder="Telefono" required></input></p>

        <p class="form-text" ><input type="text:" id="direccion" placeholder="direccion" required></input></p>

        

        <div class="pie-form">
          <button type="submit" id="cliente-submit" class="btn-form-agg">Registrar Cliente</button>
         <img src="./images/peoples.png" alt="">
        </div>

    </form>

   </div>

   <!-- FORMULARIO PARA AGG PRODUCTOS -->

   <div id="form">

    <form class="form-style" id="formulario-agregarproducto">
        <h2 class="form-title">Registrar Productos</h2>

        <div class="box">
            <select id="selected-category">
              <option value="Higiene">Higiene</option>
              <option value="Limpieza">Limpieza</option>
              <option value="Cosmeticos">Cosmeticos</option>
            </select>
          </div>

          <p class="form-text" >
            <input type="text:" id="producto" name="producto" min="0" step="0.01" placeholder="Producto" required></input></p>

        <p class="form-text" >
            <input type="text:" id="precio_base"  class="impPrecio" min="0" step="0.01" placeholder="Precio Base" required></input>$</p>

            <input type="text:" id="Descuento" class="impDescuento" min="0" step="0.01" placeholder="Descuento" required>%</input>

            

        <div class="pie-form-2">
          <button type="submit" id="productos-submit" class="btn-form-productos">Registrar Producto</button>
          <img src="./images/productos.png" alt="">
        </div>

    </form>

   </div>
<!-- FORMULARIO PARA REGISTRAR VENDEDORES -->
   <div id="form">

    <form class="form-style" id="formulario-agregarvendedor">
        <h2 class="form-title">Registrar Vendedores</h2>

        <p class="form-text" ><input type="text:" id="nombre_vendedor" placeholder="Nombre" required></input></p>

        <p class="form-text" ><input type="email:" id="email" placeholder="Email" required></input></p>

        <p class="form-text" ><input type="password" id="password" placeholder="contraseña" required></input></p>

        

        <div class="pie-form-3">
          <button type="submit" id="vendedor-submit" class="btn-form-vendedores">Registrar Vendedor</button>
           <img src="./images/agente.png" alt="">
        </div>

    </form>

   </div>

   
   </section>
    
    <!-- BOTONES PARA MODAL -->
    <div class="btns-modal">
    <button type="button" class="btn-form-productos" data-toggle="modal"
     data-target=".estadisticas-vendedor">Estadisticas Vendedores</button>
     
    <button type="button" class="btn-form-productos" data-toggle="modal" 
     data-target=".registro-ventas">Registrar venta</button>
    </div>
    <!-- BOTONES PARA MODAL END -->


<!-- TABLA PARA MOSTRAR LOS PRODUCTOS AGREGADOS -->
<div class="table">
<h2>Listado de Productos</h2>

<table id="producto-table" class="responsive nowrap display" style="width:100%">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Categoría</th>
        <th>Precio Base</th>
        <th>Descuento</th>
        <th>Subtotal</th>
      </tr>
    </thead>
    <tbody id="producto-body">
      <!-- Aquí se insertarán los productos agregados -->
    </tbody>
  </table>
</div>

   <!-- MODALES -->

<!-- estadisticas vendedores -->
<div class="modal fade estadisticas-vendedor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="input-group">
    <select class="custom-select" id="vendedor-select">
    <option hidden>Vendedor</option>
  
  </select>
  <br><br>
    <table class="table" id="sales-table">
  <thead class="thead-dark">
    <tr>
      <th scope="col"># Ventas</th>
      <th scope="col">Total Ventas</th>
      <th scope="col">Mas Vendido</th>
    </tr>
  </thead>
  <tbody>
    
  </tbody>
</table>
    </div>
  </div>
</div>
</div>

   <!-- resgitrar ventas -->

   <div class="modal fade registro-ventas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form id ="formulario-agregarventa">
    <div class="input-group">
    <select class="custom-select" id="product-select">
    <option selected>Producto</option>
    
  
  </select>
</div>
 
  <br>
  <div class="form-group">
  <select class="custom-select" id="client-select">
    <option selected>Cliente</option>
  
  </select>
  </div>
  <div class="input-group">
  <select class="custom-select" id="vendedor-select2">
    <option selected>Vendedor</option>
  
  </select>
</div>
<br>
  <button type="submit" class="btn btn-primary">Registrar Venta</button>
</form>
    </div>
  </div>
</div>

   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   <!-- <script src="./js/function.js"></script> -->
  <script src="./js/jquery-3.7.1.min.js"></script>
  <script src="./js/get_select.js"></script>
  <script src="./js/register_forms.js"></script>
  <script src="./js/jquery.dataTables.min.js"></script>
  <script src="./js/dataTables.responsive.min.js"></script>

  
  
    <script>
        $(document).ready(function() {
            var tabla = $('#producto-table').DataTable({

                ajax: {
                    url: './table_query.php',
                    dataSrc: '',
                },
                searching: false,
                
                columns: [{
                        data: 'nombre'
                    },
                    {
                        data: 'categoria'
                    },
                    {
                        data: 'precio_base'
                    },
                    {
                        data: 'descuento'
                    },
                    {
                        data: 'subtotal'
                    },
                    
                    
                ],

                lengthMenu: [
                    [10, 25, 50, 100, 200, -1],
                    ['10 Filas', '25 Filas', '50 Filas', '100 Filas', '200 Filas', 'Todas']
                ]


            });


        });
  </script>

  <script>
    const select = document.getElementById('vendedor-select');

    select.addEventListener('change', () => {
      const value = select.value;
      
      const Datos = {
        id_vendedor: value,
      };
    $.post('./sales_list.php', Datos, function(
        respuesta) { // metodo post del query igualmente funcional que el anterior
         // Obtiene la referencia a la tabla HTML
        var datos = JSON.parse(respuesta);
        var tabla = document.getElementById("sales-table");

        var filas = tabla.getElementsByTagName("tr");
        var cantidadFilas = filas.length;

        // Itera desde la última fila hasta la segunda fila (excluyendo la primera fila de encabezados)
        for (var i = cantidadFilas - 1; i > 0; i--) {
          tabla.deleteRow(i);
        }
        // Recorre los datos JSON y agrega filas a la tabla
        for (var i = 0; i < datos.length; i++) {
          // Crea una nueva fila en la tabla
          var fila = tabla.insertRow();

          // Agrega celdas a la fila con los valores de los datos JSON
          var celda1 = fila.insertCell();
          celda1.innerHTML = datos[i].n_ventas;

          var celda2 = fila.insertCell();
          celda2.innerHTML = datos[i].total_ventas;

          var celda3 = fila.insertCell();
          celda3.innerHTML = datos[i].mas_vendido;
        }
    
    });
  
  });
  </script>
  <script>
   
var boton = document.getElementById('vendedor-submit');

// Agregar el evento de clic al botón
boton.addEventListener('click', function() {
  select1();
});
  </script>

  
</body>
</html>