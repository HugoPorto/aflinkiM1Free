<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tablesroot Entity
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $link
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Tablesroot extends Entity
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
        'title' => true,
        'text' => true,
        'link' => true,
        'created' => true,
        'modified' => true,
        'controller' => true,
        'action' => true
    ];
}
