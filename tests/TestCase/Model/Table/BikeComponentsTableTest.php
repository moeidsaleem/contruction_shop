<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BikeComponentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BikeComponentsTable Test Case
 */
class BikeComponentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BikeComponentsTable
     */
    public $BikeComponents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bike_components',
        'app.products',
        'app.bikes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BikeComponents') ? [] : ['className' => BikeComponentsTable::class];
        $this->BikeComponents = TableRegistry::get('BikeComponents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BikeComponents);

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
