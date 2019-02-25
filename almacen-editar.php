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
                        <h3>Almacen</h3>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Editar Datos del Almacen <small>Modifique el siguiente Formulario</small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="nombre" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Direccion <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="direccion" name="last-name" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Telefono</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="telefono" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button class="btn btn-primary" type="reset">Nuevo Formulario</button>
                                            <button type="button" class="btn btn-success" onclick="actualizarAlmacen()">Actualizar Datos de la  Sucursal</button>
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
            verificarAcceso("Permiso_Almacen");
            var parametros = {
                "action" : "almacenEspecifico",
                "cod_almacen" : localStorage.getItem("almacen")
            };
            $.ajax({
              type:'POST',
              data: parametros,
              url:'app/controladores/Almacenes.php',
              success:function(data){
                datos = JSON.parse(data);
                document.getElementById('nombre').value = datos[0].nombre_almacen;
                document.getElementById('direccion').value = datos[0].direccion_almacen;
                document.getElementById('telefono').value = datos[0].telefono_almacen;
              }
            })
        });

        function actualizarAlmacen(){
            verificarAcceso("Permiso_Almacen");
            document.getElementById("load").innerHTML = 
          "<div id='loading-screen' ><img src='public/imagenes/sistema/spinn.svg'></div>"
          var nombre = document.getElementById('nombre').value;
          var direccion = document.getElementById('direccion').value;
          var telefono = document.getElementById('telefono').value;
          var parametros = {
             "action" : "actualizarAlmacen",
             "codigo" : localStorage.getItem("almacen"),
             "nombre" : nombre,
             "direccion" : direccion,
             "telefono" : telefono
          };
          $.ajax({
            type:'POST',
            data: parametros,
            url:'app/controladores/Almacenes.php',
            success:function(data){
                datos = JSON.parse(data);
                if(datos.resp == "true"){
                    new PNotify({
                        title: 'CORRECTO',
                        text: 'Los Datos del Almacen '+nombre+' fueron actualizado correctamente.',
                        type: 'success',
                        styling: 'bootstrap3'
                    });
                    verificarAcceso("Permiso_Almacen");
                }
                if(datos.resp == "false"){
                    new PNotify({
                        title: 'ERROR',
                        text: 'Hubo un fallo al actualizar los datos del Almacen '+nombre+'. Recargue la pagina y Vuelva a Intentarlo',
                        styling: 'bootstrap3'
                    });
                }
                if(datos.resp != "true" && datos.resp != "false"){
                    new PNotify({
                        title: 'CORRECTO',
                        text: 'Hubo un fallo al actualizar los datos del Almacen '+nombre+'. CODIGO DE ERROR:'+datos.resp+". Contactese con el Administrador.",
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
