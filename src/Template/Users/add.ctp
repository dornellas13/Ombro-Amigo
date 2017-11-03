

<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
  <div class="card card-signup">

    <?= $this->Form->create(null,['class' => ' form', 'id' => 'formUserLogin']) ?>

    
      <div class="header header-primary text-center">
        <h4>CADASTRO</h4>
      </div>
      <?= $this->Flash->render() ?>
      <p class="text-divider">Bem vindo ao time.</p>
      <div class="content">

        <div class="input-group">
          <span class="input-group-addon">
            <i class="material-icons">face</i>
          </span>
          <?=$this->Form->control('pessoa.nome_razao_social',['class' => 'form-control','type' => 'text', 'placeholder' => 'Nome','escape' => false,'label' => false])?>
        </div>

        <div class="input-group">
          <span class="input-group-addon">
            <i class="material-icons">email</i>
          </span>
          <?= $this->Form->input('username',['type' => 'email', 'class' => 'form-control' , 'placeholder' => 'E-mail' , 'label' => false, 'required' => true]) ?>
          
        </div>

        <div class="input-group">
          <span class="input-group-addon">
            <i class="material-icons">lock_outline</i>
          </span>
           <?= $this->Form->input('password',['type' => 'password','class' => 'form-control', 'placeholder' => '*****','label' => false,'required' => true])?>
          
        </div>

        <!-- If you want to add a checkbox to this form, uncomment this code

        <div class="checkbox">
          <label>
            <input type="checkbox" name="optionsCheckboxes" checked>
            Subscribe to newsletter
          </label>
        </div> -->
      </div>
      <div class="footer text-center">
        <button type="submit" class="btn btn-simple btn-primary btn-lg">REGISTRAR</button>
      </div>
    
    
    <?= $this->Form->end()?>
  </div>
</div>

