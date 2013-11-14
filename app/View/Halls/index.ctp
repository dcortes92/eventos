<!-- File: /app/View/Posts/index.ctp -->

<h1>Halls</h1>
<p><?php echo $this->Html->link('Add Hall', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>

<!-- Here's where we loop through our $halls array, printing out post info -->

    <?php foreach ($halls as $hall): ?>
    <tr>
        <td><?php echo $hall['Hall']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($hall['Hall']['name'], array('action' => 'view', $hall['Hall']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $hall['Hall']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $hall['Hall']['id'])); ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>