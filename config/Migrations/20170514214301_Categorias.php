<?php
use Migrations\AbstractMigration;

class Categorias extends AbstractMigration
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
            $this->table('categorias')
            ->addColumn('nome', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('flg_ativo', 'boolean', [
                'default' => true,
                'null' => false,
            ])
            ->create();

    }
}
