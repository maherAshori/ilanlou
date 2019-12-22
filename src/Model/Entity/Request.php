<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Request Entity
 *
 * @property int $id
 * @property int $student_id
 * @property int $classroom_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int $confirm
 *
 * @property \App\Model\Entity\Student $student
 * @property \App\Model\Entity\Classroom $classroom
 */
class Request extends Entity
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
        'created' => true,
        'confirm' => true,
        'student' => true,
        'classroom' => true
    ];
}
