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
                <h3>Transferencias</h3>
 
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Seleccione<small> el Origen y Destino</small></h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="cbox form-control" id="cboxOrigen" onchange="listaProductos()">
                            <option value="" disabled selected>Seleccione el Origen</option>
                          </select>
                        </div>
                        

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="cboxDestino">
                            <option value="" disabled selected>Seleccione el Destino</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Observacion</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="observacion" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
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
                          <th>Imagen</th>
                          <th>Codigo</th>
                          <th>Nombre</th>
                          <th>Costo de Adquision</th>
                          <th>Precio de Venta</th>
                          <th>Cantidad</th>
                          <th>Transferir</th>
                        </tr>
                      </thead>
                    </table>
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
        var table
        $(document).ready(function() {
            verificarAcceso("Permiso_Trasnferencia");
            listaAlmacenamiento()
        });

        function listaAlmacenamiento(){
            verificarAcceso("Permiso_Trasnferencia");
            var cboxOrigen = document.getElementById("cboxOrigen");
            var cboxDestino = document.getElementById("cboxDestino");
          var parametros = {
            "action" : "listaAlmacenes"            
          };
          $.ajax({
            type:'POST',
            data: parametros,
            url:'app/controladores/Almacenes.php',
            success:function(data){
                datos = JSON.parse(data);
                datos = datos.data;
                for(let i=0 ; i<datos.length ; i++){
                    var tag = document.createElement('option');
                    tag.setAttribute('value', datos[i].cod_almacen);
                    tag.innerHTML = datos[i].nombre_almacen;
                    cboxOrigen.appendChild(tag);
                }
                for(let i=0 ; i<datos.length ; i++){
                    var tag = document.createElement('option');
                    tag.setAttribute('value', datos[i].cod_almacen);
                    tag.innerHTML = datos[i].nombre_almacen;
                    cboxDestino.appendChild(tag);
                }
            }
          })
          parametros = {
             "action" : "listaSucursales"      
          };
          $.ajax({
            type:'POST',
            data: parametros,
            url:'app/controladores/Sucursales.php',
            success:function(data){
                datos = JSON.parse(data);
                datos = datos.data;
                for(let i=0 ; i<datos.length ; i++){
                    var tag = document.createElement('option');
                    tag.setAttribute('value', datos[i].cod_sucursal);
                    tag.innerHTML = datos[i].nombre_sucursal;
                    cboxOrigen.appendChild(tag);
                }
                for(let i=0 ; i<datos.length ; i++){
                    var tag = document.createElement('option');
                    tag.setAttribute('value', datos[i].cod_sucursal);
                    tag.innerHTML = datos[i].nombre_sucursal;
                    cboxDestino.appendChild(tag);
                }
            }
          })
        }

        function listaProductos(){
            verificarAcceso("Permiso_Trasnferencia");
            $('.cbox').attr("disabled","disabled");
            var cboxOrigen = document.getElementById("cboxOrigen").value;
            var url = ""
            if(cboxOrigen.search("SUC") != -1 ){
                var url = "app/controladores/Sucursales.php"
            }else{
                var url = "app/controladores/Almacenes.php"
            }
            var parametros = {
                "action" : "listaInventarioVenta",
                "codigo" : cboxOrigen
            };
            table = $('#table-simple').DataTable({
                "destroy":true,
                "ajax":{
                    "method": "POST",
                    "data":  parametros,
                    "url": url
                },
                "columns": [
                    {"render": function (data, type, JsonResultRow, meta) {
                            return "<img width='150'src=public/imagenes/productos/"+JsonResultRow.imagen_producto+">";
                        }
                    },
                    {"data" : "cod_producto"},
                    {"data" : "nombre_producto"},
                    {"data" : "compra_unit_producto"},
                    {"data" : "precio_sugerido_venta"},
                    {"render": function (data, type, JsonResultRow, meta) {
                            return "<input type='number' id='cant' min='0' max='"+JsonResultRow.cant_producto+"' class='cant' value='' style='width:100%;'>";
                        }
                    },
                    {"defaultContent" : "<button id='transferir' class='transferir btn btn-success' type='submit' name='action'><i class='fa fa-mail-forward'></i></button>"}
                ],
                "language": {
                    "url": "public/Spanish.lang"
                }
            });
            
            btn_transferir("#table-simple tbody", table);
        }
        var btn_transferir = function(tbody, table){
            
            $(tbody).on("click", "button.transferir", function(){
                var data = table.row( $(this).parents("tr") ).data();
                document.getElementById("load").innerHTML = 
                "<div id='loading-screen' ><img src='public/imagenes/sistema/spinn.svg'></div>"
                let str = data.compra_unit_producto
                let compra_unit_producto = Number(str.substring(4))
                console.log("data", data)
                str = data.precio_sugerido_venta
                let precio_sugerido_venta = Number(str.substring(4))

                var cant = $(this).parents("tr").find('#cant').val();
                var cboxOrigen = document.getElementById("cboxOrigen").value;
                var cboxDestino = document.getElementById("cboxDestino").value;
                var observacion = document.getElementById("observacion").value;
                var codigo = data.cod_producto
                codigo = codigo.replace("#","")

                if(cant != ""){
                    if(cboxOrigen != ""){
                        if(cboxDestino != ""){
                            if(cboxOrigen != cboxDestino){
                                if(Number(cant) <= Number(data.cant_producto) && Number(cant) > 0){
                                    var parametros = {
                                       "action" : "agregarTransferencia",
                                       "origen" : cboxOrigen,
                                       "destino" : cboxDestino,
                                       "codProducto" : codigo,
                                       "cantidad" : cant,
                                       "costo" : compra_unit_producto,
                                       "precio" : precio_sugerido_venta,
                                       "observacion" : observacion
                                    };
                                    $.ajax({
                                      type:'POST',
                                      data: parametros,
                                      url:'app/controladores/Transferencias.php',
                                      success:function(data){
                                          console.log("data", data)
                                          datos = JSON.parse(data);
                                          if(datos.resp == "true"){
                                            table.ajax.reload();
                                            verificarAcceso("Permiso_Trasnferencia");
                                            new PNotify({
                                              title: 'TRANSFERENCIA REALIZADA',
                                              text: "El producto fue transferido correctamente al destino seleccionado.",
                                              type: 'success',
                                              styling: 'bootstrap3'
                                            });
                                          }
                                          if(datos.resp == "false"){
                                            new PNotify({
                                              title: 'ERROR',
                                              text: "Hubo un fallo al registrar la Transferencia de Productos. Vuelva a Intentarlo",
                                              styling: 'bootstrap3'
                                            });
                                          }
                                          if(datos.resp != "true" && datos.resp != "false"){
                                            new PNotify({
                                              title: 'ERROR',
                                              text: "Hubo un fallo al registrar la Transferencia de Productos CODIGO DE ERROR: "+datos.resp+". Contactese con el Administrador.",
                                              type: 'error',
                                              styling: 'bootstrap3'
                                            });
                                          }
                                          document.getElementById("load").innerHTML = 
                                          "<div id='loading-screen' style='display:none'><img src='public/imagenes/sistema/spinn.svg'></div>"
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
                                $.alert({
                                    title: 'NO SE PUEDE TRANSFERIR',
                                    content: 'El punto de Origen es igual al Punto de Destino porfavor revise e intente nuevamente',
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
                            $.alert({
                                title: 'DESTINO NO SELECCIONADO',
                                content: 'El punto de Destino no fue seleccionado porfavor seleccione uno e intentenuevamente',
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
                        $.alert({
                            title: 'ORIGEN NO SELECCIONADO',
                            content: 'El punto de Origen no fue seleccionado porfavor seleccione uno e intentenuevamente',
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
                    $.alert({
                        title: 'CANTIDAD INVALIDA',
                        content: 'La cantidad de transferencia no fue seleccionado porfavor ingrese una cantidad permitida al stock e intentenuevamente',
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
            })
        }
    </script>
  </body>
</html>
