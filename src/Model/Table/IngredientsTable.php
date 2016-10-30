<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ingredients Model
 *
 * @method \App\Model\Entity\Ingredient get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ingredient newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ingredient[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ingredient|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ingredient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ingredient[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ingredient findOrCreate($search, callable $callback = null)
 */
class IngredientsTable extends Table
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

        $this->table('ingredients');
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
            ->integer('COOK_UNIT')
            ->allowEmpty('COOK_UNIT');

        $validator
            ->integer('SHOP_UNIT')
            ->allowEmpty('SHOP_UNIT');

        $validator
            ->numeric('QC_UNIT')
            ->allowEmpty('QC_UNIT');

        $validator
            ->numeric('QS_UNIT')
            ->allowEmpty('QS_UNIT');

        return $validator;
    }
}
