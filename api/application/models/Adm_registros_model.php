<?php
class Adm_registros_model extends CI_Model{
  public function __construct(){
    parent::__construct();
  }

  public function getRegistros($detalle = FALSE, $id = FALSE)
  {
    $bloqHTML = '';

    if($detalle && $id){

      $condiciones =  array('id' => $id);
      $row = $this->db->where($condiciones)->get('lq_entradas')->row();

      if(sizeof($row) > 0){

        $bloqHTML .= '<div class="titulo">
        <h1>Detalle <strong>entada</strong></h1></div><hr>';
        $bloqHTML.= "<div class='container'><div class='row'><div class='col-sm-4'>";
        $bloqHTML.="<p><strong>Nombre: </strong>";
        $bloqHTML.= $row->nombre .'</p>';
        $bloqHTML .= "<p><strong>A. Paterno: </strong>";
        $bloqHTML.= $row->apellido_paterno.'</p>';
        $bloqHTML .= "<p><strong>A. Materno: </strong>";
        $bloqHTML.= $row->apellido_materno.'</p>';
        $bloqHTML .= "<p><strong>Fecha de nacimiento: </strong>";
        $bloqHTML.= $row->fecha_nacimiento.'</p>';
        $bloqHTML .= "<p><strong>Dirección: </strong>";
        $bloqHTML.= $row->direccion.'</p>';
        $bloqHTML .= "<p><strong>Fecha de ingreso: </strong>";
        $bloqHTML.= $row->fecha_ingreso.'</p>';
        $bloqHTML.= "</div>";
        $bloqHTML.="<div class='col-sm-4'>";
        $bloqHTML .= "<p><strong>Puesto: </strong>";
        $bloqHTML.= $row->puesto.'</p>';
        $bloqHTML .= "<p><strong>Área: </strong>";
        $bloqHTML.= $row->area.'</p>';
        $bloqHTML .= "<p><strong>Departamento: </strong>";
        $bloqHTML.= $nombreDepartamento.'</p>';
        $bloqHTML .= "<p><strong>Nivel jerarquico: </strong>";
        $bloqHTML.= $row->nivel_jerarquico.'</p>';
        $bloqHTML .= "<p><strong>Jefe directo: </strong>";
        $bloqHTML.= $row->jefe_directo.'</p>';
        $bloqHTML .= "<p><strong>Tipo empleado: </strong>";
        $bloqHTML.= $row->tipo_empleado.'</p>';
        $bloqHTML .="</div>";
        $bloqHTML.="<div class='col-sm-4'>";
        $bloqHTML .= "<p><strong>Tipo capacitación: </strong>";
        $bloqHTML.= $row->tipo_capacitacion.'</p>';
        $bloqHTML .= "<p><strong>Estatus: </strong>";
        $bloqHTML.= $row->estatus.'</p>';
        $bloqHTML.="</div></div></div>";
      }

    }else{
      $query = $this->db->query('SELECT * FROM lq_entradas');

      if($query->num_rows() > 0){
        foreach ($query->result() as $row) {
          $bloqHTML .= '<tr>
          <td>'.$row->id.'</td>
          <td>'.$row->titulo.'</td>
          <td><img width="30%" src="'.base_url().'/media/img/posts/'.$row->img_post.'"></td>
          <td>'.$row->fecha.'</td>
          <td>'.$row->id_categoria.'</td>
          <td>'.$row->vistas.'</td>
          <td>'.$row->tipo.'</td>
          <td>
          <div class="btn-group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Acciones <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
          <li><a href="'.base_url().'webadmin/post/editar/'.$row->id.'"><i class="fas fa-pencil-ruler"></i> Editar</a></li>
          <li><a href="#" class="eliminar-empleado" data-id="'.$row->id.'"><i class="fas fa-times"></i> Eliminar</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="'.base_url().'webadmin/empleado/detalle/'.$row->id.'"><i class="far fa-eye"></i> Ver Detalle</a></li>
          </ul>
          </div>
          </td>
          </tr>';
        }
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

// Actualizar el banner
public function updateBanner($data){
  if($this->db->update('lq_banner_home', $data)){
    return array("band" => 1, "msg" => "Se actualizo correctamente la información");
  }else{
    return array("band" => 0, "msg" => "No se pudo actualizar");
  }
}

// Actualizar solo un post
public function updatePost($data, $id){
  $this->db->where("id" , $id);
  if($this->db->update('lq_entradas', $data)){
    return array("band" => 1, "msg" => "Se actualizo correctamente la información");
  }else{
    return array("band" => 0, "msg" => "No se pudo actualizar");
  }
}

// Añadir una entrada
public function addInfo($data){
  if($this->db->insert('lq_entradas', $data)){
    return array("band" => 1, "msg" => "Se agrego correctamente la entrada");
  }else{
    return array("band" => 0, "msg" => "No se pudo agregar la entrada");
  }
}

// Obtener el banner actual
public function getHomeBanner(){

  $query = "SELECT * FROM lq_banner_home";
  $arrayBanner = array();
  $resultset =  $this->db->query($query);

  if($resultset->num_rows() > 0 ){
    foreach ($resultset->result() as $banner) {
      $arrayBanner[] = array(
        "id" => $banner->id ,
        "source" => $banner->source);
      }
    }
    return $arrayBanner;
  }

  // Agregamos categorias
  public function addCategorias($data){
    if($this->db->insert('lq_categorias', $data)){
      return array("band" => 1, "msg" => "Se agrego correctamente la categoría");
    }else{
      return array("band" => 0, "msg" => "No se pudo agregar la categoría");
    }
  }

  // Obtenemos la información del contacto
  public function getContactInfo()
  {
    $query = "SELECT * FROM lq_contacto";
    $arrayContacto = array();
    $resultset =  $this->db->query($query);

    if($resultset->num_rows() > 0 ){
      foreach ($resultset->result() as $post) {

        $arrayContacto[] = array('id' => $post->id ,
        "telefono" => $post->telefono,
        "email" => $post->email,
        "direccion" => $post->direccion,
        "estado" => $post->estado,
        "facebook" => $post->facebook,
        "linkedin" => $post->linkedin,
        "instagram" => $post->instagram,
        "ciudad" => $post->ciudad);
      }
    }
    return $arrayContacto;
  }
}
