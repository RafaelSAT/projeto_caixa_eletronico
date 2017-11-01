function historico(){	
	
	history.pushState('data','titulo','principal');
	
	var id = $("#idConta").val();	
	
	$.ajax({
		type:'POST',
		url:'http://projeto_caixa_eletronico.pc/models/Historico.php',
		cache: false,
		data:{id:id},
		dataType: "json",		
		success:function(json){				
				
				for(var i = 0; i < json.length; i++){

					if(json[i].tipo == 1){
						$('tbody').append('<tr class="deposito">'
						+ '<td>' + json[i].data_operacao + '</td>'
						+ '<td>Deposito de R$ ' + json[i].valor + ' reais</td>'
						+ '</tr>');
					}else{
						$('tbody').append('<tr class="saque">'
						+ '<td>' + json[i].data_operacao + '</td>'
						+ '<td>Saque de R$ ' + json[i].valor + ' reais</td>'
						+ '</tr>');
					}
				}			
		}
	});
}