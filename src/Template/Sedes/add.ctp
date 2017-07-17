<?php
/**
  * @var \App\View\AppView $this
  */    
        /* Renderização de scripts */

        echo $this->Html->script('App/sedes.js')
?>
<div class="row">
  <nav>
    <div class="nav-wrapper">
      <span class="brand-logo center">Cadastrar Sede</span>
    </div>
  </nav>
</div>
<div class="row">
    <?= $this->Form->create($sede,['class' => 'col s12']) ?>
      <div class="row">
        <div class="input-field col s6">
        <?= $this->Form->control('nome',['class' => '','type' => 'text','escape' => false])?>
        </div>
      <div class="input-field col s6">
        <?= $this->Form->control('telefone',['class' => 'validate','type' => 'text'])?>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s4">
             <?= $this->Form->control('endereco.cep',['class' => 'validate','type' => 'text'])?>
        </div>
        <div class="input-field col s8">
            <?=$this->Form->control('endereco.logradouro', array('class' => 'validate'));?>
        </div>
        <div class="input-field col s8">
            <?=$this->Form->control('endereco.bairro', array('class' => 'validate'));?>
        </div>
        <div class="input-field col s4">
            <?=$this->Form->control('endereco.numero', array('class' => 'validate'));?>
        </div>
        <div class="input-field col s12">
            <?=$this->Form->control('endereco.complemento', array('class' => 'validate'));?>
        </div>
        <div class="input-field col s4">
            <?=$this->Form->select('endereco.cidade.estado.pais_id', $pais, ['class' => 'browser-default validate','id' => 'select_pais','label' => false,'empty' => ' ']);
            ?>
        </div>

        <div class="input-field col s4">
            <?=$this->Form->select('endereco.cidade.estado_id',null,['class' => 'browser-default validate','id' => 'select_estado','disabled' => true]);
            ?>
        </div>

        <div class="input-field col s4">
             <?=$this->Form->select('endereco.cidade_id', null, ['class' => 'browser-default validate','id' => 'select_cidade','disabled' => true,'empty' => 'Selecione uma cidade']);
            ?>
        </div>

      </div>
      <div class="row">
        <?=$this->Html->Link('Voltar',['controller' => 'sedes','action' => 'index'],['class' => 'btn waves-effect waves-light'])?>
         <?= $this->Form->button('Salvar <i class="material-icons right">send</i>',['class' => 'btn waves-effect waves-light','id' => 'salvar_sede','type' => 'submit']) ?>
      
      </div> 
   
    <?= $this->Form->end()?>
</div>
