<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubProductOutsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubProductOutsTable Test Case
 */
class SubProductOutsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SubProductOutsTable
     */
    public $SubProductOuts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sub_product_outs',
        'app.products',
        'app.outs',
        'app.clients'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SubProductOuts') ? [] : ['className' => SubProductOutsTable::class];
        $this->SubProductOuts = TableRegistry::get('SubProductOuts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SubProductOuts);

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
