 //vendedores select ----------------------------
$(document).ready(function () {
  select1();
  select2();
  select3();
});
  function select1(){
    let select = document.getElementById('vendedor-select');
    
    $.ajax({
      url: "./seller_list.php",
      type: "GET",
      success: function (respuesta) {
        let json = JSON.parse(respuesta);
        var len = json.length;
  
       
        for (var i = 0; i < len; i++) {
          var id = json[i]["id"];
          var nombre = json[i]["nombre"];

          
          $("#vendedor-select").append(
            "<option value=" + id + ">" + nombre +"</option>"
          );
          $("#vendedor-select2").append(
            "<option value=" + id + ">" + nombre +"</option>"
          );
        }
      },
    });
    select.selectedIndex = 1;
  }
  

  //Clientes select ----------------------------
  
    function select2(){
    $.ajax({
      url: "./client_list.php",
      type: "GET",
      success: function (respuesta) {
        let json = JSON.parse(respuesta);
        var len = json.length;
  
       
        for (var i = 0; i < len; i++) {
          var id = json[i]["id"];
          var nombre = json[i]["nombre"];
  
         
  
          
          $("#client-select").append(
            "<option value=" + id + ">" + nombre +"</option>"
          );
          }
      },
    });
  }
  
// productos select ----------------------------------------

  function select3(){
    
    $.ajax({
      url: "./product_list.php",
      type: "GET",
      success: function (respuesta) {
        let json = JSON.parse(respuesta);
        var len = json.length;
  
       
        for (var i = 0; i < len; i++) {
          var id = json[i]["id"];
          var nombre = json[i]["nombre"];
  
         
  
          
          $("#product-select").append(
            "<option value=" + id + ">" + nombre +"</option>"
          );
          }
      },
    });
  }