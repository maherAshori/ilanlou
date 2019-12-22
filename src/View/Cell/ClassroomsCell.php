<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Classrooms cell
 * @property mixed Classrooms
 * @property mixed Points
 * @property mixed Teachers
 */
class ClassroomsCell extends Cell
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
        $this->loadModel("Classrooms");
        $this->loadModel("Teachers");
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $classrooms = $this->Classrooms->find("all", [
            'conditions' => ['home' => true],
            'contain' => ['Points', 'StudentClassroom']
        ]);

        $count = 0;

        foreach ($classrooms as $classroom){
            $count++;

            $teacher = $this->Teachers->find('all', [
                'conditions' => ['id' => $classroom->teacher_id]
            ])->first();

            $classroom->teacher = $teacher;
        }

        if ($count == 0) {
            $classrooms = null;
        }

        $this->set("classrooms", $classrooms);
    }
}
