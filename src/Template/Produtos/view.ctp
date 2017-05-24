<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Produto'), ['action' => 'edit', $produto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Produto'), ['action' => 'delete', $produto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Produtos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Doacoes'), ['controller' => 'Doacoes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doaco'), ['controller' => 'Doacoes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Solicitacoes'), ['controller' => 'Solicitacoes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Solicitaco'), ['controller' => 'Solicitacoes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="produtos view large-9 medium-8 columns content">
    <h3><?= h($produto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($produto->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categoria') ?></th>
            <td><?= $produto->has('categoria') ? $this->Html->link($produto->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $produto->categoria->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($produto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantidade') ?></th>
            <td><?= $this->Number->format($produto->quantidade) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Doacoes') ?></h4>
        <?php if (!empty($produto->doacoes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Pessoa Id') ?></th>
                <th scope="col"><?= __('Produto Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($produto->doacoes as $doacoes): ?>
            <tr>
                <td><?= h($doacoes->id) ?></td>
                <td><?= h($doacoes->created) ?></td>
                <td><?= h($doacoes->pessoa_id) ?></td>
                <td><?= h($doacoes->produto_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Doacoes', 'action' => 'view', $doacoes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Doacoes', 'action' => 'edit', $doacoes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Doacoes', 'action' => 'delete', $doacoes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doacoes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Solicitacoes') ?></h4>
        <?php if (!empty($produto->solicitacoes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Pessoa Id') ?></th>
                <th scope="col"><?= __('Produto Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($produto->solicitacoes as $solicitacoes): ?>
            <tr>
                <td><?= h($solicitacoes->id) ?></td>
                <td><?= h($solicitacoes->created) ?></td>
                <td><?= h($solicitacoes->pessoa_id) ?></td>
                <td><?= h($solicitacoes->produto_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Solicitacoes', 'action' => 'view', $solicitacoes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Solicitacoes', 'action' => 'edit', $solicitacoes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Solicitacoes', 'action' => 'delete', $solicitacoes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $solicitacoes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
