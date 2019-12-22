<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Events cell
 */
class EventsCell extends Cell
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
        $this->loadModel("Events");
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $events = $this->Events->find("all", [
            'conditions' => ['dashboard' => true]
        ]);

        $count = 0;

        foreach ($events as $item){
            $count++;
        }

        $Events = $events;

        if($count == 0){
            $Events = null;
        }

        $this->set("events", $Events);
    }
}
