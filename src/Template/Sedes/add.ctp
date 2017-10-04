<?php
/**
  * @var \App\View\AppView $this
  */    
        /* Renderização de scripts */
        echo $this->Html->script('App/enderecos.js');
        echo $this->Html->script('App/sedes.js');
        echo $this->Html->css('demo.css');
?>
<div class="box-right">
    <div class="title">
        <h2>Cadastrar Sede</h2>
    </div> 
    <?= $this->Form->create($sede,['class' => 'col s12','id' => 'formSede']) ?>
      <div class="row">


        <div class="col-sm-6">
          <div class="form-group is-empty">
             <?= $this->Form->control('nome',['class' => 'form-control','type' => 'text','escape' => false])?>
          <span class="material-input"></span></div>
        </div>

        <div class="col-sm-4">
          <div class="form-group is-empty">
             <?= $this->Form->control('telefone',['class' => 'validate form-control','type' => 'text'])?>
          <span class="material-input"></span></div>
        </div>

        <div class="col-sm-2">
          <div class="form-group is-empty">
             <?= $this->Form->control('endereco.cep',['class' => 'validate form-control','type' => 'text'])?>
          <span class="material-input"></span></div>
        </div>

        <div class="col-sm-4">
          <div class="form-group is-empty">
            <?=$this->Form->control('endereco.logradouro', array('class' => 'validate form-control'));?>
          <span class="material-input"></span></div>
        </div>

        <div class="col-sm-6">
          <div class="form-group is-empty">
             <?=$this->Form->control('endereco.bairro', array('class' => 'validate form-control'));?>
          <span class="material-input"></span></div>
        </div>

        <div class="col-sm-2">
          <div class="form-group is-empty">
             <?=$this->Form->control('endereco.numero', array('class' => 'validate form-control'));?>
          <span class="material-input"></span></div>
        </div>

        <div class="col-sm-12">
          <div class="form-group is-empty">
             <?=$this->Form->control('endereco.complemento', array('class' => 'validate form-control'));?>
          <span class="material-input"></span></div>
        </div>
      </div>

      <div class="row">

        <div class="col-sm-4">
          <div class="form-group is-empty">
          <label>País</label>
            <?=$this->Form->select('endereco.cidade.estado.pais_id', $pais, ['class' => 'form-control browser-default validate','id' => 'select_pais','label' => false,'empty' => 'Selecione um país']);
            ?>
          <span class="material-input"></span></div>
        </div>

        <div class="col-sm-4">
          <div class="form-group is-empty">
            <label>Estado</label>
            <?=$this->Form->select('endereco.cidade.estado_id',null,['class' => 'form-control browser-default validate','id' => 'select_estado','disabled' => false,'empty' => 'Selecione um estado']);
            ?>
          <span class="material-input"></span></div>
        </div>

        <div class="col-sm-4">
          <div class="form-group is-empty">
            <label>Cidade</label>
             <?=$this->Form->select('endereco.cidade_id', null, ['class' => ' form-control browser-default validate','id' => 'select_cidade','disabled' => false,'empty' => 'Selecione uma cidade']);
            ?>
          <span class="material-input"></span></div>
        </div>

      </div>
      <div class="row">
        <?=$this->Html->Link('Voltar',['controller' => 'sedes','action' => 'index'],['class' => 'btn btn-primary'])?>
         <?= $this->Form->button('Salvar <i class="material-icons right">send</i>',['class' => 'btn btn-primary','id' => 'salvar_sede','type' => 'submit']) ?>
      
      </div> 
   
    <?= $this->Form->end()?>
  </div>




