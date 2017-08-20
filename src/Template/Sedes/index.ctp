<?php
/**
  * @var \App\View\AppView $this
  */
echo $this->Html->script('App/sedes.js');


?>
<div class="row">
  <nav>
    <div class="nav-wrapper">
      <!-- <span class="brand-logo center">Sedes</span> -->
    </div>
  </nav>
</div>
<div class="sedes index large-9 medium-8 columns content">
    <table cellpadding="0" cellspacing="0" class="table" data-datatable="true">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                <th scope="col">Endereço</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>País</th>
                <th scope="col" class="actions">Ações</th>
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
                    <?= $this->Html->link('<i class="material-icons">mode_edit</i>', ['action' => 'edit', $sede->id],['rel'=>"tooltip" ,'title'=>"Editar",'class' => 'btn-floating tooltipped blue','escape' => false])?>
                    <?= $this->Form->postLink('<i class="material-icons">delete</i>', ['action' => 'delete', $sede->id], ['rel'=>"tooltip" ,'title'=>"Excluir",'class' => 'btn-floating tooltipped red','escape' => false,'confirm' =>'Tem certeza de que deseja excluir este registro?',]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   
</div>

