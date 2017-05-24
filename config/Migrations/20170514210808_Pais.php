<?php
use Migrations\AbstractMigration;

class Pais extends AbstractMigration
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
        $this->table('pais')
            ->addColumn('nome', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('sigla', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->create();
    }
}
