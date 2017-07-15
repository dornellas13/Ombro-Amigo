<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Doacoes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos Doacoes'), ['controller' => 'ProdutosDoacoes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produtos Doaco'), ['controller' => 'ProdutosDoacoes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="doacoes form large-9 medium-8 columns content">
    <?= $this->Form->create($doaco) ?>
    <fieldset>
        <legend><?= __('Add Doaco') ?></legend>
        <?php
            echo $this->Form->control('pessoa_id', ['options' => $pessoas]);
            echo $this->Form->control('produtos_doacoes_id', ['options' => $produtosDoacoes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
