<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PhotosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PhotosTable Test Case
 */
class PhotosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PhotosTable
     */
    protected $Photos;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Photos',
        'app.Users',
        'app.Albums',
        'app.Coments',
        'app.Likes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Photos') ? [] : ['className' => PhotosTable::class];
        $this->Photos = $this->getTableLocator()->get('Photos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Photos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PhotosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PhotosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
