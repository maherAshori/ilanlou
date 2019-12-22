<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StudentsFixture
 */
class StudentsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'firstName' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8_persian_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'lastName' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8_persian_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'nationalCode' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => null, 'collate' => 'utf8_persian_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'image' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_persian_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'mobile' => ['type' => 'string', 'length' => 11, 'null' => true, 'default' => null, 'collate' => 'utf8_persian_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'code' => ['type' => 'integer', 'length' => 6, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'token' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_persian_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'students_nationalCode_uindex' => ['type' => 'unique', 'columns' => ['nationalCode'], 'length' => []],
            'students_mobile_uindex' => ['type' => 'unique', 'columns' => ['mobile'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_persian_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'firstName' => 'Lorem ipsum dolor sit amet',
                'lastName' => 'Lorem ipsum dolor sit amet',
                'nationalCode' => 'Lorem ip',
                'image' => 'Lorem ipsum dolor sit amet',
                'mobile' => 'Lorem ips',
                'code' => 1,
                'token' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
