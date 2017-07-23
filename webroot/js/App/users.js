$(document).ready(function(){
	enderecos.CarregaEventos();
	users.CarregaValidacaoAddForm();
	users.CarregaValidacaoLoginForm();
});

function Users(){}

Users.prototype = {
	constructor: Users,
	CarregaValidacaoAddForm: function(){

		$("#formUser").validate({
			rules: {
				'pessoa[nome_razao_social]': "required",
				// 'pessoa[telefone': "required",
				// 'pessoa[endereco][logradouro]':'required',
				// 'pessoa[endereco][bairro]':'required',
				// 'pessoa[endereco][numero]':'required',
				// 'pessoa[endereco][cep]':"required",
				// 'pessoa[endereco][cidade][estado][pais_id]':'required',
				// 'pessoa[endereco][cidade][estado_id]': 'required',
				// 'pessoa[endereco][cidade_id]':'required',
			},
			messages: {
				username: 'O campo Email é obrigatório.',
				password: 'O campo Senha é obrigatório.',
				'pessoa[nome_razao_social]': "O campo Nome é obrigatório",
				// 'pessoa[telefone': "Por favor informe um telefone",
				// 'pessoa[endereco][logradouro]':'Por favor informe um logradouro',
				// 'pessoa[endereco][bairro]':'Por favor informe um bairro',
				// 'pessoa[endereco][numero]':'Por favor informe um numero',
				// 'pessoa[endereco][cep]':"Por favor informe um cep",
				// 'pessoa[endereco][cidade][estado][pais_id]':'Por favor selecione um país',
				// 'pessoa[endereco][cidade][estado_id]': 'Por favor selecione um estado',
				// 'pessoa[endereco][cidade_id]': 'Por favor selecione uma cidade',
		

			},
			errorElement : 'div',
			       errorPlacement: function(error, element) {
			         var placement = $(element).data('error');
			         if (placement) {
			           $(placement).append(error)
			         } else {
			           error.insertAfter(element);
			         }
			}
		});

	},
	CarregaValidacaoLoginForm: function(){

		$("#formUserLogin").validate({
			rules: {
				'username': 'required',
				'password':'required'
				// 'pessoa[telefone': "required",
				// 'pessoa[endereco][logradouro]':'required',
				// 'pessoa[endereco][bairro]':'required',
				// 'pessoa[endereco][numero]':'required',
				// 'pessoa[endereco][cep]':"required",
				// 'pessoa[endereco][cidade][estado][pais_id]':'required',
				// 'pessoa[endereco][cidade][estado_id]': 'required',
				// 'pessoa[endereco][cidade_id]':'required',
			},
			messages: {
				username: 'O campo Email é obrigatório.',
				password: 'O campo Senha é obrigatório.'
				// 'pessoa[telefone': "Por favor informe um telefone",
				// 'pessoa[endereco][logradouro]':'Por favor informe um logradouro',
				// 'pessoa[endereco][bairro]':'Por favor informe um bairro',
				// 'pessoa[endereco][numero]':'Por favor informe um numero',
				// 'pessoa[endereco][cep]':"Por favor informe um cep",
				// 'pessoa[endereco][cidade][estado][pais_id]':'Por favor selecione um país',
				// 'pessoa[endereco][cidade][estado_id]': 'Por favor selecione um estado',
				// 'pessoa[endereco][cidade_id]': 'Por favor selecione uma cidade',
		

			},
			errorElement : 'div',
			       errorPlacement: function(error, element) {
			         var placement = $(element).data('error');
			         if (placement) {
			           $(placement).append(error)
			         } else {
			           error.insertAfter(element);
			         }
			}
		});

	}
}

var users = new Users();
