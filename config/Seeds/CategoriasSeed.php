<?php
use Migrations\AbstractSeed;

/**
 * Categorias seed.
 */
class CategoriasSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'nome' => 'Alimentos',
                'flg_ativo' => true
            ],
            [
                'id' => '2',
                'nome' => 'Roupas',
                'flg_ativo' => true
            ],
            [
                'id' => '3',
                'nome' => 'Outros',
                'flg_ativo' => true
            ],
        ];

        $table = $this->table('categorias');
        $table->insert($data)->save();
    }
}
