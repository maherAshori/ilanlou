<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Notifications Controller
 *
 * @property \App\Model\Table\NotificationsTable $Notifications
 *
 * @method \App\Model\Entity\Notification[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NotificationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Students']
        ];
        $notifications = $this->paginate($this->Notifications);

        $this->set(compact('notifications'));
    }

    /**
     * View method
     *
     * @param string|null $id Notification id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notification = $this->Notifications->get($id, [
            'contain' => ['Students']
        ]);

        $this->set('notification', $notification);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $notification = $this->Notifications->newEntity();
        $students = $this->Notifications->Students->find('list');

        if ($this->request->is('post')) {

            if ($this->request->getData('toAll')) {
                $all = $this->Notifications->Students->find('all');
                $data = [];
                foreach ($all as $student) {
                    $object = [
                        'student_id' => $student->id,
                        'message' => $this->request->getData('message')
                    ];

                    array_push($data, $object);
                }

                $entities = $this->Notifications->newEntities($data);

                $this->Notifications->deleteAll($entities);

                if($this->Notifications->saveMany($entities)){
                    $this->Flash->success(__('پیام با موفقیت ارسال شد'));
                }
            } else {
                $notification = $this->Notifications->patchEntity($notification, $this->request->getData());

                $find = $this->Notifications->find('all', ['conditions' => ['student_id' => $this->request->getData('student_id')]])->first();

                if (!empty($find)) {
                    $this->Notifications->delete($find);
                }

                if ($this->Notifications->save($notification)) {
                    $this->Flash->success(__('پیام با موفقیت ارسال شد'));

                    return $this->redirect(['action' => 'index']);
                }
            }
        }
        $this->set(compact('notification', 'students'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Notification id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $notification = $this->Notifications->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notification = $this->Notifications->patchEntity($notification, $this->request->getData());
            if ($this->Notifications->save($notification)) {
                $this->Flash->success(__('پیام با موفقیت ویرایش شد'));

                return $this->redirect(['action' => 'index']);
            }
        }
        $students = $this->Notifications->Students->find('list', ['limit' => 200]);
        $this->set(compact('notification', 'students'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Notification id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $notification = $this->Notifications->get($id);
        if ($this->Notifications->delete($notification)) {
            $this->Flash->success(__('پیام با موفقیت حذف شد'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
