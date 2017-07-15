<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $produtosSolicitaco->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $produtosSolicitaco->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Produtos Solicitacoes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produtosSolicitacoes form large-9 medium-8 columns content">
    <?= $this->Form->create($produtosSolicitaco) ?>
    <fieldset>
        <legend><?= __('Edit Produtos Solicitaco') ?></legend>
        <?php
            echo $this->Form->control('descricao');
            echo $this->Form->control('quantidade');
            echo $this->Form->control('categoria_id', ['options' => $categorias]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
