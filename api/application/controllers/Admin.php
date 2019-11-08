<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

  public  function __construct(){
    parent::__construct();
    $this->load->model("login_model");
    $this->load->model("init_model");
    $this->load->model("adm_registros_model");
    if(!$this->login_model->isLogged()){redirect('webadmin/login');}
  }

  public function index()
  {
    $data['DIR'] = base_url();
    $data['ADMIN'] = $this->session->userdata("tipo");
    // print_r($data);

    // Validamos si el usuario es admin
    if($data['ADMIN'] == 1){
      $this->site_admin->view('pages/admin/home', $data);
    }else {
      redirect('/');
    }
  }

  public function listado(){
    $data['DIR'] = base_url();
    $data['ADMIN'] = $this->session->userdata("tipo");
    // Obtenemos el listado de todos las entradas
    $data['LISTADO'] = $this->adm_registros_model->getRegistros();
    // Validamos si el usuario es admin
    if($data['ADMIN'] == 1){
      $this->site_admin->view('pages/admin/suscripciones/listado', $data);
    }else {
      redirect('/webadmin');
    }
  }

  // Exportar excel

  public function export_excel_completo()
  {
    if(!$this->login_model->isLogged())
    {
      show_404();
    } else {
      $this->db->query("SET SQL_BIG_SELECTS=1");
      $query = $this->db->query("SELECT *
        FROM suscripcion a
        ORDER BY a.id ASC");

        if($query->num_rows() > 0){
          $arreglo = $query->result_array();
          $this->excel->excelAll($arreglo, "Reporte completo de registros");
        }
      }
    }
}
