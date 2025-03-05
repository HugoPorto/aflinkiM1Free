<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StoresContacts Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\StoresContact get($primaryKey, $options = [])
 * @method \App\Model\Entity\StoresContact newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StoresContact[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StoresContact|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StoresContact patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StoresContact[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StoresContact findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StoresContactsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->setTable('stores_contacts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');
        $validator
            ->scalar('contact')
            ->maxLength('contact', 150)
            ->requirePresence('contact', 'create')
            ->notEmpty('contact');
        $validator
            ->scalar('title')
            ->maxLength('title', 50)
            ->allowEmpty('title');
        $validator
            ->scalar('subtitle')
            ->maxLength('subtitle', 50)
            ->allowEmpty('subtitle');
        $validator
            ->scalar('locale')
            ->maxLength('locale', 150)
            ->allowEmpty('locale');
        $validator
            ->scalar('phone')
            ->maxLength('phone', 20)
            ->allowEmpty('phone');
        $validator
            ->scalar('cellphone')
            ->maxLength('cellphone', 20)
            ->allowEmpty('cellphone');
        $validator
            ->scalar('email')
            ->maxLength('email', 50)
            ->allowEmpty('email');
        $validator
            ->scalar('subemail')
            ->maxLength('subemail', 50)
            ->allowEmpty('subemail');
        $validator
            ->boolean('infoactive')
            ->allowEmpty('infoactive');

        $validator
            ->scalar('map')
            ->maxLength('map', 4294967295)
            ->allowEmpty('map');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['users_id'], 'Users'));
        return $rules;
    }
}
