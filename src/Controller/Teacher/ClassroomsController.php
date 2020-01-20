<?php
namespace App\Controller\Teacher;

use App\Controller\AppController;

/**
 * Classrooms Controller
 *
 * @property \App\Model\Table\ClassroomsTable $Classrooms
 *
 * @method \App\Model\Entity\Classroom[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClassroomsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'conditions' => ['teacher_id' => $this->user->id],
            'contain' => ['Terms', 'Teachers', 'Languages', 'Scores']
        ];
        $classrooms = $this->paginate($this->Classrooms);

        $this->set(compact('classrooms'));
    }

    public function students($classroomId, $classroomTitle)
    {
        $this->loadModel("StudentClassroom");

        $classrooms = $this->StudentClassroom->find('all', [
            'conditions' => ['classroom_id' => $classroomId],
            'contain' => ["Students"]
        ]);

        $this->set(compact('classrooms', 'classroomTitle'));
    }

    /**
     * View method
     *
     * @param string|null $id Classroom id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $classroom = $this->Classrooms->get($id, [
            'contain' => ['Terms', 'Teachers', 'Languages', 'Points', 'Requests', 'Scores', 'StudentClassroom']
        ]);

        $this->set('classroom', $classroom);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $classroom = $this->Classrooms->newEntity();
        if ($this->request->is('post')) {
            $classroom = $this->Classrooms->patchEntity($classroom, $this->request->getData());
            if ($this->Classrooms->save($classroom)) {
                $this->Flash->success(__('The classroom has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The classroom could not be saved. Please, try again.'));
        }
        $terms = $this->Classrooms->Terms->find('list', ['limit' => 200]);
        $teachers = $this->Classrooms->Teachers->find('list', ['limit' => 200]);
        $languages = $this->Classrooms->Languages->find('list', ['limit' => 200]);
        $this->set(compact('classroom', 'terms', 'teachers', 'languages'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Classroom id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $classroom = $this->Classrooms->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $classroom = $this->Classrooms->patchEntity($classroom, $this->request->getData());
            if ($this->Classrooms->save($classroom)) {
                $this->Flash->success(__('The classroom has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The classroom could not be saved. Please, try again.'));
        }
        $terms = $this->Classrooms->Terms->find('list', ['limit' => 200]);
        $teachers = $this->Classrooms->Teachers->find('list', ['limit' => 200]);
        $languages = $this->Classrooms->Languages->find('list', ['limit' => 200]);
        $this->set(compact('classroom', 'terms', 'teachers', 'languages'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Classroom id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $classroom = $this->Classrooms->get($id);
        if ($this->Classrooms->delete($classroom)) {
            $this->Flash->success(__('The classroom has been deleted.'));
        } else {
            $this->Flash->error(__('The classroom could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
