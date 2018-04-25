<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BikesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BikesTable Test Case
 */
class BikesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BikesTable
     */
    public $Bikes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('Bikes') ? [] : ['className' => BikesTable::class];
        $this->Bikes = TableRegistry::get('Bikes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bikes);

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
}
