<?php   

class Porosia {
    private $host="localhost";
    private $user="root";
    private $pass="";
    private $db="contact";
    public $mysqli;



    public function __construct(){
        return $this->mysqli = new mysqli($this->host,$this->user,$this->pass,$this->db);
    }





    public function porosia($data){
        $name=$data['name'];
        $phone=$data['phone'];
        $lokacioni=$data['lokacioni'];
        $porosia=$data['porosia'];
        $q="insert into porosia set name='$name',phone='$phone',lokacioni='$lokacioni',porosia='$porosia'";
        return $this->mysqli->query($q);
    }


}