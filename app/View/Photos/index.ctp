<h2>All the photoss</h2>


<table>
	<tr>
		<th>Photos</th>
	</tr>

	<?php foreach ($photos as $photo): ?>

	<tr>
		<td><?php echo $photo['Photo']['photo']; ?></td>
	</tr>

	<?php endforeach ?>
	
	<?php print_r($this -> Session -> read("User")['User']['id']); ?>
</table>
