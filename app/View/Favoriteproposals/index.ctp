<div class="inside">
<br>
<h2>Propuesta Favoritos</h2>

<table class='TableResult'>
    <tr>
        <th>Propuesta Favorito</th>
        <th colspan="1">Actions</th>
    </tr>

<!-- Here's where we loop through our $favoriteproposals array, printing out post info -->

    <?php foreach ($favoriteproposals as $favoriteproposal): ?>
    <tr>
        <td>
            <?php echo $favoriteproposal['Proposal']['name']; ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'Ya no me gusta',
                array('action' => 'delete', $favoriteproposal['Favoriteproposal']['id']),
                array('confirm' => 'Esta seguro?'));
            ?>
		</td>
    </tr>
    <?php endforeach; ?>

</table>