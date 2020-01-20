<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Utility\Inflector;
use Cake\Validation\Validator;

/**
 * Teachers Model
 *
 * @property &\Cake\ORM\Association\HasMany $Classrooms
 *
 * @method \App\Model\Entity\Teacher get($primaryKey, $options = [])
 * @method \App\Model\Entity\Teacher newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Teacher[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Teacher|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Teacher saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Teacher patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Teacher[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Teacher findOrCreate($search, callable $callback = null, $options = [])
 */
class TeachersTable extends Table
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

        $this->setTable('teachers');
        $this->setDisplayField('fullName');
        $this->setPrimaryKey('id');

        $this->hasMany('Classrooms', [
            'foreignKey' => 'teacher_id'
        ]);
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
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('image')
            ->maxLength('image', 50)
            ->allowEmptyFile('image');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 50)
            ->allowEmptyString('slug');

        $validator
            ->boolean('home')
            ->allowEmptyString('home');

        $validator
            ->integer('code')
            ->allowEmptyString('code');

        $validator
            ->scalar('token')
            ->maxLength('token', 150)
            ->allowEmptyString('token');

        return $validator;
    }

    public function beforeSave($event, $entity, $options)
    {
        if (!$entity->slug) {
            $dash = Inflector::dasherize($entity->firstName.' '.$entity->lastName);
            $slug = Inflector::slug($dash);
            $entity->slug = $slug;
        }
    }
}
