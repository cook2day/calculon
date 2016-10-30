<script src='https://code.jquery.com/jquery-3.1.1.min.js'></script>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <ul class="side-nav">
    <li class="heading"><?= __('Actions') ?></li>
    <li><?= $this->Html->link(__('List Ingredients'), ['action' => 'index']) ?></li>
  </ul>
</nav>
<div class="ingredients form large-9 medium-8 columns content">
  <?= $this->Form->create($ingredient) ?>
  <fieldset>
    <legend><?= __('Add Ingredient') ?></legend>
    <?php
    echo $this->Html->script('ingredient.js');
    echo $this->Form->input('NAME');
    echo $this->Form->input('COOK_UNIT', array(
      'options' => $units ,
      'empty' => 'Choose one',
      'label' => array(
        'class' => 'form_heading',
        'text' => 'Cooking units'
      )
    ));
    echo $this->Form->input('SHOP_UNIT', array(
      'options' => $units ,
      'empty' => 'Choose one',
      'label' => array(
        'class' => 'form_heading',
        'text' => 'Shopping units'
      )
    ));
    echo $this->Form->input('QC_UNIT',['label' => array(
      'class' => 'form_heading',
      'text' => ''
    )]);

    echo '<span id=\'c_unit\'>cooking units</span> equals';
    echo $this->Form->input('QS_UNIT',['label' => array(
      'class' => 'form_heading',
      'text' => ''
    )]);
    echo '<span id=\'s_unit\'>shopping units</span><BR>';
    ?>
  </fieldset>
  <?= $this->Form->button(__('Submit')) ?>
  <?= $this->Form->end() ?>
</div>
