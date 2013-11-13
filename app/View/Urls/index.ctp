<h2>All the urls</h2>


<table>
	<tr>
		<th>Url</th>
	</tr>

	<?php foreach ($urls as $url): ?>

	<tr>
		<td><?php echo $url['Url']['url']; ?></td>
	</tr>

	<?php endforeach ?>
	
</table>
