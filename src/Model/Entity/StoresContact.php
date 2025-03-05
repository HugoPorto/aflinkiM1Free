<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StoresContact Entity
 *
 * @property int $id
 * @property string $contact
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $users_id
 *
 * @property \App\Model\Entity\User $user
 */
class StoresContact extends Entity
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
        'contact' => true,
        'created' => true,
        'modified' => true,
        'users_id' => true,
        'user' => true,
        'title' => true,
        'subtitle' => true,
        'locale' => true,
        'phone' => true,
        'cellphone' => true,
        'email' => true,
        'subemail' => true,
        'infoactive' => true,
        'map' => true
    ];
}
