<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\ProdutosSolicitaco $produtosSolicitaco
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Produtos Solicitaco'), ['action' => 'edit', $produtosSolicitaco->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Produtos Solicitaco'), ['action' => 'delete', $produtosSolicitaco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produtosSolicitaco->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Produtos Solicitacoes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produtos Solicitaco'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="produtosSolicitacoes view large-9 medium-8 columns content">
    <h3><?= h($produtosSolicitaco->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($produtosSolicitaco->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categoria') ?></th>
            <td><?= $produtosSolicitaco->has('categoria') ? $this->Html->link($produtosSolicitaco->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $produtosSolicitaco->categoria->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($produtosSolicitaco->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantidade') ?></th>
            <td><?= $this->Number->format($produtosSolicitaco->quantidade) ?></td>
        </tr>
    </table>
</div>
