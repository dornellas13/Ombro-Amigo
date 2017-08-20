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
 <!-- Renderizar navbar -->
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
            
            <p>Cadastro das sedes</p>

          </div>
          
        </div>
      </nav>
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

</div>

