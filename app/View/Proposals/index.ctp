<!-- File: /app/View/Posts/index.ctp -->

<h1>Proposals</h1>
<p><?php echo $this->Html->link('Add Proposal', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>

<!-- Here's where we loop through our $proposals array, printing out post info -->

    <?php foreach ($proposals as $proposal): ?>
    <tr>
        <td><?php echo $proposal['Proposal']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($proposal['Proposal']['name'], array('action' => 'view', $proposal['Proposal']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $proposal['Proposal']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $proposal['Proposal']['id'])); ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>