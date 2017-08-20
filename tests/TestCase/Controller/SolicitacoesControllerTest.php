<?php
namespace App\Test\TestCase\Controller;

use App\Controller\SolicitacoesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\SolicitacoesController Test Case
 */
class SolicitacoesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.solicitacoes',
        'app.pessoas',
        'app.enderecos',
        'app.cidades',
        'app.estados',
        'app.pais',
        'app.sedes',
        'app.doacoes',
        'app.categorias',
        'app.produtos',
        'app.users',
        'app.perfis',
        'app.produtos_solicitacoes'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
