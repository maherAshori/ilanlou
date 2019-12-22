<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Events Controller
 *
 * @property \App\Model\Table\EventsTable $Events
 *
 * @method \App\Model\Entity\Event[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $style = "pages";

        $events = $this->paginate($this->Events);

        $this->set(compact('events', 'style'));
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

        $event = $this->Events->find('all', [
            'conditions' => ['slug' => $slug],
            'contain' => []
        ])->first();

        $this->set(compact('event', 'style'));
    }
}
