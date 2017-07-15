<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProdutosDoacoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProdutosDoacoesTable Test Case
 */
class ProdutosDoacoesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProdutosDoacoesTable
     */
    public $ProdutosDoacoes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.produtos_doacoes',
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
        $config = TableRegistry::exists('ProdutosDoacoes') ? [] : ['className' => ProdutosDoacoesTable::class];
        $this->ProdutosDoacoes = TableRegistry::get('ProdutosDoacoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProdutosDoacoes);

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
