<?php
class Bolsa_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    // DIRECTORIO
    public function getBolsa()
    {   
        $bloqHTML = '';
        $query = $this->db->query('SELECT * FROM nu_bolsa');
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $bloqHTML .= '<tr>
                                    <td>'.$row->fecha.'</td>
                                    <td>'.$row->nombre.'</td>
                                    <td>'.$row->telefono.'</td>
                                    <td>'.$row->email.'</td>
                                    <td>'.$row->area.'</td>
                                    <td>'.$row->ciudad.'</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Acciones <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="'.base_url().'webadmin/bolsa/detalle/'.$row->id.'"><i class="fa fa-eye" aria-hidden="true"></i> Ver Detalle</a></li>
                                                <li><a href="#" class="eliminar-bolsa" data-id="'.$row->id.'"><i class="fa fa-times" aria-hidden="true"></i> Eliminar</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>';
            }
        }
        return $bloqHTML;
    }

    public function set_upload_options($name, $upload_path)
    {   
        $config = array();
        $config['upload_path']      = $upload_path;
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['file_name']        = $name;
        $config['max_size']         = 1024 * 8;
        $config['encrypt_name']     = FALSE;
        return $config;
    }

    public function seo_url($cadena)
    {
        // Tranformamos todo a minusculas
        $cadena = strtolower($cadena);

        //Rememplazamos caracteres especiales latinos
        $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
        $repl = array('a', 'e', 'i', 'o', 'u', 'n');
        $cadena = str_replace ($find, $repl, $cadena);

        // Añaadimos los guiones
        $find = array(' ', '&', '\r\n', '\n', '+'); 
        $cadena = str_replace ($find, '-', $cadena);

        // Eliminamos y Reemplazamos demás caracteres especiales
        $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
        $repl = array('', '-', '');
        $cadena = preg_replace ($find, $repl, $cadena);

        return $cadena;

    }

}