<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Game Entity
 *
 * @property int $id
 * @property string $guid
 * @property string $email
 * @property string $outline
 * @property string $players
 * @property string $matches
 * @property string $game
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Game extends Entity
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
        'guid' => true,
        'email' => true,
        'outline' => true,
        'players' => true,
        'matches' => true,
        'game' => true,
        'created' => true,
        'modified' => true,
    ];
}
