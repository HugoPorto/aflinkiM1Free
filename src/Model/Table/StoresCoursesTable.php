<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class StoresCoursesTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('stores_courses');
        $this->setDisplayField('course');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('DigitalsCategories', [
            'foreignKey' => 'digitals_categories_id',
            'joinType' => 'INNER'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('course')
            ->maxLength('course', 255)
            ->requirePresence('course', 'create')
            ->notEmpty('course');

        $validator
            ->scalar('autor')
            ->maxLength('autor', 15)
            ->requirePresence('autor', 'create')
            ->notEmpty('autor');

        $validator
            ->scalar('theme')
            ->maxLength('theme', 150)
            ->requirePresence('theme', 'create')
            ->notEmpty('theme');

        $validator
            ->scalar('photo')
            ->maxLength('photo', 4294967295)
            ->requirePresence('photo', 'create')
            ->notEmpty('photo');

        $validator
            ->scalar('price')
            ->maxLength('price', 11)
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
            ->scalar('description')
            ->maxLength('description', 4294967295)
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');
        $validator
            ->scalar('subtitle')
            ->maxLength('subtitle', 150)
            ->allowEmpty('subtitle');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['users_id'], 'Users'));
        $rules->add($rules->existsIn(['digitals_categories_id'], 'DigitalsCategories'));

        return $rules;
    }
}
