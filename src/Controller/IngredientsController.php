<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
* Ingredients Controller
*
* @property \App\Model\Table\IngredientsTable $Ingredients
*/
class IngredientsController extends AppController
{

  /**
  * Index method
  *
  * @return \Cake\Network\Response|null
  */
  public function index()
  {
    $ingredients = $this->paginate($this->Ingredients);

    $this->set(compact('ingredients'));
    $this->set('_serialize', ['ingredients']);
  }

  /**
  * View method
  *
  * @param string|null $id Ingredient id.
  * @return \Cake\Network\Response|null
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function view($id = null)
  {
    $ingredient = $this->Ingredients->get($id, [
      'contain' => []
    ]);

    $cook_unit = TableRegistry::get('Units')->find()->where(['id' => $ingredient->COOK_UNIT])->first()['NAME'];
    $shop_unit = TableRegistry::get('Units')->find()->where(['id' => $ingredient->SHOP_UNIT])->first()['NAME'];
    $this->set('ingredient', $ingredient);
    $this->set('cook_unit', $cook_unit);
    $this->set('shop_unit', $shop_unit);
    $this->set('_serialize', ['ingredient']);
  }

  /**
  * Add method
  *
  * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
  */
  public function add()
  {
    $dbUnits = TableRegistry::get('Units')->find();
    $units = [];
    foreach ($dbUnits as $unit){
        $units[$unit->ID] = $unit->NAME;
    }

    $ingredient = $this->Ingredients->newEntity();
    if ($this->request->is('post')) {
      $ingredient = $this->Ingredients->patchEntity($ingredient, $this->request->data);
      if ($this->Ingredients->save($ingredient)) {
        $this->Flash->success(__('The ingredient has been saved.'));

        return $this->redirect(['action' => 'index']);
      } else {
        $this->Flash->error(__('The ingredient could not be saved. Please, try again.'));
      }
    }

    $this->set('units', $units);
    $this->set(compact('ingredient'));
    $this->set('_serialize', ['ingredient']);
  }

  /**
  * Edit method
  *
  * @param string|null $id Ingredient id.
  * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
  * @throws \Cake\Network\Exception\NotFoundException When record not found.
  */
  public function edit($id = null)
  {
    $dbUnits = TableRegistry::get('Units')->find();
    $units = [];
    foreach ($dbUnits as $unit){
        $units[$unit->ID] = $unit->NAME;
    }

    $ingredient = $this->Ingredients->get($id, [
      'contain' => []
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
      $ingredient = $this->Ingredients->patchEntity($ingredient, $this->request->data);
      if ($this->Ingredients->save($ingredient)) {
        $this->Flash->success(__('The ingredient has been saved.'));

        return $this->redirect(['action' => 'index']);
      } else {
        $this->Flash->error(__('The ingredient could not be saved. Please, try again.'));
      }
    }

    $this->set('units', $units);
    $this->set(compact('ingredient'));
    $this->set('_serialize', ['ingredient']);
  }

  /**
  * Delete method
  *
  * @param string|null $id Ingredient id.
  * @return \Cake\Network\Response|null Redirects to index.
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function delete($id = null)
  {
    $this->request->allowMethod(['post', 'delete']);
    $ingredient = $this->Ingredients->get($id);
    if ($this->Ingredients->delete($ingredient)) {
      $this->Flash->success(__('The ingredient has been deleted.'));
    } else {
      $this->Flash->error(__('The ingredient could not be deleted. Please, try again.'));
    }

    return $this->redirect(['action' => 'index']);
  }
}
