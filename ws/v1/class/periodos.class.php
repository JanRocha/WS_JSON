<?php
include_once 'conexao.class.php';

class periodos {
   
    public function getPeriodos() {
        $cnn = new conexao();
        $result= $cnn->Conexao()->query("SELECT * FROM PERIODO");
        //resut set alimentado para retornar o json
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $tr[] = $row;
        }
        return json_encode($tr, true);
    }
}
