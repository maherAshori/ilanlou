<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Teachers cell
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
        $tutors = $this->Teachers->find('all', [
            'conditions' => ['preview' => true]
        ]);

        $count = 0;

        foreach ($tutors as $item){
            $count++;
        }

        $teachers = $tutors;

        if($count == 0){
            $teachers = null;
        }

        $this->set('teachers', $teachers);
    }
}
