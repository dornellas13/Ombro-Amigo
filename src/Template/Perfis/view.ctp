<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Perfi'), ['action' => 'edit', $perfi->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Perfi'), ['action' => 'delete', $perfi->id], ['confirm' => __('Are you sure you want to delete # {0}?', $perfi->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Perfis'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Perfi'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Funcionalidades'), ['controller' => 'Funcionalidades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Funcionalidade'), ['controller' => 'Funcionalidades', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="perfis view large-9 medium-8 columns content">
    <h3><?= h($perfi->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($perfi->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($perfi->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Funcionalidades') ?></h4>
        <?php if (!empty($perfi->funcionalidades)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('Controller') ?></th>
                <th scope="col"><?= __('Action') ?></th>
                <th scope="col"><?= __('Funcionalidade Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($perfi->funcionalidades as $funcionalidades): ?>
            <tr>
                <td><?= h($funcionalidades->id) ?></td>
                <td><?= h($funcionalidades->nome) ?></td>
                <td><?= h($funcionalidades->controller) ?></td>
                <td><?= h($funcionalidades->action) ?></td>
                <td><?= h($funcionalidades->funcionalidade_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Funcionalidades', 'action' => 'view', $funcionalidades->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Funcionalidades', 'action' => 'edit', $funcionalidades->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Funcionalidades', 'action' => 'delete', $funcionalidades->id], ['confirm' => __('Are you sure you want to delete # {0}?', $funcionalidades->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
