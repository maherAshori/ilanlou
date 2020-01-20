<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Terms Controller
 *
 * @property \App\Model\Table\TermsTable $Terms
 *
 * @method \App\Model\Entity\Term[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TermsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $terms = $this->paginate($this->Terms);

        $this->set(compact('terms'));
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
        $term = $this->Terms->findBySlug($this->Terms->find(), $slug, ['Classrooms']);
        $term->branch = $this->Terms->Branches->get($term->branch_id);
        $this->set(compact('term', 'style'));
    }
}
