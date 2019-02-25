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
                        <h3>Usuario</h3>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Registrar un Nuevo Usuario<small>llene el siguiente Formulario</small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nombre (s)<span class="required">*</span></label>
                                        <div class="col-md-10 col-sm-10 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" id="nombre">
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name">Ap. Paterno <span class="required">*</span></label>
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" id="appat">
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name">Ap. Materno <span class="required">*</span></label>
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" id="apmat">
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name">Cedula Identidad</label>
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" id="ci">
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Expedicion</label>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <select class="form-control" id="ci_exp">
                                            <option value="" disabled selected>Seleccione una Expedicion</option>
                                                <option value="BN">Beni</option>
                                                <option value="CH">Chuquisaca</option>
                                                <option value="CB">Cochabamba</option>
                                                <option value="LP">La Paz</option>
                                                <option value="OR">Oruro</option>
                                                <option value="PN">Pando</option>
                                                <option value="PT">Potosi</option>
                                                <option value="SC">Santa Cruz</option>
                                                <option value="TJ">Tarija</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Correo Electronico</label>
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" id="email">
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Genero</label>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <select class="form-control" id="genero">
                                                <option value="" disabled selected>Seleccione un Genero</option>
                                                <option value="Femenino">Femenino</option>
                                                <option value="Masculino">Masculino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Telefono / Celular</label>
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" id="telefono">
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Fecha Nacimiento</label>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <input type="text" class="form-control" id="fec_nac" data-inputmask="'mask': '99/99/9999'">
                                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Direccion<span class="required">*</span></label>
                                        <div class="col-md-10 col-sm-10 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" id="direccion">
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Contraseña<span class="required">*</span></label>
                                        <div class="col-md-10 col-sm-10 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" id="pass">
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nombre (s) y Apellidos de Referencia<span class="required">*</span></label>
                                        <div class="col-md-10 col-sm-10 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" id="nombre_ref">
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Telefono / Celular</label>
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" id="telefono_ref">
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Tipo Referencia</label>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <select class="form-control" id="tipo_ref">
                                                <option value="" disabled selected>Seleccione un Tipo de Referencia</option>
                                                <option value="Familiar">Familiar</option>
                                                <option value="Amistad">Amistad</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Enviar:</label>
                                        <div class="checkbox col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                            <label>
                                                <input type="checkbox" class="flat" id="cbox_notificacion"> Notificaciones
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                            <label>
                                                <input type="checkbox" class="flat" id="cbox_registro"> Registros
                                            </label>
                                        </div>
                                    </div>
                                    

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		    			                    <button class="btn btn-primary" type="reset">Nuevo Formulario</button>
                                            <button type="button" class="btn btn-success" onclick="agregarUsuario()">Registrar</button>
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
    verificarAcceso("Permiso_Usuario");
});

function agregarUsuario(){
    verificarAcceso("Permiso_Usuario");
    document.getElementById("load").innerHTML = 
    "<div id='loading-screen' ><img src='public/imagenes/sistema/spinn.svg'></div>"

    var nombre = document.getElementById('nombre').value;
    var appat = document.getElementById('appat').value;
    var apmat = document.getElementById('apmat').value;
    var ci = document.getElementById('ci').value;
    var ci_exp = document.getElementById('ci_exp').value;
    var email = document.getElementById('email').value;
    var genero = document.getElementById('genero').value;
    var telefono = document.getElementById('telefono').value;
    var fec_nac = document.getElementById('fec_nac').value;
    var direccion = document.getElementById('direccion').value;
    var pass = document.getElementById('pass').value;
    var nombre_ref = document.getElementById('nombre_ref').value;
    var telefono_ref = document.getElementById('telefono_ref').value;
    var tipo_ref = document.getElementById('tipo_ref').value;
    var cbox_notificacion = document.getElementById('cbox_notificacion').checked;
    var cbox_registro = document.getElementById('cbox_registro').checked;
    var codCargo = "1";
    var estado = "1";
    if(cbox_notificacion){
      cbox_notificacion = "1"
    }else{
      cbox_notificacion = "0"
    }

    if(cbox_registro){
      cbox_registro = "1"
    }else{
      cbox_registro = "0"
    }


    var parametros = {
       "action" : "agregarUsuario",
       "nombre" : nombre,
       "appat" : appat,
       "apmat" : apmat,
       "ci" : ci,
       "ci_exp" : ci_exp,
       "email" : email,
       "genero" : genero,
       "telefono" : telefono,
       "fec_nac" : fec_nac,
       "direccion" : direccion,
       "pass" : pass,
       "nombreRef" : nombre_ref,
       "telefonoRef" : telefono_ref,
       "tipoRef" : tipo_ref,
       "codCargo" : codCargo,
       "estado" : estado,
       "notificacion" : cbox_notificacion,
       "registro" : cbox_registro
    };
    $.ajax({
      type:'POST',
      data: parametros,
      url:'app/controladores/Usuarios.php',
      success:function(data){
          datos = JSON.parse(data);
          if(datos.resp == "true"){
              new PNotify({
                  title: 'CORRECTO',
                  text: 'Usuario Registrado correctamente.',
                  type: 'success',
                  styling: 'bootstrap3'
              });
              document.getElementById('nombre').value = "";
              document.getElementById('appat').value = "";
              document.getElementById('apmat').value = "";
              document.getElementById('ci').value = "";
              document.getElementById('ci_exp').value = "";
              document.getElementById('email').value = "";
              document.getElementById('genero').value = "";
              document.getElementById('telefono').value = "";
              document.getElementById('fec_nac').value = "";
              document.getElementById('direccion').value = "";
              document.getElementById('pass').value = "";
              document.getElementById('nombre_ref').value = "";
              document.getElementById('telefono_ref').value = "";
              document.getElementById('tipo_ref').value = "";
              document.getElementById('cbox_registro').checked = false
              document.getElementById('cbox_notificacion').checked  =false
          }
          if(datos.resp == "false"){
                new PNotify({
                    title: 'ERROR',
                    text: 'Hubo un fallo al registrar el usuario. Verifique que ningun dato sea registrado y Vuelva a Intentarlo.',
                    styling: 'bootstrap3'
                });
          }
          if(datos.resp != "true" && datos.resp != "false"){
                new PNotify({
                    title: 'ERROR',
                    text: "Hubo un fallo al registrar el usuario CODIGO DE ERROR:"+datos.resp+". Contactese con el Administrador.",
                    type: 'error',
                    styling: 'bootstrap3'
                });
            }
            document.getElementById("load").innerHTML = 
            "<div id='loading-screen' style='display:none'><img src='public/imagenes/sistema/spinn.svg'></div>"
        }
    })
}
</script>
	
  </body>
</html>
