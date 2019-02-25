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
      
    <div class="container body">
      <div class="main_container">

        <?php require("app-slider.php");?>

        <!-- top navigation -->
        <?php require("app-header.php");?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Comprar Producto</h3>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">

                      <div class="clearfix"></div>

                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h5 class="brief"><i>Datos del Producto</i></h5>
                            <div class="left col-xs-6">
                              <h2 id="lblNombre"></h2>
                              <p id="lblCodigo"></p>
                              <p id="lblDescripcion"></p>
                              <p id="lblColor"></p>
                            </div>
                            <div class="right col-xs-6 text-center">
                              <img id="imagen" src="public/imagenes/productos/sin_imagen_producto.jpg" alt="" class="img-responsive">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="glyphicon glyphicon-shopping-cart"></i>
                          </div>
                          <div class="count" id="lblCantCompra"></div>
                          <h3>Compras Realizadas</h3>
                          <p id="lblUltimaFecha"></p>
                        </div>
                      </div>

                      <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="glyphicon glyphicon-stats"></i>
                          </div>
                          <div class="count"id="lblCantInventario"></div>
                          <h3>Unidades en el Inventario</h3>
                          <p>Contempla entre productos de diferentes precios</p>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Registro de Compra<small>llene el siguiente Formulario</small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cantidad de Compra<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="number" id="cantidad" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Costo de Adquisicion <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="number" step="0.1" id="costo" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Precio sugerido de Venta</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="precio" class="form-control col-md-7 col-xs-12" type="number" step="0.1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Punto de Almacenamiento</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control" id="cboxAlmacenamiento">
                                                <option value="" disabled selected>Seleccione un Punto</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Observacion</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="observacion" class="form-control col-md-7 col-xs-12" type="text">
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button class="btn btn-primary" type="reset">Nuevo Formulario</button>
                                            <button type="button" class="btn btn-success" onclick="agregarCompra()">Realizar Compra</button>
                                        </div>
                                    </div>
                                </form>
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
        function listaAlmacenamiento(){
            verificarAcceso("Permiso_Producto");
            var cboxAlmacenamiento = document.getElementById("cboxAlmacenamiento");
            var parametros = {
             "action" : "productoEspecificoCompra",
             "cod_producto" : localStorage.getItem("producto")
          };
          $.ajax({
            type:'POST',
            data: parametros,
            url:'app/controladores/Productos.php',
            success:function(data){
                datos = JSON.parse(data);
                document.getElementById("lblNombre").innerHTML = datos[0].nombre_producto
                document.getElementById("lblCodigo").innerHTML = "<strong>Codigo: </strong>#"+datos[0].cod_producto
                document.getElementById("lblDescripcion").innerHTML = "<strong>Descripcion: </strong>"+datos[0].descripcion_producto
                document.getElementById("lblColor").innerHTML = "<strong>Color: </strong>"+datos[0].color_producto
                document.getElementById("imagen").src = "public/imagenes/productos/"+datos[0].imagen_producto;

                document.getElementById("lblCantInventario").innerHTML = datos[0].cantidad;
                document.getElementById("lblCantCompra").innerHTML = datos[0].cantidadCompra;
                if(datos[0].ultimaFecha != "0"){
                    document.getElementById("lblUltimaFecha").innerHTML = "Fecha de la ultima compra " +datos[0].ultimaFecha;
                }else{
                    document.getElementById("lblUltimaFecha").innerHTML = "Aun nose realizo ninguna compra de este producto.";
                }
                
            }
          })
          parametros = {
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
                    cboxAlmacenamiento.appendChild(tag);
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
                    cboxAlmacenamiento.appendChild(tag);
                }
            }
          })
          parametros = {
             "action" : "ultimaCompraProducto",
             "cod_producto" : localStorage.getItem("producto")  
          };
          $.ajax({
            type:'POST',
            data: parametros,
            url:'app/controladores/Productos.php',
            success:function(data){
                datos = JSON.parse(data);
                datos = datos.data;
                if(datos.length > 0){
                    document.getElementById('costo').value = datos[0].precio_unit_compra_producto
                    document.getElementById('precio').value = datos[0].precio_sugerido_venta
                }
            }
          })
        }

        $(document).ready(function() {
            listaAlmacenamiento()
        });

        function agregarCompra(){
            verificarAcceso("Permiso_Producto");
            document.getElementById("load").innerHTML = 
          "<div id='loading-screen' ><img src='public/imagenes/sistema/spinn.svg'></div>"
          var cantidad = document.getElementById('cantidad').value;
          var costo = document.getElementById('costo').value;
          var precio = document.getElementById('precio').value;
          var cboxAlmacenamiento = document.getElementById('cboxAlmacenamiento').value;
          var observacion = document.getElementById('observacion').value;

          var parametros = {
             "action" : "agregarCompra",
             "cod_producto" : localStorage.getItem("producto"),
             "cantidad" : cantidad,
             "costo" : costo,
             "precio" : precio,
             "cboxAlmacenamiento" : cboxAlmacenamiento,
             "observacion" : observacion,
          };
          $.ajax({
            type:'POST',
            data: parametros,
            url:'app/controladores/Productos.php',
            success:function(data){
                console.log("data", data)
                datos = JSON.parse(data);

                if(datos.producto == "true"){
                    new PNotify({
                        title: 'COMPRA REALIZADA',
                        text: 'La compra del producto fue agregado correctamente',
                        type: 'success',
                        styling: 'bootstrap3'
                    });
                    document.getElementById('cantidad').value = "";
                    document.getElementById('observacion').value = "";
                }
                if(datos.producto == "false"){
                    new PNotify({
                        title: 'ERROR',
                        text: 'Hubo un fallo al registrar la compra del producto. Verifique que ningun dato sea registrado y Vuelva a Intentarlo.',
                        styling: 'bootstrap3'
                    });
                }
                if(datos.producto != "true" && datos.resp != "false"){
                    new PNotify({
                        title: 'ERROR',
                        text: "Hubo un fallo al registrar la compra del Producto CODIGO DE ERROR:"+datos.resp+". Contactese con el Administrador.",
                        type: 'error',
                        styling: 'bootstrap3'
                    });
                }


                if(datos.inventario.action == "actualizar"){
                    if(datos.inventario.resp == "true"){
                        new PNotify({
                            title: 'INVENTARIO ACTUALIZADO',
                            text: 'El inventario de productos fue Actualizado.',
                            type: 'success',
                            styling: 'bootstrap3'
                        });
                        document.getElementById('cantidad').value = "";
                        document.getElementById('observacion').value = "";
                    }
                    if(datos.inventario.resp == "false"){
                        new PNotify({
                            title: 'ERROR',
                            text: 'Hubo un fallo al registrar al Actualizar el Inventario. Contactese con el Administrador.',
                            styling: 'bootstrap3'
                        });
                    }
                    if(datos.inventario.resp != "true" && datos.resp != "false"){
                        new PNotify({
                            title: 'ERROR',
                            text: "Hubo un fallo al registrar al Actualizar el Inventario CODIGO DE ERROR:"+datos.resp+". Contactese con el Administrador.",
                            type: 'error',
                            styling: 'bootstrap3'
                        });
                    }
                }

                if(datos.inventario.action == "agregar"){
                    if(datos.inventario.resp == "true"){
                        new PNotify({
                            title: 'NUEVO PRODUCTO EN INVENTARIO',
                            text: 'Un nuevo producto agregado al Inventario correctamente.',
                            type: 'success',
                            styling: 'bootstrap3'
                        });
                    }
                    if(datos.inventario.resp == "false"){
                        new PNotify({
                            title: 'ERROR',
                            text: 'Hubo un fallo al registrar el producto en el inventario. Contactese con el Administrador.',
                            styling: 'bootstrap3'
                        });
                    }
                    if(datos.inventario.resp != "true" && datos.resp != "false"){
                        new PNotify({
                            title: 'ERROR',
                            text: "Hubo un fallo al registrar el producto en el inventario CODIGO DE ERROR:"+datos.resp+". Contactese con el Administrador.",
                            type: 'error',
                            styling: 'bootstrap3'
                        });
                    }
                }
                listaAlmacenamiento()
                verificarAcceso("Permiso_Producto");
                document.getElementById("load").innerHTML = 
                "<div id='loading-screen' style='display:none'><img src='public/imagenes/sistema/spinn.svg'></div>"
            }
          })
        }
    </script>
	
  </body>
</html>
