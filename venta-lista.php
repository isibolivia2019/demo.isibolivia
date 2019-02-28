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
                <h3>Registro <small> de Venta</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Seleccione una Fecha</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <br />
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                          <div class="form-group">
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                  <select class="form-control" id="cboxMes">
                                    <option value="" disabled selected>Seleccione el Mes</option>
                                      <option value="01">Enero</option>
                                      <option value="02">Febrero</option>
                                      <option value="03">Marzo</option>
                                      <option value="04">Abril</option>
                                      <option value="05">Mayo</option>
                                      <option value="06">Junio</option>
                                      <option value="07">Julio</option>
                                      <option value="08">Agosto</option>
                                      <option value="09">Septiembre</option>
                                      <option value="10">Octubre</option>
                                      <option value="11">Noviembre</option>
                                      <option value="12">Diciembre</option>
                                  </select>
                              </div>

                              <div class="col-md-4 col-sm-4 col-xs-12">
                                  <select class="form-control" id="cboxAño">
                                    <option value="" disabled selected>Seleccione el Año</option>
                                  </select>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                  <select class="form-control" id="cboxSucursal">
                                    <option value="" disabled selected>Seleccione la Sucursal</option>
                                  </select>
                              </div>
                          </div>
                          <div class="ln_solid"></div>
                          <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                  <button type="button" class="btn btn-success" onclick="listaVentas()">Buscar Registros de Venta</button>
                              </div>
                          </div>
                      </form>
                  </div>
                  <div class="x_content">
                    <table id="table-simple" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Fecha/Hora</th>
                          <th>Imagen</th>
                          <th>Codigo</th>
                          <th>Producto</th>
                          <th>Cantidad</th>
                          <th>Descuento</th>
                          <th>Precio Unit.</th>
                          <th>Total</th>
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
            verificarAcceso("Permiso_Venta");
            var cboxSucursal = document.getElementById("cboxSucursal");
            var cboxAño = document.getElementById("cboxAño");
            var parametros = {
                "action" : "listaAccesosSucursalesCodigo"        
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

            var fecha = new Date();
            var año = fecha.getFullYear();
            for(let i=2019 ; i<=año ; i++){
                var tag = document.createElement('option');
                tag.setAttribute('value', i);
                tag.innerHTML = i;
                cboxAño.appendChild(tag);
            }
        });

        function listaVentas(){
            verificarAcceso("Permiso_Venta");
            var cboxSucursal = document.getElementById("cboxSucursal").value;
            var cboxAño = document.getElementById("cboxAño").value;
            var cboxMes = document.getElementById("cboxMes").value;
            
            var parametros = {
                "action" : "listaVentas",
                "sucursal" : cboxSucursal,
                "año" : cboxAño,
                "mes" : cboxMes
            };
            var table = $('#table-simple').DataTable({
                "destroy":true,
                "ajax":{
                    "method": "POST",
                    "data":  parametros,
                    "url": "app/controladores/Ventas.php"
                },
                "columns": [
                    {"data" : "fecha_venta_producto"},
                    {"render": function (data, type, JsonResultRow, meta) {
                            return "<img width='100'src=public/imagenes/productos/"+JsonResultRow.imagen_producto+">";
                        }
                    },
                    {"data" : "cod_producto"},
                    {"data" : "nombre_producto"},
                    {"data" : "cant_venta_producto"},
                    {"data" : "descuento_porcentaje_venta_producto"},
                    {"data" : "precio_unitario"},
                    {"data" : "total_venta_producto"},
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
        }
        
    </script>
  </body>
</html>
