<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Utility\Inflector;
use Cake\Validation\Validator;

/**
 * Classrooms Model
 *
 * @property \App\Model\Table\TermsTable&\Cake\ORM\Association\BelongsTo $Terms
 * @property \App\Model\Table\TeachersTable&\Cake\ORM\Association\BelongsTo $Teachers
 * @property \App\Model\Table\PointsTable&\Cake\ORM\Association\HasMany $Points
 * @property \App\Model\Table\RequestsTable&\Cake\ORM\Association\HasMany $Requests
 * @property \App\Model\Table\ScoresTable&\Cake\ORM\Association\HasMany $Scores
 * @property \App\Model\Table\StudentClassroomTable&\Cake\ORM\Association\HasMany $StudentClassroom
 *
 * @method \App\Model\Entity\Classroom get($primaryKey, $options = [])
 * @method \App\Model\Entity\Classroom newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Classroom[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Classroom|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Classroom saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Classroom patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Classroom[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Classroom findOrCreate($search, callable $callback = null, $options = [])
 */
class ClassroomsTable extends Table
{

    public function findBySlug(Query $query, $slug)
    {
        return $query->where(['slug' => $slug])->first();
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

        $this->setTable('classrooms');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Terms', [
            'foreignKey' => 'term_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Teachers', [
            'foreignKey' => 'teacher_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Points', [
            'foreignKey' => 'classroom_id'
        ]);
        $this->hasMany('Requests', [
            'foreignKey' => 'classroom_id'
        ]);
        $this->hasMany('Scores', [
            'foreignKey' => 'classroom_id'
        ]);
        $this->hasMany('StudentClassroom', [
            'foreignKey' => 'classroom_id'
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 255)
            ->allowEmptyString('slug');

        $validator
            ->decimal('price')
            ->notEmptyString('price');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->allowEmptyFile('image');

        $validator
            ->boolean('home')
            ->allowEmptyString('home');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

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
        $rules->add($rules->existsIn(['term_id'], 'Terms'));
        $rules->add($rules->existsIn(['teacher_id'], 'Teachers'));

        return $rules;
    }

    public function beforeSave($event, $entity, $options)
    {
        if (!$entity->slug) {
            $dash = Inflector::dasherize($entity->name);
            $slug = Inflector::slug($dash);
            $entity->slug = $slug;
        }
    }
}
