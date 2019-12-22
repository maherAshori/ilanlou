<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Teachers Controller
 *
 * @property \App\Model\Table\TeachersTable $Teachers
 *
 * @method \App\Model\Entity\Teacher[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TeachersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $style = "pages";

        $teachers = $this->paginate($this->Teachers);

        $this->set(compact('teachers', 'style'));
    }

    /**
     * View method
     *
     * @param null $slug
     * @return void
     */
    public function view($slug = null)
    {
        $style = "pages";

        $teacher = $this->Teachers->find('all', [
            'conditions' => ['slug' => $slug],
            'contain' => []
        ])->first();

        $this->set(compact('teacher', 'style'));
    }
}
