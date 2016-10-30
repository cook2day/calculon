<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Recipe'), ['action' => 'edit', $recipe->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Recipe'), ['action' => 'delete', $recipe->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $recipe->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Recipes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recipe'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="recipes view large-9 medium-8 columns content">
    <h3><?= h($recipe->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('NAME') ?></th>
            <td><?= h($recipe->NAME) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($recipe->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NO SERVINGS') ?></th>
            <td><?= $this->Number->format($recipe->NO_SERVINGS) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('INSTRUCTIONS') ?></h4>
        <?= $this->Text->autoParagraph(h($recipe->INSTRUCTIONS)); ?>
    </div>
</div>
