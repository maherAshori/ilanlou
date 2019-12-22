<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
{
    public function findByMobile(Query $query, $mobile)
    {
        return $query->where(['mobile' => $mobile])->first();
    }

    public function findByCode(Query $query, $code)
    {
        return $query->where(['code' => $code])->first();
    }

    public function findByToken(Query $query, $token, $contain = array())
    {
        return $query->where(['token' => $token])->contain($contain)->first();
    }

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('fullName');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('firstName')
            ->maxLength('firstName', 50)
            ->requirePresence('firstName', 'create')
            ->notEmptyString('firstName');

        $validator
            ->scalar('lastName')
            ->maxLength('lastName', 50)
            ->requirePresence('lastName', 'create')
            ->notEmptyString('lastName');

        $validator
            ->scalar('mobile')
            ->maxLength('mobile', 11)
            ->requirePresence('mobile', 'create')
            ->notEmptyString('mobile');

        $validator
            ->integer('code')
            ->allowEmptyString('code');

        $validator
            ->scalar('token')
            ->maxLength('token', 150)
            ->allowEmptyString('token');

        return $validator;
    }
}
