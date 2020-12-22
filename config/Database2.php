<?php

class Database {
    //DB Params
    private $host = 'nmfb.database.windows.net';
    private $db_name = 'NYIF';
    private $username = 'nmfb';
    private $password = 'VLKG@Ue4$i';
    private $conn;
    
    
    //DB Connect
    public function Connect(){
        $this->conn = null;
        
        try{
            $this->conn = new PDO('sqlsrv:server=' . $this->host . ';Database=' . $this->db_name, 
            $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
           echo'Connection Error: ' . $e->getMessage(); 
        }
        
       return $this->conn; 
    }
}