<?php
use Migrations\AbstractSeed;

/**
 * Enderecos seed.
 */
class EnderecosSeed extends AbstractSeed
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
                'logradouro' => 'Carlos Backstron',
                'bairro' => 'Jardim Santa Rita',
                'cep' => '13871090',
                'complemento' => NULL,
                'numero' => '378',
                'cidade_id' => '5256',
            ],
            [
                'id' => '2',
                'logradouro' => 'Jardim das flores',
                'bairro' => 'Santo Antonio',
                'cep' => '13871090',
                'complemento' => NULL,
                'numero' => '111',
                'cidade_id' => '4878',
            ],
            [
                'id' => '3',
                'logradouro' => 'Jardim dos lagos',
                'bairro' => 'Rosário',
                'cep' => '13871090',
                'complemento' => NULL,
                'numero' => '378',
                'cidade_id' => '5256',
            ],
            [
                'id' => '4',
                'logradouro' => 'Largo Engenheiro Paulo de Almeida Sandeville',
                'cep' => '13870377',
                'bairro' => 'Vila Westin ',
                'complemento' => NULL,
                'numero' => '15',
                'cidade_id' => '5256',
            ],
        ];

        $table = $this->table('enderecos');
        $table->insert($data)->save();
    }
}
