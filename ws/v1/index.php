<?php		 
if (isset($_GET['action'])){
    $CALL = urldecode($_GET['action']);
    $CALLDecode = json_decode($CALL);
   
    include_once './class/alunos.class.php';
    
    if ($CALLDecode->CHAVE =='12345'){
        switch ($CALLDecode->CHAMADA) {
            case "GETALUNOS":                
                $alunos = new alunos();
                if(isset($CALLDecode->PARAM))
                $alunos->setParam($CALLDecode->PARAM);    
                 echo $alunos->getAlunos();
                break;
                
            case "CRIARALUNO":
                $alunos = new alunos();
                
                if(isset($CALLDecode->NOMEALUNO))
                   $alunos->setNomeAluno($CALLDecode->NOMEALUNO); 
                
                if(isset($CALLDecode->SENHAALUNO))
                   $alunos->setSenhaAluno($CALLDecode->SENHAALUNO);
               
                if ($alunos->salvar()>0)
                    echo '{"RETORNO":"SUCESSO", "CODIGO":"'.$alunos->getnovoCodigo().'"}';
                else
                    echo '{"RETORNO":"NÃO CADASTADO"}';
                break;
            case "UPDATEALUNO":    
                $alunos = new alunos($CALLDecode->CODALUNO);
                if(isset($CALLDecode->NOMEALUNO))
                   $alunos->setNomeAluno($CALLDecode->NOMEALUNO); 
                
                if(isset($CALLDecode->SENHAALUNO))
                   $alunos->setSenhaAluno($CALLDecode->SENHAALUNO);
                if ($alunos->salvar()>0)
                    echo '{"RETORNO":"ATUALIZADO COM SUCESSO"}';
                else
                    echo '{"RETORNO":"NÃO ATUALIZADO"}';
                break;
            case "DELETAALUNO":
                $alunos = new alunos();
                if ($alunos->deletarAluno($CALLDecode->CODALUNO))
                    echo '{"RETORNO":"SUCESSO","CODIGO":"'.$CALLDecode->CODALUNO.'"}';
                else
                    echo'{"RETORNO":"NÃO DELETADO","CODIGO":"'.$CALLDecode->CODALUNO.'"}';               
                break;
            case "GETCURSOS":
                include './class/cursos.class.php';
                $cursos = new cursos();            
                echo $cursos->getCursos();
                break;
            case "CRIARCURSO":
                include './class/cursos.class.php';
                $cursos = new cursos(); 
                $cursos->setDescricao($_POST[$CALLDecode->DESCRICAO]);
                if ($cursos->salvar()){
                    echo '{"RETORNO":"SUCESSO", "CODIGO":"'.$cursos->getNovoCodigo().'"}';
                }else{
                    echo '{"RETORNO":"NÃO CADASTADO"}';
                }
                break;
            case "UPDATECURSOS":
                break;
            case "DELETECURSOS":
                break;
            case "GETPERIODOS":
                include './class/periodos.class.php';
                $periodo = new periodos();            
                echo $periodo->getPeriodos();
                break;
            case "UPDATEPERIODOS":
                break;
            case "DELETEPERIODOS":
                break;
            case "GETREGISTROS":
                include './class/registros.class.php';
                $registos = new registros();
                echo $registos->getRegistos();
                break;
            case "UPDATEREGISTROS":
                break;
            case "DELETEREGISTROS":
                break;
            default:
                echo 'A chamada '. $CALLDecode->CHAMADA .' não foi encontrada';
                break;
        }
        
        
    }
    
}