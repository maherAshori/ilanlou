<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Term Entity
 *
 * @property int $id
 * @property int $course_id
 * @property string $name
 * @property string|null $slug
 * @property string|null $description
 *
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\Classroom[] $classrooms
 */
class Term extends Entity
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
        'course_id' => true,
        'name' => true,
        'slug' => true,
        'description' => true,
        'branch' => true,
        'classrooms' => true
    ];
}
