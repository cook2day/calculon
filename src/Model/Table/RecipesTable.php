<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
* Recipes Model
*
* @method \App\Model\Entity\Recipe get($primaryKey, $options = [])
* @method \App\Model\Entity\Recipe newEntity($data = null, array $options = [])
* @method \App\Model\Entity\Recipe[] newEntities(array $data, array $options = [])
* @method \App\Model\Entity\Recipe|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
* @method \App\Model\Entity\Recipe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
* @method \App\Model\Entity\Recipe[] patchEntities($entities, array $data, array $options = [])
* @method \App\Model\Entity\Recipe findOrCreate($search, callable $callback = null)
*/
class RecipesTable extends Table
{

  /**
  * Initialize method
  *
  * @param array $config The configuration for the Table.
  * @return void
  */
  public function initialize(array $config)
  {
    parent::initialize($config);

    $this->table('recipes');
    $this->displayField('ID');
    $this->primaryKey('ID');

  }

  /**
  * Default validation rules.
  *
  * @param \Cake\Validation\Validator $validator Validator instance.
  * @return \Cake\Validation\Validator
  */
  public function validationDefault(Validator $validator)
  {
    $validator
    ->integer('ID')
    ->allowEmpty('ID', 'create');

    $validator
    ->requirePresence('NAME', 'create')
    ->notEmpty('NAME');

    $validator
    ->integer('NO_SERVINGS')
    ->requirePresence('NO_SERVINGS', 'create')
    ->notEmpty('NO_SERVINGS');

    $validator
    ->allowEmpty('INSTRUCTIONS');

    return $validator;
  }
}
