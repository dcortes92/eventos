<!-- File: /app/View/Posts/index.ctp -->

<h1>Urls</h1>
<p><?php echo $this->Html->link('Add Url', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Titulo</th>
        <th>Actions</th>
    </tr>

<!-- Here's where we loop through our $urls array, printing out post info -->

    <?php foreach ($urls as $url): ?>
    <tr>
        <td><?php echo $url['Url']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($url['Url']['title'], array('action' => 'view', $url['Url']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $url['Url']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $url['Url']['id'])); ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>