function Enderecos(){}
Enderecos.prototype = {
	constructor: Enderecos,
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
		var url = commonJs.baseUrl.concat('enderecos/getEstadoByPais/'.concat(id_pais));
		$.get(url, function(data, status){
			enderecos.PreencheComboBox(data,"#select_estado","Selecione um estado");
			$("#select_cidade").empty();
			$("#select_cidade").html('<option value="">Selecione uma cidade</option>');
		 });
	},
	GetCidadeByEstado: function(id_estado){
		var url = commonJs.baseUrl.concat('enderecos/getCidadeByEstado/'.concat(id_estado));
		$.get(url, function(data, status){
				enderecos.PreencheComboBox(data,"#select_cidade","Selecione uma cidade");
		 });
	},
	CarregaEventos: function(){
		// // Configurção de select2.
		// 	$("#select_pais").select2({placeholder:"Selecione um país",language:"pt-BR",allowClear: true});
		// 	$("#select_estado").select2({placeholder:"Selecione um estado",language:"pt-BR",allowClear: true});
		// 	$("#select_cidade").select2({placeholder:"Selecione uma cidade",language:"pt-BR",allowClear: true});
		// Eventos 
			$("#select_pais").change(function(){
				enderecos.GetEstadoByPais(this.value);
			});

			$("#select_estado").change(function(){
				enderecos.GetCidadeByEstado(this.value);
			});

	},
}
var enderecos = new Enderecos();