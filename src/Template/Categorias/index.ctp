<?php
/**
  * @var \App\View\AppView $this
  */
 echo $this->Html->script('App/categorias.js');

?>
<div class="categorias index col s12 m4 l3">
    <h3><?= __('Categorias') ?></h3>
    <table class="table" data-datatable="true">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria): ?>
            <tr>
                <td><?= h($categoria->nome) ?></td>
                <td class="actions">
                     <?= $this->Html->link('<i class="material-icons">mode_edit</i>', ['action' => 'edit', $categoria->id],['rel'=>"tooltip" ,'title'=>"Editar",'class' => 'btn-floating tooltipped blue','escape' => false])?>
                    <?= $this->Form->postLink('<i class="material-icons">delete</i>', ['action' => 'delete', $categoria->id], ['rel'=>"tooltip" ,'title'=>"Excluir",'class' => 'btn-floating tooltipped red','escape' => false,'confirm' =>'Tem certeza de que deseja excluir este registro?',]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
