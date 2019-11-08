<?php

class Init_model extends CI_Model{

  public function __construct(){
    parent::__construct();
  }

  public function insert($table, $data){
    // insertar suscripcion
    if($this->db->insert($table, $data)){
      return array("band" => 1, "msg" => "Se agrego correctamente la información", "type" => "success", "title" =>"Agregado con éxito");
    }else{
      return array("band" => 0, "msg" => "No se pudo agregar la información", "type" => "error", "title" =>"No se pudo agregar");
    }
  }

  public function getEmail($table, $item, $value){
    // insertar suscripcion
    $query = "SELECT email FROM $table WHERE $item = '$value'";
    $resultSet = $this->db->query($query);
    if($resultSet->num_rows() > 0 ){
      return array('band' =>0 , 'msg' => '¡Este email ya esta registrado!');
    }else{
      return array('band' =>1 , 'msg' => 'No esta registrado');

    }

  }
}
