<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PerfisFuncionalidades Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Funcionalidades
 * @property \Cake\ORM\Association\BelongsTo $Perfis
 *
 * @method \App\Model\Entity\PerfisFuncionalidade get($primaryKey, $options = [])
 * @method \App\Model\Entity\PerfisFuncionalidade newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PerfisFuncionalidade[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PerfisFuncionalidade|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PerfisFuncionalidade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PerfisFuncionalidade[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PerfisFuncionalidade findOrCreate($search, callable $callback = null, $options = [])
 */
class PerfisFuncionalidadesTable extends Table
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

        $this->setTable('perfis_funcionalidades');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Funcionalidades', [
            'foreignKey' => 'funcionalidade_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Perfis', [
            'foreignKey' => 'perfil_id',
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
        $rules->add($rules->existsIn(['funcionalidade_id'], 'Funcionalidades'));
        $rules->add($rules->existsIn(['perfil_id'], 'Perfis'));

        return $rules;
    }
}
