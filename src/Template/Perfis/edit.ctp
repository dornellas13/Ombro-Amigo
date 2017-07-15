<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $perfi->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $perfi->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Perfis'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="perfis form large-9 medium-8 columns content">
    <?= $this->Form->create($perfi) ?>
    <fieldset>
        <legend><?= __('Edit Perfi') ?></legend>
        <?php
            echo $this->Form->control('nome');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
