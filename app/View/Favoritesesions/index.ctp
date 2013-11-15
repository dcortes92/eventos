<div class="inside">
<br>
<h2>Sesion Favoritos</h2>

<table class='TableResult'>
    <tr>
        <th>Sesion Favorito</th>
        <th colspan="1">Actions</th>
    </tr>

<!-- Here's where we loop through our $favoritesesions array, printing out post info -->

    <?php foreach ($favoritesesions as $favoritesesion): ?>
    <tr>
        <td>
            <?php echo $favoritesesion['Sesion']['name']; ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'Ya no me gusta',
                array('action' => 'delete', $favoritesesion['Favoritesesion']['id']),
                array('confirm' => 'Esta seguro?'));
            ?>
		</td>
    </tr>
    <?php endforeach; ?>

</table>