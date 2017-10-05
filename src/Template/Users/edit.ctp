  
<div class="box-right">
    <div class="title">
        <h2>Perfil</h2>
    </div> 
  
  <?= $this->Form->create($user,['class' => 'col s12','id' => 'formUser']) ?>
   <!--  <div class="row">
      <div class="togglebutton col-sm-6">
        <label>Deseja ser anônimo?</label>
        <label>
            <input type="checkbox" unchecked id="anonimato">
        </label>
      </div>
    </div> -->
    <div class="row">
      <div class="col-sm-5">
        <div class="form-group is-empty">
           <?=$this->Form->control('pessoa.nome_razao_social',['class' => 'form-control','type' => 'text','escape' => false,'label' => 'Nome'])?>
        <span class="material-input"></span></div>
      </div>
      
      <div class="col-sm-4">
        <div class="form-group is-empty">
           <?=$this->Form->control('username',['class' => 'form-control','type' => 'email','escape' => false,'label' => 'Email'])?>
        <span class="material-input"></span></div>
      </div>

      <div class="col-sm-3">
        <div class="form-group is-empty">
            <?= $this->Form->control('password',['class' => 'form-control','type' => 'password','label' => 'Senha'])?>
        <span class="material-input"></span></div>
      </div>
      <div class="col-sm-4">
        <div class="form-group is-empty">
           <?=$this->Form->control('pessoa.telefone',['class' => 'form-control','type' => 'text','escape' => false])?>
        <span class="material-input"></span></div>
      </div>
       <div class="col-sm-4">
        <div class="form-group is-empty">
           <?=$this->Form->control('pessoa.celular',['class' => 'form-control','type' => 'text','escape' => false])?>
        <span class="material-input"></span></div>
      </div>
      <div class="col-sm-4">
        <div class="form-group is-empty">
           <?= $this->Form->control('pessoa.endereco.cep',['class' => 'validate form-control','type' => 'text'])?>
        <span class="material-input"></span></div>
      </div>

      <div class="col-sm-6">
        <div class="form-group is-empty">
          <?=$this->Form->control('pessoa.endereco.logradouro', array('class' => 'validate form-control'));?>
        <span class="material-input"></span></div>
      </div>

      <div class="col-sm-4">
        <div class="form-group is-empty">
           <?=$this->Form->control('pessoa.endereco.bairro', array('class' => 'validate form-control'));?>
        <span class="material-input"></span></div>
      </div>

      <div class="col-sm-2">
        <div class="form-group is-empty">
           <?=$this->Form->control('pessoa.endereco.numero', array('class' => 'validate form-control'));?>
        <span class="material-input"></span></div>
      </div>

      <div class="col-sm-10">
        <div class="form-group is-empty">
           <?=$this->Form->control('pessoa.endereco.complemento', array('class' => 'validate form-control'));?>
        <span class="material-input"></span></div>
      </div>
    </div>

    <div class="row">

      <div class="col-sm-4">
        <div class="form-group is-empty">
        <label>País</label>
          <?=$this->Form->select('pessoa.endereco.cidade.estado.pais_id', $pais, ['class' => 'form-control browser-default validate','id' => 'select_pais','label' => false,'empty' => 'Selecione um país']);
          ?>
        <span class="material-input"></span></div>
      </div>

      <div class="col-sm-4">
        <div class="form-group is-empty">
          <label>Estado</label>
          <?=$this->Form->select('pessoa.endereco.cidade.estado_id',$estados,['class' => 'form-control browser-default validate','id' => 'select_estado','disabled' => false,'empty' => 'Selecione um estado']);
          ?>
        <span class="material-input"></span></div>
      </div>

      <div class="col-sm-4">
        <div class="form-group is-empty">
          <label>Cidade</label>
           <?=$this->Form->select('pessoa.endereco.cidade_id', $cidades, ['class' => ' form-control browser-default validate','id' => 'select_cidade','disabled' => false,'empty' => 'Selecione uma cidade']);
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

<?php
/**
  * @var \App\View\AppView $this
  */
    echo $this->Html->script('App/enderecos.js');
    echo $this->Html->script('App/users.js');
?>
