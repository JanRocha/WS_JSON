<html lang="PT-BR">
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
	
    <body>    
        <div
            <p>Este exemplo é para deletar um cadastro por vez, 
                    este serviço apagará apenas um por vez,
                    caso não passe o último paramentro não apagará.
            </p>
            <form method='POST' action='alunoDelete.php'>
                <label>Chave de acesso: </label>
                <input type="text" name='CHAVE' value='12345'>
                <input type="text" name='CODALUNO' value='' placeholder="">
                <input type='submit' name='deletaAlunos' value='Apagar aluno'></>
            </form>
        </div>
        <div style="border: 1px solid black;height: 300px">
            <?php
                if (isset($_POST['deletaAlunos'])){
                    //Consumindo meu web service                    
                    $arr['CHAVE']=$_POST['CHAVE'];   
                    $arr['CHAMADA']='DELETAALUNO'; 
                    $arr['CODALUNO'] = $_POST['CODALUNO']; 
                    $json = json_encode($arr);                    

                    //echo $json;
                    $url= "http://www.devjan.esy.es/ws/v1/?action=$json";
                    echo "     EXEMPO DE LINK PARA REQUISIÇÃO ".$url;
                    echo '<br><br>';                 

                    try {
                       $jsonData = file_get_contents($url);
                             echo $jsonData;
                    } catch (Exception $e) {
                            // Deal with it.
                            echo "Error: " . $e->getMessage();
                    }                
                }
            ?>
        </div>
        <a href='../index.php'>Principal</a>   
    </body>
</html>