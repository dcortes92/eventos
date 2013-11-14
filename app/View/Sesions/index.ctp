<!-- File: /app/View/Posts/index.ctp -->

<h1>Sesions</h1>
<p><?php echo $this->Html->link('Add Sesion', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>

<!-- Here's where we loop through our $sesions array, printing out post info -->

    <?php foreach ($sesions as $sesion): ?>
    <tr>
        <td><?php echo $sesion['Sesion']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($sesion['Sesion']['name'], array('action' => 'view', $sesion['Sesion']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $sesion['Sesion']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $sesion['Sesion']['id'])); ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>