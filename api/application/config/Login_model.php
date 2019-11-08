<?php
class Login_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }   
    public function isLogged() {
        if($this->session->userdata('ID')!==FALSE&&$this->session->userdata('ID')!=''){
            return true;
        }else{
            return false;
        }
    }
    public function isHisID($id) {
        if($this->session->userdata('tipo')!==FALSE&&$this->session->userdata('tipo')==8){
            return TRUE;
        }else{
            if($this->session->userdata('ID')!==FALSE&&$this->session->userdata('ID')==$id){
                return TRUE;
            }else{
                return FALSE;
            }
        }
    }
    public function isAdmin() {
        if($this->session->userdata('tipo')!==FALSE&&$this->session->userdata('tipo')==8){
            return true;
        }else{
            return false;
        }
    }
}
