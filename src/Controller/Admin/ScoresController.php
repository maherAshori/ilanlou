<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Scores Controller
 *
 * @property \App\Model\Table\ScoresTable $Scores
 *
 * @method \App\Model\Entity\Score[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ScoresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Classrooms', 'Students']
        ];
        $scores = $this->paginate($this->Scores);

        $this->set(compact('scores'));
    }

    /**
     * View method
     *
     * @param string|null $id Score id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $score = $this->Scores->get($id, [
            'contain' => ['Classrooms', 'Students']
        ]);

        $this->set('score', $score);
    }

    public function students($classroomId)
    {
        $classroom = $this->Scores->Classrooms->get($classroomId);
        $scores = $this->Scores->find('all', [
            'conditions' => ['classroom_id' => $classroomId],
            'contain' => ['Students']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $score = $this->Scores->get($this->request->getData('score_id'));
            $score = $this->Scores->patchEntity($score, $this->request->getData());
            $score->id = $this->request->getData('score_id');
            $score->score = $this->request->getData('student_score');
            if ($this->Scores->save($score)) {
                $this->Flash->success(__('نمره ثبت شد'));

                return $this->redirect(['action' => 'students', $classroomId]);
            }
        }

        $this->set(compact('scores', 'classroom'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $score = $this->Scores->newEntity();
        if ($this->request->is('post')) {
            $score = $this->Scores->patchEntity($score, $this->request->getData());
            if ($this->Scores->save($score)) {
                $this->Flash->success(__('The score has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The score could not be saved. Please, try again.'));
        }
        $classrooms = $this->Scores->Classrooms->find('list', ['limit' => 200]);
        $students = $this->Scores->Students->find('list', ['limit' => 200]);
        $this->set(compact('score', 'classrooms', 'students'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Score id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $score = $this->Scores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $score = $this->Scores->patchEntity($score, $this->request->getData());
            if ($this->Scores->save($score)) {
                $this->Flash->success(__('The score has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The score could not be saved. Please, try again.'));
        }
        $classrooms = $this->Scores->Classrooms->find('list', ['limit' => 200]);
        $students = $this->Scores->Students->find('list', ['limit' => 200]);
        $this->set(compact('score', 'classrooms', 'students'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Score id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $score = $this->Scores->get($id);
        if ($this->Scores->delete($score)) {
            $this->Flash->success(__('The score has been deleted.'));
        } else {
            $this->Flash->error(__('The score could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
