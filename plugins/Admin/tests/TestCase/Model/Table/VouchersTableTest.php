<?php
namespace Admin\Test\TestCase\Model\Table;

use Admin\Model\Table\VouchersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Admin\Model\Table\VouchersTable Test Case
 */
class VouchersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Admin\Model\Table\VouchersTable
     */
    public $Vouchers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.admin.vouchers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Vouchers') ? [] : ['className' => VouchersTable::class];
        $this->Vouchers = TableRegistry::get('Vouchers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Vouchers);

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
