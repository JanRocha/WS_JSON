<html lang="PT-BR">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
		<div>
			<form method='POST' action='cursosView.php'>
			<label>Chave de acesso</label>
			<input type="text" name='CHAVE' value='12345'>
				
			<input type='hidden' name='valor' value='{"LOGIN":"JAN","SENHA":1234}' >
			<input type='submit' name='getAlunos' value='Lista de alunos'></>
		</form>
    </div>
		<div style="border: 1px solid black;height: 300px">
			<?php
			if (isset($_POST['getAlunos'])){
				   
						//Consumindo meu web service
						
						$arr['CHAVE']=$_POST['CHAVE'];                 
						$arr['CHAMADA'] ='GETCURSOS';                   
						$json = json_encode($arr);
						
						
						//echo $json;
						$url= "http://devjan.ddns.net:1234/ws/v1/?action=$json";
						echo "     EXEMPO DE LINK PARA REQUISIÇÃO ".$url;
						echo '<br><br>';                 
					   
						try {
						   $jsonData = file_get_contents($url);
									echo $jsonData;
						} catch (Exception $e) {
							// Deal with it.
							echo "Error: " , $e->getMessage();
						}                
				}
				?>
		</div>
        <a href='../index.php'>Principal</a>   
	</body>	
</html>