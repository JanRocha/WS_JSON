<?php
include_once 'conexao.class.php';

class alunos {
    private $param ="";
    PUBLIC $nomeAluno;
    private $senhaAluno ="";
    private $codAluno ="";
    private $cnn="";
    private $SQL = "";

    public function __construct($CODALUNO = "") {
        $this->cnn = new conexao();
        
        $this->SQL = "SELECT * FROM alunos WHERE CODALUNO = '".$CODALUNO."'";
        //echo  $this->SQL;
        $result = $this->cnn->Conexao()->prepare($this->SQL);
        $result->execute();
        if($result->rowCount()>=1){
            while ($row =$result->fetch(PDO::FETCH_OBJ)){
                $this->nomeAluno = $row->NOMEALUNO;
                $this->senhaAluno = $row->SENHAALUNO;
                $this->codAluno = $row->CODALUNO;
            }
        }else{
            $this->codAluno= '-1';
        }
      
    }
    
    public function setNomeAluno($nomeAluno){
      $this->nomeAluno=$nomeAluno;
    }
    public function setSenhaAluno($senhaAluno){
        $this->senhaAluno=$senhaAluno;
    }

    public function getAlunos() {        
        $in='';
        if($this->param <>''){          
            foreach ($this->param as $key => $value) {
            $in.= "'$value'," ; 
            }            
            $size = strlen($in);
            $in = substr($in, 0,-1);   
            $where = " WHERE CODALUNO IN($in)";    
        }else
            $where='';        
         
        $result= $this->cnn->Conexao()->prepare("SELECT * FROM alunos ".$where);
		 $result->execute();
		 
        //resut set alimentado para retornar o json
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $tr[] = $row;
        }
        return json_encode($tr, true);
    }
    public function setParam($param){
        if ($param<>'')
            $this->param = explode(',',$param);
        else
            $this->param = '';
    }
    
    public function salvar() {
        if ($this->codAluno == '-1'){
           
            $this->getCodigoAluno();
            $this->SQL = "INSERT INTO alunos VALUES('$this->codAluno','$this->nomeAluno','$this->senhaAluno')";
            //  echo $this->SQL;
            $result = $this->cnn->Conexao()->prepare($this->SQL);
            $result->execute();
        }else{
            $this->SQL = "UPDATE  alunos SET NOMEALUNO = '$this->nomeAluno', SENHAALUNO='$this->senhaAluno' WHERE CODALUNO='$this->codAluno'";
            $result = $this->cnn->Conexao()->prepare($this->SQL);
            $result->execute();
        }        
            return $result->rowCount();
    }
    private function getCodigoAluno(){
         $result= $this->cnn->Conexao()->prepare("SELECT CODALUNO FROM alunos  ORDER BY CODALUNO DESC LIMIT 1 ");
		 $result->execute();
		 
        //resut set alimentado para retornar o json
        while($row = $result->fetch(PDO::FETCH_OBJ)){
            $codigo= $row;
        }
       
        $codigo = str_pad((int)substr($codigo->CODALUNO, 1)+1, 4, '0', STR_PAD_LEFT);
        $this->codAluno = 'A'. $codigo;
    }
    public function getnovoCodigo(){
        return $this->codAluno;
    }
    public function deletarAluno($codAluno) {
        $result= $this->cnn->Conexao()->prepare("DELETE FROM alunos WHERE CODALUNO = '".$codAluno."'");
        $result->execute();
        if ($result->rowCount()>0)
            return true;
        else        
             return false;
        
    }
    
}
