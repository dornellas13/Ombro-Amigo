<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Doaco'), ['action' => 'edit', $doaco->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Doaco'), ['action' => 'delete', $doaco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doaco->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Doacoes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doaco'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="doacoes view large-9 medium-8 columns content">
    <h3><?= h($doaco->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pessoa') ?></th>
            <td><?= $doaco->has('pessoa') ? $this->Html->link($doaco->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $doaco->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Produto') ?></th>
            <td><?= $doaco->has('produto') ? $this->Html->link($doaco->produto->id, ['controller' => 'Produtos', 'action' => 'view', $doaco->produto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($doaco->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($doaco->created) ?></td>
        </tr>
    </table>
</div>
