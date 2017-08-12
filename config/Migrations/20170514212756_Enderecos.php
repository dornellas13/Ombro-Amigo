<?php
use Migrations\AbstractMigration;

class Enderecos extends AbstractMigration
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
            $this->table('enderecos')
            ->addColumn('logradouro', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('bairro', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            -> addColumn('cep','string',[
                'default' => 'null',
                'limit' => 255,
                'null' => true
            ])
            ->addColumn('complemento', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('numero', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('cidade_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'cidade_id',
                ]
            )
             ->addForeignKey(
                'cidade_id',
                'cidades',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->create();
    }
}
