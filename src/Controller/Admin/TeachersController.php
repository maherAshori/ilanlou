<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Utility\Sms;

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
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $teachers = $this->paginate($this->Teachers);

        $this->set(compact('teachers'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sms = new Sms();

        $teacher = $this->Teachers->newEntity();
        if ($this->request->is('post')) {
            $teacher = $this->Teachers->patchEntity($teacher, $this->request->getData());

            if (!empty($this->request->getData("image")["name"])) {
                $this->Upload->start("teachers", "image", $this->request, $teacher);
            }else{
                $teacher->image = null;
            }

            if ($this->Teachers->save($teacher)) {
                $this->Flash->success(__('آموزگار با موفقیت ایجاد شد'));
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set(compact('teacher'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Teacher id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
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
                $this->Flash->success(__('آموزگار با موفقیت ویرایش شد'));

                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set(compact('teacher'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Teacher id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $teacher = $this->Teachers->get($id);
        if ($this->Teachers->delete($teacher)) {
            $this->Flash->success(__('حذف آموزگار با موفقیت انجام شد'));
        } else {
            $this->Flash->error(__('حذف آموزگار با مشکل مواجه شد'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
