<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
* Recipes Controller
*
* @property \App\Model\Table\RecipesTable $Recipes
*/
class RecipesController extends AppController
{

  /**
  * Index method
  *
  * @return \Cake\Network\Response|null
  */
  public function index()
  {
    $recipes = $this->paginate($this->Recipes);

    $this->set(compact('recipes'));
    $this->set('_serialize', ['recipes']);
  }

  /**
  * View method
  *
  * @param string|null $id Recipe id.
  * @return \Cake\Network\Response|null
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function view($id = null)
  {
    $recipe = $this->Recipes->get($id, [
      'contain' => ['Ingredients']
    ]);

    $this->set('recipe', $recipe);
    $this->set('_serialize', ['recipe']);
  }

  /**
  * Add method
  *
  * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
  */
  public function add()
  {
    $recipe = $this->Recipes->newEntity();
    if ($this->request->is('post')) {
      $recipe = $this->Recipes->patchEntity($recipe, $this->request->data);
      if ($this->Recipes->save($recipe)) {
        $this->Flash->success(__('The recipe has been saved.'));

        return $this->redirect(['action' => 'build', $recipe['ID'] ]);
      } else {
        $this->Flash->error(__('The recipe could not be saved. Please, try again.'));
      }
    }
    
    $this->set(compact('recipe', 'ingredients'));
    $this->set('_serialize', ['recipe']);
  }

  protected function getRecipeIngredients($id = NULL)
  {

    if(!$id) {
      return [];
    }

    $dbUnits = TableRegistry::get('Units')->find();
    $units = [];
    foreach ($dbUnits as $unit){
        $units[$unit->ID] = $unit->NAME;
    }

    $ingredientsDB = TableRegistry::get('RecipesIngredients')->find()->where(['recipes_id' => $id])->all();
    //debug($ingredientsDB);
    $ingredients = [];

    foreach ($ingredientsDB as $ingredientDB) {
      $ing_id = $ingredientDB->ingredients_id;
      $ing_info = TableRegistry::get('Ingredients')->find()->where(['ID' => $ing_id])->first();
      //debug($ing_info);
      $name = $ing_info->NAME;
      $unit_id = $ing_info->COOK_UNIT;
      $ingredients[$ingredientDB->ID] = $ingredientDB->quantity . " " . $units[$unit_id] . " " . $name;
    }

    return $ingredients;

  }

  /**
  * Build Method
  */
  public function build($id = NULL)
  {
    if (!$id) {
        return $this->redirect(
            ['controller' => 'Recipes', 'action' => 'index']
        );
    }

    $recipes_ingredients_table = TableRegistry::get('RecipesIngredients');

    $recipe_ingredients = $recipes_ingredients_table->newEntity();

    if ($this->request->is('post')){

      if (isset($this->request->data['more'])) {
        $recipe_ingredients = $recipes_ingredients_table->patchEntity($recipe_ingredients, $this->request->data);

        if ($recipes_ingredients_table->save($recipe_ingredients)) {
          //$this->Flash->success(__('The ingredient has been added.'));
        } else {
          $this->Flash->error(__('The recipe could not be saved. Please, try again.'));
        }
      }
    }

    $dbUnits = TableRegistry::get('Units')->find();
    $units = [];
    foreach ($dbUnits as $unit){
        $units[$unit->ID] = $unit->NAME;
    }

    $dbIngredients = TableRegistry::get('Ingredients')->find();
    $ingredients = [];
    foreach ($dbIngredients as $ingredient) {
      $ingredients[$ingredient->ID] = $ingredient->NAME . " (in " .$units[$ingredient->COOK_UNIT] . ")";
    }

    $added_ing = $this->getRecipeIngredients($id);

    $rec_name = $this->Recipes->get($id)->NAME;

    $this->set(compact('units', 'ingredients', 'recipe_ingredients', 'rec_name'));
    $this->set('added' , $added_ing);
    $this->set('recipes_id', $id);
  }

  public function finish($id = NULL)
  {
    if (!$id) {
        return $this->redirect(
            ['controller' => 'Recipes', 'action' => 'index']
        );
    }
    $recipe = $this->Recipes->get($id);
    if ($this->request->is(['patch', 'post', 'put'])) {
      $recipe = $this->Recipes->patchEntity($recipe, $this->request->data);
      if ($this->Recipes->save($recipe)) {
        $this->Flash->success(__('The recipe has been saved.'));

        return $this->redirect(['action' => 'index']);
      } else {
        $this->Flash->error(__('The recipe could not be saved. Please, try again.'));
      }
    }
    $this->set(compact('recipe'));
  }

  /**
  * Edit method
  *
  * @param string|null $id Recipe id.
  * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
  * @throws \Cake\Network\Exception\NotFoundException When record not found.
  */
  public function edit($id = null)
  {

    if (!$id) {
        return $this->redirect(
            ['controller' => 'Recipes', 'action' => 'add']
        );
    }

    $recipe = $this->Recipes->get($id);
    if ($this->request->is(['patch', 'post', 'put'])) {
      $recipe = $this->Recipes->patchEntity($recipe, $this->request->data);
      if ($this->Recipes->save($recipe)) {
        $this->Flash->success(__('The recipe has been saved.'));

        return $this->redirect(['action' => 'build' , $id]);
      } else {
        $this->Flash->error(__('The recipe could not be saved. Please, try again.'));
      }
    }

    $this->set(compact('recipe', 'ingredients'));
    $this->set('_serialize', ['recipe']);
  }

  public function deleteIng($id = NULL)
  {
    $this->request->allowMethod(['get', 'delete']);
    $row = TableRegistry::get('RecipesIngredients')->find()->where(['ID' => $id])->first();
    $rec_id = $row->recipes_id;
    if (TableRegistry::get('RecipesIngredients')->delete($row)) {
      //$this->Flash->success(__('The recipe has been deleted.'));
    } else {
      $this->Flash->error(__('The recipe could not be deleted. Please, try again.'));
    }

    return $this->redirect(['action' => 'build' , $rec_id]);

  }

  /**
  * Delete method
  *
  * @param string|null $id Recipe id.
  * @return \Cake\Network\Response|null Redirects to index.
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function delete($id = null)
  {
    $this->request->allowMethod(['post', 'delete']);
    $recipe = $this->Recipes->get($id);
    if ($this->Recipes->delete($recipe)) {
      $this->Flash->success(__('The recipe has been deleted.'));
    } else {
      $this->Flash->error(__('The recipe could not be deleted. Please, try again.'));
    }

    return $this->redirect(['action' => 'index']);
  }
}
