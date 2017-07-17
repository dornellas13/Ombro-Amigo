<?php
/**
  * @var \App\View\AppView $this
  */
echo $this->Html->script('App/sedes.js')
?>
<div class="row">
  <nav>
    <div class="nav-wrapper">
      <span class="brand-logo center">Sedes</span>
    </div>
  </nav>
</div>
<div class="sedes index large-9 medium-8 columns content">
    <table cellpadding="0" cellspacing="0" class="striped responsive-table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('endereco_id') ?></th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>País</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sedes as $sede):?>
            <tr>
                <td><?= $sede->nome?></td>
                <td><?= h($sede->telefone) ?></td>
                <td><?= $sede->has('endereco') ? $sede->endereco->logradouro.', '.$sede->endereco->bairro.', '.$sede->endereco->numero : '' ?></td>
                <td><?=$sede->endereco->cidade->nome?></td>
                <td><?=$sede->endereco->cidade->estado->nome?></td>
                <td><?=$sede->endereco->cidade->estado->pai->nome?></td>
                <td class="actions">
                    <?= $this->Form->button('<i class="material-icons">mode_edit</i>', ['data-position' => 'top','data-delay'=>'50','data-tooltip' =>'Editar','class' => 'btn-floating tooltipped blue','escape' => false],['action' => 'edit', $sede->id])?>
                    <?= $this->Form->button('<i class="material-icons">delete</i>', ['data-id' => $sede->id,'data-position' => 'top','data-delay'=>'50','data-tooltip' =>'Excluir','class' => 'btn-floating tooltipped red','escape' => false,'name' => 'excluirSede']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <!-- <?= $this->Paginator->first('<< ' . __('first')) ?> -->
            <?= $this->Paginator->prev('<i class="material-icons">chevron_left</i>',['escape' => false])?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('<i class="material-icons">chevron_right</i>',['escape' => false])?>
           <!--  <?= $this->Paginator->last(__('last') . ' >>') ?> -->
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

