<div class="inside">
<br>
<h2>Comentario Favoritos</h2>

<table class='TableResult'>
    <tr>
        <th>Comentario Favorito</th>
        <th colspan="1">Actions</th>
    </tr>

<!-- Here's where we loop through our $favoritecomments array, printing out post info -->

    <?php foreach ($favoritecomments as $favoritecomment): ?>
    <tr>
        <td>
            <?php echo $favoritecomment['Comment']['comment']; ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'Ya no me gusta',
                array('action' => 'delete', $favoritecomment['Favoritecomment']['id']),
                array('confirm' => 'Esta seguro?'));
            ?>
		</td>
    </tr>
    <?php endforeach; ?>

</table>