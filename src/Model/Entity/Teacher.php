<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Teacher Entity
 *
 * @property int $id
 * @property string $firstName
 * @property string $lastName
 * @property string $mobile
 * @property string|null $description
 * @property string|null $image
 * @property string|null $slug
 * @property bool|null $home
 * @property int|null $code
 * @property string|null $token
 */
class Teacher extends Entity
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
        'firstName' => true,
        'lastName' => true,
        'mobile' => true,
        'description' => true,
        'image' => true,
        'slug' => true,
        'home' => true,
        'code' => true,
        'token' => true
    ];

    protected function _getFullName()
    {
        return $this->_properties['firstName'] . ' ' . $this->_properties['lastName'];
    }

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'token'
    ];
}
