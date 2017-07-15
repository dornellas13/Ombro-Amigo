<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SolicitacoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SolicitacoesTable Test Case
 */
class SolicitacoesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SolicitacoesTable
     */
    public $Solicitacoes;

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
        'app.produtos',
        'app.categorias',
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
        $config = TableRegistry::exists('Solicitacoes') ? [] : ['className' => SolicitacoesTable::class];
        $this->Solicitacoes = TableRegistry::get('Solicitacoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Solicitacoes);

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
