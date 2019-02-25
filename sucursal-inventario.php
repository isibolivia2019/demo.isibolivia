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
                <h3>Inventario <small> de productos</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">

                      <div class="clearfix"></div>

                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h5 class="brief"><i>Datos de la Sucursal</i></h5>
                            <div class="left col-xs-12">
                              <h2 id="lblNombre"></h2>
                              <p id="lblDireccion"></p>
                              <p id="lblTelefono"></p>
                            </div>
                            
                          </div>
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
                    <h2>Lista de productos</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="table-simple" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                          <tr>
                              <th>Imagen</th>
                              <th>Codigo</th>
                              <th>Nombre</th>
                              <th>Cantidad</th>
                              <th>Precio de Compra</th>
                              <th>Precio de Venta</th>
                              <th>Historial</th>
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
            verificarAcceso("Permiso_Sucursal");
            var parametros = {
                "action" : "listaInventarioActual",
                "codigo" : localStorage.getItem("sucursal")
            };
            /*$.ajax({
              type:'POST',
              data: parametros,
              url:'app/controladores/Sucursales.php',
              success:function(data){
                console.log("data:",data)
              }
            })*/
            var table = $('#table-simple').DataTable({
                "destroy":true,
                "ajax":{
                    "method": "POST",
                    "data":  parametros,
                    "url": "app/controladores/Sucursales.php",
                    "dataSrc": function ( json ) {
                        return json.data;
                    }
                },
                "columns": [
                    {"render": function (data, type, JsonResultRow, meta) {
                            return "<img width='150'src=public/imagenes/productos/"+JsonResultRow.imagen_producto+">";
                        }
                    },
                    {"data" : "cod_producto"},
                    {"data" : "nombre_producto"},
                    {"data" : "cant_producto"},
                    {"data" : "compra_unit_producto"},
                    {"data" : "precio_sugerido_venta"},
                    {"defaultContent" : "<button id='historial' class='historial btn btn-success' type='button' name='editar'><i class='glyphicon glyphicon-file'></i></button>"},
                ],
                "language": {
                    "url": "public/Spanish.lang"
                }
            });
            btn_historial("#table-simple tbody", table);

            parametros = {
                "action" : "sucursalEspecifico",
                "cod_sucursal" : localStorage.getItem("sucursal")
            };
            $.ajax({
              type:'POST',
              data: parametros,
              url:'app/controladores/Sucursales.php',
              success:function(data){
                let datos = JSON.parse(data);
                document.getElementById("lblNombre").innerHTML = datos[0].nombre_sucursal
                document.getElementById("lblDireccion").innerHTML = "<strong>Direccion: </strong>"+datos[0].direccion_sucursal
                document.getElementById("lblTelefono").innerHTML = "<strong>Telefono: </strong>"+datos[0].telefono_sucursal
              }
            })
        });

        var btn_historial = function(tbody, table){
                $(tbody).on("click", "button.historial", function(){
                    var data = table.row( $(this).parents("tr") ).data();
                    localStorage.setItem("inventario", data.cod_inventario);
                    location.href = "historial.php";
                })
        }
    </script>
  </body>
</html>
