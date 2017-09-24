<?php
 echo $this->Html->script('App/timeline.js');
?>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-nav-tabs">
                <div class="header header-primary">
                  	<div class="title">
        	<h3 class="text-center" style="color:white"><i class="fa fa-gift"></i> Solicitações Cadastradas</h3>
            </div>
                </div>
                <div class="content">
                    <div class="tab-content text-center">
                        <table class="table table-bordered" data-datatable="timeline">
                        	<thead>
                        		<th>Descrição</th>
                        		<th>Quantidade</th>
                        		<th>Categoria</th>
                        		<th>Solicitante</th>
                        		<th>Criação</th>
                        	</thead>
                        	<tbody>
                            	<?php foreach ($solicitacoes as $solicitacao): ?>
                            	<tr>
                            	    <td><?= h($solicitacao->descricao) ?></td>
                            	    <td><?= $this->Number->format($solicitacao->quantidade) ?></td>
                            	    <td><?= $solicitacao->categoria['nome'] ?></td>
                            	    <td><?= $solicitacao->pessoa['nome'] ?></td>
                            	    <td><?= h($solicitacao->created) ?></td>
									
                            	</tr>
                            	<?php endforeach; ?>
                        	</tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                
                <div class="card card-nav-tabs">
                    <div class="header header-primary">
                      	<div class="title">
            	<h3 class="text-center" style="color:white"><i class="fa fa-heart"></i> Doações Cadastradas</h3>
                </div>
                    </div>
                    <div class="content">
                        <div class="tab-content text-center">
                              <table class="table table-bordered" data-datatable="timeline">
                        	<thead>
                        		<th>Descrição</th>
                        		<th>Quantidade</th>
                        		<th>Categoria</th>
                        		<th>Doador</th>
                        		<th>Criação</th>
                        	</thead>
                        	<tbody>
                            	<?php foreach ($doacoes as $doacao): ?>
                            	<tr>
                            	    <td><?= h($doacao->descricao) ?></td>
                            	    <td><?= $this->Number->format($doacao->quantidade) ?></td>
                            	    <td><?= $doacao->categoria['nome'] ?></td>
                            	    <td><?= $doacao->pessoa['nome'] ?></td>
                            	    <td><?= h($doacao->created) ?></td>
									
                            	</tr>
                            	<?php endforeach; ?>
                        	</tbody>
                        </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
            <div class="col-md-6">
            <div class="card card-nav-tabs">
                <div class="header header-primary">
                  	<div class="title">
        	<h3 class="text-center" style="color:white">Exemplo</h3>
            </div>
                </div>
                <div class="content">
                    <div class="tab-content text-center">
                        <canvas id="teste" width="10" height="10"></canvas>
                        </div>
                    </div>
                </div>
            </div>
           
            </div>
        </div>
        </div>
    </div>
<script>
var oilCanvas = document.getElementById("teste");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;

var oilData = {
    labels: [
        "Doações",
        "Solicitações"
    ],
    datasets: [
        {
            data: [10,30],
            backgroundColor: [
                "#FF6384",
                "#63FF84",
            ]
        }]
};

var pieChart = new Chart(oilCanvas, {
  type: 'pie',
  data: oilData
});
</script>