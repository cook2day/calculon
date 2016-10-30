<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ingredient'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ingredients index large-9 medium-8 columns content">
    <h3><?= __('Ingredients') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('NAME') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ingredients as $ingredient): ?>
            <tr>
                <td><?= $this->Number->format($ingredient->ID) ?></td>
                <td><?= h($ingredient->NAME) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ingredient->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ingredient->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ingredient->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $ingredient->ID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
