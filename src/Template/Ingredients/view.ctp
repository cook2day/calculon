<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ingredient'), ['action' => 'edit', $ingredient->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ingredient'), ['action' => 'delete', $ingredient->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $ingredient->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Ingredients'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ingredient'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ingredients view large-9 medium-8 columns content">
    <h3><?= h($ingredient->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('NAME') ?></th>
            <td><?= h($ingredient->NAME) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($ingredient->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('COOK UNIT') ?></th>
            <td><?= h($cook_unit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SHOP UNIT') ?></th>
            <td><?= h($shop_unit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Conversion') ?></th>
            <td><?= $this->Number->format($ingredient->QC_UNIT) ?> <?= h($cook_unit) ?> equals  <?= h($this->Number->format($ingredient->QS_UNIT))  ?> <?= h($shop_unit) ?></td>
        </tr>
    </table>
</div>
