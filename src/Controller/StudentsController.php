<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Classroom;
use App\Model\Entity\Student;
use Cake\Database\Expression\QueryExpression;
use Cake\Database\Query;
use App\Utility\Sms;
use Cake\Routing\Router;
use Cake\Utility\Text;

/**
 * Students Controller
 *
 * @property \App\Model\Table\StudentsTable $Students
 * @property Classroom|Classroom Classrooms
 * @property Student|Student student
 * @property bool|object isAuthorized
 *
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StudentsController extends AppController
{

    protected function StudentLogin($sms, $redirect)
    {
        $student = $this->Students->findByMobile($this->Students->find(), $this->request->getData('mobile'));
        if (empty($student->id)) {
            $this->UserLogin($sms);
        } else {
            $student->code = mt_rand(100000, 999999);
            $student->token = Text::uuid();

            if ($this->Students->save($student)) {
                if ($sms->send($student->code, $student['mobile'])) {
                    return $this->redirect(['controller' => 'students', 'action' => 'code', 'redirect' => $redirect]);
                }
            }
        }
    }

    protected function UserLogin($sms)
    {
        $this->loadModel('Users');

        $user = $this->Users->findByMobile($this->Users->find(), $this->request->getData('mobile'));

        if (empty($user->id)) {
            $this->TeacherLogin($sms);
        } else {
            $user->code = mt_rand(100000, 999999);
            $user->token = Text::uuid();
            if ($this->Users->save($user)) {
                if ($sms->send($user->code, $user['mobile'])) {
                    return $this->redirect(['controller' => 'students', 'action' => 'code']);
                }
            }
        }
    }

    protected function TeacherLogin($sms)
    {
        $this->loadModel('Teachers');

        $teacher = $this->Teachers->findByMobile($this->Teachers->find(), $this->request->getData('mobile'));

        if (empty($teacher->id)) {
            $this->Flash->error(__('شماره همراه وارد شده موجود نیست'));
        } else {
            $teacher->code = mt_rand(100000, 999999);
            $teacher->token = Text::uuid();
            if ($this->Teachers->save($teacher)) {
                if ($sms->send($teacher->code, $teacher['mobile'])) {
                    return $this->redirect(['controller' => 'students', 'action' => 'code']);
                }
            }
        }
    }

    protected function StudentCode($redirect)
    {
        $student = $this->Students->findByCode($this->Students->find(), $this->request->getData('code'));
        if (empty($student->id)) {
            $this->UserCode();
        } else {
            $this->Cookie->write('token', $student['token']);
            if(empty($redirect)){
                return $this->redirect(['controller' => 'Students', 'action' => 'view']);
            }else{
                return $this->redirect($redirect);
            }
        }
    }

    protected function UserCode()
    {
        $this->loadModel('Users');
        $user = $this->Users->findByCode($this->Users->find(), $this->request->getData('code'));
        if (empty($user->id)) {
            $this->TeacherCode();
        } else {
            $this->Cookie->write('token', $user['token']);
            return $this->redirect(['prefix' => 'admin', 'controller' => 'Users', 'action' => 'index']);
        }
    }

    protected function TeacherCode()
    {
        $this->loadModel('Teachers');
        $teacher = $this->Teachers->findByCode($this->Teachers->find(), $this->request->getData('code'));
        if (empty($teacher->id)) {
            $this->Flash->error(__('کد وارد شده نامعتبر است'));
        } else {
            $this->Cookie->write('token', $teacher['token']);
            return $this->redirect(['prefix' => 'teacher', 'controller' => 'Teachers', 'action' => 'view']);
        }
    }

    public function login()
    {
        $parameters = $this->request->getAttribute('params');
        $redirect = null;
        if(!empty($parameters['?'])){
            $redirect = $parameters['?']['redirect'];
        }

        $style = 'pages';
        if ($this->isAuthorized) {
            return $this->redirect(['controller' => 'Students', 'action' => 'view']);
        }

        $sms = new Sms();

        if ($this->request->is(['patch', 'post', 'put'])) {
            if (!empty($this->request->getData('mobile'))) {
                $this->StudentLogin($sms, $redirect);
            } else {
                $this->Flash->error(__('لطفاً شماره همراه خود را وارد نمائید'));
            }
        }

        $this->set('style', $style);
    }

    public function code()
    {
        $parameters = $this->request->getAttribute('params');
        $redirect = null;
        if(!empty($parameters['?'])){
            $redirect = $parameters['?']['redirect'];
        }

        $style = 'pages';

        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->StudentCode($redirect);
        }

        $this->set('style', $style);
    }

    public function logout()
    {
        $this->render(false);

        $this->Cookie->delete('token');
        $this->Cookie->delete('_i');

        $student = $this->Students->get($this->student['id']);
        $student->code = null;
        $student->token = null;
        if ($this->Students->save($student)) {
            return $this->redirect(['controller' => 'Pages', 'action' => 'display']);
        }
    }

    /**
     * View method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view()
    {
        $this->loadModel("Classrooms");
        //$this->loadModel("Exams");
        //$this->loadModel("StudentsExams");

        $style = 'pages';

        if (!$this->isAuthorized) {
            $this->Flash->error(__("شما دسترسی به این بخش ندارید، ابتدا وارد شوید"));
            return $this->redirect(['controller' => 'Students', 'action' => 'login']);
        }

        $student = $this->student;

        if (!empty($student->student_classroom)) {
            foreach ($student->student_classroom as $item) {
                $findClassroom = $this->Classrooms->get($item->classroom_id);
                $item->classroom = $findClassroom;
            }
        }

        if (!empty($student->requests)) {
            foreach ($student->requests as $item) {
                $findClassroom = $this->Classrooms->get($item->classroom_id);
                $item->classroom = $findClassroom;
            }
        }

        if (!empty($student->scores)) {
            foreach ($student->scores as $item) {
                $findClassroom = $this->Classrooms->get($item->classroom_id);
                $item->classroom = $findClassroom;
            }
        }

//        $exams = $this->StudentsExams->find('all', [
//            'conditions' => ['student_id' => $student->id],
//            'contain' => ['Exams']
//        ]);
//
//        $count = 0;
//        foreach ($exams as $exam){
//            $count++;
//        }
//
//        if($count > 0){
//            $student->exams = $exams;
//        }

        $this->set(compact('student', 'style'));

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $style = 'pages';
        $sms = new Sms();

        $student = $this->Students->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $student = $this->Students->find('all', [
                'conditions' => [
                    'nationalCode' => $this->request->getData('nationalCode')
                ]
            ])->first();

            if (empty($student)) {
                $this->Flash->error(__("کد ملی وارد شده نامعتبر است"));
            } else {
                if ($student->mobile == '') {
                    $mobile = $this->Students->find('all', [
                        'conditions' => [
                            'mobile' => $this->request->getData('mobile')
                        ]
                    ])->first();

                    if (empty($mobile)) {
                        $student = $this->Students->patchEntity($student, $this->request->getData());
                        if ($this->Students->save($student)) {
                            $this->Flash->success(__('با تشکر، ثبت نام شما با موفقیت انجام شد'));
                            return $this->redirect(['controller' => 'students', 'action' => 'add']);
                        }
                    } else {
                        $this->Flash->error(__('شماره همراه وارد شده در حال حاضر موجود است'));
                    }
                }
            }
        }
        $this->set(compact('student', 'style'));
    }

    public function closeNotification()
    {
        $this->loadModel("Notifications");

        $this->request->allowMethod(['post']);
        $notification = $this->Notifications->find('all', [
            'conditions' => ['student_id' => $this->student->id]
        ])->first();
        $this->Notifications->delete($notification);

        return $this->redirect(['action' => 'view']);
    }
}
