<?php

class Init_model extends CI_Model{


  public function __construct(){
    parent::__construct();
  }

  /* String de las tarjetas de evaluacion
  * @return string
  */

  public function getEvaluaciones()
  {

    $idUser = $this->session->userdata('ID');
    $bloqHTML = '';
    $arrayRealizadas = array();
    $idRealizados = array();
    $evaluaciones = array();
    $evaluacionDisponible = array();
    $newData = array();

    $evaluacionesDisponibles = $this->db->query('SELECT a.evaluaciones
      FROM dan_empleados b
      LEFT JOIN dan_departamentos a
      ON b.departamento = a.id
      WHERE b.id = '.$idUser);

      foreach ($evaluacionesDisponibles->result() as $eval) {
        $idEvaluacion = json_decode($eval->evaluaciones, true);
        for ($i=0; $i < count($idEvaluacion) ; $i++) {
          // evaluaciones disponibles para dicho usuario
          $evaluacionDisponible[]  = $this->getEvaluacion($idEvaluacion[$i]);

        }
      }

      // obetenes las evaluaciones realizadas
      $evaluacionesRealizadas = $this->db->query('SELECT a.evaluaciones
        FROM dan_empleados_evaluaciones a
        WHERE a.id_empleado = '.$idUser);

        foreach ($evaluacionesRealizadas->result() as $realizada) {
          $arrayRealizadas = json_decode($realizada->evaluaciones, true);
        }

        // recorremos las evaluaciones
        foreach ($evaluacionDisponible as $eva) {
          foreach ($arrayRealizadas as $realizada) {
            if($eva[0]['id'] == $realizada['id']){
              $eva[0]['realizada'] = 1;
              $eva[0]['resultado'] = $realizada['resultado'];
            }
          }
          $newData[] = $eva;
        }

        for ($i=0; $i < count($newData) ; $i++) {

          if($newData[$i][0]['estatus'] == 1){

            $bloqHTML .= '<div class="col-sm-6">
            <a href="'.(isset($newData[$i][0]['realizada']) ? '#':base_url() . 'evaluacion/' . $newData[$i][0]['tag']).'">
            <div class="bloque">
            <img src="'.base_url().'assets/img/'.$newData[$i][0]['portada'].'" alt="'.$newData[$i][0]['portada'].'">
            <div class="'.(isset($newData[$i][0]['realizada']) ? "hover_realizada" : "hover").'"><p>'.(isset($newData[$i][0]['realizada']) ? 'Prueba <strong>YA REALIZADA:</strong><br>Resultado:'. $newData[$i][0]['resultado'] : $newData[$i][0]['nombre']).'</p></div>
            </div>
            </a>
            </div>';}
          }

          return $bloqHTML;
        }

        /* Obtiene todas las respuestas de una evaluacion dada
        * @input $idEvaluacion | int
        * @return array
        */

        public function getRespuestas($id){
          if(empty($id)){
            return array('band' => 0 );
          }

          $query =  $this->db->query("SELECT  a.respuestas FROM
            dan_test_respuestas AS a
            WHERE a.id_evaluacion = " . $id);

            if($query->num_rows() > 0){
              // obtenemos todas las respuestas de dicha evaluacion
              $respuestas =  json_decode($query->row()->respuestas, true);
              return $respuestas;
            }else {
              return json_encode(array('band' => 0 ));
            }

          }

          /* Obtiene los la evaluaciones disponibles
          * @input $idEvaluacion | int
          * @return array
          */

          public function getEvaluacion($id = 0){
            $response =  array();
            if($id ==0){
              $query = "SELECT * FROM dan_evaluaciones";
            }else{
              $query ="SELECT * FROM dan_evaluaciones WHERE id =" . $id;
            }
            $evaluaciones = $this->db->query($query);
            if($evaluaciones->num_rows() > 0){
              foreach ($evaluaciones->result() as $row) {
                $response[] = array('id' => $row->id ,
                'nombre' => $row->nombre,
                'estatus' => $row->estatus ,
                'tag' => $row->tag_nombre,
                'aprobatorio' => $row->aprobatorio,
                'portada' => $row->imagen);
              }
            }
            return $response;
          }

          /* Obtiene los resultados del empleado dado desde la bbdd
          * @input $idEmpleao | int
          * @return array
          */


          public function getResultados($idEmpleado = 0){
            $response =  array();
            if($idEmpleado ==0){
              $query = "SELECT * FROM dan_empleados_evaluaciones";
            }else{
              $query ="SELECT * FROM dan_empleados_evaluaciones WHERE id_empleado =" . $idEmpleado;
            }
            $resultados = $this->db->query($query);
            if($resultados->num_rows() > 0){
              foreach ($resultados->result() as $row) {
                $response[] = array('id_empleado' => $row->id_empleado, 'evaluaciones'=> $row->evaluaciones);
              }
            }
            return $response;
          }

          /*
          *Inseta la evaluacion
          * @return array
          * @input data | array
          */

          public function insertEvaluacion($data){
            if($this->db->insert('dan_empleados_evaluaciones', $data)){
              return array('band' => 1);
            }else{
              return array('band' => 0);
            }
          }

          /*
          *Hace update de una evaluacion existente
          * @return array
          * @input data | array
          */

          public function updateEvaluacion($data, $idEmpleado){

            $this->db->set('evaluaciones',$data);
            $this->db->where('id_empleado', $idEmpleado);

            if($this->db->update('dan_empleados_evaluaciones')){
              return array('band' => 1);
            }else{
              return array('band' => 0);
            }
          }
        }
