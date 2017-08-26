<?php

class conexao {
    private $user= 'u787190517_root';
    private $pass= 'Qwe75321';
    private $dbname ='u787190517_ws';
    private $servidor='localhost';
    private $dns = '';
    public function Conexao() {
		try {
			$pdo = new PDO("mysql:host=$this->servidor;dbname=$this->dbname;charset=UTF8;",  $this->user,  $this->pass);
			return $pdo;
		} catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}       
	}
}
