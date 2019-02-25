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
                <h3>Buscar <small> Registros del personal</small></h3>
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
                          </div>
                          <div class="ln_solid"></div>
                          <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                  <button type="button" class="btn btn-success" onclick="listaRegistro()">Buscar Registros</button>
                              </div>
                          </div>
                      </form>
                  </div>
                  <div class="x_content">
                    <table id="table-simple" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Fecha/Hora</th>
                          <th>Mensaje</th>
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
            verificarAcceso("Permiso_Registro");
            var cboxAño = document.getElementById("cboxAño");

            var fecha = new Date();
            var año = fecha.getFullYear();
            for(let i=2019 ; i<=año ; i++){
                var tag = document.createElement('option');
                tag.setAttribute('value', i);
                tag.innerHTML = i;
                cboxAño.appendChild(tag);
            }
        });

        function listaRegistro(){
            verificarAcceso("Permiso_Registro");
            var cboxAño = document.getElementById("cboxAño").value;
            var cboxMes = document.getElementById("cboxMes").value;

              if(cboxAño != ""){
                if(cboxMes != ""){
                  var parametros = {
                "action" : "buscarRegistroFecha",
                "año" : cboxAño,
                "mes" : cboxMes
            };
            var table = $('#table-simple').DataTable({
                "destroy":true,
                "ajax":{
                    "method": "POST",
                    "data":  parametros,
                    "url": "app/controladores/RegistrosNotificaciones.php"
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
        }
        
    </script>
  </body>
</html>
