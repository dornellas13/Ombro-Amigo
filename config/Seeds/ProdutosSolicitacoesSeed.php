<?php
use Migrations\AbstractSeed;

/**
 * Produtos seed.
 */
class ProdutosSolicitacoesSeed extends AbstractSeed
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
                'descricao' => 'Fubá',
                'quantidade' => '20',
                'categoria_id' => '1',
                'flg_ativo' => true

            ],
            [
                'id' => '2',
                'descricao' => 'Leite',
                'quantidade' => '20',
                'categoria_id' => '1',
                'flg_ativo' => true

            ],
            [
                'id' => '3',
                'descricao' => 'Óleo',
                'quantidade' => '20',
                'categoria_id' => '1',
                'flg_ativo' => true

            ],
            [
                'id' => '4',
                'descricao' => 'Macarrão',
                'quantidade' => '20',
                'categoria_id' => '1',
                'flg_ativo' => true

            ],
            [
                'id' => '5',
                'descricao' => 'Vinagre',
                'quantidade' => '20',
                'categoria_id' => '1',
                'flg_ativo' => true

            ],
            [
                'id' => '6',
                'descricao' => 'Sapato adidas',
                'quantidade' => '1',
                'categoria_id' => '2',
                'flg_ativo' => true

            ],
            [
                'id' => '7',
                'descricao' => 'Cobertor',
                'quantidade' => '1',
                'categoria_id' => '2',
                'flg_ativo' => true

            ],
            [
                'id' => '8',
                'descricao' => 'Cobertor azul',
                'quantidade' => '1',
                'categoria_id' => '2',
                'flg_ativo' => true

            ],
            [
                'id' => '9',
                'descricao' => 'Cobertor verde',
                'quantidade' => '1',
                'categoria_id' => '2',
                'flg_ativo' => true

            ],
            [
                'id' => '10',
                'descricao' => 'Jaqueta de frio',
                'quantidade' => '1',
                'categoria_id' => '2',
                'flg_ativo' => true

            ],
            [
                'id' => '11',
                'descricao' => 'Cesta básica',
                'quantidade' => '1',
                'categoria_id' => '1',
                'flg_ativo' => true

            ],
            [
                'id' => '12',
                'descricao' => 'Mochila preta adidas',
                'quantidade' => '1',
                'categoria_id' => '3',
                'flg_ativo' => true

            ],
            [
                'id' => '13',
                'descricao' => 'Bolsa',
                'quantidade' => '1',
                'categoria_id' => '3',
                'flg_ativo' => true

            ],
        ];

        $table = $this->table('produtos_solicitacoes');
        $table->insert($data)->save();
    }
}
