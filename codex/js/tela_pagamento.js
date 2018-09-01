$(document).ready(function(){
	$('#btnAdicionarPagamento').click(function(){
		adicionarPagamento();
	});

var cont = 0;

	function adicionarPagamento(){
		tipo = $("#tipo").val();
		valor = $("#valor").val();
		data = $("#data").val();
		idaluno = $("#idaluno").val();
		aluno = $("#idaluno option:selected").text();

		if(tipo != "" && valor != "" && data != ""  && idaluno != ""){
			var linha = '<tr class="selected" id="linha'+cont+'"><td><input type="hidden" name="idaluno[]" value="'+idaluno+'">'+aluno+'</td> <td><input type="text" name="data[]" value="'+data+'"></td> <td><input type="text" name="valor[]" value="'+valor+'"></td> <td><button type="button" class="btn btn-warning" onclick="apagar('+cont+');">Remover</button></td></tr>'
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



