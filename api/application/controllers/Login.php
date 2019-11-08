<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public  function __construct(){
		parent::__construct();
		$this->load->model("login_model");
	}

	// LOGIN DE ADMIN

	public function adm_login($idioma = 1){

		$data['DIR'] = base_url();
		$data['BACKGROUND'] = "bg1";
		$this->site_admin->view('pages/admin/login/login', $data, 'login', $idioma);

	}

	// LOGIN
	public function index($idioma=1)
	{
		if($this->login_model->isLogged()){redirect();}
		$data['DIR'] = base_url();
		$this->site->view_front('login', $data, 'login', $idioma);
	}
	public function do_login()
	{
		if(!$this->input->is_ajax_request())
		{
			show_404();
		} else {
			$query = $this->db->where('user',$this->input->post('email'))->where('pass',$this->input->post('password'))->get('users');
			if ($query->num_rows() > 0){
				$row = $query->row();
				$session = array(
					'ID'          => $row->id,
					'admin' => $row->user,
					'tipo' => $row->tipo,
				);
				$this->session->set_userdata($session);
				echo json_encode(array('band'=>1));
			}else{
				echo json_encode(array('band'=>0,'msg'=>'Error al iniciar sesion'));
			}
		}
	}
	public function logout(){
		$this->session->unset_userdata('ID');
		$this->session->unset_userdata('user');
		$this->session->sess_destroy();
		redirect('/');
	}
}
