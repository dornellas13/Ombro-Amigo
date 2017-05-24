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
                ['action' => 'delete', $solicitaco->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $solicitaco->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Solicitacoes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="solicitacoes form large-9 medium-8 columns content">
    <?= $this->Form->create($solicitaco) ?>
    <fieldset>
        <legend><?= __('Edit Solicitaco') ?></legend>
        <?php
            echo $this->Form->control('pessoa_id', ['options' => $pessoas]);
            echo $this->Form->control('produto_id', ['options' => $produtos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
