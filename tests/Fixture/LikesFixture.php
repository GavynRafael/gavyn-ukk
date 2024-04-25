<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LikesFixture
 */
class LikesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'created' => '2024-04-24 01:34:48',
                'modified' => '2024-04-24 01:34:48',
                'user_id' => 1,
                'photo_id' => 1,
            ],
        ];
        parent::init();
    }
}
