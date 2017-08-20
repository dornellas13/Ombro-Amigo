<?php
use Migrations\AbstractSeed;

/**
 * Usuarios seed.
 */
class UsuariosSeed extends AbstractSeed
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
        // password = 12345
        $data = [
            'username' => 'dornellas13@gmail.com',
            'password' => '$2y$10$J4cZzi/mxlV5FMl28UOKOeJLj9Iw98OsH4/CLqkOncF.R4.r4lo0W',
            'pessoa_id' => '1',
            'perfil_id' => '1',
            'flg_ativo' => true
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
