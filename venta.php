<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bienvenido</title>

    <?php require("app-head.php");?>
  </head>

  <body class="nav-md">
    <div id="load"></div>

    <!-- Small modal -->
<div id="myModalForm" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Editar Datos</h4>
      </div>
      <div class="modal-body">
      
        <div class="md-form mb-5">
          <input type="text" id="modalCarrito" class="form-control validate" style="display:none">
        </div>
        

        <div class="md-form mb-5">
          <input type="number" id="modalCantidad" class="form-control validate">
          <label data-error="wrong" data-success="right" for="modalCantidad">Cantidad de Venta</label>
        </div>

        <div class="md-form mb-4">
          <input type="number" step="0.1" id="modalPrecio" class="form-control validate">
          <label data-error="wrong" data-success="right" for="modalPrecio">Precio de Venta</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="actualizarDatosCarrito()">Actualizar Datos</button>
      </div>

    </div>
  </div>
</div>
<!-- /modals -->

    <div class="container body">
      <div class="main_container">

        <?php require("app-slider.php");?>

        <!-- top navigation -->
        <?php require("app-header.php");?>
        <!-- /top navigation -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->

        <!-- page content -->
        <div class="md-form mb-5">
          <input type="text" id="modalInventario" style="display:none">
        </div>
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Ventas</h3>
 
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Seleccione<small> un punto de Venta</small></h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="cbox form-control" id="cboxSucursal">
                            <option value="" disabled selected>Seleccione la Sucursal</option>
                          </select>
                        </div>
                        

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <button type="button" class="cbox btn btn-success" onclick="listaProductos()">Seleccionar punto de Venta</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Productos disponibles</h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="table-simple" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>imagen</th>
                          <th>Codigo</th>
                          <th>Nombre</th>
                          <th>Precio Sugerido</th>
                          <th>Cantidad</th>
                          <th>Precio de_Venta</th>
                          <th>AGREGAR</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Carrito de Compras</h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="table-carrito" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Codigo</th>
                          <th>Nombre</th>
                          <th>Cantidad</th>
                          <th>Precio Sugerido</th>
                          <th>Descuento</th>
                          <th>Precio de_Venta</th>
                          <th>SubTotal</th>
                          <th>Editar</th>
                          <th>Eliminar</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="x_panel">
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <div class="">
                    <div class="product_price">
                      <span class="price-tax">Total a Pagar :</span>
                      <h1 class="price" id="txtTotal">Bs. 0.00</h1>
                      <br>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="form-group">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
                        <button type="button" class="btnVender btn btn-success" onclick="venderProducto()">Realizar Venta</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->


        <!-- footer content -->
        <?php require("app-footer.php");?>
        <!-- /footer content -->
      </div>
    </div>

    <?php require("app-foot.php");?>

    <script>
    var tableCarrito = "";
    var table = "";
    var moneda = 0;
        function actualizarDatosCarrito(){
            verificarAcceso("Permiso_Venta");
            var modalCarrito = document.getElementById("modalCarrito").value;
            var modalInventario = document.getElementById("modalInventario").value;
            var modalCantidad = document.getElementById("modalCantidad").value;
            var modalPrecio = document.getElementById("modalPrecio").value;

            if(modalCantidad != ""){
                if(modalPrecio != ""){
                    if(Number(modalCantidad) > 0){
                        var parametros = {
                           "action" : "actualizarCarrito",
                           "codCarrito" : modalCarrito,      
                           "precio" : modalPrecio,        
                           "cantidad" : modalCantidad,        
                           "cod_inventario" : modalInventario        
                        };
                        $.ajax({
                          type:'POST',
                          data: parametros,
                          url:'app/controladores/Ventas.php',
                          success:function(data){
                              datos = JSON.parse(data);
                              if(datos.resp == "true"){
                                  $('#myModalForm').modal("hide");
                                  tableCarrito.ajax.reload();
                                  totalPagar(document.getElementById("cboxSucursal").value)
                                  new PNotify({
                                    title: 'CARRITO DE COMPRA',
                                    text: "Se actualizalo el Carrito de Compras.",
                                    type: 'success',
                                    styling: 'bootstrap3'
                                  });
                              }
                              if(datos.resp == "false"){
                                new PNotify({
                                  title: 'CARRITO DE COMPRAS',
                                  text: "Ocurrio un Fallo al actualizar el carrito de productos, vuelva a intentarlo",
                                  styling: 'bootstrap3'
                                });
                              }
                              if(datos.resp != "true" && datos.resp != "false"){
                                new PNotify({
                                  title: 'CARRITO DE COMPRAS',
                                  text: "Ocurrio un Fallo al actualizar el carrito de productos CODIGO DE ERROR:"+datos.resp+". Contactese con el Administrador.",
                                  type: 'error',
                                  styling: 'bootstrap3'
                                });
                              }
                          }
                        })
                    }else{
                        $.alert({
                            title: 'STOCK NO DISPONIBLE',
                            content: 'La cantidad de venta que introdujo no esta disponible en la cantidad de stock del Producto. Ingrese una cantidad mayor a 0 e inferior o igual a :'+ data.cant_producto,
                            buttons: {
                                deAcuerdo: {
                                    text: 'De Acuerdo',
                                    btnClass: 'btn-blue',
                                    keys: ['enter'],
                                    action: function(){
                                    }
                                }
                            }
                        });
                    }
                }else{
                  new PNotify({
                    title: 'PRECIO',
                    text: "Ingrese el Precio de Venta del Producto y Vuelva a Intentarlo.",
                    type: 'info',
                    styling: 'bootstrap3'
                  });
                }
            }else{
              new PNotify({
                title: 'CANTIDAD',
                text: "Ingrese la Cantidad de Venta del Producto y Vuelva a Intentarlo.",
                type: 'info',
                styling: 'bootstrap3'
              });
            }
        }

        $(document).ready(function() {
            verificarAcceso("Permiso_Venta");
            $('.btnVender').attr("disabled","disabled");
            var cboxSucursal = document.getElementById("cboxSucursal");
            var parametros = {
             "action" : "listaAccesosSucursalesCodigo"        
          };
          $.ajax({
            type:'POST',
            data: parametros,
            url:'app/controladores/Accesos.php',
            success:function(data){
                datos = JSON.parse(data);
                datos = datos.data
                for(let i=0 ; i<datos.length ; i++){
                    var tag = document.createElement('option');
                    tag.setAttribute('value', datos[i].cod_sucursal);
                    tag.innerHTML = datos[i].nombre_sucursal;
                    cboxSucursal.appendChild(tag);
                }
            }
          })
        });

        function listaProductos(){
            verificarAcceso("Permiso_Venta");
            $('.cbox').attr("disabled","disabled");
            $(".btnVender").removeAttr("disabled");
            var cboxSucursal = document.getElementById("cboxSucursal").value;
            listaCarrito(cboxSucursal)
            totalPagar(cboxSucursal)
            var parametros = {
                "action" : "listaInventarioVenta",
                "codigo" : cboxSucursal
            };
            table = $('#table-simple').DataTable({
                "destroy":true,
                "ajax":{
                    "method": "POST",
                    "data":  parametros,
                    "url": "app/controladores/Sucursales.php"
                },
                "columns": [
                    {"render": function (data, type, JsonResultRow, meta) {
                            return "<img width='150'src=public/imagenes/productos/"+JsonResultRow.imagen_producto+">";
                        }
                    },
                    {"data" : "cod_producto"},
                    {"data" : "nombre_producto"},
                    {"data" : "precio_sugerido_venta"},
                    {"render": function (data, type, JsonResultRow, meta) {
                            return "<input type='number' id='cant' min='0' max='"+JsonResultRow.cant_producto+"' class='cant' value='' style='width:100%;'>";
                        }
                    },
                    {"defaultContent" : "<input type='number' min='0' step='0.01' id='precio' class='precio' name='row-1-position' value='' style='width:100%;'>"},
                    {"defaultContent" : "<button id='carrito' class='carrito btn btn-success' type='submit' name='action'><i class='glyphicon glyphicon-shopping-cart'></i></button>"}
                ],
                "language": {
                    "url": "public/Spanish.lang"
                }
            });
            btn_carrito("#table-simple tbody", table);
        }

        var btn_carrito = function(tbody, table){
            $(tbody).on("click", "button.carrito", function(){
                var data = table.row( $(this).parents("tr") ).data();
                var tableRemove = $(this).parents("tr");
                var cant = $(this).parents("tr").find('#cant').val();
                var precio = $(this).parents("tr").find('#precio').val();

                if(cant != ""){
                    if(precio != ""){
                        if(Number(cant) <= Number(data.cant_producto) && Number(cant) > 0){
                            actualizarCarrito(data.cod_inventario, data.cod_almacenamiento, cant, precio, table, tableRemove);
                        }else{
                            $.alert({
                                title: 'STOCK NO DISPONIBLE',
                                content: 'La cantidad de venta que introdujo no esta disponible en la cantidad de stock del Producto. Ingrese una cantidad mayor a 0 e inferior o igual a :'+ data.cant_producto,
                                buttons: {
                                    deAcuerdo: {
                                        text: 'De Acuerdo',
                                        btnClass: 'btn-blue',
                                        keys: ['enter'],
                                        action: function(){
                                        }
                                    }
                                }
                            });
                        }
                    }else{
                      new PNotify({
                        title: 'PRECIO',
                        text: "Ingrese el Precio de Venta del Producto y Vuelva a Intentarlo.",
                        type: 'info',
                        styling: 'bootstrap3'
                      });
                    }
                }else{
                  new PNotify({
                    title: 'CANTIDAD',
                    text: "Ingrese la Cantidad de Venta del Producto y Vuelva a Intentarlo.",
                    type: 'info',
                    styling: 'bootstrap3'
                  });
                }
            })
        }

        function actualizarCarrito(cod_inventario, sucursal, cant, precio, table, tableRemove){
            verificarAcceso("Permiso_Venta");
            
            var parametros = {
                "action" : "agregarCarrito",
                "cod_inventario" : cod_inventario,
                "cantidad" : cant,
                "precio" : precio
            };
            $.ajax({
              type:'POST',
              data: parametros,
              url:'app/controladores/Ventas.php',
              success:function(data){
                  datos = JSON.parse(data);
                  if(datos.resp == "true"){
                      table.row(tableRemove).remove().draw(false);
                      tableCarrito.ajax.reload();
                      totalPagar(document.getElementById("cboxSucursal").value)
                      new PNotify({
                        title: 'PRODUCTO AGREGADO',
                        text: "El producto fue agregado correctamente al carrito de compras.",
                        type: 'success',
                        styling: 'bootstrap3'
                      });
                  }
                  if(datos.resp == "false"){
                    new PNotify({
                      title: 'ERROR',
                      text: "Hubo un fallo al agregar al carrito de compras. Vuelva a Intentarlo.",
                      styling: 'bootstrap3'
                    });
                  }
                  if(datos.resp != "true" && datos.resp != "false"){
                    new PNotify({
                      title: 'ERROR',
                      text: "Hubo un fallo al agregar al carrito de compras CODIGO DE ERROR:"+datos.resp+". Contactese con el Administrador.",
                      type: 'info',
                      styling: 'bootstrap3'
                    });
                  }
              }
            })
        }

        function listaCarrito(sucursal){
            parametros = {
                "action" : "listaCarrito",
                "sucursal" : sucursal
            };
            /*$.ajax({
      type:'POST',
      data: parametros,
      url:'app/controladores/Ventas.php',
      success:function(data){
          console.log("data:",data)
      }
    })*/
            tableCarrito = $('#table-carrito').DataTable({
                "destroy":true,
                "ajax":{
                    "method": "POST",
                    "data":  parametros,
                    "url": "app/controladores/Ventas.php"
                },
                "columns": [
                    {"data" : "cod_producto"},
                    {"data" : "nombre_producto"},
                    {"data" : "cantidad"},
                    {"data" : "precio_sugerido_venta"},
                    {"data" : "descuento"},
                    {"data" : "total"},
                    {"data" : "subTotal"},
                    {"defaultContent" : "<button id='editar' class='editar btn btn-primary' type='submit' name='action'><i class='glyphicon glyphicon-text-size'></i></button>"},
                    {"defaultContent" : "<button id='eliminar' class='eliminar btn btn-danger' type='submit' name='action'><i class='fa fa-trash'></i></button>"}
                ],
                "language": {
                    "url": "public/Spanish.lang"
                }
            });

            btn_editar("#table-carrito tbody", tableCarrito);
            btn_eliminar("#table-carrito tbody", tableCarrito);
        }
        var btn_eliminar = function(tbody, table){
                $(tbody).on("click", "button.eliminar", function(){
                    verificarAcceso("Permiso_Venta");
                    var data = table.row( $(this).parents("tr") ).data();
                    var tableRemove = $(this).parents("tr");
                    var parametros = {
                       "action" : "eliminarCarrito",
                       "cod_carrito" : data.cod_carrito
                    };
                    $.ajax({
                      type:'POST',
                      data: parametros,
                      url:'app/controladores/Ventas.php',
                      success:function(data){
                          datos = JSON.parse(data);
                          if(datos.resp == "true"){
                            new PNotify({
                              title: 'PRODUCTO ELIMINADO',
                              text: "El Producto fue eliminado del Carrito de compras correctamente.",
                              type: 'success',
                              styling: 'bootstrap3'
                            });
                              totalPagar(document.getElementById("cboxSucursal").value)
                              table.row(tableRemove).remove().draw(false);
                          }
                          if(datos.resp == "false"){
                            new PNotify({
                              title: 'ERROR',
                              text: "Hubo un fallo al eliminar el producto del Carrito de compras. Vuelva a Intentarlo.",
                              styling: 'bootstrap3'
                            });
                          }
                          if(datos.resp != "true" && datos.resp != "false"){
                            new PNotify({
                              title: 'ERROR',
                              text: "Hubo un fallo al eliminar el producto del Carrito de compras, CODIGO DE ERROR:"+datos.resp+". Contactese con el Administrador.",
                              type: 'error',
                              styling: 'bootstrap3'
                            });
                          }
                      }
                    })
                })
        }

        var btn_editar = function(tbody, table){
                $(tbody).on("click", "button.editar", function(){
                    var data = table.row( $(this).parents("tr") ).data();
                    var parametros = {
                       "action" : "listaCarritoEspecifico",
                       "codCarrito" : data.cod_carrito,
                    };
                    $.ajax({
                      type:'POST',
                      data: parametros,
                      url:'app/controladores/Ventas.php',
                      success:function(data){
                            datos = JSON.parse(data);
                            datos = datos.data
                            document.getElementById('modalCarrito').value = datos[0].cod_carrito;
                            document.getElementById('modalInventario').value = datos[0].cod_inventario;
                            document.getElementById('modalCantidad').value = datos[0].cantidad;
                            document.getElementById('modalPrecio').value = datos[0].total;
                            $('#myModalForm').modal();
                      }
                    })
                })
        }

        function totalPagar(sucursal){
            var parametros = {
                "action" : "totalPagar",
                "sucursal" : sucursal,
            };
            $.ajax({
              type:'POST',
              data: parametros,
              url:'app/controladores/Ventas.php',
              success:function(data){
                    datos = JSON.parse(data);
                    moneda = datos.total;
                    document.getElementById("txtTotal").innerHTML ="Bs. "+datos.total
              }
            })
        }
        function convercionTotal(){
            var parametros = {
                "action" : "convertirBolivianos",
                "moneda" : moneda
            };
            $.ajax({
              type:'POST',
              data: parametros,
              url:'app/controladores/TipoCambios.php',
              success:function(data){
                    datos = JSON.parse(data);
                    $('#myModal').openModal();
                    document.getElementById("modalText").innerHTML = "<span class='title'>Precio Total de Venta Bs. "+datos.data+"</span>"
              }
            })
        }
        function venderProducto(){
          verificarAcceso("Permiso_Venta");
            var sucursal = document.getElementById("cboxSucursal").value;
            document.getElementById("load").innerHTML = 
                "<div id='loading-screen' ><img src='public/imagenes/sistema/spinn.svg'></div>"
            var parametros = {
                "action" : "agregarVenta",
                "sucursal" : sucursal
            };
            $.ajax({
              type:'POST',
              data: parametros,
              url:'app/controladores/Ventas.php',
              success:function(data){
                  console.log("data", data)
                    datos = JSON.parse(data);
                    if(datos.resp == "true"){
                        tableCarrito.ajax.reload();
                        table.ajax.reload();
                        totalPagar(sucursal);
                        verificarAcceso("Permiso_Venta");
                        new PNotify({
                          title: 'VENTA REGISTRADA',
                          text: "Se registro la venta correctamente",
                          type: 'success',
                          styling: 'bootstrap3'
                        });
                    }
                    if(datos.resp == "false"){
                      new PNotify({
                        title: 'ERROR',
                        text: "Hubo un fallo al registrar la venta, Vuelva a Intentarlo",
                        type: 'error',
                        styling: 'bootstrap3'
                      });
                    }
                    if(datos.resp != "true" && datos.resp != "false"){
                      new PNotify({
                        title: 'ERROR',
                        text: "Hubo un fallo al registrar la venta, CODIGO DE ERROR:"+datos.resp+". Contactese con el Administrador.",
                        type: 'error',
                        styling: 'bootstrap3'
                      });
                    }
                    document.getElementById("load").innerHTML = 
                        "<div id='loading-screen' style='display:none'><img src='public/imagenes/sistema/spinn.svg'></div>"
              }
            })
        }
    </script>
  </body>
</html>
