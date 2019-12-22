<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Score Entity
 *
 * @property int $id
 * @property int $classroom_id
 * @property int $student_id
 * @property string $score
 *
 * @property \App\Model\Entity\Classroom $classroom
 * @property \App\Model\Entity\Student $student
 */
class Score extends Entity
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
        'classroom_id' => true,
        'student_id' => true,
        'score' => true,
        'classroom' => true,
        'student' => true
    ];
}
