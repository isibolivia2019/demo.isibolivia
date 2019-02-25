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
                <h3>Registro de <small> productos comprados </small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de Compras Realizadas</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="table-simple" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                          <tr>
                              <th>Fecha/Hora</th>
                              <th>Imagen</th>
                              <th>Codigo</th>
                              <th>Nombre</th>
                              <th>Cantidad</th>
                              <th>Costo</th>
                              <th>Observacion</th>
                              <th>Almacenado en:</th>
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
            verificarAcceso("Permiso_Producto");
            var parametros = {
                "action" : "listaCompraProductos"
            };
            var table = $('#table-simple').DataTable({
                "destroy":true,
                "ajax":{
                    "method": "POST",
                    "data":  parametros,
                    "url": "app/controladores/Productos.php"
                },
                "columns": [
                    {"data" : "fecha_compra_producto"},
                    {"render": function (data, type, JsonResultRow, meta) {
                            return "<img width='100'src=public/imagenes/productos/"+JsonResultRow.imagen_producto+">";
                        }
                    },
                    {"data" : "cod_producto"},
                    {"data" : "nombre_producto"},
                    {"data" : "cantidad_compra_producto"},
                    {"data" : "precio_unit_compra_producto"},
                    {"data" : "observacion_compra_producto"},
                    {"data" : "nombre_almacenamiento"},
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
