<ul class="categories">
    <li class = 'current'><span><?php echo $this->Html->link('Inicio', array('controller' => 'home', 'action' => 'index'), array('class' => 'm1')) ?></span></li>
   	<li><span><?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login'), array('class' => 'm2')) ?></span></li>
	<li><span><?php echo $this->Html->link('Register', array('controller' => 'users', 'action' => 'register'), array('class' => 'm3'))?></span></li>
	<li><span><a href="#">Mapa del Sitio</a></span></li>
	<li class="last"><span><a href="#">Contacto</a></span></li>       
</ul>