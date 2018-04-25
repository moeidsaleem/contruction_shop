<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EpisodesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EpisodesTable Test Case
 */
class EpisodesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EpisodesTable
     */
    public $Episodes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.episodes',
        'app.stories',
        'app.members',
        'app.comments',
        'app.stores'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Episodes') ? [] : ['className' => EpisodesTable::class];
        $this->Episodes = TableRegistry::get('Episodes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Episodes);

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
