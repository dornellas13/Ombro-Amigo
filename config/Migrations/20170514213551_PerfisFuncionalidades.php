<?php
use Migrations\AbstractMigration;

class PerfisFuncionalidades extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {

        $this->table('perfis_funcionalidades')
            ->addColumn('funcionalidade_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('perfil_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'funcionalidade_id',
                ]
            )
            ->addIndex(
                [
                    'perfil_id',
                ]
            )
            ->addForeignKey(
                'funcionalidade_id',
                'funcionalidades',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'perfil_id',
                'perfis',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )

            ->create();

    }
}
