<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Init extends CI_Controller {

	public  function __construct(){
		parent::__construct();
		$this->load->model("init_model");
		$this->load->model("login_model");
		$this->load->model("adm_registros_model");
	}

	// BIENVENIDA

	public function index($idioma=1, $post = FALSE)
	{
		return show_404();
	}

	/*
	* Insertar registros
	*/
	public function add(){
		// validamos que sea un peticion ajax
		if(!$this->input->is_ajax_request()){
			return show_404();
		}else{			

			$data = array(
				'nombre' => $this->input->post('nombre'),
				'lada' => $this->input->post('lada'),
				'telefono' => $this->input->post('telefono'),
				'domicilio' => $this->input->post('domicilio'),
				'email' => $this->input->post('email'),
				'colonia' => $this->input->post('colonia'),
				'estado' => $this->input->post('estado'),
				'ciudad' => $this->input->post('ciudad'),
			);
			$table = 'suscripcion';
			echo json_encode($this->init_model->insert($table, $data));
		}

	}

	public function validEmail($email = ""){
		if(!$this->input->is_ajax_request()){
			return show_404();
		}else{

			$item = 'email';
			if($email != ""){
				$value = $email;
			}else{
				$value = $this->input->post('email');
			}
			$table = 'suscripcion';
			echo json_encode($this->init_model->getEmail($table, $item, $value));
		}
	}

	public function procesarEstados(){
		// Capture selected country
		$country = 'Mexico';

		// Define country and city array
		$countryArr = array(
			"Mexico" => array("Selecciona tu estado","Aguascalientes","Baja California","Baja
			California Sur","Campeche","Chiapas","Chihuahua","Coahuila","Colima","Distrito Federal","Durango","MÃ©xico","Guanajuato","Guerrero","Hidalgo","Jalisco","MichoacÃ¡n","Morelos","Nayarit","Nuevo LeÃ³n","Oaxaca","Puebla","QuerÃ©taro","Quintana Roo","San
			Luis PotosÃ­","Sinaloa","Sonora","Tabasco","Tamaulipas","Tlaxcala","Veracruz","YucatÃ¡n","Zacatecas")                 );

			foreach($countryArr[$country] as $value){
				echo "<option value='".$value."'>". utf8_decode($value) . "</option>";
			}
		}

		// get municipios
		public function procesarMunicipio(){
			// Capture selected country
			$municipios = $this->input->post('municipios');
			// Define country and city array
			$municipiosARR = $this->municipio->municipios();
			foreach($municipiosARR[$municipios] as $value){
				echo "<option value='".$value."'>". utf8_decode($value) . "</option>";
			}
		}

		public function update($id){
			echo "update registros" . $id;
		}

		public function delete($id){
			echo "delete registros" . $id;
		}

	}
