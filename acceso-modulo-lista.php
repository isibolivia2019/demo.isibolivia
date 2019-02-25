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
                        <h3>Accesos</h3>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Lista de Acceso<small>a Sucursal</small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Seleccione un Usuario</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control cbox" id="cboxUsuario" onchange="listaAccesos()">
                                                <option value="" disabled selected>Seleccione un Usuario</option>
                                            </select>
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
                        <h2>Lista de Acceso</h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="form-group">
                          <div class="checkbox col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="Usuario" id="check_usuario" onchange="actualizarModulo('check_usuario')"> Modulo Usuarios
                                </label>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="checkbox col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="Sucursal" id="check_sucursal" onchange="actualizarModulo('check_sucursal')"> Modulo Sucursales
                                </label>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="checkbox col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="Almacen" id="check_almacen" onchange="actualizarModulo('check_almacen')"> Modulo Almacenes
                                </label>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="checkbox col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="Producto" id="check_producto" onchange="actualizarModulo('check_producto')"> Modulo Productos
                                </label>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="checkbox col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="Venta" id="check_venta" onchange="actualizarModulo('check_venta')"> Modulo Ventas
                                </label>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="checkbox col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="Reporte" id="check_reporte" onchange="actualizarModulo('check_reporte')"> Modulo Reportes
                                </label>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="checkbox col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="CajaChica" id="check_caja_chica" onchange="actualizarModulo('check_caja_chica')"> Modulo Caja Chica
                                </label>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="checkbox col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="Acceso" id="check_acceso" onchange="actualizarModulo('check_acceso')"> Modulo Accesos
                                </label>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="checkbox col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="Configuracion" id="check_configuracion" onchange="actualizarModulo('check_configuracion')"> Modulo Configuraciones
                                </label>
                              </div>
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
        var table = "";
        function listaUsuarios(){
            verificarAcceso("Permiso_Acceso");
            var cboxUsuario = document.getElementById("cboxUsuario");
            parametros = {
               "action" : "listaUsuarioEstado",
               "estado" : "1"
            };
            $.ajax({
              type:'POST',
              data: parametros,
              url:'app/controladores/Usuarios.php',
              success:function(data){
                    datos = JSON.parse(data);
                    datos = datos.data;
                    for(let i=0 ; i<datos.length ; i++){
                        var tag = document.createElement('option');
                        tag.setAttribute('value', datos[i].cod_usuario);
                        tag.innerHTML = datos[i].nombre_usuario + " " + datos[i].appat_usuario + " " + datos[i].apmat_usuario;
                        cboxUsuario.appendChild(tag);
                    }
                }
            })
        }

        $(document).ready(function() {
            listaUsuarios()
        });

        function listaAccesos(){
          verificarAcceso("Permiso_Acceso");
            var cboxUsuario = document.getElementById("cboxUsuario").value;
          
            var parametros = {
               "action" : "listaAccesoModulos",
               "codigo" : cboxUsuario
            };
            $.ajax({
              type:'POST',
              data: parametros,
              url:'app/controladores/Accesos.php',
              success:function(data){
                datos = JSON.parse(data);
                datos = datos.data;
                if(datos[0].itemUsuario == "1"){document.getElementById('check_usuario').checked = 1}else{document.getElementById('check_usuario').checked = 0}
                if(datos[0].itemSucursal == "1"){document.getElementById('check_sucursal').checked = 1}else{document.getElementById('check_sucursal').checked = 0}
                if(datos[0].itemAlmacen == "1"){document.getElementById('check_almacen').checked = 1}else{document.getElementById('check_almacen').checked = 0}
                if(datos[0].itemProducto == "1"){document.getElementById('check_producto').checked = 1}else{document.getElementById('check_producto').checked = 0}
                if(datos[0].itemVentas == "1"){document.getElementById('check_venta').checked = 1}else{document.getElementById('check_venta').checked = 0}
                if(datos[0].itemReportes == "1"){document.getElementById('check_reporte').checked = 1}else{document.getElementById('check_reporte').checked = 0}
                if(datos[0].itemCajaChica == "1"){document.getElementById('check_caja_chica').checked = 1}else{document.getElementById('check_caja_chica').checked = 0}
                if(datos[0].itemAccesos == "1"){document.getElementById('check_acceso').checked = 1}else{document.getElementById('check_acceso').checked = 0}
                if(datos[0].itemConfiguracion == "1"){document.getElementById('check_configuracion').checked = 1}else{document.getElementById('check_configuracion').checked = 0}
              
              }
            })
        }

        function actualizarModulo(modulo){
            verificarAcceso("Permiso_Acceso");
            document.getElementById("load").innerHTML = 
          "<div id='loading-screen' ><img src='public/imagenes/sistema/spinn.svg'></div>"
            var cboxUsuario = document.getElementById("cboxUsuario").value;
            var checked = document.getElementById(modulo).checked;
            var nombreModulo = document.getElementById(modulo).value;
            if(checked){
              checked = "1"
            }else{
              checked = "0"
            }
            var parametros = {
                "action" : "actualizarAccesoModulo",
                "usuario" : cboxUsuario,
                "estado" : checked,
                "modulo" : nombreModulo
              };

            $.ajax({
              type:'POST',
              data: parametros,
              url:'app/controladores/Accesos.php',
              success:function(data){
                datos = JSON.parse(data);
                if(checked == "1"){
                  if(datos.resp == "true"){
                        new PNotify({
                            title: 'ACCESO CORRECTO',
                            text: 'Se permitio el Acceso al Modulo '+nombreModulo +' correctamente.',
                            type: 'success',
                            styling: 'bootstrap3'
                        });
                        verificarAcceso("Permiso_Acceso");
                    }
                    if(datos.resp == "false"){
                        new PNotify({
                            title: 'ERROR',
                            text: 'Hubo un fallo al permitir el acceso al Modulo. Verifique que ningun dato sea registrado y Vuelva a Intentarlo.',
                            styling: 'bootstrap3'
                        });
                    }
                    if(datos.resp != "true" && datos.resp != "false"){
                        new PNotify({
                            title: 'ERROR',
                            text: "Hubo un fallo al registrar el acceso al Modulo CODIGO DE ERROR:"+datos.resp+". Contactese con el Administrador.",
                            type: 'error',
                            styling: 'bootstrap3'
                        });
                    }
                }else{
                  if(datos.resp == "true"){
                        new PNotify({
                            title: 'BLOQUEO CORRECTO',
                            text: 'Se Denego el Acceso al Modulo '+nombreModulo +' correctamente.',
                            type: 'success',
                            styling: 'bootstrap3'
                        });
                        verificarAcceso("Permiso_Acceso");
                    }
                    if(datos.resp == "false"){
                        new PNotify({
                            title: 'ERROR',
                            text: 'Hubo un fallo al denegar el acceso al Modulo. Verifique que ningun dato sea registrado y Vuelva a Intentarlo.',
                            styling: 'bootstrap3'
                        });
                    }
                    if(datos.resp != "true" && datos.resp != "false"){
                        new PNotify({
                            title: 'ERROR',
                            text: "Hubo un fallo al denegar el acceso al Modulo CODIGO DE ERROR:"+datos.resp+". Contactese con el Administrador.",
                            type: 'error',
                            styling: 'bootstrap3'
                        });
                    }
                }
                    
                    document.getElementById("load").innerHTML = 
                    "<div id='loading-screen' style='display:none'><img src='public/imagenes/sistema/spinn.svg'></div>"   
              }
            })
        }
    </script>
	
  </body>
</html>
