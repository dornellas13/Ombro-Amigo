<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Solicitacoes Model
 *
 * @property \App\Model\Table\PessoasTable|\Cake\ORM\Association\BelongsTo $Pessoas
 * @property |\Cake\ORM\Association\BelongsTo $Categorias
 *
 * @method \App\Model\Entity\Solicitaco get($primaryKey, $options = [])
 * @method \App\Model\Entity\Solicitaco newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Solicitaco[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Solicitaco|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Solicitaco patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Solicitaco[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Solicitaco findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SolicitacoesTable extends Table
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

        $this->setTable('solicitacoes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Pessoas', [
            'foreignKey' => 'pessoa_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Categorias', [
            'foreignKey' => 'categoria_id',
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
            ->allowEmpty('descricao');

        $validator
            ->integer('quantidade')
            ->allowEmpty('quantidade');

        $validator
            ->boolean('flg_ativo')
            ->requirePresence('flg_ativo', 'create')
            ->notEmpty('flg_ativo');

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
        $rules->add($rules->existsIn(['pessoa_id'], 'Pessoas'));
        $rules->add($rules->existsIn(['categoria_id'], 'Categorias'));

        return $rules;
    }
}
