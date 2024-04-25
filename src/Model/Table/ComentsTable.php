<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Coments Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\PhotosTable&\Cake\ORM\Association\BelongsTo $Photos
 *
 * @method \App\Model\Entity\Coment newEmptyEntity()
 * @method \App\Model\Entity\Coment newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Coment> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Coment get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Coment findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Coment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Coment> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Coment|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Coment saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Coment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Coment>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Coment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Coment> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Coment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Coment>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Coment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Coment> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ComentsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('coments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Photos', [
            'foreignKey' => 'photo_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('coment')
            ->requirePresence('coment', 'create')
            ->notEmptyString('coment');

        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('photo_id')
            ->notEmptyString('photo_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['photo_id'], 'Photos'), ['errorField' => 'photo_id']);

        return $rules;
    }
}
