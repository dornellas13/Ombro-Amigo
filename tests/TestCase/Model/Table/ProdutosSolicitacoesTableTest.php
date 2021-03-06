<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProdutosSolicitacoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProdutosSolicitacoesTable Test Case
 */
class ProdutosSolicitacoesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProdutosSolicitacoesTable
     */
    public $ProdutosSolicitacoes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.produtos_solicitacoes',
        'app.categorias',
        'app.produtos',
        'app.doacoes',
        'app.pessoas',
        'app.enderecos',
        'app.cidades',
        'app.estados',
        'app.pais',
        'app.sedes',
        'app.solicitacoes',
        'app.users',
        'app.perfis'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProdutosSolicitacoes') ? [] : ['className' => ProdutosSolicitacoesTable::class];
        $this->ProdutosSolicitacoes = TableRegistry::get('ProdutosSolicitacoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProdutosSolicitacoes);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
