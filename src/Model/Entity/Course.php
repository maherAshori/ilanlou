<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Course Entity
 *
 * @property int $id
 * @property int $branch_id
 * @property string $name
 * @property string|null $slug
 * @property string|null $description
 *
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\Term[] $terms
 */
class Course extends Entity
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
        'branch_id' => true,
        'name' => true,
        'slug' => true,
        'description' => true,
        'branch' => true,
        'terms' => true
    ];
}
