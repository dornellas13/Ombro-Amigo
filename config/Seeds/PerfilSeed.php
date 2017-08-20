<?php
use Migrations\AbstractSeed;

/**
 * Perfil seed.
 */
class PerfilSeed extends AbstractSeed
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
        $data = ['id' => '1','nome' => 'Comum','flg_ativo' => true];

        $table = $this->table('perfis');
        $table->insert($data)->save();
    }
}
