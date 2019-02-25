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
                        <h3>Sucursal</h3>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Agregar Nueva Sucursal<small>llene el siguiente Formulario</small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cboxSucursal">Sucursal</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control" id="cboxSucursal">
                                                <option value="" disabled selected>Seleccione una Sucursal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="costo">Costo <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="number" step="0.1" id="costo" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="detalle">Detalle <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="detalle" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Comprobante</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="comprobante" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button class="btn btn-primary" type="reset">Nuevo Formulario</button>
                                            <button type="button" class="btn btn-success" onclick="agregarCajaChica()">Registrar Gasto</button>
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
        $(document).ready(function() {
            verificarAcceso("Permiso_CajaChica");
            var parametros = {
                "action" : "listaAccesosSucursalesCodigo",
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

        function agregarCajaChica(){
            verificarAcceso("Permiso_CajaChica");
            
            var costo = document.getElementById('costo').value;
            var detalle = document.getElementById('detalle').value;
            var comprobante = document.getElementById('comprobante').value;
            var sucursal = document.getElementById("cboxSucursal").value;
            var parametros = {
               "action" : "agregarCajaChica",
               "costo" : costo,
               "detalle" : detalle,
               "comprobante" : comprobante,
               "sucursal" : sucursal,
            };
          if(sucursal != ""){
            document.getElementById("load").innerHTML = 
          "<div id='loading-screen' ><img src='public/imagenes/sistema/spinn.svg'></div>"
            $.ajax({
              type:'POST',
              data: parametros,
              url:'app/controladores/CajasChicas.php',
              success:function(data){
                    console.log("data", data)
                  datos = JSON.parse(data);
                  if(datos.resp == "true"){
                    new PNotify({
                        title: 'CORRECTO',
                        text: 'Nueva gasto ('+detalle+') fue Registrado correctamente.',
                        type: 'success',
                        styling: 'bootstrap3'
                    });
                    verificarAcceso("Permiso_CajaChica");
                      document.getElementById('costo').value = "";
                      document.getElementById('detalle').value = "";
                      document.getElementById('comprobante').value = "";
                  }
                  if(datos.resp == "false"){
                    
                    new PNotify({
                        title: 'ERROR',
                        text: 'Hubo un fallo al registrar el gasto en Caja Chica. Verifique que ningun dato sea registrado y Vuelva a Intentarlo.',
                        styling: 'bootstrap3'
                    });
                  }
                  if(datos.resp != "true" && datos.resp != "false"){
                    new PNotify({
                        title: 'ERROR',
                        text: "Hubo un fallo al registrar el gasto en Caja Chica CODIGO DE ERROR:"+datos.resp+". Contactese con el Administrador.",
                        type: 'error',
                        styling: 'bootstrap3'
                    });
                  }
                  document.getElementById("load").innerHTML = 
                    "<div id='loading-screen' style='display:none'><img src='public/imagenes/sistema/spinn.svg'></div>"
              }
            })
          } else {
                new PNotify({
                    title: 'FALTA SELECCIONAR',
                    text: "Seleccione una Sucursal de Registro",
                    type: 'info',
                    styling: 'bootstrap3'
                });
          }
        }
    </script>
	
  </body>
</html>
