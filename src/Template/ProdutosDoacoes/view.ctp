<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\ProdutosDoaco $produtosDoaco
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Produtos Doaco'), ['action' => 'edit', $produtosDoaco->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Produtos Doaco'), ['action' => 'delete', $produtosDoaco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produtosDoaco->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Produtos Doacoes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produtos Doaco'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="produtosDoacoes view large-9 medium-8 columns content">
    <h3><?= h($produtosDoaco->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($produtosDoaco->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categoria') ?></th>
            <td><?= $produtosDoaco->has('categoria') ? $this->Html->link($produtosDoaco->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $produtosDoaco->categoria->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($produtosDoaco->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantidade') ?></th>
            <td><?= $this->Number->format($produtosDoaco->quantidade) ?></td>
        </tr>
    </table>
</div>
