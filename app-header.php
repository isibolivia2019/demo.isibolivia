<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src=<?php echo "public/imagenes/usuarios/".$_SESSION['imagen'];?> alt=""><?php echo $_SESSION['nombre'];?>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="javascript:;"> Perfil</a></li>
            <li>
              <a href="javascript:;">
                <span class="badge bg-red pull-right">50%</span>
                <span>Configuracion</span>
              </a>
            </li>
            <li><a href="javascript:;">Ayuda</a></li>
            <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesion</a></li>
          </ul>
        </li>

        <li role="presentation" class="dropdown">
          <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-sitemap"></i>
            <span class="badge bg-blue" id="lblCantRegistro"></span>
          </a>
          <ul id="menuRegistro" class="dropdown-menu list-unstyled msg_list" role="menu">
            
          </ul>
        </li>
        <li role="presentation" class="dropdown">
          <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-bar-chart"></i>
            <span class="badge bg-red" id="lblCantNotificacion"></span>
          </a>
          <ul id="menuNotificacion" class="dropdown-menu list-unstyled msg_list" role="menu">
            
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</div>