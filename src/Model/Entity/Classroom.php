<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Classroom Entity
 *
 * @property int $id
 * @property int $term_id
 * @property int $teacher_id
 * @property string $name
 * @property string|null $slug
 * @property float $price
 * @property string|null $image
 * @property bool|null $home
 * @property string|null $description
 *
 * @property \App\Model\Entity\Term $term
 * @property \App\Model\Entity\Teacher $teacher
 * @property \App\Model\Entity\Point[] $points
 * @property \App\Model\Entity\Request[] $requests
 * @property \App\Model\Entity\Score[] $scores
 * @property \App\Model\Entity\StudentClassroom[] $student_classroom
 * @property mixed StudentClassroom
 */
class Classroom extends Entity
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
        'term_id' => true,
        'teacher_id' => true,
        'language_id' => true,
        'name' => true,
        'slug' => true,
        'price' => true,
        'image' => true,
        'home' => true,
        'description' => true,
        'term' => true,
        'teacher' => true,
        'points' => true,
        'requests' => true,
        'scores' => true,
        'student_classroom' => true
    ];
}
