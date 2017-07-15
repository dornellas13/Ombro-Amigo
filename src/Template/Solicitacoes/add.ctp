<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Solicitacoes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos Solicitacoes'), ['controller' => 'ProdutosSolicitacoes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produtos Solicitaco'), ['controller' => 'ProdutosSolicitacoes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="solicitacoes form large-9 medium-8 columns content">
    <?= $this->Form->create($solicitaco) ?>
    <fieldset>
        <legend><?= __('Add Solicitaco') ?></legend>
        <?php
            echo $this->Form->control('pessoa_id', ['options' => $pessoas]);
            echo $this->Form->control('produtos_solicitacoes_id', ['options' => $produtosSolicitacoes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
