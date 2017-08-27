$(document).ready(function(){
	home.GetDadosGrafico();
});


function Home(){}

Home.prototype = {
	constructor: Home,
	GraficoDoacoes:null,
	GetDadosGrafico: function (){
		var url = commonJs.baseUrl.concat('home/GetDadosGrafico');
		$.get(url,function(result){
			home.ConstroiGrafico(result);
		});
	},
	ConstroiGrafico: function(dados){
		var ctx = document.getElementById("GraficoDoacoes").getContext('2d');
		 home.GraficoDoacoes = new Chart(ctx, {
		    type: 'line',
		    data: {
		        labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
		        datasets: [{
		            label: 'Doações 2017',
		            data: dados.doacoes,
		            backgroundColor: [
		                'rgba(156, 39, 176, 0.7)'
		            ],
		            borderColor: [
		                'rgba(156, 39, 176, 0.7)'
		            ],
		            borderWidth: 1
		        },{
		        	label: 'Solicitações 2017',
		            data: dados.solicitacoes,
		            backgroundColor: [
		                'rgba(103, 58, 183, 0.7'
		            ],
		            borderColor: [
		                'rgba(103, 58, 183, 0.7)',
		              
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
	}
}

var home = new Home();