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
                'null' => false,
            ])
            ->addColumn('bairro', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            -> addColumn('cep','string',[
                'default' => 'null',
                'limit' => 255,
                'null' => false
            ])
            ->addColumn('complemento', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('numero', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('cidade_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
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
