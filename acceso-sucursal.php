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
                                <h2>Agregar Acceso<small>a Sucursal</small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Acceso a Sucursal</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control" id="cboxSucursal">
                                                <option value="" disabled selected>Seleccione una Sucursal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Usuario</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control" id="cboxUsuario">
                                                <option value="" disabled selected>Seleccione un Usuario</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button class="btn btn-primary" type="reset">Nuevo Formulario</button>
                                            <button type="button" class="btn btn-success" onclick="agregarCompra()">Dar Acceso a Usuario</button>
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
        function listaSucursal(){
            verificarAcceso("Permiso_Acceso");
            var cboxSucursal = document.getElementById("cboxSucursal");
            var cboxUsuario = document.getElementById("cboxUsuario");
          
            var parametros = {
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
                        cboxSucursal.appendChild(tag);
                    }
                }
            })
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
            listaSucursal()
        });

        function agregarCompra(){
            verificarAcceso("Permiso_Acceso");
            document.getElementById("load").innerHTML = 
          "<div id='loading-screen' ><img src='public/imagenes/sistema/spinn.svg'></div>"
            var cboxUsuario = document.getElementById("cboxUsuario").value;
            var cboxSucursal = document.getElementById("cboxSucursal").value;
            var parametros = {
                "action" : "asignarUsuarioSucursal",
                "usuario" : cboxUsuario,
                "sucursal" : cboxSucursal
            };
            $.ajax({
                type:'POST',
                data: parametros,
                url:'app/controladores/Accesos.php',
                success:function(data){
                    datos = JSON.parse(data);
                    if(datos.resp == "true"){
                        new PNotify({
                            title: 'CORRECTO',
                            text: 'Se permitio el Acceso de la Sucursal al usuario correctamente.',
                            type: 'success',
                            styling: 'bootstrap3'
                        });
                        verificarAcceso("Permiso_Acceso");
                    }
                    if(datos.resp == "false"){
                        new PNotify({
                            title: 'ERROR',
                            text: 'Hubo un fallo al permitir el acceso al usuario. Verifique que ningun dato sea registrado y Vuelva a Intentarlo.',
                            styling: 'bootstrap3'
                        });
                    }
                    if(datos.resp != "true" && datos.resp != "false"){
                        new PNotify({
                            title: 'ERROR',
                            text: "Hubo un fallo al registrar el acceso al usuario CODIGO DE ERROR:"+datos.resp+". Contactese con el Administrador.",
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
