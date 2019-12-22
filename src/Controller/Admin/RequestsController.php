<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Requests Controller
 *
 * @property \App\Model\Table\RequestsTable $Requests
 *
 * @method \App\Model\Entity\Request[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RequestsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Students', 'Classrooms']
        ];
        $requests = $this->paginate($this->Requests);

        $this->set(compact('requests'));
    }

    /**
     * View method
     *
     * @param string|null $id Request id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $request = $this->Requests->get($id, [
            'contain' => ['Students', 'Classrooms']
        ]);

        $this->set('request', $request);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $request = $this->Requests->newEntity();
        if ($this->request->is('post')) {
            $request = $this->Requests->patchEntity($request, $this->request->getData());
            if ($this->Requests->save($request)) {
                $this->Flash->success(__('The request has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The request could not be saved. Please, try again.'));
        }
        $students = $this->Requests->Students->find('list', ['limit' => 200]);
        $classrooms = $this->Requests->Classrooms->find('list', ['limit' => 200]);
        $this->set(compact('request', 'students', 'classrooms'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Request id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $request = $this->Requests->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $request = $this->Requests->patchEntity($request, $this->request->getData());
            if ($this->Requests->save($request)) {
                $this->Flash->success(__('The request has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The request could not be saved. Please, try again.'));
        }
        $students = $this->Requests->Students->find('list', ['limit' => 200]);
        $classrooms = $this->Requests->Classrooms->find('list', ['limit' => 200]);
        $this->set(compact('request', 'students', 'classrooms'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Request id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function accept($id = null)
    {
        $this->loadModel('StudentClassroom');

        $this->request->allowMethod(['post']);
        $request = $this->Requests->get($id);

        $class = $this->StudentClassroom->newEntity();
        $class->student_id = $request->student_id;
        $class->classroom_id = $request->classroom_id;
        if ($this->StudentClassroom->save($class)) {
            if ($this->Requests->delete($request)) {
                $this->Flash->success(__('The request accepted.'));
            } else {
                $this->Flash->error(__('The request could not be accept. Please, try again.'));
            }
        }
        return $this->redirect(['action' => 'index']);
    }
}
