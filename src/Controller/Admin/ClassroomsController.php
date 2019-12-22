<?php
namespace App\Controller\Admin;

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
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Upload');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Terms', 'Scores']
        ];
        $classrooms = $this->paginate($this->Classrooms);

        $this->set(compact('classrooms'));
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
            'contain' => ['Terms', 'Points', 'Requests', 'Scores', 'StudentClassroom']
        ]);

        $this->set('classroom', $classroom);
    }

    public function score($classroomId){
        $this->request->allowMethod(['post', 'delete']);


        $students = $this->Classrooms->StudentClassroom->find("all", [
            'conditions' => ['classroom_id' => $classroomId]
        ]);

        $data = [];

        foreach ($students as $item){
            $object = [
                'student_id' => $item->student_id,
                'classroom_id' => $item->classroom_id,
                'score' => 0
            ];

            array_push($data, $object);
        }

        $entities = $this->Classrooms->Scores->newEntities($data);
        if($this->Classrooms->Scores->saveMany($entities)){
            $this->Flash->success(__('امتحان برای دانش اموزان این کلاس ثبت شد'));
        };

        return $this->redirect(['action' => 'index']);
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

            if ($this->request->getData("image")['size'] > 0) {
                $this->Upload->start("classrooms", "image", $this->request, $classroom);
            } else {
                $classroom->image = null;
            }

            if ($this->Classrooms->save($classroom)) {
                $this->Flash->success(__('The classroom has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The classroom could not be saved. Please, try again.'));
        }
        $terms = $this->Classrooms->Terms->find('list');
        $teachers = $this->Classrooms->Teachers->find('list');
        $this->set(compact('classroom', 'terms', 'teachers'));
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
        $classroom->bkImage = $classroom->image;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $classroom = $this->Classrooms->patchEntity($classroom, $this->request->getData());

            if ($this->request->getData("image")['size'] > 0) {
                $this->Upload->start("classrooms", "image", $this->request, $classroom);
            } else {
                $classroom->image = $classroom->bkImage;
            }

            if ($this->Classrooms->save($classroom)) {
                $this->Flash->success(__('The classroom has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The classroom could not be saved. Please, try again.'));
        }
        $terms = $this->Classrooms->Terms->find('list');
        $teachers = $this->Classrooms->Teachers->find('list');

        $this->set(compact('classroom', 'terms', 'teachers'));
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
