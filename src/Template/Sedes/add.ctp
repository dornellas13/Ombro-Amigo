<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="row">
    <?= $this->Form->create($sede,['class' => 'col s12']) ?>
      <div class="row">
        <div class="input-field col s6">
        <?= $this->Form->control('nome',['class' => 'validate','type' => 'text','id' => 'nome_sede'])?>
        </div>
          <div class="input-field col s6">
        <?= $this->Form->control('telefone',['class' => 'validate','type' => 'text','id' => 'nome_sede'])?>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s4">
             <?= $this->Form->control('Endereco.cep',['class' => 'validate','type' => 'text','id' => 'nome_sede'])?>
        </div>
            
        <div class="input-field col s8">
            <?php echo $this->Form->control('Endereco.logradouro', array('class' => 'validate'));?>
        </div>
        <div class="input-field col s8">
            <?php echo $this->Form->control('Endereco.bairro', array('class' => 'validate'));?>
        </div>
        <div class="input-field col s4">
            <?php echo $this->Form->control('Endereco.numero', array('class' => 'validate'));?>
        </div>
        <div class="input-field col s2">
            <?php echo $this->Form->control('Endereco.complemento', array('class' => 'validate'));?>
        </div>

        <div class="input-field col s10 browser-default">
            <?php echo $this->Form->control('Endereco.cidade_id',['options' => $cidades],['id' => 'select_cidades','multiple' => true]);
            ?>
        </div>
         <div class="input-field col s6">
            <?php echo $this->Form->control('Endereco.Cidade.estado_id',['options' => $estados],['id' => 'select_cidades','multiple' => true]);
            ?>
        </div>
         <div class="input-field col s6">
            <?php echo $this->Form->control('Endereco.Cidade.Estado.pais_id',['options' => $pais],['id' => 'select_cidades','multiple' => true]);
            ?>
        </div>
      </div>
      <div class="row">
         <?= $this->Form->button('Salvar <i class="material-icons right">send</i>',['class' => 'btn waves-effect waves-light','id' => 'salvar_sede','type' => 'submit']) ?>
      </div> 
   
    <?= $this->Form->end() ?>
</div>

<script type="text/javascript">
    $(document).ready(function() {
     $("#select_cidades").select2();
     $('select').material_select();
  });
</script>