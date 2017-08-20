<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DoacoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DoacoesTable Test Case
 */
class DoacoesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DoacoesTable
     */
    public $Doacoes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.doacoes',
        'app.pessoas',
        'app.enderecos',
        'app.cidades',
        'app.estados',
        'app.pais',
        'app.sedes',
        'app.solicitacoes',
        'app.produtos_solicitacoes',
        'app.categorias',
        'app.produtos',
        'app.users',
        'app.perfis',
        'app.produtos_doacoes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Doacoes') ? [] : ['className' => DoacoesTable::class];
        $this->Doacoes = TableRegistry::get('Doacoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Doacoes);

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
