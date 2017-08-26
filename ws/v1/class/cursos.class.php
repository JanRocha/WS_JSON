<?php
include_once 'conexao.class.php';

class cursos {
    private $codCurso;
    private $descricao;
    private $param;
    private $SQL;
    private $cnn;
    public function setparam(){
        
    }
    
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function __construct($codCurso ='') {
        $this->cnn = new conexao();
        $this->codCurso='-1';
    }

    public function getCursos() {
        $cnn = new conexao();
        $result= $cnn->Conexao()->query("SELECT * FROM cursos");
        //resut set alimentado para retornar o json
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $tr[] = $row;
        }
        return json_encode($tr, true);
    }
    public function salvar() {
        if ($this->codCurso=='-1'){
            $this->getCodigoCurso();
            $this->SQL = "INSERT INTO cursos values('$this->codCurso', '$this->descricao')";
            $result = $this->cnn->Conexao()->prepare($this->SQL);
            if ($result->execute()>0){
                return true;
            }else{
                return false;
            }
        }
        
    }
    private function getCodigoCurso() {
        $result= $this->cnn->Conexao()->prepare("SELECT CODCURSO FROM cursos ORDER BY CODCURSO DESC LIMIT 1");
	$result->execute();
		 
        //resut set alimentado para retornar o json
        while($row = $result->fetch(PDO::FETCH_OBJ)){
            $codigo= $row;
        }
        $this->codCurso = 'C'.str_pad((int)substr($codigo->CODCURSO,1)+1, 4, '0', STR_PAD_LEFT);        
    }
    public function getNovoCodigo(){
    return $this->codCurso;
    }
}
