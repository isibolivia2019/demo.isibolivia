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
                <h3>Almacenes <small> registrados</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de Almacenes</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="table-simple" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Direccion</th>
                          <th>Telefono</th>
                          <th>Inventario</th>
                          <th>Editar</th>
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
            verificarAcceso("Permiso_Almacen");
            var parametros = {
                "action" : "listaAlmacenes"
            };
            var table = $('#table-simple').DataTable({
                "destroy":true,
                "ajax":{
                    "method": "POST",
                    "data":  parametros,
                    "url": "app/controladores/Almacenes.php"
                },
                "columns": [
                    {"data" : "nombre_almacen"},
                    {"data" : "direccion_almacen"},
                    {"data" : "telefono_almacen"},
                    {"defaultContent" : "<button id='inventario' class='inventario btn btn-success' type='submit' name='action'><i class='glyphicon glyphicon-list'></i></button>"},
                    {"defaultContent" : "<button id='editar' class='editar btn btn-primary' type='button' name='editar'><i class='glyphicon glyphicon-text-size'></i></button>"},
                ],
                "language": {
                    "url": "public/Spanish.lang"
                }
            });
            btn_editar("#table-simple tbody", table);
            btn_inventario("#table-simple tbody", table);
        });

        

        var btn_editar = function(tbody, table){
                $(tbody).on("click", "button.editar", function(){
                    var data = table.row( $(this).parents("tr") ).data();
                    localStorage.setItem("almacen", data.cod_almacen);
                    location.href = "almacen-editar.php";
                })
        }
        var btn_inventario = function(tbody, table){
                $(tbody).on("click", "button.inventario", function(){
                    var data = table.row( $(this).parents("tr") ).data();
                    localStorage.setItem("almacen", data.cod_almacen);
                    location.href = "almacen-inventario.php";
                })
        }
    </script>
  </body>
</html>
