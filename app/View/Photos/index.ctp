<!-- File: /app/View/Posts/index.ctp -->

<h1>Photos</h1>
<p><?php echo $this->Html->link('Add Photo', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Titulo</th>
        <th>Actions</th>
    </tr>

<!-- Here's where we loop through our $photos array, printing out post info -->

    <?php foreach ($photos as $photo): ?>
    <tr>
        <td><?php echo $photo['Photo']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($photo['Photo']['title'], array('action' => 'view', $photo['Photo']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $photo['Photo']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $photo['Photo']['id'])); ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>