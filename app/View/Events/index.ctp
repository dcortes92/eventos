<!-- File: /app/View/Posts/index.ctp -->

<h1>Events</h1>
<p><?php echo $this->Html->link('Add Event', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Actions</th>
    </tr>

<!-- Here's where we loop through our $events array, printing out post info -->

    <?php foreach ($events as $event): ?>
    <tr>
        <td><?php echo $event['Event']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($event['Event']['title'], array('action' => 'view', $event['Event']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $event['Event']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $event['Event']['id'])); ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>