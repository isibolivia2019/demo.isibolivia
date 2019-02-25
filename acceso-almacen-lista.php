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
                                <h2>Lista de Acceso<small>al Almacen</small></h2>
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
                      <div class="x_content">
                        <table id="table-simple" class="table table-striped table-bordered" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>Almacen</th>
                              <th>Eliminar</th>
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
            $('.cbox').attr("disabled","disabled");
            document.getElementById("load").innerHTML = 
            "<div id='loading-screen' ><img src='public/imagenes/sistema/spinn.svg'></div>"
            var cboxUsuario = document.getElementById("cboxUsuario").value;
            var parametros = {
                "action" : "listaAccesosAlmacenes",
                "codigo" : cboxUsuario
            };
            table = $('#table-simple').DataTable({
                "destroy":true,
                "ajax":{
                    "method": "POST",
                    "data":  parametros,
                    "url": "app/controladores/Accesos.php",
                    "dataSrc": function ( json ) {
                        document.getElementById("load").innerHTML = 
                        "<div id='loading-screen' style='display:none'><img src='public/imagenes/sistema/spinn.svg'></div>"     
                        return json.data;
                    }       
                },
                "columns": [
                    {"data" : "nombre_almacen"},
                    {"defaultContent" : "<button id='eliminar' class='eliminar btn btn-danger' type='submit' name='action'><i class='fa fa-trash'></i></button>"}
                ],
                "language": {
                    "url": "public/Spanish.lang"
                }
            });
            btn_eliminar("#table-simple tbody", table);
        }

        var btn_eliminar = function(tbody, table){
                $(tbody).on("click", "button.eliminar", function(){
                    document.getElementById("load").innerHTML = 
                    "<div id='loading-screen' ><img src='public/imagenes/sistema/spinn.svg'></div>"
                    var data = table.row( $(this).parents("tr") ).data();
                    var cboxUsuario = document.getElementById("cboxUsuario").value;
                    var select = document.getElementById("cboxUsuario");
                    nombreUsuario = select.options[select.selectedIndex].innerText

                    
                    almacen = data.nombre_almacen
                    var tableRemove = $(this).parents("tr");
                    var parametros = {
                       "action" : "eliminarAccesosAlmacen",
                       "usuario" : cboxUsuario,
                       "almacen": data.cod_almacen
                    };
                    $.ajax({
                      type:'POST',
                      data: parametros,
                      url:'app/controladores/Accesos.php',
                      success:function(data){
                        console.log("data", data)
                          datos = JSON.parse(data);
                          if(datos.resp == "true"){
                            new PNotify({
                              title: 'ACCESO DESHABILITADO',
                              text: 'Se Deshabilito el Acceso del Usuario '+nombreUsuario+' hacia el Almacen '+almacen,
                              type: 'success',
                              styling: 'bootstrap3'
                            });
                            verificarAcceso("Permiso_Acceso");
                            table.ajax.reload();
                          }
                          if(datos.resp == "false"){
                            new PNotify({
                                title: 'ERROR AL DESHABILITAR',
                                text: 'Hubo un fallo al Deshabilitar el acceso del usuario '+nombreUsuario+'. Recargue la pagina y vuelva a Intentarlo.',
                                styling: 'bootstrap3'
                              });
                          }
                          if(datos.resp != "true" && datos.resp != "false"){
                              new PNotify({
                                title: 'ERROR CRITICO',
                                text: 'Hubo un fallo al Deshabilitar el acceso del usuario '+nombreUsuario+'. CODIGO DE ERROR: '+datos.resp,
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
    </script>
	
  </body>
</html>
