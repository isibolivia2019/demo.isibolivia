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

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Agregar Nuevo Producto<small>llene el siguiente Formulario</small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <form enctype="multipart/form-data" id="formulario" method="post" data-parsley-validate class="form-horizontal form-label-left">
                                    <input id="action" name="action" type="text" value="agregarProducto" style="display:none">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Codigo <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="codigo" name="codigo" class="form-control col-md-7 col-xs-12">
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
                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Imagen</label>
                                        <div class="btn">
                                            <input class="file-path validate" type="text" id="txtImagen" name="txtImagen" style='display:none' disabled/>
                                            <input type="file" name="imagen" id="imagen"/>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button class="btn btn-primary" type="reset">Nuevo Formulario</button>
                                            <button type="submit" class="btn btn-success submitBtn">Agregar Producto</button>
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
        $(document).ready(function(e) {
            verificarAcceso("Permiso_Producto");
            
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
                            text: 'Aguarde un Momento porfavor mientras se procesa el registro',
                            type: 'info',
                            styling: 'bootstrap3'
                        });
                    },
                    success: function(data){
                        console.log("data", data)
                        datos = JSON.parse(data);
                        if(datos.resp == "true"){
                            new PNotify({
                                title: 'CORRECTO',
                                text: 'Producto '+document.getElementById('nombre').value+' Registrado correctamente en el Sistema.',
                                type: 'success',
                                styling: 'bootstrap3'
                            });
                            document.getElementById('codigo').value = "";
                            document.getElementById('nombre').value = "";
                            document.getElementById('descripcion').value = "";
                            document.getElementById('color').value = "";
                            document.getElementById('txtImagen').value = "";
                            verificarAcceso("Permiso_Producto");
                        }
                        if(datos.resp == "false"){
                            new PNotify({
                                title: 'ERROR',
                                text: 'Hubo un fallo al registrar el nuevo producto. Verifique que ningun dato sea registrado y Vuelva a Intentarlo.',
                                styling: 'bootstrap3'
                            });
                        }
                        if(datos.resp != "true" && datos.resp != "false"){
                            new PNotify({
                                title: 'ERROR',
                                text: "Hubo un fallo al registrar el nuevo Producto CODIGO DE ERROR:"+datos.resp+". Contactese con el Administrador.",
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
                }
            });
        });
    </script>
	
  </body>
</html>
