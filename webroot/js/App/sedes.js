$(document).ready(function(){
	$("#select_pais").select2({placeholder:"Selecione um país",language:"pt-BR",allowClear: true});
	$("#select_estado").select2({placeholder:"Selecione um estado",language:"pt-BR",allowClear: true});
	$("#select_cidade").select2({placeholder:"Selecione uma cidade",language:"pt-BR",allowClear: true});
	 $("#select_pais").change(function(){
	 	sedes.getEstadoByPais(this.value);
	 });

	 $("#select_estado").change(function(){
	 	sedes.getCidadeByEstado(this.value);
	 });

	 $("button[name='excluirSede']").click(function(){
	 	var id = this.dataset.id;
	 	$('#modal').modal('open');
	 	$(".modal-content").html('<h4>Deseja excluir está sede?</h4>');
	 	$(".modal-footer").html('<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>')
	 });

	 $('.modal').modal({
	      dismissible: true, // Modal can be dismissed by clicking outside of the modal
	      opacity: .5, // Opacity of modal background
	      inDuration: 300, // Transition in duration
	      outDuration: 200, // Transition out duration
	      startingTop: '30%', // Starting top style attribute
	      endingTop: '10%', // Ending top style attribute
	      ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
	        console.log(modal, trigger);
	      },
	      complete: function() { alert('Closed'); } // Callback for Modal close
    });

	       
});

function Sedes(){}

Sedes.prototype = {
	constructor: Sedes,
	preencheComboBox:function(data,id_elemento){
		var html = "<option value=''></option>";
		if(data.processar){
			$.each(data.arrayComboBox,function(valor,nome){
				html += "<option value='"+valor+"'>"+nome+"</option>";
			});
		}
		$(id_elemento).html(html);
		$(id_elemento).prop('disabled',false);
	},
	getEstadoByPais: function(id_pais){
		var url = commonJs.baseUrl.concat('sedes/getEstadoByPais/'.concat(id_pais));
		$.get(url, function(data, status){
			sedes.preencheComboBox(data,"#select_estado");
			$("#select_cidade").empty();
		 });
	},
	getCidadeByEstado: function(id_estado){
		var url = commonJs.baseUrl.concat('sedes/getCidadeByEstado/'.concat(id_estado));
		$.get(url, function(data, status){
				sedes.preencheComboBox(data,"#select_cidade");
		 });
	}
}

var sedes = new Sedes();