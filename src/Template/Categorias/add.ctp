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
        <h2>Cadastrar Categorias</h2>
    </div> 
  <?= $this->Form->create($categoria) ?>
    <div class="row">
      <div class ="col-sm-6">
        <div class="form-group is-empty">
            <?php
                echo $this->Form->control('nome',['class' => 'form-control', 'text' => 'Nome']);
            ?>
            <span class="material-input"></span>
        </div>
      </div>   
    </div>
    <div class="row">
      <?=$this->Html->Link('Voltar',['controller' => 'categorias','action' => 'index'],['class' => 'btn btn-primary'])?>
         <?= $this->Form->button(('Salvar <i class="material-icons right">send</i>'),['class' => 'btn btn-primary','id' => 'salvar_categoria','type' => 'submit']) ?>
    </div> 
 
  <?= $this->Form->end()?>
</div>










