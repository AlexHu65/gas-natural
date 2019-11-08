<?php
class Adm_registros_model extends CI_Model{

  public function __construct(){
    parent::__construct();
  }

  public function getRegistros()
  {
    $bloqHTML = '';
    $query = $this->db->query('SELECT * FROM suscripcion');
    if($query->num_rows() > 0){
      foreach ($query->result() as $row) {
        $bloqHTML .= '<tr>
        <td>'.$row->id.'</td>
        <td>'.$row->nombre.'</td>
        <td>'.$row->lada.'</td>
        <td>'.$row->telefono.'</td>
        <td>'.$row->domicilio.'</td>
        <td>'.$row->email.'</td>
        <td>'.$row->colonia.'</td>
        <td>'.$row->estado.'</td>
        <td>'.$row->ciudad.'</td>
        <td>
        <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Acciones <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">        
        <li><a href="'.base_url().'webadmin/empleado/detalle/'.$row->id.'"><i class="far fa-eye"></i> Ver Detalle</a></li>
        </ul>
        </div>
        </td>
        </tr>';
      }
    }
    return $bloqHTML;
  }

  // Metodo para borrar de una tabla , reutilizable
  public function deleteInfo($id, $table){
    $query =  "DELETE FROM $table WHERE id = $id";
    if($this->db->query($query)){
      return array("band" => 1 , "msg" => "Elemento eliminado con éxito" );
    }else{
      return array("band" => 0 , "msg" => "No se pudo eliminar elemento");
    }
  }

  // Actualizar el contacto
  public function updateInfo($data){
    if($this->db->update('lq_contacto', $data)){
      return array("band" => 1, "msg" => "Se actualizo correctamente la información");
    }else{
      return array("band" => 0, "msg" => "No se pudo actualizar");
    }
  }
}
