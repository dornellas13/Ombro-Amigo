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
                ['action' => 'delete', $sede->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sede->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sedes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Enderecos'), ['controller' => 'Enderecos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Endereco'), ['controller' => 'Enderecos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sedes form large-9 medium-8 columns content">
    <?= $this->Form->create($sede) ?>
    <fieldset>
        <legend><?= __('Edit Sede') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('telefone');
            echo $this->Form->control('endereco_id', ['options' => $enderecos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
