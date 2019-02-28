<?php
session_start();
?>
<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>ISI BOLIVIA</span></a>
    </div>
    
    <div class="clearfix"></div>
    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src=<?php echo "public/imagenes/usuarios/".$_SESSION['imagen'];?> alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span><?php echo $_SESSION['cargo'];?></span>
        <h2><?php echo $_SESSION['personal'];?></h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a href="inicio.php"><i class="fa fa-home"></i> Inicio</a></li>
          <?php if($_SESSION['Permiso_Usuario'] == 1){?>
          <li><a><i class="fa fa-user"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="usuario-agregar.php">Agregar Nuevo Usuario</a></li>
              <li><a href="usuario-habilitado.php">Usuarios Habilitados</a></li>
              <li><a href="usuario-deshabilitado.php">Usuarios Deshabilitados</a></li>
            </ul>
          </li>
          <?php }?>
          <?php if($_SESSION['Permiso_Sucursal'] == 1){?>
          <li><a><i class="fa fa-star"></i> Sucursales <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="sucursal-agregar.php">Agregar Nueva Sucursal</a></li>
              <li><a href="sucursal.php">Lista de Sucursales</a></li>
            </ul>
          </li>
          <?php }?>
          <?php if($_SESSION['Permiso_Almacen'] == 1){?>
          <li><a><i class="fa fa-star-o"></i> Almacenes <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="almacen-agregar.php">Agregar nuevo Almacen</a></li>
              <li><a href="almacen.php">Lista de Almacenes</a></li>
            </ul>
          </li>
          <?php }?>
          <?php if($_SESSION['Permiso_Producto'] == 1){?>
          <li><a><i class="fa fa-ticket"></i> Productos <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="producto-agregar.php">Agregar Producto</a></li>
              <li><a href="producto.php">Lista de Productos</a></li>
              <li><a href="producto-compra-registro.php">Registro de Compras</a></li>
            </ul>
          </li>
          <?php }?>
          <?php if($_SESSION['Permiso_Trasnferencia'] == 1){?>
          <li><a><i class="fa fa-exchange"></i> Transferencias <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="transferencia.php">Realizar Transferencia</a></li>
              <li><a href="transferencia-lista.php">Lista de Transferencia</a></li>
            </ul>
          </li>
          <?php }?>
          <?php if($_SESSION['Permiso_Venta'] == 1){?>
          <li><a><i class="fa fa-money"></i> Ventas <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="venta.php">Realizar Venta</a></li>
              <li><a href="venta-lista.php">Lista de Ventas</a></li>
            </ul>
          </li>
          <?php }?>
          <?php if($_SESSION['Permiso_Reporte'] == 1){?>
          <li><a><i class="fa fa-file-text"></i> Reportes <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="reporte-caja-chica.php">Caja Chica</a></li>
              <li><a href="reporte-compra.php">Compras</a></li>
              <li><a href="reporte-venta.php">Ventas</a></li>
              <li><a href="reporte-traspaso.php">Traspasos</a></li>
            </ul>
          </li>
          <?php }?>
          <?php if($_SESSION['Permiso_CajaChica'] == 1){?>
          <li><a><i class="fa fa-paperclip"></i> Gastos (Caja Chica) <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="caja-chica-agregar.php">Registrar gasto</a></li>
              <li><a href="caja-chica.php">Registro de Caja Chica</a></li>
            </ul>
          </li>
          <?php }?>
          <?php if($_SESSION['Permiso_Registro'] == 1){?>
          <li><a><i class="fa fa-list-alt"></i> Registros <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
            <li><a href="registro-buscar.php">Buscar Registros</a></li>
            </ul>
          </li>
          <?php }?>
          <?php if($_SESSION['Permiso_Notificacion'] == 1){?>
          <li><a><i class="fa fa-bullhorn"></i> Notificaciones <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="notificacion-buscar.php">Buscar Notificacion</a></li>
            </ul>
          </li>
          <?php }?>
          <?php if($_SESSION['Permiso_Acceso'] == 1){?>
          <li><a><i class="fa fa-key"></i> Accesos <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="acceso-sucursal.php">Acceso a Sucursal</a></li>
              <li><a href="acceso-almacen.php">Acceso a Almacenes</a></li>
              <li><a href="acceso-modulo-lista.php">Lista de Acceso a Modulos</a></li>
              <li><a href="acceso-sucursal-lista.php">Lista de Acceso a Sucursal</a></li>
              <li><a href="acceso-almacen-lista.php">Lista de Acceso a Almacenes</a></li>
            </ul>
          </li>
          <?php }?>
          <?php if($_SESSION['Permiso_Configuracion'] == 1){?>
          <li><a><i class="fa fa-gear"></i> Configuraciones <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
            
            </ul>
          </li>
          <?php }?>
          <li><a href="logout.php"><i class="fa fa-times"></i> Cerrar Sesion</a></li>
        </ul>
      </div>
    </div>
    <!-- /sidebar menu -->

  </div>
</div>