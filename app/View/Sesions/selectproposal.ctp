<!-- File: /app/View/Posts/index.ctp -->

<h1>Propuestas</h1>
	<table>
	
	
    <?php foreach ($proposals as $proposal): ?>
		
        <?php echo "<tr> <td>  ".$this->Html->link($proposal['Proposal']['name'], array('action' => 'add', $proposal['Proposal']['id'])). "</td> </tr>" ?>
		
    <?php endforeach; ?>

</table>