<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Recipes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="recipes form large-9 medium-8 columns content">
    <?= $this->Form->create($recipe_ingredients) ?>
    <fieldset>
        <legend><?= __('Build Recipe - ' .$rec_name) ?></legend>

        <?php
        echo $this->Form->input('ingredients_id', array(
          'options' => $ingredients ,
          'empty' => 'Choose one',
          'label' => array(
            'class' => 'form_heading',
            'text' => 'Ingredients'
          ),
          'required' => TRUE
        ));
        echo $this->Form->hidden('recipes_id', [
            'value' => $recipes_id,
        ]);
        echo $this->Form->input('quantity', array(
          'type' => 'number',
          'required' => TRUE
        ));
        echo $this->Form->button(__('Add More'), ['name' => 'more', 'type' => 'submit']);
        ?>
    </fieldset>
    <table>
    <TR><TH>List</TH><TH>Actions</TH></TR>
    <?php
      foreach ($added as $ing_id => $ing) {
        echo "<TR><TD>".$ing."</TD>";
        echo "<TD>" . $this->Html->link(__('Delete'), ['action' => 'delete_ing', $ing_id]) . "</TD></TR>";
      }
    ?>
  </table>
  <?= $this->Html->link(__('Continue'), ['action' => 'finish', $recipes_id]) ?>
</div>
