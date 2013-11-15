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
      <li><a href='#'><span>Eventos</span></a></li>
      <li><a href='#'><span>Propuestas</span></a></li>
      <li><a href='#'><span>Sesiones</span></a></li>
      <li><a href='#'><span>Hilos</span></a></li>
      <li class='has-sub'><a href='#'><span>Otros</span></a>
         <ul>
            <li><a href='#'><span>Salones</span></a></li>
            <li><span><?php echo $this->Html->link('Permisos', 
               array('controller' => 'users', 'action' => 'editrol')) ?></span></li>
            <li class='last'><span><?php echo $this->Html->link('Salir ('.$username.')', array('controller' => 'users', 'action' => 'logout')) ?></span></li>
         </ul>
      </li>
   </ul>
</div>