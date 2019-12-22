<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Register cell
 */
class RegisterCell extends Cell
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
        $this->loadModel('Students');
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $student = $this->Students->newEntity();
        $alertStyle = null;
        $message = null;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $student = $this->Students->find('all', [
                'conditions' => [
                    'nationalCode' => $this->request->getData('nationalCode')
                ]
            ])->first();

            if(empty($student)){
                $alertStyle = "alert alert-danger";
                $message = "National code is invalid!";
            } elseif(!empty($student) && empty($student->mobile)) {
                $student = $this->Students->patchEntity($student, $this->request->getData());
                if ($this->Students->save($student)) {
                    $alertStyle = "alert alert-success";
                    $message = "You complete registration";
                }
            }else{
                $alertStyle = "alert alert-info";
                $message = "Your mobile number exist!";
            }
        }

        $this->set(compact('student', 'message', 'alertStyle'));
    }
}
