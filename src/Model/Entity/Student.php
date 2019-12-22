<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Student Entity
 *
 * @property int $id
 * @property string $firstName
 * @property string $lastName
 * @property string $nationalCode
 * @property string|null $image
 * @property string|null $mobile
 * @property int|null $code
 * @property string|null $token
 *
 * @property \App\Model\Entity\Notification[] $notifications
 * @property \App\Model\Entity\Request[] $requests
 * @property \App\Model\Entity\Score[] $scores
 * @property \App\Model\Entity\StudentClassroom[] $student_classroom
 */
class Student extends Entity
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
        'nationalCode' => true,
        'image' => true,
        'mobile' => true,
        'code' => true,
        'token' => true,
        'notifications' => true,
        'requests' => true,
        'scores' => true,
        'student_classroom' => true
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
