<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class StoresMenusTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('stores_menus');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('StoresCourses', [
            'foreignKey' => 'stores_courses_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('menu')
            ->maxLength('menu', 255)
            ->requirePresence('menu', 'create')
            ->notEmpty('menu');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['stores_courses_id'], 'StoresCourses'));
        $rules->add($rules->existsIn(['users_id'], 'Users'));

        return $rules;
    }
}
