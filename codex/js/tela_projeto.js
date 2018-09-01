$(document).ready(function(){
	$('#btnAdicionar').click(function(){
		adicionar();
	});

var cont = 0;

	function adicionar(){
		idnome = $("#idnome").val();
		idunidade = $("#idunidade").val();
		idedital = $("#idedital").val();
		idarea = $("#idarea").val();
		idcoordenador = $("#idcoordenador").val();
		data_inicio = $("#data_inicio").val();
		data_fim = $("#data_fim").val();
		idaluno = $("#idaluno").val();
		aluno = $("#idaluno option:selected").text();
		data_entrada = $("#data_entrada").val();
		data_saida = $("#data_saida").val();

		if(idnome != "" && idunidade != "" && idedital != "" && idarea != "" && idcoordenador != "" && data_inicio != ""  && idaluno != "" && data_entrada != ""){
			var linha = '<tr class="selected" id="linha'+cont+'"><td><input type="hidden" name="idaluno[]" value="'+idaluno+'">'+aluno+'</td> <td><input type="text" name="data_entrada[]" value="'+data_entrada+'"></td> <td><input type="text" name="data_saida[]" value="'+data_saida+'"></td><td><button type="button" class="btn btn-warning" onclick="apagar('+cont+');">Remover</button></td></tr>'
			cont++;
			$("#alunos").append(linha);
		}else{
			alert("Erro ao inserir os alunos, preencha os campos corretamente!");
		}
	}

});

function apagar(index){
	$("#linha" + index).remove();
}

function deleteRow(i){
    document.getElementById('linha').deleteRow(i)
}



