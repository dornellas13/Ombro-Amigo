<?php
/**
  * @var \App\View\AppView $this
  */    
        /* Renderização de scripts */
        echo $this->Html->script('App/solicitacoes.js');
?>

<div class="box-right">
    <div class="title">
        <h2>Solicitar Algo</h2>
    </div> 
   <?= $this->Form->create($solicitacao,['class' => 'col s12','id' => 'formSolicitacao']) ?>
 
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group is-empty">
          <?= $this->Form->control('descricao',['class' => 'form-control','type' => 'text','escape' => false,"maxlength"=>70])?>
        <span class="material-input"></span></div>
      </div>
      <div class="col-sm-6">
        <div class="form-group is-empty">
           <?= $this->Form->control('quantidade',['class' => 'validate form-control','type' => 'number',"maxlength"=>10])?>
        <span class="material-input"></span></div>
      </div>
      <div class="col-sm-6">
        <div class="form-group is-empty">
           <?= $this->Form->select('categoria_id',$categorias,['class' => 'validate form-control','type' => 'text','empty' => 'Selecione uma categoria'])?>
        <span class="material-input"></span></div>
      </div>
    
    </div>
    <div class="row">
      <?=$this->Html->Link('Voltar',['controller' => 'sedes','action' => 'index'],['class' => 'btn btn-primary'])?>
       <?= $this->Form->button('Salvar <i class="material-icons right">send</i>',['class' => 'btn btn-primary','id' => 'salvar_sede','type' => 'submit']) ?>
    
    </div> 
 
  <?= $this->Form->end()?>
</div>


<?php
/**
  * @var \App\View\AppView $this
  */
    echo $this->Html->script('App/enderecos.js');
    echo $this->Html->script('App/users.js');
?>




