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
                <h3>Reporte <small> de Compras</small></h3>
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
                                  <select class="form-control" id="cboxAlmacenamiento">
                                    <option value="" disabled selected>Seleccione el Punto de Almacenamiento</option>
                                    <option value="todos">Todos</option>
                                  </select>
                              </div>
                          </div>
                          <div class="ln_solid"></div>
                          <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                  <button type="button" class="btn btn-success" onclick="generarReporte()">Generar Reporte de Compras</button>
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
            verificarAcceso("Permiso_Reporte");
            var cboxAlmacenamiento = document.getElementById("cboxAlmacenamiento");
            var cboxAño = document.getElementById("cboxAño");
            var parametros = {
            "action" : "listaAlmacenes"            
          };
          $.ajax({
            type:'POST',
            data: parametros,
            url:'app/controladores/Almacenes.php',
            success:function(data){
                datos = JSON.parse(data);
                datos = datos.data;
                for(let i=0 ; i<datos.length ; i++){
                    var tag = document.createElement('option');
                    tag.setAttribute('value', datos[i].cod_almacen);
                    tag.innerHTML = datos[i].nombre_almacen;
                    cboxAlmacenamiento.appendChild(tag);
                }
            }
          })
          parametros = {
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
                    cboxAlmacenamiento.appendChild(tag);
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

        function generarReporte(){
            verificarAcceso("Permiso_Reporte");
            var cboxAlmacenamiento = document.getElementById("cboxAlmacenamiento").value;
            var cboxAño = document.getElementById("cboxAño").value;
            var cboxMes = document.getElementById("cboxMes").value;
            window.open("reportes/reporte-compra.php?suc="+cboxAlmacenamiento+"&a="+cboxAño+"&m="+cboxMes,'New Window'); 
            verificarAcceso("Permiso_Reporte");
        }
        
    </script>
  </body>
</html>
