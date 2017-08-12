<?php
/**
  * @var \App\View\AppView $this
  */
         /* Renderização de scripts */
        echo $this->Html->script('App/enderecos.js');
        echo $this->Html->script('App/sedes.js');
        echo $this->Html->css('demo.css');
?>
<div class="box-container">
<div class="box-left">

    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          
        </div>

        <div class="collapse navbar-collapse" id="example-navbar">
          <ul class="nav navbar-nav">
            <li><a href="#">HOME</a></li>
            <li><a href="#">PERFIL</a></li>
            <li><a href="#">DOAR</a></li>
            <li><a href="#">LISTA DE DOAÇÕES</a></li>
            <li><a href="#">RELATÓRIOS</a></li>
            <li><a href="#">LOGOUT</a></li>
            <!-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                <b class="caret"></b>
              </a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li class="dropdown-header">Dropdown header</li>
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
            </li> -->
          </ul>
        </div>
      </div>
    </nav> 
  </div>
  <div class="box-right">
    <div class="row">
      <nav>
        <div class="navbar navbar-primary">

          <div class="navbar-brand">
            
            <p>Editar Solicitações</p>

          </div>
          
        </div>
      </nav>
    </div>
    <?= $this->Form->create($produtosSolicitaco) ?>
    <div class="row">
    <div class="col-sm-12">
         <div class="form-group is-empty">
            <?= $this->Form->control('descricao',['class' => 'form-control', 'text' => 'Descrição']);?>
             <span class="material-input"></span>
        </div>
    </div>
    <div class="col-sm-12">
         <div class="form-group is-empty">
             <?= $this->Form->control('quantidade',['class' => 'form-control', 'text' => 'Quantidade']);?>
             <span class="material-input"></span>
        </div>
    </div>
    <div class="col-sm-12">
         <div class="form-group is-empty">
             <?= $this->Form->control('categoria_id', ['class' => 'form-control browser-default validate ','options' => $categorias,]);?> 
             <span class="material-input"></span>
        </div>
    </div> 
    </div>
    <div class="row"> 
              <?=$this->Html->Link('Voltar',['controller' => 'produtosSolicitacoes','action' => 'index'],['class' => 'btn btn-primary'])?>
         <?= $this->Form->button('Salvar <i class="material-icons right">send</i>',['class' => 'btn btn-primary','id' => 'salvar_produtosDoacoes','type' => 'submit']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
</div>
