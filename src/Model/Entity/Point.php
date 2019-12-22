<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Point Entity
 *
 * @property int $id
 * @property int $classroom_id
 * @property int $all_points
 * @property int $sum_points
 * @property float $avg_points
 *
 * @property \App\Model\Entity\Classroom $classroom
 */
class Point extends Entity
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
        'all_points' => true,
        'sum_points' => true,
        'avg_points' => true,
        'classroom' => true
    ];
}
