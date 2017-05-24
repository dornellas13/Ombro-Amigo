<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PessoasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PessoasTable Test Case
 */
class PessoasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PessoasTable
     */
    public $Pessoas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pessoas',
        'app.enderecos',
        'app.cidades',
        'app.estados',
        'app.pais',
        'app.sedes',
        'app.doacoes',
        'app.produtos',
        'app.solicitacoes',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Pessoas') ? [] : ['className' => 'App\Model\Table\PessoasTable'];
        $this->Pessoas = TableRegistry::get('Pessoas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pessoas);

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
