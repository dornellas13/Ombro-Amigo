<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sede'), ['action' => 'edit', $sede->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sede'), ['action' => 'delete', $sede->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sede->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sedes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sede'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Enderecos'), ['controller' => 'Enderecos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Endereco'), ['controller' => 'Enderecos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sedes view large-9 medium-8 columns content">
    <h3><?= h($sede->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Telefone') ?></th>
            <td><?= h($sede->telefone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Endereco') ?></th>
            <td><?= $sede->has('endereco') ? $this->Html->link($sede->endereco->id, ['controller' => 'Enderecos', 'action' => 'view', $sede->endereco->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sede->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= $this->Number->format($sede->nome) ?></td>
        </tr>
    </table>
</div>
