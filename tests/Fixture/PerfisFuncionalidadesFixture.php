<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PerfisFuncionalidadesFixture
 *
 */
class PerfisFuncionalidadesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'funcionalidade_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'perfil_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'funcionalidade_id' => ['type' => 'index', 'columns' => ['funcionalidade_id'], 'length' => []],
            'perfil_id' => ['type' => 'index', 'columns' => ['perfil_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'perfis_funcionalidades_ibfk_1' => ['type' => 'foreign', 'columns' => ['funcionalidade_id'], 'references' => ['funcionalidades', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'perfis_funcionalidades_ibfk_2' => ['type' => 'foreign', 'columns' => ['perfil_id'], 'references' => ['perfis', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'funcionalidade_id' => 1,
            'perfil_id' => 1
        ],
    ];
}
