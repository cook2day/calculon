<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecipesIngredientsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecipesIngredientsTable Test Case
 */
class RecipesIngredientsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RecipesIngredientsTable
     */
    public $RecipesIngredients;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.recipes_ingredients',
        'app.recipes',
        'app.ingredients'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RecipesIngredients') ? [] : ['className' => 'App\Model\Table\RecipesIngredientsTable'];
        $this->RecipesIngredients = TableRegistry::get('RecipesIngredients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RecipesIngredients);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
