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
                <h3>Usuario</h3>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Datos del Usuario</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="product-image">
                        <img src="public/imagenes/usuarios/sin_imagen_usuario.jpg" alt="..." id="imagen"/>
                      </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12" style="border:0px solid #e5e5e5;">

                      <h2 class="prod_title" id="lblNombre"></h2>
                      
                      <div class=""><h4 id="lblGenero"></h4></div>
                      <div class=""><h4 id="lblCi"></h4></div>
                      <div class=""><h4 id="lblFecNac"></h4></div>
                      <div class=""><h4 id="lblTelefono"></h4></div>
                      <div class=""><h4 id="lblEmail"></h4></div>
                      <div class=""><h4 id="lblDireccion"></h4></div>
                      <div class=""><h4 id="lblPass"></h4></div>
                      <br />

                      <div class="">
                        <div class="product_price">
                          <div class=""><h4 id="lblTipo"></h4></div>
                          <span class="price-tax" id="lblNombreRef"></span>
                          <div class=""><h4 id="lblTelefonoRef"></h4></div>
                          <br>
                        </div>
                      </div>

                      <div class="">
                        <button type="button" class="btn btn-default btn-lg">Editar</button>
                      </div>
                    </div>
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
            verificarAcceso("Permiso_Usuario");
            //localStorage.clear();
            var parametros = {
                "action" : "usuarioEspecifico",
                "usuario" : localStorage.getItem("usuario")
            };
            $.ajax({
              type:'POST',
              data: parametros,
              url:'app/controladores/Usuarios.php',
              success:function(data){
                datos = JSON.parse(data);
                document.getElementById("imagen").src = 'public/imagenes/usuarios/'+datos[0].imagen_usuario;
                document.getElementById("lblNombre").innerHTML = datos[0].nombre_usuario+" "+datos[0].appat_usuario+" "+datos[0].apmat_usuario
                document.getElementById("lblCi").innerHTML = '<small>Cedula de Identidad :</small> '+datos[0].ci_usuario+" "+datos[0].ci_exp_usuario
                document.getElementById("lblGenero").innerHTML = '<small>Genero :</small> '+datos[0].genero_usuario
                document.getElementById("lblFecNac").innerHTML = '<small>Fecha de Nacimiento :</small> '+datos[0].fec_nac_usuario
                document.getElementById("lblTelefono").innerHTML = '<small>Telefono :</small> '+datos[0].telefono_usuario
                document.getElementById("lblEmail").innerHTML = '<small>Correo Electronico :</small> '+datos[0].email_usuario
                document.getElementById("lblDireccion").innerHTML = '<small>Direccion :</small> '+datos[0].direccion_usuario
                document.getElementById("lblTipo").innerHTML = '<small>'+datos[0].tipo_ref_usuario+' de Referencia</small> '
                document.getElementById("lblNombreRef").innerHTML = datos[0].nombre_ref_usuario
                document.getElementById("lblTelefonoRef").innerHTML = '<small>Telefono :</small> '+datos[0].telefono_ref_usuario
                document.getElementById("lblPass").innerHTML = '<small>Contraseña :</small> '+datos[0].pass_usuario
              }
            })
        });
    </script>
  </body>
</html>
