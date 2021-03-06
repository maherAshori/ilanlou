<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Utility\Sms;
use Cake\Utility\Text;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    public function logout()
    {
        $this->render(false);

        $this->Cookie->delete('token');

        $user = $this->Users->get($this->user['id']);
        $user->code = null;
        $user->token = null;
        if ($this->Users->save($user)) {
            return $this->redirect(['prefix' => false, 'controller' => 'Pages', 'action' => 'display']);
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sms = new Sms();
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success(__('کاربر با موفقیت ایجاد شد'));
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('کاربر با موفقیت ویرایش شد'));

                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('کاربر با موفقیت حذف شد'));
        } else {
            $this->Flash->error(__('حذف کاربر با مشکل مواجه شد'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
