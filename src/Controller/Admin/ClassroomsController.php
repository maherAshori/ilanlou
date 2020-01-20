<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Model\Entity\Student;

/**
 * Classrooms Controller
 *
 * @property \App\Model\Table\ClassroomsTable $Classrooms
 * @property Student Students
 *
 * @method \App\Model\Entity\Classroom[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClassroomsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Upload');
        $this->loadModel("Students");
    }

    public function students($classroomId)
    {
        $students = $this->paginate($this->Students->find('all', [
            'contain' => ['StudentClassroom']
        ]));

        if ($this->request->is('post')) {
            if (empty($this->request->getData('search'))) {
                $students = $this->paginate($this->Students);
            } else {
                $students = $this->Students->find()->where([
                    'OR' => [
                        ['nationalCode' => $this->request->getData('search')],
                    ]
                ]);
            }
        }

        $this->set(compact('students', 'classroomId'));
    }

    public function join($studentId, $classId)
    {
        $this->loadModel('StudentClassroom');

        $this->request->allowMethod(['post']);

        $find = $this->StudentClassroom->find('all', ['conditions' =>
            ['student_id' => $studentId, 'classroom_id' => $classId]
        ])->first();

        if (empty($find)) {
            $class = $this->StudentClassroom->newEntity();
            $class->student_id = $studentId;
            $class->classroom_id = $classId;
            if ($this->StudentClassroom->save($class)) {
                $this->Flash->success(__('دانش آموز با موفقیت در این کلاس ثبت نام شد'));
                return $this->redirect(['action' => 'students', $classId]);
            }
            return $this->redirect(['action' => 'index']);
        }else{
            $this->Flash->error(__('دانش آموز قبلا در این کلاس ثبت نام شده است'));
            return $this->redirect(['action' => 'students', $classId]);
        }
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
        $this->loadModel("Students");

        $classroom = $this->Classrooms->get($id, [
            'contain' => ['Terms', 'Points', 'Requests', 'Scores', 'StudentClassroom']
        ]);


        foreach ($classroom->student_classroom as $student) {
            $item = $this->Students->get($student->student_id);
            $student['info'] = $item;
        }

        $this->set('classroom', $classroom);
    }

    public function score($classroomId)
    {
        $this->request->allowMethod(['post', 'delete']);


        $students = $this->Classrooms->StudentClassroom->find("all", [
            'conditions' => ['classroom_id' => $classroomId]
        ]);

        $data = [];

        foreach ($students as $item) {
            $object = [
                'student_id' => $item->student_id,
                'classroom_id' => $item->classroom_id,
                'score' => 0
            ];

            array_push($data, $object);
        }

        $entities = $this->Classrooms->Scores->newEntities($data);
        if ($this->Classrooms->Scores->saveMany($entities)) {
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
                $this->Flash->success(__('با موفقیت ثبت گردید'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('با مشکل مواجه گردید'));
        }
        $languages = $this->Classrooms->Languages->find('list');
        $terms = $this->Classrooms->Terms->find('list');
        $teachers = $this->Classrooms->Teachers->find('list');
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
        $classroom->bkImage = $classroom->image;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $classroom = $this->Classrooms->patchEntity($classroom, $this->request->getData());

            if ($this->request->getData("image")['size'] > 0) {
                $this->Upload->start("classrooms", "image", $this->request, $classroom);
            } else {
                $classroom->image = $classroom->bkImage;
            }

            if ($this->Classrooms->save($classroom)) {
                $this->Flash->success(__('با موفقیت ثبت گردید'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('با مشکل مواجه گردید'));
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
            $this->Flash->success(__('با موفقیت حذف گردید'));
        } else {
            $this->Flash->error(__('با مشکل مواجه گردید'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
