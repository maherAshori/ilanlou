<?php
namespace App\View\Cell;

use App\Model\Entity\Teacher;
use Cake\View\Cell;

/**
 * Teachers cell
 * @property Teacher Teachers
 */
class TeachersCell extends Cell
{
    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize()
    {
        $this->loadModel('Teachers');
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $teacherCount = $this->Teachers->find('all', [
            'conditions' => ['home' => true]
        ])->count();

        if($teacherCount == 0){
            $teachers = null;
        }

        $teachers = $this->Teachers->find('all', [
            'conditions' => ['home' => true]
        ]);

        $this->set('teachers', $teachers);
    }
}
