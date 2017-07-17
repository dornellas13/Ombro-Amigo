<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sedes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Enderecos
 *
 * @method \App\Model\Entity\Sede get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sede newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sede[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sede|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sede patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sede[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sede findOrCreate($search, callable $callback = null, $options = [])
 */
class SedesTable extends Table
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

        $this->setTable('sedes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Enderecos', [
            'foreignKey' => 'endereco_id',
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
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->requirePresence('telefone', 'create')
            ->notEmpty('telefone');

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
        $rules->add($rules->existsIn(['endereco_id'], 'Enderecos'));

        return $rules;
    }
}
