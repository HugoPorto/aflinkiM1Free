<?php

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class CoursesDownloadsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('courses_downloads');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('StoresCourses', [
            'foreignKey' => 'stores_courses_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('StoresVideos', [
            'foreignKey' => 'stores_videos_id',
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
            ->scalar('link')
            ->maxLength('link', 255)
            ->requirePresence('link', 'create')
            ->notEmpty('link');

        $validator
            ->scalar('description')
            ->maxLength('description', 4294967295)
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['stores_courses_id'], 'StoresCourses'));
        $rules->add($rules->existsIn(['stores_videos_id'], 'StoresVideos'));
        $rules->add($rules->existsIn(['users_id'], 'Users'));

        return $rules;
    }
}
