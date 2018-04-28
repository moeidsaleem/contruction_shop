<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OutsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OutsTable Test Case
 */
class OutsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OutsTable
     */
    public $Outs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.outs',
        'app.clients',
        'app.sub_product_outs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Outs') ? [] : ['className' => OutsTable::class];
        $this->Outs = TableRegistry::get('Outs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Outs);

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
