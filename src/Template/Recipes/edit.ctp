<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $recipe->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $recipe->ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Recipes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="recipes form large-9 medium-8 columns content">
    <?= $this->Form->create($recipe) ?>
    <fieldset>
        <legend><?= __('Edit Recipe') ?></legend>
        <?php
            echo $this->Form->input('NAME');
            echo $this->Form->input('NO_SERVINGS', ['label' => array(
              'class' => 'form_heading',
              'text' => 'Number of servings'
            )]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Continue')) ?>
    <?= $this->Form->end() ?>
</div>
