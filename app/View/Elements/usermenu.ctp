<?php
   echo $this->Session->flash();
?>

<div id="cssmenu">
   <ul>
      <li>
         <?php
            $temp = $this->Session->read('User');
            echo $this->Html->link('Mi Perfil', array('controller' => 'users', 'action' => 'edituser', $temp['User']['id']));
         ?>
      </li>
      <li class='has-sub'><a href="#"><span>Actividades</span></a>
         <ul> 
            <li>
               <span>
                  <?php echo $this->Html->link('Propuestas', array('controller' => 'proposals', 'action' => 'index')) ?>
               </span>
            </li>
            <li>
               <span>
                  <?php echo $this->Html->link('Sesiones', array('controller' => 'sesions', 'action' => 'index')) ?>
               </span>
            </li>
            <li>
               <span>
                  <?php echo $this->Html->link('Eventos', array('controller' => 'events', 'action' => 'index')) ?>
               </span>
            </li>
            <li class='last'>
               <span>
                  <?php echo $this->Html->link('Hilos', array('controller' => 'threads', 'action' => 'index')) ?>
               </span>
            </li>
         </ul>
      </li>
      <li class='has-sub'><a href='#'><span>Favoritos</span></a>
         <ul>
            <li>
               <span>
                  <?php echo $this->Html->link('Comentarios', array('controller' => 'favoritecomments', 'action' => 'index')) ?>
               </span>
            </li>
            <li>
               <span>
                  <?php echo $this->Html->link('Preguntas', array('controller' => 'favoritequestions', 'action' => 'index')) ?>
               </span>
            </li>
            <li>
               <span>
                  <?php echo $this->Html->link('Recursos', array('controller' => 'favoriteresources', 'action' => 'index')) ?>
               </span>
            </li>
            <li>
               <span>
                  <?php echo $this->Html->link('Por Propuestas', array('controller' => 'proposals', 'action' => 'index')) ?>
               </span>
            </li>
            <li class='last'>
               <span>
                  <?php echo $this->Html->link('Por Sesiones', array('controller' => 'sesions', 'action' => 'index')) ?>
               </span>
            </li>
         </ul>
      </li>
      <li class='last'>
         <span>
            <?php echo $this->Html->link('Mis Propuestas', array('controller' => 'proposals', 'action' => 'mispropuestas')) ?>
         </span>
      </li>
      <li class='last'><span><?php echo $this->Html->link('Salir ('.$username.')', array('controller' => 'users', 'action' => 'logout')) ?></span></li>
   </ul>
</div>