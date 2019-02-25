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
                <h3>Venta</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Seleccione una Sucursal</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <br />
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                          <div class="form-group">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                  <select class="form-control" id="cboxSucursal">
                                    <option value="" disabled selected>Seleccione la Sucursal</option>
                                  </select>
                              </div>
                          </div>
                          <div class="ln_solid"></div>
                          <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                  <button type="button" class="btn btn-success" onclick="listaCajaChica()">Buscar Registros de Caja Chica</button>
                              </div>
                          </div>
                      </form>
                  </div>
                  <div class="x_content">
                    <table id="table-simple" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Fecha/Hora</th>
                          <th>Total de Gasto</th>
                          <th>Detalle</th>
                          <th>Comprobante</th>
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
            verificarAcceso("Permiso_CajaChica");
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

        function listaCajaChica(){
            verificarAcceso("Permiso_CajaChica");
            var cboxSucursal = document.getElementById("cboxSucursal").value;
            var cboxAño = document.getElementById("cboxAño").value;
            var cboxMes = document.getElementById("cboxMes").value;

            if(cboxSucursal != ""){
              if(cboxAño != ""){
                if(cboxMes != ""){
                  var parametros = {
                "action" : "listaCajaChica",
                "sucursal" : cboxSucursal,
                "año" : cboxAño,
                "mes" : cboxMes
            };
            var table = $('#table-simple').DataTable({
                "destroy":true,
                "ajax":{
                    "method": "POST",
                    "data":  parametros,
                    "url": "app/controladores/CajasChicas.php"
                },
                "columns": [
                    {"data" : "fecha"},
                    {"data" : "monto_gasto"},
                    {"data" : "detalle"},
                    {"data" : "comprobante"},
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
                }else{
                  new PNotify({
                    title: 'MES',
                    text: 'Seleccione un Mes porfavor para poder buscar en los registros.',
                    type: 'info',
                    styling: 'bootstrap3'
                  });
                }
              }else{
                new PNotify({
                  title: 'AÑO',
                  text: 'Seleccione un Año porfavor para poder buscar en los registros.',
                  type: 'info',
                  styling: 'bootstrap3'
                });
              }
            }else{
              new PNotify({
                title: 'SUCURSAL',
                text: 'Seleccione una Sucursal porfavor para poder buscar en los registros.',
                type: 'info',
                styling: 'bootstrap3'
              });
            }
            
            
        }
        
    </script>
  </body>
</html>