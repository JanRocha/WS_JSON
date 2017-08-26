<html lang="PT-BR">
	 <head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
	<body>
    <div>
        <form method='POST' action='cursoCreate.php'>
        <label>Chave de acesso</label>
        <input type="text" name='CHAVE' value='12345'>
        <label> Descrição: </label>
        <input type="text" name='DESCRICAO' value='' placeholder="">    
        <input type='submit' name='criarAlunos' value='Criar alunos'></>
    </form>
    </div>
    <div style="border: 1px solid black;height: 300px">
        <?php
            if (isset($_POST['criarAlunos'])){
                //Consumindo meu web service

                $arr['CHAVE']=$_POST['CHAVE'];                 
                $arr['CHAMADA'] ='CRIARCURSO';                   
                $arr['DESCRICAO'] =$_POST['DESCRICAO'];                   
                $json = json_encode($arr);                   
                $json = json_encode($arr);                    
                $json= str_replace(' ','+',$json);
                //echo $json;
                $url= "http://devjan.esy.es/ws/v1/?action=$json";
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