<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StudentClassroom Entity
 *
 * @property int $id
 * @property int $student_id
 * @property int $classroom_id
 * @property \Cake\I18n\FrozenTime $registration_date
 *
 * @property \App\Model\Entity\Student $student
 * @property \App\Model\Entity\Classroom $classroom
 */
class StudentClassroom extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'student_id' => true,
        'classroom_id' => true,
        'registration_date' => true,
        'student' => true,
        'classroom' => true
    ];
}
