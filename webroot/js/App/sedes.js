$(document).ready(function(){
	enderecos.CarregaEventos();
	sedes.CarregaValidacaoForm();
});

function Sedes(){}

Sedes.prototype = {
	constructor: Sedes,
	CarregaValidacaoForm: function(){

		$("#formSede").validate({
			rules: {
				nome: "required",
				telefone: "required",
				'endereco[logradouro]':'required',
				'endereco[bairro]':'required',
				'endereco[numero]':'required',
				'endereco[cep]':"required",
				'endereco[cidade][estado][pais_id]':'required',
				'endereco[cidade][estado_id]': 'required',
				'endereco[cidade_id]':'required',
			},
			messages: {
				nome: "O campo Nome é obrigatório",
				telefone: "O campo Telefone é obrigatório",
				'endereco[logradouro]':'O campo Logradouro é obrigatório',
				'endereco[bairro]':'O campo Bairro é obrigatório',
				'endereco[numero]':'O campo Número é obrigatório',
				'endereco[cep]':"O campo Cep é obrigatório",
				'endereco[cidade][estado][pais_id]':'Por favor selecione um país',
				'endereco[cidade][estado_id]': 'Por favor selecione um estado',
				'endereco[cidade_id]': 'Por favor selecione uma cidade',
		

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

var sedes = new Sedes();
