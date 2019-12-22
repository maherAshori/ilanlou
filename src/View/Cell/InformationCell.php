<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Information cell
 */
class InformationCell extends Cell
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
        $this->loadModel('Information');
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display($key, $output)
    {
        $information = $this->Information->find('all', [
            'conditions' => [
                'key' => $key
            ]
        ])->first();

        $this->set('information', $information->$output);
    }
}
