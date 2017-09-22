<<<<<<< HEAD

<div class="section text-center section-landing">


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="text-center title">Conheça nosso trabalho</h2>
            <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="info">
                <div class="icon icon-primary">
                    <i class="material-icons">chat</i>
                </div>
                <h4 class="info-title">First Feature</h4>
                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info">
                <div class="icon icon-success">
                    <i class="material-icons">verified_user</i>
                </div>
                <h4 class="info-title">Second Feature</h4>
                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info">
                <div class="icon icon-danger">
                    <i class="material-icons">fingerprint</i>
                </div>
                <h4 class="info-title">Third Feature</h4>
                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
            </div>
        </div>
    </div>



    <br />
    <hr>


    <canvas id="myChart" width="400" height="100"></canvas>
    <script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
            datasets: [{
                label: 'Doações 2017',
                data: [12, 19, 3, 5, 2, 3,7,5,33,1,2,2],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Alguns são felizes pelo que carregam no bolso, outros pelo que tem no coração. Obrigado!'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
    </script>

</div>
=======
<?php
      echo $this->Html->script('App/home.js');
?>
<div class="row">
    <div class="col-md-12">
        <canvas id="GraficoDoacoes" width="400" height="125"></canvas>    
    </div>
</div>
>>>>>>> c6dd341789ce93434218a00785a999e2be232ae3
