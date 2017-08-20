<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Doaco $doaco
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
    </ul>
</nav>
<div class="doacoes view large-9 medium-8 columns content">
    <h3><?= h($doaco->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($doaco->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pessoa') ?></th>
            <td><?= $doaco->has('pessoa') ? $this->Html->link($doaco->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $doaco->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($doaco->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantidade') ?></th>
            <td><?= $this->Number->format($doaco->quantidade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categoria Id') ?></th>
            <td><?= $this->Number->format($doaco->categoria_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($doaco->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Flg Ativo') ?></th>
            <td><?= $doaco->flg_ativo ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
