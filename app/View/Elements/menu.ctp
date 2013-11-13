<ul>
   <li class = 'current'><?php echo $this->Html->link('Inicio', array('controller' => 'home', 'action' => 'index'), array('class' => 'm1')) ?></li>
   <li><?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login'), array('class' => 'm2')) ?></li>
   <li><?php echo $this->Html->link('Register', array('controller' => 'users', 'action' => 'register'), array('class' => 'm3'))?></li>
   <li><a href="#" class="m4">Mapa del Sitio</a></li>
   <li class="last"><a href="#" class="m5">Contacto</a></li>
</ul>