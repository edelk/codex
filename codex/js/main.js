$(document).ready(function($){

//GRÁFICO CHART.JS
//$.getJSON ( "(/ajax/grafico)", function( response ) {

	var ctx = $("#myChart");
	var myChart = new Chart(ctx, {
	    type: 'bar',
	    data: {
	        labels: ["TOTAL BOLSAS", "TOTAL PROJETOS", "TOTAL BOLSISTAS"],
	        //labels: response.titulo,
	        datasets: [{
	            label: 'Indicadores de Extensão',
	            data: [38000.00, 2, 89],
	            //data: response.valores,
	            backgroundColor: [
	                'rgba(255, 99, 132, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(255, 206, 86, 0.2)'

	            ],
	            borderColor: [
	                'rgba(255,99,132,1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(255, 206, 86, 1)'
	            ],
	            borderWidth: 1
	        }]
	    },
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        }
	    }
	});

});



// Configuração do JQuery DataTable
	$('#datatable').dataTable({
		"aoConlumnDefs":[
			{"aTargets" : [ 0 ]}
		],
		"aaSorting": [['0', 'asc']],
		"aLeengthMenu": [
		[20, 50, 100, -1],
		[20, 50, 100, "All"]
		],
		"iDisplayLength": 20,
	})
//Fim do JQuery DataTable

//Mascaras com JQuery MaskedInput
//$("input[name=data_inicio").mask("99/99/9999");
//$("input[name=data_fim").mask("99/99/9999");
//$("input[name=data_entrada").mask("99/99/9999");
//$("input[name=data_saida").mask("99/99/9999");
//$("input[name=mes").mask("99/9999");
$("input[name=telefone").mask("(99) 9999-9999");
$("input[name=cep").mask("99999-999");
$("input[name=cpf").mask("999.999.999-99");
