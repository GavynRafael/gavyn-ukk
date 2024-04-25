<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Photo Entity
 *
 * @property int $id
 * @property string $photo
 * @property string $title
 * @property string|null $description
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 * @property int $user_id
 * @property int $album_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Album $album
 * @property \App\Model\Entity\Coment[] $coments
 * @property \App\Model\Entity\Like[] $likes
 */
class Photo extends Entity
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
        'photo' => true,
        'title' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'album_id' => true,
        'user' => true,
        'album' => true,
        'coments' => true,
        'likes' => true,
    ];
}
