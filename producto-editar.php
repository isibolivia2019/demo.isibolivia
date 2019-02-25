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
                        <h3>Producto</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Imagen de Producto</small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <form enctype="multipart/form-data" id="formulario" method="post" data-parsley-validate class="form-horizontal form-label-left">
                                    <input id="action" name="action" type="text" value="actualizarImagenProducto" style="display:none">
                                    <input id="cod" name="cod" type="text" value="" style="display:none">
                                    <div class="form-group">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <img id="imag" src="public/imagenes/productos/sin_imagen_producto.jpg" alt="" width="200">
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Imagen</label>
                                            <div class="btn">
                                                <input class="file-path validate" type="text" id="txtImagen" name="txtImagen" style='display:none' disabled/>
                                                <input type="file" name="imagen" id="imagen"/>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="submit" class="btn btn-success submitBtn">Actualizar Imagen</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Editar Datos del Producto<small>Modifique el siguiente Formulario</small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <form  data-parsley-validate class="form-horizontal form-label-left">
                                    <input id="action" name="action" type="text" value="agregarProducto" style="display:none">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Codigo <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input disabled type="text" id="codigo" name="codigo" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="nombre" name="nombre" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Descripcion <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="descripcion" name="descripcion" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Color</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="color" name="color" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="button" class="btn btn-success" onclick="actualizarDatos()">Actualizar Datos</button>
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
    function lista(){
        var parametros = {
                "action" : "productoEspecifico",
                "cod_producto" : localStorage.getItem("producto")
            };
            $.ajax({
              type:'POST',
              data: parametros,
              url:'app/controladores/Productos.php',
              success:function(data){
                datos = JSON.parse(data);
                document.getElementById("imag").src = "public/imagenes/productos/"+datos[0].imagen_producto;
                document.getElementById('cod').value = datos[0].cod_producto;
                
                document.getElementById('codigo').value = datos[0].cod_producto;
                document.getElementById('nombre').value = datos[0].nombre_producto;
                document.getElementById('descripcion').value = datos[0].descripcion_producto;
                document.getElementById('color').value = datos[0].color_producto;
              }
            })
    }
        $(document).ready(function() {
            verificarAcceso("Permiso_Producto");
            $('.submitBtn').attr("disabled","disabled");
            lista();

            $("#formulario").on('submit', function(e){
                e.preventDefault();
                document.getElementById("load").innerHTML = 
                "<div id='loading-screen' ><img src='public/imagenes/sistema/spinn.svg'></div>"
                $.ajax({
                    type: 'POST',
                    url: 'app/controladores/Productos.php',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    beforeSend: function(){
                        $('.submitBtn').attr("disabled","disabled");
                        $('#formulario').css("opacity",".5");
                        new PNotify({
                            title: 'CARGANDO',
                            text: 'Aguarde un Momento porfavor mientras se actualiza la imagen',
                            type: 'info',
                            styling: 'bootstrap3'
                        });
                    },
                    success: function(data){
                        console.log("data", data)
                        datos = JSON.parse(data);
                        if(datos.resp == "true"){
                            new PNotify({
                                title: 'IMAGEN ACTUALIZADA',
                                text: 'Imagen actualizado correctamente. Aguarde unos minutos para ver reflejado en el sistema.',
                                type: 'success',
                                styling: 'bootstrap3'
                            });
                            verificarAcceso("Permiso_Producto");
                            lista();
                        }
                        if(datos.resp == "false"){
                            new PNotify({
                                title: 'CARGANDO',
                                text: 'Hubo un fallo al actualizar la Imagen. Vuelva a Intentarlo',
                                styling: 'bootstrap3'
                            });
                        }
                        if(datos.resp != "true" && datos.resp != "false"){
                            new PNotify({
                                title: 'CARGANDO',
                                text: 'Hubo un fallo al actualizar la Imagen COD:'+datos.resp,
                                type: 'error',
                                styling: 'bootstrap3'
                            });
                        }
                        $('#formulario').css("opacity","");
                        $(".submitBtn").removeAttr("disabled");
                        document.getElementById("load").innerHTML = 
                        "<div id='loading-screen' style='display:none'><img src='public/imagenes/sistema/spinn.svg'></div>"
                    }
                });
            });

            //file type validation
            $("#imagen").change(function() {
                var file = this.files[0];
                var imagefile = file.type;
                var match= ["image/jpeg","image/png","image/jpg"];
                if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
                    $('.submitBtn').attr("disabled","disabled");
                    $.alert({
                        title: 'FORMATO NO VALIDO',
                        content: 'El archivo elegido no es una formato valido de Imagen. Los Formatos validos son: .JPEG, .JPG .PNG',
                        buttons: {
                            deAcuerdo: {
                                text: 'De Acuerdo',
                                btnClass: 'btn-blue',
                                keys: ['enter'],
                                action: function(){
                                    ""
                                }
                            }
                        }
                    });
                    $("#txtImagen").val('');
                    return false;
                }else{
                    $(".submitBtn").removeAttr("disabled");
                }
            });
        });

        function actualizarDatos(){
            verificarAcceso("Permiso_Producto");
            document.getElementById("load").innerHTML = 
            "<div id='loading-screen' ><img src='public/imagenes/sistema/spinn.svg'></div>"
          var codigo = document.getElementById('codigo').value;
          var nombre = document.getElementById('nombre').value;
          var descripcion = document.getElementById('descripcion').value;
          var color = document.getElementById('color').value;

          var parametros = {
             "action" : "actualizarProducto",
             "codigo" : localStorage.getItem("producto"),
             "nombre" : nombre,
             "descripcion" : descripcion,
             "color" : color,
          };
          $.ajax({
            type:'POST',
            data: parametros,
            url:'app/controladores/Productos.php',
            success:function(data){
                datos = JSON.parse(data);
                if(datos.resp == "true"){
                    new PNotify({
                        title: 'DATOS ACTUALIZADOS',
                        text: 'Datos del Producto fueron actualizados correctamente',
                        type: 'success',
                        styling: 'bootstrap3'
                    });
                    verificarAcceso("Permiso_Producto");
                    lista();
                }
                if(datos.resp == "false"){
                    new PNotify({
                        title: 'ERROR',
                        text: 'Hubo un fallo al actualizar el Producto. Verifique los datos y Vuelva a Intentarlo',
                        styling: 'bootstrap3'
                    });
                }
                if(datos.resp != "true" && datos.resp != "false"){
                    new PNotify({
                        title: 'ERROR',
                        text: 'Hubo un fallo al actualizar el Producto CODIGO DE ERROR:'+datos.resp+'. Contactese con el Administrador.',
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
