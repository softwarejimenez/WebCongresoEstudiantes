<?php
//simple handler for a mysql database
class db_handler{
    private $servername;
    private $username;
    private $pass;
    private $dbname;
    private $connection;

    public function __construct($servernameaux,$dbnameaux){
        $this->servername=$servernameaux;
        $this->username="antonio";
        $this->pass="";
        $this->dbname=$dbnameaux;

    }
    public function connect(){
        $this->connection=new mysqli($this->servername,$this->username,$this->pass,$this->dbname);
        $acentos = $this->connection->query("SET NAMES 'utf8'");//para que funciones los acentos
        $this->check_connection();
    }
    public function close(){
        $this->connection->close();
    }
    public function query($sqlquery){
        $res=$this->connection->query($sqlquery);
        return $res;
    }
    public function error(){
        return $this->connection->error;
    }
    private function check_connection(){
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }
    public function count ($table){
        $table=$this->connection->query("select count(*) from ".$table);
        if ($table->num_rows > 0) {
            $row = $table->fetch_assoc();
            return $row["count(*)"];
        }else{
            return 0;
        }
    }

}
?>
