<?php 
   echo "<ul class='list'>";
   $cont = 0;
   foreach ($eventos_activos as $evento):
      if($cont > 5){
         break;
      }
      else{
         echo "<li><h4>".$evento['Event']['title']."</h4>".$evento['Event']['description']."</li>";
         $cont++;
      }
   endforeach;
   echo "</ul>";
?>