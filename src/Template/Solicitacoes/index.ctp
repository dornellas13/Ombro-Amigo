<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Solicitaco[]|\Cake\Collection\CollectionInterface $solicitacoes
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Solicitaco'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos Solicitacoes'), ['controller' => 'ProdutosSolicitacoes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produtos Solicitaco'), ['controller' => 'ProdutosSolicitacoes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="solicitacoes index large-9 medium-8 columns content">
    <h3><?= __('Solicitacoes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pessoa_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('produtos_solicitacoes_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($solicitacoes as $solicitaco): ?>
            <tr>
                <td><?= $this->Number->format($solicitaco->id) ?></td>
                <td><?= h($solicitaco->created) ?></td>
                <td><?= $solicitaco->has('pessoa') ? $this->Html->link($solicitaco->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $solicitaco->pessoa->id]) : '' ?></td>
                <td><?= $solicitaco->has('produtos_solicitaco') ? $this->Html->link($solicitaco->produtos_solicitaco->id, ['controller' => 'ProdutosSolicitacoes', 'action' => 'view', $solicitaco->produtos_solicitaco->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $solicitaco->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $solicitaco->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $solicitaco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $solicitaco->id)]) ?>
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
