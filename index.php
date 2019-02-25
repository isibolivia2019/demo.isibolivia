<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inicio de Sesion</title>


    
    <!-- Bootstrap -->
    <link href="public/plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="public/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="public/plugins/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="public/plugins/animate.css/animate.min.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="public/plugins/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="public/plugins/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="public/plugins/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="public/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form>
              <h1>Inicio de Sesion</h1>
              <div>
                <input type="text" class="form-control" placeholder="Usuario" id="usuario" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Contraseña" id="pass" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" onclick="autentificacion()">Iniciar sesion</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> ISI BOLIVIA</h1>
                  <p>©2019 Sistema de control Elaborado por ISIBOLIVIA</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <script>
  function autentificacion(){
    var usuario = document.getElementById('usuario').value;
    var pass = document.getElementById('pass').value;
    if(usuario != ""){
      if(pass != ""){
        var parametros = {
           "action" : "autentificacionUsuario",
           "usuario" : usuario,
           "pass" : pass
        };
        $.ajax({
          type:'POST',
          data: parametros,
          url:'app/controladores/Usuarios.php',
          success:function(data){
            console.log("data", data)
            $datos = JSON.parse(data);
            if($datos.length > 0){
              if($datos[0].estado_usuario == "1"){
                location.href = "inicio.php";
              }else{
                document.getElementById('pass').value = ""
                new PNotify({
                    title: 'Usuario Bloqueado',
                    text: 'Usuario Bloqueado para el Uso del Sistema. Contactese con el Administrador',
                    type: 'info',
                    styling: 'bootstrap3'
                });
              }
            }else{
                document.getElementById('pass').value = ""
                new PNotify({
                    title: 'Usuario y/o Contraseña Incorrecto',
                    text: 'El usuario y/o contraseña son incorrectos, vuelva a intentarlo.',
                    type: 'error',
                    styling: 'bootstrap3'
                });
            }
          }
        })
      }else{
        new PNotify({
            title: 'Contraseña en Blanco',
            text: 'Ingrese su Contraseña porfavor.',
            styling: 'bootstrap3'
        });
      }
    }else{
        new PNotify({
            title: 'Usuario en Blanco',
            text: 'Ingrese su Usuario porfavor.',
            styling: 'bootstrap3'
        });
    }
  }
  </script>
    <!-- jQuery -->
    <script src="public/plugins/jquery/dist/jquery.min.js"></script>
    <!-- PNotify -->
    <script src="public/plugins/pnotify/dist/pnotify.js"></script>
    <script src="public/plugins/pnotify/dist/pnotify.buttons.js"></script>
    <script src="public/plugins/pnotify/dist/pnotify.nonblock.js"></script>
  </body>
</html>
