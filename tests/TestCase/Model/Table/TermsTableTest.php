<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TermsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TermsTable Test Case
 */
class TermsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TermsTable
     */
    public $Terms;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Terms',
        'app.Branches',
        'app.Classrooms'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Terms') ? [] : ['className' => TermsTable::class];
        $this->Terms = TableRegistry::getTableLocator()->get('Terms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Terms);

        parent::tearDown();
    }

    /**
     * Test findBySlug method
     *
     * @return void
     */
    public function testFindBySlug()
    {
        $this->markTestIncomplete('Not implemented yet.');
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

    /**
     * Test beforeSave method
     *
     * @return void
     */
    public function testBeforeSave()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
