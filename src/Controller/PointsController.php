<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Classroom;
use App\Model\Entity\StudentClassroom;
use App\Model\Entity\StudentPoint;

/**
 * Points Controller
 *
 * @property \App\Model\Table\PointsTable $Points
 * @property StudentPoint StudentPoint
 * @property StudentClassroom StudentClassroom
 *
 * @method \App\Model\Entity\Point[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PointsController extends AppController
{
    public function initialize()
    {
        $this->loadModel("StudentPoint");
        $this->loadModel("StudentClassroom");

        parent::initialize();
    }

    private function studentPoint($id = null){
        $studentPoint = $this->StudentPoint->newEntity();
        $studentPoint = $this->StudentPoint->patchEntity($studentPoint, $this->request->getData());
        $studentPoint->student_id = $this->student->id;
        $studentPoint->classroom_id = $id;
        $this->StudentPoint->save($studentPoint);
    }

    /**
     * thumbsUp method
     *
     * @param Classroom $id
     * @param Classroom $slug
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function thumbsUp($id = null, $slug = null)
    {
        $this->autoRender = false;
        $point = $this->Points->newEntity();
        $this->request->allowMethod(['post']);

        $studentInClass = $this->StudentClassroom->find('all', ['conditions' => ['classroom_id' => $id, 'student_id' => $this->student->id]])->first();

        if(empty($studentInClass)){
            $this->Flash->error(__('برای درج امتیاز باید ابتدا ثبت نام نمائید'));
            return $this->redirect(['controller' => 'Classrooms', 'action' => 'view', $slug]);
        }

        $allowToSubmit = $this->StudentPoint->find('all', ['conditions' => ['classroom_id' => $id, 'student_id' => $this->student->id]])->first();

        if(!empty($allowToSubmit)){
            $this->Flash->error(__('شما قبلاً به این کلاس امتیاز داده اید'));
            return $this->redirect(['controller' => 'Classrooms', 'action' => 'view', $slug]);
        }

        $findClassroomPoint = $this->Points->find('all', ['conditions' => ['classroom_id' => $id]])->first();

        if(empty($findClassroomPoint)){
            $point = $this->Points->patchEntity($point, $this->request->getData());
            $point->classroom_id = $id;
            $point->positive_points = 1;
            $point->negative_points = 0;
            if ($this->Points->save($point)) {
                $this->studentPoint($id);
                return $this->redirect(['controller' => 'Classrooms', 'action' => 'view', $slug]);
            }
        } else {
            $point = $this->Points->patchEntity($findClassroomPoint, $this->request->getData());
            $point->positive_points += 1;
            if ($this->Points->save($point)) {
                $this->studentPoint($id);
                return $this->redirect(['controller' => 'Classrooms', 'action' => 'view', $slug]);
            }
        }
    }

    /**
     * thumbsDown method
     *
     * @param Classroom $id
     * @param Classroom $slug
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function thumbsDown($id = null, $slug = null)
    {
        $this->autoRender = false;
        $point = $this->Points->newEntity();
        $this->request->allowMethod(['post']);

        $studentInClass = $this->StudentClassroom->find('all', ['conditions' => ['classroom_id' => $id, 'student_id' => $this->student->id]])->first();

        if(empty($studentInClass)){
            $this->Flash->error(__('برای درج امتیاز باید ابتدا ثبت نام نمائید'));
            return $this->redirect(['controller' => 'Classrooms', 'action' => 'view', $slug]);
        }

        $allowToSubmit = $this->StudentPoint->find('all', ['conditions' => ['classroom_id' => $id, 'student_id' => $this->student->id]])->first();

        if(!empty($allowToSubmit)){
            $this->Flash->error(__('شما قبلاً به این کلاس امتیاز داده اید'));
            return $this->redirect(['controller' => 'Classrooms', 'action' => 'view', $slug]);
        }

        $findClassroomPoint = $this->Points->find('all', ['conditions' => ['classroom_id' => $id]])->first();

        if(empty($findClassroomPoint)){
            $point = $this->Points->patchEntity($point, $this->request->getData());
            $point->classroom_id = $id;
            $point->positive_points = 0;
            $point->negative_points = 1;
            if ($this->Points->save($point)) {
                $this->studentPoint($id);
                return $this->redirect(['controller' => 'Classrooms', 'action' => 'view', $slug]);
            }
        } else {
            $point = $this->Points->patchEntity($findClassroomPoint, $this->request->getData());
            $point->negative_points += 1;
            if ($this->Points->save($point)) {
                $this->studentPoint($id);
                return $this->redirect(['controller' => 'Classrooms', 'action' => 'view', $slug]);
            }
        }
    }
}
