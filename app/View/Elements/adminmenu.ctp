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
      <li class = 'has-sub'><a href="#">Administrar</a>
         <ul>
            <li>
               <?php
                  echo $this->Html->link('Eventos', array('controller' => 'events', 'action' => 'index'));
               ?>
            </li>
            <li>
               <?php
                  echo $this->Html->link('Sesiones', array('controller' => 'sesions', 'action' => 'index'));
               ?>
            </li>
            <li>
               <?php
                  echo $this->Html->link('Hilos', array('controller' => 'threads', 'action' => 'index'));
               ?>
            </li>
            <li>
               <?php
                  echo $this->Html->link('Salones', array('controller' => 'halls', 'action' => 'index'));
               ?>
            </li>
            <li class='last'>
               <span>
                  <?php echo $this->Html->link('Permisos', 
                     array('controller' => 'users', 'action' => 'editrol')) ?>
               </span>
            </li>
         </ul>
      </li>
      <li>
         <li>
            <?php
                  echo $this->Html->link('Propuestas', array('controller' => 'proposals', 'action' => 'index'));
               ?>
         </li>
      </li>
      <li class='last'>
         <span>
            <?php echo $this->Html->link('Salir ('.$username.')', array('controller' => 'users', 'action' => 'logout')) ?>
         </span>
      </li>
   </ul>
</div>