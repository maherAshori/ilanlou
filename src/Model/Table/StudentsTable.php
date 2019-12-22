<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Students Model
 *
 * @property \App\Model\Table\NotificationsTable&\Cake\ORM\Association\HasMany $Notifications
 * @property \App\Model\Table\RequestsTable&\Cake\ORM\Association\HasMany $Requests
 * @property \App\Model\Table\ScoresTable&\Cake\ORM\Association\HasMany $Scores
 * @property \App\Model\Table\StudentClassroomTable&\Cake\ORM\Association\HasMany $StudentClassroom
 *
 * @method \App\Model\Entity\Student get($primaryKey, $options = [])
 * @method \App\Model\Entity\Student newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Student[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Student|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Student saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Student patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Student[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Student findOrCreate($search, callable $callback = null, $options = [])
 */
class StudentsTable extends Table
{
    public function findByMobile(Query $query, $mobile)
    {
        return $query->where(['mobile' => $mobile])->first();
    }

    public function findByCode(Query $query, $code)
    {
        return $query->where(['code' => $code])->first();
    }

    public function findByToken(Query $query, $token, $contain)
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

        $this->setTable('students');
        $this->setDisplayField('fullName');
        $this->setPrimaryKey('id');

        $this->hasMany('Notifications', [
            'foreignKey' => 'student_id'
        ]);
        $this->hasMany('Requests', [
            'foreignKey' => 'student_id'
        ]);
        $this->hasMany('Scores', [
            'foreignKey' => 'student_id'
        ]);
        $this->hasMany('StudentClassroom', [
            'foreignKey' => 'student_id'
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
            ->maxLength('firstName', 100)
            ->requirePresence('firstName', 'create')
            ->notEmptyString('firstName');

        $validator
            ->scalar('lastName')
            ->maxLength('lastName', 100)
            ->requirePresence('lastName', 'create')
            ->notEmptyString('lastName');

        $validator
            ->scalar('nationalCode')
            ->maxLength('nationalCode', 10)
            ->requirePresence('nationalCode', 'create')
            ->notEmptyString('nationalCode')
            ->add('nationalCode', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('image')
            ->maxLength('image', 50)
            ->allowEmptyFile('image');

        $validator
            ->scalar('mobile')
            ->maxLength('mobile', 11)
            ->allowEmptyString('mobile')
            ->add('mobile', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('code')
            ->allowEmptyString('code');

        $validator
            ->scalar('token')
            ->maxLength('token', 255)
            ->allowEmptyString('token');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['nationalCode']));
        $rules->add($rules->isUnique(['mobile']));

        return $rules;
    }
}
