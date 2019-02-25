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
                <h3>Nuevas Notificaciones <small></small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ultimas Notificaciones enviadas del sistema</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="table-simple" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Fecha / Hora</th>
                          <th>Accion</th>
                          <th>Personal</th>
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
        $(document).ready(function() {
            verificarAcceso("Permiso_Notificacion");
            var parametros = {
                "action" : "listaNotificaciones",
                "estado" : "1"
            };
            var table = $('#table-simple').DataTable({
                "destroy":true,
                "ajax":{
                    "method": "POST",
                    "data":  parametros,
                    "url": "app/controladores/RegistrosNotificaciones.php",
                    "dataSrc": function ( json ) {
                      actualizarNotificacionLeido()
                      verificarAcceso("Permiso_Notificacion");
                      return json.data;
                    }  
                },
                "columns": [
                    {"data" : "fecha"},
                    {"data" : "mensaje"},
                    {"data" : "personal"}
                    
                ],
                "columnDefs": [
   		        	  { "type": "date-euro", "targets": 0 }
                ],
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": "public/Spanish.lang"
                }
            });
        });
    </script>
  </body>
</html>
