<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InsTable Test Case
 */
class InsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InsTable
     */
    public $Ins;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ins',
        'app.products',
        'app.suppliers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Ins') ? [] : ['className' => InsTable::class];
        $this->Ins = TableRegistry::get('Ins', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ins);

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
