<html lang="PT-BR">
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
    
    <div
        <p>Este exemplo é para atualização de um cadastro por vez, 
            este serviço atualiza apenas um por vez,
            caso não passe o último paramentro não atualizará.
        </p>
         
        <form method='POST' action='alunoUpdate.php'>
            <label>Chave de acesso: </label>
            <input type="text" name='CHAVE' value='12345'>
            <label> Nome: </label>
            <input type="text" name='NOMEALUNO' value='' placeholder="">
            <label>Senha: </label>
            <input type="text" name='SENHAALUNO' value='' placeholder="">
            <label>ID: </label>
            <input type="text" name='CODALUNO' value='' placeholder="">
            <input type='submit' name='updateAluno' value='Atualizar alunos'></>
        </form>
    </div>
    <div style="border: 1px solid black;height: 300px">
        <?php
            if (isset($_POST['updateAluno'])){
                //Consumindo meu web service                    
                $arr['CHAVE']=$_POST['CHAVE'];                 
                $arr['CHAMADA']='UPDATEALUNO'; 
                $arr['NOMEALUNO'] = $_POST['NOMEALUNO']; 
                $arr['SENHAALUNO'] = $_POST['SENHAALUNO']; 
                $arr['CODALUNO'] = $_POST['CODALUNO']; 
                $json = json_encode($arr);                    
                $json= str_replace(' ','+',$json);
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