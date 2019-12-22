<?php
namespace App\View\Cell;

use App\Model\Entity\Event;
use Cake\View\Cell;

/**
 * Events cell
 * @property Event Events
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
        $eventsCount = $this->Events->find("all", [
            'conditions' => ['home' => true]
        ])->count();

        if($eventsCount == 0){
            $Events = null;
        }

        $events = $this->Events->find("all", [
            'conditions' => ['home' => true]
        ]);

        $this->set("events", $events);
    }
}
