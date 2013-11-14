<!-- File: /app/View/Posts/index.ctp -->

<h1>Threads</h1>
<p><?php echo $this->Html->link('Add Thread', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>

<!-- Here's where we loop through our $threads array, printing out post info -->

    <?php foreach ($threads as $thread): ?>
    <tr>
        <td><?php echo $thread['Thread']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($thread['Thread']['name'], array('action' => 'view', $thread['Thread']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $thread['Thread']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $thread['Thread']['id'])); ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>