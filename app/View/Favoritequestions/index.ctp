<div class="inside">
<br>
<h2>Pregunta Favoritos</h2>

<table class='TableResult'>
    <tr>
        <th>Pregunta Favorito</th>
        <th colspan="1">Actions</th>
    </tr>

<!-- Here's where we loop through our $favoritequestions array, printing out post info -->

    <?php foreach ($favoritequestions as $favoritequestion): ?>
    <tr>
        <td>
            <?php echo $favoritequestion['Question']['question']; ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'Ya no me gusta',
                array('action' => 'delete', $favoritequestion['Favoritequestion']['id']),
                array('confirm' => 'Esta seguro?'));
            ?>
		</td>
    </tr>
    <?php endforeach; ?>

</table>