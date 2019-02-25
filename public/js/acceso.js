function verificarAcceso(privilegio){
    var parametros = {
        "action" : "verificarPrivilegio",
        "privilegio" : privilegio
    };
    $.ajax({
      type:'POST',
      data: parametros,
      url:'app/controladores/Usuarios.php',
      success:function(data){
        datos = JSON.parse(data);
        if(datos.privilegio == -1){
            $.alert({
                title: 'USUARIO NO IDENTIFICADO',
                content: 'Al parecer no se encuentra ningun usuario identificado en este dispositivo, Inicie Sesion porfavor.',
                buttons: {
                    deAcuerdo: {
                        text: 'De Acuerdo',
                        btnClass: 'btn-blue',
                        keys: ['enter'],
                        action: function(){
                            location.href = "index.php";
                        }
                    }
                }
            });
        }
        if(datos.privilegio == 0){
            $.alert({
                title: 'MODULO DEL SISTEMA BLOQUEADO',
                content: 'Usted no cuenta con permisos suficientes para ingresar a este modulo del sistema, vuelva a Iniciar Sesion o Contactese con el Administrador.',
                buttons: {
                    deAcuerdo: {
                        text: 'De Acuerdo',
                        btnClass: 'btn-blue',
                        keys: ['enter'],
                        action: function(){
                            location.href = "index.php";
                        }
                    }
                }
            });
        }
        if(datos.privilegio == 1){
            $.alert({
                title: 'SE AGOTO EL TIEMPO POR INACTIVIDAD',
                content: 'Por motivos de seguridad cuenta con un tiempo determinado administracion de su sesion. Vuelva a Iniciar Sesion',
                buttons: {
                    deAcuerdo: {
                        text: 'De Acuerdo',
                        btnClass: 'btn-blue',
                        keys: ['enter'],
                        action: function(){
                            location.href = "index.php";
                        }
                    }
                }
            });
        }
        if(datos.privilegio == 2){
            document.getElementById("lblCantRegistro").innerHTML = datos.registro.length
            textRegisto = ""
            cantRegistro = 0;
            cantNotificacion = 0;
            if(datos.registro.length <= 5){
                cantRegistro = datos.registro.length
            }else{
                cantRegistro = 5
            }
            if(datos.notificacion.length <= 5){
                cantNotificacion = datos.notificacion.length
            }else{
                cantNotificacion = 5
            }
            for(i=0; i<cantRegistro ; i++){
                textRegisto = textRegisto+"<li><a><span class='image'><img src='public/images/img.jpg' alt='Profile Image' /></span>"+
                "<span><span>"+datos.registro[i].personal+"</span><span class='time'>"+datos.registro[i].fecha+" "+datos.registro[i].hora+"</span></span>"+
                "<span class='message'>"+datos.registro[i].mensaje+"</span></a></li>"
            }

            textRegisto = textRegisto+"<li><div class='text-center'><a href='registro.php'><strong>Ver Todas las Registros </strong><i class='fa fa-angle-right'></i></a></div></li>"
 
            document.getElementById("menuRegistro").innerHTML = textRegisto

            document.getElementById("lblCantNotificacion").innerHTML = datos.notificacion.length
            textNotificacion = ""
            for(i=0; i<cantNotificacion ; i++){
                textNotificacion = textNotificacion+"<li><a>"+
                "<span><span>SISTEMA</span><span class='time'>"+datos.notificacion[i].fecha+" "+datos.notificacion[i].hora+"</span></span>"+
                "<span class='message'>"+datos.notificacion[i].mensaje+"</span></a></li>"
            }
            textNotificacion = textNotificacion+"<li><div class='text-center'><a href='notificacion.php'><strong>Ver Todos los Notificaciones </strong><i class='fa fa-angle-right'></i></a></div></li>"

            document.getElementById("menuNotificacion").innerHTML = textNotificacion
        }
      }
    })
}

function verificarInicio(){
    var parametros = {
        "action" : "verificarInicio"
    };
    $.ajax({
      type:'POST',
      data: parametros,
      url:'app/controladores/Usuarios.php',
      success:function(data){
        datos = JSON.parse(data);
        if(datos.privilegio == -1){
            $.alert({
                title: 'USUARIO NO IDENTIFICADO',
                content: 'Al parecer no se encuentra ningun usuario identificado en este dispositivo, Inicie Sesion porfavor.',
                buttons: {
                    deAcuerdo: {
                        text: 'De Acuerdo',
                        btnClass: 'btn-blue',
                        keys: ['enter'],
                        action: function(){
                            location.href = "index.php";
                        }
                    }
                }
            });
        }
        if(datos.privilegio == 0){
            $.alert({
                title: 'MODULO DEL SISTEMA BLOQUEADO',
                content: 'Usted no cuenta con permisos suficientes para ingresar a este modulo del sistema, vuelva a Iniciar Sesion o Contactese con el Administrador.',
                buttons: {
                    deAcuerdo: {
                        text: 'De Acuerdo',
                        btnClass: 'btn-blue',
                        keys: ['enter'],
                        action: function(){
                            location.href = "index.php";
                        }
                    }
                }
            });
        }
        if(datos.privilegio == 1){
            $.alert({
                title: 'SE AGOTO EL TIEMPO POR INACTIVIDAD',
                content: 'Por motivos de seguridad cuenta con un tiempo determinado administracion de su sesion. Vuelva a Iniciar Sesion',
                buttons: {
                    deAcuerdo: {
                        text: 'De Acuerdo',
                        btnClass: 'btn-blue',
                        keys: ['enter'],
                        action: function(){
                            location.href = "index.php";
                        }
                    }
                }
            });
        }
        if(datos.privilegio == 2){
            document.getElementById("lblCantRegistro").innerHTML = datos.registro.length
            textRegisto = ""
            cantRegistro = 0;
            cantNotificacion = 0;
            if(datos.registro.length <= 5){
                cantRegistro = datos.registro.length
            }else{
                cantRegistro = 5
            }
            if(datos.notificacion.length <= 5){
                cantNotificacion = datos.notificacion.length
            }else{
                cantNotificacion = 5
            }
            for(i=0; i<cantRegistro ; i++){
                textRegisto = textRegisto+"<li><a><span class='image'><img src='public/images/img.jpg' alt='Profile Image' /></span>"+
                "<span><span>"+datos.registro[i].personal+"</span><span class='time'>"+datos.registro[i].fecha+" "+datos.registro[i].hora+"</span></span>"+
                "<span class='message'>"+datos.registro[i].mensaje+"</span></a></li>"
            }

            textRegisto = textRegisto+"<li><div class='text-center'><a href='registro.php'><strong>Ver Todas las Registros </strong><i class='fa fa-angle-right'></i></a></div></li>"
 
            document.getElementById("menuRegistro").innerHTML = textRegisto

            document.getElementById("lblCantNotificacion").innerHTML = datos.notificacion.length
            textNotificacion = ""
            for(i=0; i<cantNotificacion ; i++){
                textNotificacion = textNotificacion+"<li><a>"+
                "<span><span>SISTEMA</span><span class='time'>"+datos.notificacion[i].fecha+" "+datos.notificacion[i].hora+"</span></span>"+
                "<span class='message'>"+datos.notificacion[i].mensaje+"</span></a></li>"
            }
            textNotificacion = textNotificacion+"<li><div class='text-center'><a href='notificacion.php'><strong>Ver Todos los Notificaciones </strong><i class='fa fa-angle-right'></i></a></div></li>"

            document.getElementById("menuNotificacion").innerHTML = textNotificacion
        }
      }
    })
}

function actualizarRegistroLeido(){
    var parametros = {
        "action" : "actualizarRegistroLeido"
    };
    $.ajax({
      type:'POST',
      data: parametros,
      url:'app/controladores/RegistrosNotificaciones.php',
      success:function(data){
          //console.log("data", data)
      }
    })
}

function actualizarNotificacionLeido(){
    var parametros = {
        "action" : "actualizarNotificacionLeido"
    };
    $.ajax({
      type:'POST',
      data: parametros,
      url:'app/controladores/RegistrosNotificaciones.php',
      success:function(data){
          //console.log("data", data)
      }
    })
}