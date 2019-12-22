<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StudentClassroomTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StudentClassroomTable Test Case
 */
class StudentClassroomTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StudentClassroomTable
     */
    public $StudentClassroom;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.StudentClassroom',
        'app.Students',
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
        $config = TableRegistry::getTableLocator()->exists('StudentClassroom') ? [] : ['className' => StudentClassroomTable::class];
        $this->StudentClassroom = TableRegistry::getTableLocator()->get('StudentClassroom', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StudentClassroom);

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
