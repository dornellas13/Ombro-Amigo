<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Doaco[]|\Cake\Collection\CollectionInterface $doacoes
  */
 echo $this->Html->script('App/doacoes.js');
?>
<div class="doacoes index large-9 medium-8 columns content">
    <h3><?= __('Doacoes') ?></h3>
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
            <?php foreach ($doacoes as $doaco):?>
            <tr>
                <td><?= h($doaco->descricao) ?></td>
                <td><?= $this->Number->format($doaco->quantidade) ?></td>
                <td><?= $doaco->categoria['nome'] ?></td>
                <td><?= h($doaco->created) ?></td>
                <td class="actions">
                     <?= $this->Html->link('<i class="material-icons">mode_edit</i>', ['action' => 'edit', $doaco->id],['rel'=>"tooltip" ,'title'=>"Editar",'class' => 'btn-floating tooltipped blue','escape' => false])?>
                    <?= $this->Form->postLink('<i class="material-icons">delete</i>', ['action' => 'delete', $doaco->id], ['rel'=>"tooltip" ,'title'=>"Excluir",'class' => 'btn-floating tooltipped red','escape' => false,'confirm' =>'Tem certeza de que deseja excluir este registro?',]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
