<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Branches Controller
 *
 * @property \App\Model\Table\BranchesTable $Branches
 *
 * @method \App\Model\Entity\Branch[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BranchesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $style = "pages";

        $branches = $this->paginate($this->Branches);

        $this->set(compact('branches', 'style'));
    }

    /**
     * View method
     *
     * @param string|null $id Branch id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null)
    {
        $style = "pages";

        $branch = $this->Branches->findBySlug($this->Branches->find(), $slug, ['Terms']);
        $this->set(compact('branch', 'style'));
    }

}
