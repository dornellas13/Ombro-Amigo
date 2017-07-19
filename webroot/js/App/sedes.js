$(document).ready(function(){
	sedes.CarregaEventosForm();
	sedes.CarregaValidacaoForm();
	       
});

function Sedes(){}

Sedes.prototype = {
	constructor: Sedes,
	PreencheComboBox:function(data,id_elemento,msg){
		var html = "<option value=''>"+msg+"</option>";
		if(data.processar){
			$.each(data.arrayComboBox,function(valor,nome){
				html += "<option value='"+valor+"'>"+nome+"</option>";
			});
		}
		$(id_elemento).html(html);
		$(id_elemento).prop('disabled',false);
	},
	GetEstadoByPais: function(id_pais){
		var url = commonJs.baseUrl.concat('sedes/getEstadoByPais/'.concat(id_pais));
		$.get(url, function(data, status){
			sedes.PreencheComboBox(data,"#select_estado","Selecione um estado");
			$("#select_cidade").empty();
			$("#select_cidade").html('<option value="">Selecione uma cidade</option>');
		 });
	},
	GetCidadeByEstado: function(id_estado){
		var url = commonJs.baseUrl.concat('sedes/getCidadeByEstado/'.concat(id_estado));
		$.get(url, function(data, status){
				sedes.PreencheComboBox(data,"#select_cidade","Selecione uma cidade");
		 });
	},
	CarregaEventosForm: function(){
		// // Configurção de select2.
		// 	$("#select_pais").select2({placeholder:"Selecione um país",language:"pt-BR",allowClear: true});
		// 	$("#select_estado").select2({placeholder:"Selecione um estado",language:"pt-BR",allowClear: true});
		// 	$("#select_cidade").select2({placeholder:"Selecione uma cidade",language:"pt-BR",allowClear: true});
		// Eventos 
			$("#select_pais").change(function(){
				sedes.GetEstadoByPais(this.value);
			});

			$("#select_estado").change(function(){
				sedes.GetCidadeByEstado(this.value);
			});

	},
	CarregaValidacaoForm: function(){

		$("#formSede").validate({
			rules: {
				nome: "required",
				telefone: "required",
				select_pais:"required",
				select_cidade:"required",
				select_estado: "required",
				'endereco[cep]':"required",
				'endereco[cidade][estado][pais_id]':'required'
			},
			messages: {
				nome: "Por favor informe seu nome",
				telefone: "Por favor informe um telefone",
				'endereco[cep]':"Por favor informe um cep",
				'endereco[cidade][estado][pais_id]':'Por favor selecione um país',
				'endereco[cidade][estado_id]': 'Por favor selecione um estado',
				'endereco[cidade_id]': 'Por favor selecione uma cidade'

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
