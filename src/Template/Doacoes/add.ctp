<?php
/**
  * @var \App\View\AppView $this
  */    
        /* Renderização de scripts */
        echo $this->Html->script('App/doacoes.js');

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
            
            <p>Cadastro de Doações</p>

          </div>
          
        </div>
      </nav>
    </div>
    <?= $this->Form->create($doacao,['class' => 'col s12','id' => 'formDoacao']) ?>
      <div class="row">

        <div class="col-sm-12">
          <div class="form-group is-empty">
             <?= $this->Form->control('descricao',['class' => 'form-control','type' => 'text','escape' => false,"maxlength"=>70])?>
          <span class="material-input"></span></div>
        </div>

        <div class="col-sm-12">
          <div class="form-group is-empty">
             <?= $this->Form->control('quantidade',['class' => 'validate form-control','type' => 'number'])?>
          <span class="material-input"></span></div>
        </div>

        <div class="col-sm-12">
          <div class="form-group is-empty">
            <label>Categoria</label>
             <?= $this->Form->select('categoria_id',$categorias,['class' => 'validate form-control','type' => 'text','empty' => 'Selecione uma categoria'])?>
             <?= $this->Form->control('nome_categoria',['type' => 'hidden']); ?>
          <span class="material-input"></span></div>
        </div>

      </div>

     
      <div class="row">
        <?=$this->Html->Link('Voltar',['controller' => 'doacoes','action' => 'index'],['class' => 'btn btn-primary'])?>
         <?= $this->Form->button('Salvar <i class="material-icons right">send</i>',['class' => 'btn btn-primary','id' => 'salvar_doacao','type' => 'submit']) ?>
      
      </div> 
   
    <?= $this->Form->end()?>
  </div>

</div>




