<div class="inside">
<br>
<h2>Recurso Favoritos</h2>

<table class='TableResult'>
    <tr>
        <th>Recurso Favorito</th>
        <th colspan="1">Actions</th>
    </tr>

<!-- Here's where we loop through our $favoriteresources array, printing out post info -->

    <?php foreach ($favoriteresources as $favoriteresource): ?>
    <tr>
        <td>
            <?php echo $favoriteresource['Resource']['link']; ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'Ya no me gusta',
                array('action' => 'delete', $favoriteresource['Favoriteresource']['id']),
                array('confirm' => 'Esta seguro?'));
            ?>
		</td>
    </tr>
    <?php endforeach; ?>

</table>