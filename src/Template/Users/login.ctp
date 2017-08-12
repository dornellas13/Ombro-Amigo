  
<?php
/**
* @var \App\View\AppView $this
*/
  echo $this->Html->script('App/enderecos.js');
  echo $this->Html->script('App/users.js');
?>
<div class="box-right">
<div class="row">
  <nav>
    <div class="navbar navbar-primary">

      <div class="navbar-brand">
        <p>Faça login para começar a sua sessão</p>
      </div>
      
    </div>
  </nav>
</div>
<?= $this->Form->create(null,['class' => 'col s12','id' => 'formUserLogin']) ?>
  <div class="row">
          <div class="form-group has-feedback">
              <?= $this->Form->input('username',['type' => 'email', 'class' => 'form-control' , 'placeholder' => 'Email' , 'label' => false, 'required' => true]) ?>
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
             <?= $this->Form->input('password',['type' => 'password','class' => 'form-control', 'placeholder' => 'Senha','label' => false,'required' => true])?>
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      </div>
      <div class="row">
         <?= $this->Form->button('Entrar <i class="material-icons right">send</i>',['class' => 'btn btn-primary','type' => 'submit']) ?>
      
      </div> 
    </div>

<?= $this->Form->end()?>


