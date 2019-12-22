<?php
namespace App\Controller;

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
     * Add method
     *
     * @param null $id
     * @param $slug
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null, $slug)
    {
        $this->autoRender = false;
        $StudentClassroom = $this->Requests->newEntity();

        $this->request->allowMethod(['post']);

        $StudentClassroom->student_id = $this->student->id;
        $StudentClassroom->classroom_id = $id;

        if ($this->Requests->save($StudentClassroom)) {
            $this->Flash->success(__('درخواست ثبت نام شما با موفقیت ارسال گردید'));
        } else {
            $this->Flash->error(__('لطفاً مجدداً امتحان کنید'));
        }

        return $this->redirect(['controller' => 'Classrooms','action' => 'view', $slug]);
    }
}
