<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PerfisFuncionalidadesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PerfisFuncionalidadesTable Test Case
 */
class PerfisFuncionalidadesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PerfisFuncionalidadesTable
     */
    public $PerfisFuncionalidades;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.perfis_funcionalidades',
        'app.funcionalidades',
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
        $config = TableRegistry::exists('PerfisFuncionalidades') ? [] : ['className' => 'App\Model\Table\PerfisFuncionalidadesTable'];
        $this->PerfisFuncionalidades = TableRegistry::get('PerfisFuncionalidades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PerfisFuncionalidades);

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
