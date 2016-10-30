<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ingredient->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ingredient->ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ingredients'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ingredients form large-9 medium-8 columns content">
    <?= $this->Form->create($ingredient) ?>
    <fieldset>
        <legend><?= __('Edit Ingredient') ?></legend>
        <?php
            echo $this->Form->input('NAME');
            echo $this->Form->input('COOK_UNIT');
            echo $this->Form->input('SHOP_UNIT');
            echo $this->Form->input('QC_UNIT');
            echo $this->Form->input('QS_UNIT');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
