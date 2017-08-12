<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\ProdutosDoaco[]|\Cake\Collection\CollectionInterface $produtosDoacoes
  */
?>
<nav class="col s12 m4 l3" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Produtos Doaco'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produtosDoacoes index col s12 m4 l3">
    <h3><?= __('Doações') ?></h3>
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
            <?php foreach ($produtosDoacoes as $produtosDoaco): ?>
            <tr>
                <td><?= $this->Number->format($produtosDoaco->id) ?></td>
                <td><?= h($produtosDoaco->descricao) ?></td>
                <td><?= $this->Number->format($produtosDoaco->quantidade) ?></td>
                <td><?= $produtosDoaco->has('categoria') ? $this->Html->link($produtosDoaco->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $produtosDoaco->categoria->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $produtosDoaco->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $produtosDoaco->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $produtosDoaco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produtosDoaco->id)]) ?>
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
