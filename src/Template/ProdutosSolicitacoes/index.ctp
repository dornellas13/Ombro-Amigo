<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\ProdutosSolicitaco[]|\Cake\Collection\CollectionInterface $produtosSolicitacoes
  */
?>
<nav class="col s12 m4 l3" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Produtos Solicitaco'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produtosSolicitacoes index col s12 m4 l3">
    <h3><?= __('Solicitações') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descricao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantidade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categoria_id') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtosSolicitacoes as $produtosSolicitaco): ?>
            <tr>
                <td><?= $this->Number->format($produtosSolicitaco->id) ?></td>
                <td><?= h($produtosSolicitaco->descricao) ?></td>
                <td><?= $this->Number->format($produtosSolicitaco->quantidade) ?></td>
                <td><?= $produtosSolicitaco->has('categoria') ? $this->Html->link($produtosSolicitaco->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $produtosSolicitaco->categoria->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $produtosSolicitaco->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $produtosSolicitaco->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $produtosSolicitaco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produtosSolicitaco->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
