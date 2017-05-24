<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Perfis Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Funcionalidades
 *
 * @method \App\Model\Entity\Perfi get($primaryKey, $options = [])
 * @method \App\Model\Entity\Perfi newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Perfi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Perfi|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Perfi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Perfi[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Perfi findOrCreate($search, callable $callback = null, $options = [])
 */
class PerfisTable extends Table
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

        $this->setTable('perfis');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Funcionalidades', [
            'foreignKey' => 'perfi_id',
            'targetForeignKey' => 'funcionalidade_id',
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

        return $validator;
    }
}
