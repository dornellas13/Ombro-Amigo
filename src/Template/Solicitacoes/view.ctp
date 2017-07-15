<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Solicitaco $solicitaco
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Solicitaco'), ['action' => 'edit', $solicitaco->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Solicitaco'), ['action' => 'delete', $solicitaco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $solicitaco->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Solicitacoes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Solicitaco'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produtos Solicitacoes'), ['controller' => 'ProdutosSolicitacoes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produtos Solicitaco'), ['controller' => 'ProdutosSolicitacoes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="solicitacoes view large-9 medium-8 columns content">
    <h3><?= h($solicitaco->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pessoa') ?></th>
            <td><?= $solicitaco->has('pessoa') ? $this->Html->link($solicitaco->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $solicitaco->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Produtos Solicitaco') ?></th>
            <td><?= $solicitaco->has('produtos_solicitaco') ? $this->Html->link($solicitaco->produtos_solicitaco->id, ['controller' => 'ProdutosSolicitacoes', 'action' => 'view', $solicitaco->produtos_solicitaco->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($solicitaco->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($solicitaco->created) ?></td>
        </tr>
    </table>
</div>
