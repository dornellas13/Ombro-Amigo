<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Doaco[]|\Cake\Collection\CollectionInterface $solicitacoes
  */
?>
<div class="doacoes index large-9 medium-8 columns content">
    <h3><?= __('Solicitacões') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table" data-datatable="true">
        <thead>
            <tr>
                <th scope="col">Descrição</th>
                <th scope="col">Quantidade</th>
                <th>Categoria</th>
                <th scope="col">Criação</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($solicitacoes as $solicitacao): ?>
            <tr>
                <td><?= h($solicitacao->descricao) ?></td>
                <td><?= $this->Number->format($solicitacao->quantidade) ?></td>
                <td><?= $solicitacao->categoria['nome'] ?></td>
                <td><?= h($solicitacao->created) ?></td>
                <td class="actions">
                     <?= $this->Html->link('<i class="material-icons">mode_edit</i>', ['action' => 'edit', $solicitacao->id],['rel'=>"tooltip" ,'title'=>"Editar",'class' => 'btn-floating tooltipped blue','escape' => false])?>
                    <?= $this->Form->postLink('<i class="material-icons">delete</i>', ['action' => 'delete', $solicitacao->id], ['rel'=>"tooltip" ,'title'=>"Excluir",'class' => 'btn-floating tooltipped red','escape' => false,'confirm' =>'Tem certeza de que deseja excluir este registro?',]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
