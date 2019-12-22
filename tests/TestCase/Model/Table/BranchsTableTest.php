<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BranchesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BranchsTable Test Case
 */
class BranchsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BranchesTable
     */
    public $Branchs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Branchs',
        'app.Terms'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Branchs') ? [] : ['className' => BranchesTable::class];
        $this->Branchs = TableRegistry::getTableLocator()->get('Branchs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Branchs);

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
