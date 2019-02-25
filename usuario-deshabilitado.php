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
    <div id="load">
      
    </div>
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
                <h3>Usuarios <small> Deshabilitados</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de Usuarios</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="table-simple" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Nombre(s)</th>
                          <th>Ap. Paterno</th>
                          <th>Ap. Materno</th>
                          <th>Telefono</th>
                          <th>Ver Datos</th>
                          <th>Editar</th>
                          <th>Habilitar</th>
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
            actualizarLista();
        });

        var btn_editar = function(tbody, table){
                $(tbody).on("click", "button.editar", function(){
                    var data = table.row( $(this).parents("tr") ).data();
                    localStorage.setItem("usuario", data.cod_usuario);
                    location.href = "usuario-editar.php";
                })
        }
        var btn_ver_datos = function(tbody, table){
                $(tbody).on("click", "button.datos", function(){
                    var data = table.row( $(this).parents("tr") ).data();
                    localStorage.setItem("usuario", data.cod_usuario);
                    location.href = "usuario-datos.php";
                })
        }
        var btn_deshabilitar = function(tbody, table){
                $(tbody).on("click", "button.deshabilitar", function(){
                    document.getElementById("load").innerHTML = 
                    "<div id='loading-screen' ><img src='public/imagenes/sistema/spinn.svg'></div>"
                    var data = table.row( $(this).parents("tr") ).data();
                    usuario = data.nombre_usuario+' '+data.appat_usuario+' '+data.apmat_usuario
                    var tableRemove = $(this).parents("tr");
                    var parametros = {
                       "action" : "cambiarEstado",
                       "codigo" : data.cod_usuario,
                       "estado" : "1",
                    };
                    $.ajax({
                      type:'POST',
                      data: parametros,
                      url:'app/controladores/Usuarios.php',
                      success:function(data){
                          datos = JSON.parse(data);
                          if(datos.resp == "true"){
                            new PNotify({
                              title: 'Usuario Habilitado',
                              text: 'El Usuario '+usuario+' fue Habilitado al Acceso del sistema correctamente.',
                              type: 'success',
                              styling: 'bootstrap3'
                            });
                            verificarAcceso("Permiso_Usuario");
                            table.ajax.reload();
                          }
                          if(datos.resp == "false"){
                            new PNotify({
                                title: 'Error al Habilitar',
                                text: 'Hubo un fallo al Habilitar al usuario'+usuario+' del Sistema. Recargue la pagina y vuelva a Intentarlo.',
                                styling: 'bootstrap3'
                              });
                          }
                          if(datos.resp != "true" && datos.resp != "false"){
                              new PNotify({
                                title: 'Error Critico',
                                text: 'Hubo un fallo al deshabilitar al usuario COD:'+datos.resp,
                                type: 'error',
                                styling: 'bootstrap3'
                              });
                          }
                          document.getElementById("load").innerHTML = 
                          "<div id='loading-screen' style='display:none'><img src='public/imagenes/sistema/spinn.svg'></div>"
                      }
                    })
                })
        }

        function actualizarLista(){
            verificarAcceso("Permiso_Usuario");
            var parametros = {
                "action" : "listaUsuarioEstado",
                "estado" : "0"
            };
            table = $('#table-simple').DataTable({
                "destroy":true,
                "ajax":{
                    "method": "POST",
                    "data":  parametros,
                    "url": "app/controladores/Usuarios.php"
                },
                "columns": [
                    {"data" : "nombre_usuario"},
                    {"data" : "appat_usuario"},
                    {"data" : "apmat_usuario"},
                    {"data" : "telefono_usuario"},
                    {"defaultContent" : "<button id='datos' class='datos btn btn-success' type='submit' name='action'><i class='glyphicon glyphicon-list'></i></button>"},
                    {"defaultContent" : "<button id='editar' class='editar btn btn-primary' type='button' name='editar'><i class='glyphicon glyphicon-text-size'></i></button>"},
                    {"defaultContent" : "<button id='deshabilitar' class='deshabilitar btn btn-success' type='submit' name='action'><i class='glyphicon glyphicon-ok'></i></button>"}
                ],
                "language": {
                    "url": "public/Spanish.lang"
                }
            });
            btn_editar("#table-simple tbody", table);
            btn_ver_datos("#table-simple tbody", table);
            btn_deshabilitar("#table-simple tbody", table);
        }
    </script>
  </body>
</html>
