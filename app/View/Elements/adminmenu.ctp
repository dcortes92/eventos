<div id="cssmenu">
   <ul>
      <li><a href='#'><span>Eventos</span></a></li>
      <li><a href='#'><span>Propuestas</span></a></li>
      <li><a href='#'><span>Sesiones</span></a></li>
      <li><a href='#'><span>Hilos</span></a></li>
      <li class='has-sub'><a href='#'><span>Otros</span></a>
         <ul>
            <li><a href='#'><span>Salones</span></a></li>
            <li><a href='#'><span>Permisos</span></a></li>
            <li class='last'><span><?php echo $this->Html->link('Logout ('.$username.')', array('controller' => 'users', 'action' => 'logout')) ?></span></li>
         </ul>
      </li>
   </ul>
</div>