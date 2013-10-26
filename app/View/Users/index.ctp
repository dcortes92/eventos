<h2>All the users</h2>


<table>
	<tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email</th>
	</tr>

	<?php foreach ($users as $user): ?>

	<tr>
		<td><?php echo $user['User']['firstname']; ?></td>
		<td><?php echo $user['User']['lastname']; ?></td>
		<td><?php echo $user['User']['email']; ?></td>
	</tr>

	<?php endforeach ?>
</table>
