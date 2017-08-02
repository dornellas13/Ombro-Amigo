<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="col s12 m4 l3" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $categoria->id],
                ['confirm' => __('Você tem certeza que deseja excluir # {0}?', $categoria->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categorias form col s12 m4 l3">
    <?= $this->Form->create($categoria) ?>
    <fieldset>
        <legend><?= __('Editar Categoria') ?></legend>
         <div class="input-field">
        <?php
            echo $this->Form->control('Nome',['label' => ['class' => 'validate', 'text' => 'Nome']]);
        ?>
        </div>
    </fieldset>
    <?= $this->Form->button((' <i class="large material-icons">done</i>'),['class' => 'btn-floating btn-large waves-effect waves-light']) ?>
    <?= $this->Form->end() ?>
</div>
