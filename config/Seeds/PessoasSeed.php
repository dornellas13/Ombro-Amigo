<?php
use Migrations\AbstractSeed;

/**
 * Pessoas seed.
 */
class PessoasSeed extends AbstractSeed
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
                'nome_razao_social' => 'Marcos Dornellas',
                'telefone' => '111111',
                'celular' => '111111',
                'endereco_id' => '1',
            ],
            [
                'id' => '2',
                'nome_razao_social' => 'Diego Henrique',
                'telefone' => '11111',
                'celular' => '11111',
                'endereco_id' => '2',
            ],
            [
                'id' => '3',
                'nome_razao_social' => 'Felipe Piconi',
                'telefone' => '11111',
                'celular' => '11111',
                'endereco_id' => '3',
            ],
        ];

        $table = $this->table('pessoas');
        $table->insert($data)->save();
    }
}
