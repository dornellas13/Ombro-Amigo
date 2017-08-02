<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="col s12 m4 l3" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Produtos Solicitacoes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produtosSolicitacoes form col s12 m4 l3">
    <?= $this->Form->create($produtosSolicitaco) ?>
    <fieldset>
        <legend><?= __('Adicionando Solicitação') ?></legend>
       <div class="input-field">
            <?= $this->Form->control('descricao',['label' => ['class' => 'validate', 'text' => 'Descrição']]);?>
        </div>
        <div class="input-field">
           <?= $this->Form->control('quantidade',['label' => ['class' => 'validate', 'text' => 'Quantidade']]);?> 
        </div>
        <div class="input">
           <?= $this->Form->control('categoria_id', ['options' => $categorias,'label' => ['class' => 'validate', 'text' => 'Categoria']]);?> 
        </div>
    </fieldset>
    <?= $this->Form->button((' <i class="large material-icons">done</i>'),['class' => 'btn-floating btn-large waves-effect waves-light']) ?>
    <?= $this->Form->end() ?>
</div>
