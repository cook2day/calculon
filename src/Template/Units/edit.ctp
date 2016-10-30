<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $unit->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $unit->ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Units'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="units form large-9 medium-8 columns content">
    <?= $this->Form->create($unit) ?>
    <fieldset>
        <legend><?= __('Edit Unit') ?></legend>
        <?php
            echo $this->Form->input('NAME');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
