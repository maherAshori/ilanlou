<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TeachersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TeachersTable Test Case
 */
class TeachersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TeachersTable
     */
    public $Teachers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Teachers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Teachers') ? [] : ['className' => TeachersTable::class];
        $this->Teachers = TableRegistry::getTableLocator()->get('Teachers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Teachers);

        parent::tearDown();
    }

    /**
     * Test findByMobile method
     *
     * @return void
     */
    public function testFindByMobile()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test findByCode method
     *
     * @return void
     */
    public function testFindByCode()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test findByToken method
     *
     * @return void
     */
    public function testFindByToken()
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
     * Test beforeSave method
     *
     * @return void
     */
    public function testBeforeSave()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
