<?php

use Phinx\Migration\AbstractMigration;

class Solicitacoes extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $this->table('solicitacoes')
            ->addColumn('descricao', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('quantidade', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('flg_ativo', 'boolean', [
                'default' => true,
                'null' => false,
            ])
            ->addColumn('pessoa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('categoria_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
             ->addIndex(
                [
                    'pessoa_id',
                ]
            )
            ->addIndex(
                [
                    'categoria_id',
                ]
            )
            ->addForeignKey(
                'categoria_id',
                'categorias',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
             ->addForeignKey(
                'pessoa_id',
                'pessoas',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )->create();

    }
}
