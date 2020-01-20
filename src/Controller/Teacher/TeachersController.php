<?php
namespace App\Controller\Teacher;

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
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Upload');
    }

    public function view()
    {
        $teacher = $this->Teachers->get($this->user['id'], [
            'contain' => []
        ]);

        $classrooms = $this->Teachers->Classrooms->find('all', [
            'conditions' => ['teacher_id' => $teacher->id],
            'contain' => ['Terms']
        ]);

        if(!empty($classrooms)){
            $teacher->classrooms = $classrooms;
        }

        $this->set('teacher', $teacher);
    }

    public function students($classroomId){
        $this->loadModel("StudentClassroom");

        $classroom = $this->Teachers->Classrooms->get($classroomId);

        $classrooms = $this->StudentClassroom->find('all', [
            'conditions' => ['classroom_id' => $classroomId],
            'contain' => ['Students']
        ]);

        $students = array();

        foreach ($classrooms as $_classroom){
            array_push($students, $_classroom->student);
        }

        $this->set(compact('students', 'classroom'));
    }

    public function logout()
    {
        $this->render(false);

        $this->Cookie->delete('token');

        $user = $this->Teachers->get($this->user['id']);
        $user->code = null;
        $user->token = null;
        if($this->Teachers->save($user)){
            return $this->redirect(['prefix' => false,'controller' => 'Pages','action' => 'display']);
        }
    }

    public function edit($id = null)
    {
        $teacher = $this->Teachers->get($id, [
            'contain' => []
        ]);
        $teacher->originalImage = $teacher->image;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $teacher = $this->Teachers->patchEntity($teacher, $this->request->getData());

            if ($this->request->getData("image")['size'] > 0) {
                $this->Upload->start("teachers", "image", $this->request, $teacher);
            } else {
                $teacher->image = $teacher->originalImage;
            }

            if ($this->Teachers->save($teacher)) {
                $this->Flash->success(__('با موفقیت ذخیره شد'));

                return $this->redirect(['action' => 'view']);
            }
            $this->Flash->error(__('با مشکل مواجه گردید'));
        }
        $this->set(compact('teacher'));
    }
}
