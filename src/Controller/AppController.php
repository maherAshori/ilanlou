<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Event\EventManager;
use Cake\ORM\Locator\LocatorInterface;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public $components = array('Cookie');

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->setInfo();
        $this->getInfo();

        if ($this->request->getParam("prefix") == 'admin') {
            $this->adminInit();
        } elseif($this->request->getParam("prefix") == 'teacher') {
            $this->teacherInit();
        } else {
            $this->webInit();
        }
    }

    public function adminInit()
    {
        $this->viewBuilder()->setLayout('admin');

        $this->loadModel("Users");
        $this->token = $this->Cookie->read('token');
        $this->user = null;
        $this->isAuthorized = false;

        if (!empty($this->token)) {
            $user = $this->Users->findByToken($this->Users->find(), $this->token);
            if (!empty($user)) {
                $this->user = $user;
                $this->isAuthorized = true;
                $this->set('user', $this->user);
            } else {
                $this->Cookie->delete('token');
                $this->Flash->error(__('مجدداً وارد وب سایت شوید'));
                return $this->redirect(['prefix' => false,'controller' => 'Students', 'action' => 'login']);
            }
        }else{
            return $this->redirect(['prefix' => false,'controller' => 'Students', 'action' => 'login']);
        }
    }

    public function teacherInit()
    {
        $this->viewBuilder()->setLayout('admin');


        $this->loadModel("Teachers");
        $this->token = $this->Cookie->read('token');
        $this->user = null;
        $this->isAuthorized = false;

        if (!empty($this->token)) {
            $user = $this->Teachers->findByToken($this->Teachers->find(), $this->token);
            if (!empty($user)) {
                $this->user = $user;
                $this->isAuthorized = true;
                $this->set('user', $this->user);
            } else {
                $this->Cookie->delete('token');
                $this->Flash->error(__('مجدداً وارد وب سایت شوید'));
                return $this->redirect(['prefix' => false,'controller' => 'Students', 'action' => 'login']);
            }
        }else{
            return $this->redirect(['prefix' => false,'controller' => 'Students', 'action' => 'login']);
        }
    }

    public function webInit()
    {
        $this->viewBuilder()->setLayout('default');

        $this->loadModel("Students");

        $this->isAuthorized = false;
        $this->token = $this->Cookie->read('token');
        $this->student = null;

        if (!empty($this->token)) {
            $student = $this->Students->findByToken($this->Students->find(), $this->token, ['StudentClassroom', 'Notifications', 'Requests', 'Scores']);
            if (!empty($student)) {
                $this->student = $student;
                $this->isAuthorized = true;
            }
        }

        $this->set('auth', $this->isAuthorized);
        $this->set('student', $this->student);
    }

    public function setInfo(){
        $this->loadModel("Information");
        $information = $this->Cookie->read('_i');

        if (empty($information)) {
            $cache = array();
            $i = $this->Information->find('all');
            foreach ($i as $x) {
                array_push($cache, $x);
            }
            $this->Cookie->write('_i', $cache);
        }
    }

    public function getInfo()
    {
        $information = $this->Cookie->read('_i');

        foreach ($information as $info) {
            $this->set($info['key'], $info['value']);
        }
    }
}
