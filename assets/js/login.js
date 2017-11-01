$(function(){
	$('#formLogin').on('submit', function(e){
		e.preventDefault();
		
		var agencia = $('input[name=agencia]').val();
		var conta = $('input[name=conta]').val();
		var senha = $('input[name=senhaLogin]').val();
		
		$.ajax({
			type:'POST',
			url:'http://projeto_caixa_eletronico.pc/models/Login.php',
			data:{agencia:agencia, conta:conta, senha:senha},
			cache:false,
			success:function(msg){				
				if(msg == 1){
					window.location.href = 'http://projeto_caixa_eletronico.pc/principal';
				}else{
					alert("Agencia, conta ou senha inválidos. Tente novamente");
				}
			},
			error:function(e){
				alert("ERRO ao conectar com banco de dados.".e);
			}
		});
		
	});
});