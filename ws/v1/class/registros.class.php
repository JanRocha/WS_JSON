<?php
include_once 'conexao.class.php';

class registros {
   
    public function getRegistos() {
        $cnn = new conexao();
        $result= $cnn->Conexao()->query("SELECT * FROM REGISTRO");
        //resut set alimentado para retornar o json
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $tr[] = $row;
        }
        return json_encode($tr, true);
    }
}
