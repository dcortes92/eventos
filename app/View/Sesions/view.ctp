<div class="inside">
<br>
	<h2> Ver Sesion </h2>
	<h4> Nombre </h4>
	<p><?php echo h($sesion['Sesion']['name']); ?></p>
	<h4> Fecha </h4>
	<p><?php echo h($sesion['Sesion']['date']); ?></p>
	<h4> Descripcion </h4>
	<p><?php echo h($sesion['Sesion']['description']); ?></p>
	<h4> Hilo Asociado </h4>
	<p><?php echo h($sesion['Thread']['name']); ?></p>
	<h4> Salon</h4>
	<p><?php echo h($sesion['Hall']['name']); ?></p>
	<h4> Propuesta Asosiado</h4>
	<p><?php echo h($sesion['Proposal']['name']); ?></p>
	<h4> Evento Asosiado </h4>
	<p><?php echo h($event[0]['Event']['title']); ?></p>
</div>