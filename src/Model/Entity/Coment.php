<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Coment Entity
 *
 * @property int $id
 * @property string $coment
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 * @property int $user_id
 * @property int $photo_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Photo $photo
 */
class Coment extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'coment' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'photo_id' => true,
        'user' => true,
        'photo' => true,
    ];
}
