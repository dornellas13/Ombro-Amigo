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
				'pessoa[nome_razao_social]': "required"
			},
			messages: {
				username: 'O campo Email é obrigatório.',
				password: 'O campo Senha é obrigatório.',
				'pessoa[nome_razao_social]': "O campo Nome é obrigatório"

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
			},
			messages: {
				username: 'O campo Email é obrigatório.',
				password: 'O campo Senha é obrigatório.'

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
