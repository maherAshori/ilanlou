<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Languages cell
 */
class LanguagesCell extends Cell
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
        $this->loadModel("Languages");
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $languages = $this->Languages->find("all");
        $this->set("languages", $languages);
    }
}
