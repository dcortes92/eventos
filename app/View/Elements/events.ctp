<?php 
   echo "<ul class='news'>";
   $cont = 0;
   foreach ($eventos_activos as $evento):
      if($cont > 3){ //carga los primeros tres
         break;
      }
      else{
         echo "<li><h4>".$this->Html->link($evento['Event']['title'], array('controller' =>'events', 'action' => 'view', $evento['Event']['id']))."</h4></li>";
         $cont++;
      }
   endforeach;
   echo "</ul>";
?>