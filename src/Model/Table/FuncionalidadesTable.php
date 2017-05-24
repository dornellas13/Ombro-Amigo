<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Funcionalidades Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Funcionalidades
 * @property \Cake\ORM\Association\HasMany $Funcionalidades
 * @property \Cake\ORM\Association\BelongsToMany $Perfis
 *
 * @method \App\Model\Entity\Funcionalidade get($primaryKey, $options = [])
 * @method \App\Model\Entity\Funcionalidade newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Funcionalidade[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Funcionalidade|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Funcionalidade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Funcionalidade[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Funcionalidade findOrCreate($search, callable $callback = null, $options = [])
 */
class FuncionalidadesTable extends Table
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

        $this->setTable('funcionalidades');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Funcionalidades', [
            'foreignKey' => 'funcionalidade_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Funcionalidades', [
            'foreignKey' => 'funcionalidade_id'
        ]);        
        $this->belongsToMany('Perfis', [
            'foreignKey' => 'funcionalidade_id',
            'targetForeignKey' => 'perfi_id',
            'joinTable' => 'perfis_funcionalidades'
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
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->allowEmpty('controller');

        $validator
            ->allowEmpty('action');

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

        return $rules;
    }
}
