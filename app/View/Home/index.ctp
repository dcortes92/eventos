
<h2>Eventos <span>Activos</span></h2>
<?php 
   echo "<ul class='list'>";
   foreach ($eventos_activos as $evento):
     echo "<li><h4>".$this->Html->link($evento['Event']['title'], array('controller' =>'events', 'action' => 'view', $evento['Event']['id']))."</h4>".$evento['Event']['description']."</li>";
   endforeach;
   echo "</ul>";
?>