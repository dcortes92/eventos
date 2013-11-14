<?php
   echo $this->Session->flash();
?>

<div id="cssmenu">
   <ul>
      <li>
         <?php
            $temp = $this->Session->read('User');
            echo $this->Html->link('Mi Perfil', array('action' => 'edituser', $temp['User']['id']));
         ?>
      </li>
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
      <li class='last'><span><?php echo $this->Html->link('Salir ('.$username.')', array('controller' => 'users', 'action' => 'logout')) ?></span></li>
   </ul>
</div>