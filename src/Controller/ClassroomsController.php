<?php
namespace App\Controller;

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
        $this->loadModel("StudentClassroom");
        $this->loadModel("Votes");
        $this->loadModel("Requests");

        parent::initialize();
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $style = "pages";

        $this->paginate = [
            'contain' => ['Terms', 'Teachers']
        ];
        $classrooms = $this->paginate($this->Classrooms);

        $this->set(compact('classrooms', 'style'));
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

        $classroom = $this->Classrooms->findBySlug($this->Classrooms->find(), $slug);

        $classroom = $this->Classrooms->get($classroom['id'], [
            'contain' => ['Terms', 'Teachers', 'StudentClassroom', 'Points']
        ]);


        if($this->isAuthorized){
            $student = $this->Classrooms->StudentClassroom->find('all', [
                'conditions' => ['student_id' => $this->student->id, 'classroom_id' => $classroom['id']]
            ])->first();

            if($student){
                $classroom->registred = true;
            }

            $request = $this->Classrooms->Requests->find('all', [
                'conditions' => ['student_id' => $this->student->id, 'classroom_id' => $classroom['id']]
            ])->first();

            if($request){
                $classroom->requested = true;
            }
        }

        $this->set(compact('classroom', 'style'));
    }

    public function request($classroomId)
    {
        $StudentClassroom = $this->Requests->newEntity();

        $this->request->allowMethod(['post']);

        $StudentClassroom->student_id = $this->student->id;
        $StudentClassroom->classroom_id = $classroomId;

        if ($this->Requests->save($StudentClassroom)) {
            $this->Flash->success(__('درخواست ثبت نام شما با موفقیت ارسال گردید'));
        } else {
            $this->Flash->error(__('لطفاً مجدداً امتحان کنید'));
        }

        return $this->redirect(['controller' => 'Students','action' => 'view']);
    }
}
