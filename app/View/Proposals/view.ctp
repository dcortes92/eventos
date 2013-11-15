<div class="inside">
<br>
	<h2> Ver Propuesta </h2>
	<h4> Titulo </h4>
	<p><?php echo h($proposal['Proposal']['name']); ?></p>
	<h4> Descripcion </h4>
	<p><?php echo h($proposal['Proposal']['description']); ?></p>
	<h4> Evento Asociado</h4>
	<p><?php echo h($proposal['Event']['title']) ?></p>
	
	<br>
	<h4> Comentarios </h4>
	
	<?php 
		$i= 0;
		while($i<$largo):
			echo "<p><b>Por ".$usernames[$i]."</b></p> "; 
			echo "<p>".$comments[$i]."</p>"; 
			echo $this->Html->link('Me gusta', array('action' => 'add','controller'=>'favoritecomments', $comments_id[$i], $proposal_id));
			$i++;
			echo "<hr>";
		endwhile;
	?>
	<br>
	<?php echo "<div id='button'> <span>" .$this->Html->link('Comentar', array('action' => 'add','controller'=>'comments', $proposal_id)). "</span></div>"; ?>
	<br>
	<h4> Preguntas </h4>
	
	<?php 
		$i= 0;
		while($i<$largoQuestions):
			echo "<p><b>Por ".$usernames_questions[$i]."</b></p> "; 
			echo "<p>".$questions[$i]."</p>";
			echo "<p>".$answers[$i]."</p>";	
			echo $this->Html->link('Responder', array('action' => 'answer','controller'=>'questions', $questions_id[$i], $proposal_id));			
			echo $this->Html->link('Me gusta', array('action' => 'add','controller'=>'favoritequestions', $questions_id[$i], $proposal_id));
			$i++;
			echo "<hr>";
		endwhile;
	?>
	<br>
	<?php echo "<div id='button'> <span>" .$this->Html->link('Preguntar', array('action' => 'add','controller'=>'questions', $proposal_id)). "</span></div>"; ?>
	<br>
	<h4> Recursos </h4>
	
	<?php 
		$i= 0;
		while($i<$largoResources):
			echo "<p><b>Por ".$usernames_resources[$i]."</b></p> "; 
			echo "<p>".$resources[$i]."</p>";		
			echo $this->Html->link('Me gusta', array('action' => 'add','controller'=>'favoriteresources', $resources_id[$i], $proposal_id));
			$i++;
			echo "<hr>";
		endwhile;
	?>
	<br>
	<?php echo "<div id='button'> <span>" .$this->Html->link('Subir', array('action' => 'add','controller'=>'resources', $proposal_id)). "</span></div>"; ?>
	<br>
	
</div>