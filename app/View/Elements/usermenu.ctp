<div id="cssmenu">
   <ul>
      <li><a href='#'><span>Mi Perfil</span></a></li>
      <li class='has-sub'><a href='#'><span>Sesiones</span></a>
         <ul>
            <li><a href='#'><span>A-Z</span></a></li>
            <li class='last'><a href='#'><span>Por Fecha</span></a></li>
         </ul>
      </li>
      <li class='has-sub'><a href='#'><span>Favoritos</span></a>
         <ul>
            <li><a href='#'><span>Por Fecha</span></a></li>
            <li><a href='#'><span>Por Sesion</span></a></li>
            <li class='last'><a href='#'><span>Por Tipo</span></a></li>
         </ul>
      </li>
      <li class='last'><a href='#'><span>Mis Propuestas</span></a></li>
      <li class='last'><span><?php echo $this->Html->link('Logout ('.$username.')', array('controller' => 'users', 'action' => 'logout')) ?></span></li>
   </ul>
</div>