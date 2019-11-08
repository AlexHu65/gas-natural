<?php
class Adm_registros_model extends CI_Model{
  public function __construct(){
    parent::__construct();
  }

  public function getRegistros($detalle = FALSE, $id = FALSE)
  {
    $bloqHTML = '';

    if($detalle && $id){

      $condiciones =  array('id' => $id, 'admin' => 0);
      $row = $this->db->where($condiciones)->get('dan_empleados')->row();

      if(sizeof($row) > 0){

        $departamentos = $this->db->query('SELECT * FROM dan_departamentos');
        $nombreDepartamento = "";

        foreach ($departamentos->result() as $row2 ) {
          $data["areas"][] = array('id' =>$row2->id, 'nombre' => $row2->nombre);
          $departamentoActual[] = (($row->departamento == $row2->id) ? $row2->nombre: "");
        }

        foreach ($departamentoActual as $key => $nombre) {
          if($nombre != ""){
            $nombreDepartamento = $nombre;
            break;
          }
        }

        print_r($nombreDepartamento);

        $bloqHTML .= '<div class="titulo">
        <h1>Detalle <strong>empleado</strong></h1></div><hr>';
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
      $query = $this->db->query('SELECT r.id, r.num_empleado, r.nombre,
        r.apellido_paterno,
        r.apellido_materno,
        r.fecha_nacimiento,
        r.departamento,
        r.tipo_capacitacion FROM dan_empleados r WHERE r.admin = 0');

        if($query->num_rows() > 0){

          $departamentos = $this->db->query('SELECT * FROM dan_departamentos');
          foreach ($query->result() as $row) {

            $nombreDepartamento = "";

            foreach ($departamentos->result() as $row2 ) {
              $data["areas"][] = array('id' =>$row2->id, 'nombre' => $row2->nombre);
              $departamentoActual[] = (($row->departamento == $row2->id) ? $row2->nombre: "");
            }

            foreach ($departamentoActual as $key => $nombre) {
              if($nombre != ""){
                $nombreDepartamento = $nombre;
              }
            }

            $bloqHTML .= '<tr>
            <td><a href="'.base_url().'webadmin/empleado/detalle/'.$row->id.'">'.$row->num_empleado.'</a></td>
            <td>'.$row->nombre.'</td>
            <td>'.$row->apellido_paterno.'</td>
            <td>'.$row->apellido_materno.'</td>
            <td>'.$row->fecha_nacimiento.'</td>
            <td>'.$nombreDepartamento.'</td>
            <td>'.$row->tipo_capacitacion.'</td>
            <td>
            <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Acciones <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
            <li><a href="'.base_url().'webadmin/empleado/editar/'.$row->id.'"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a></li>
            <li><a href="#" class="eliminar-empleado" data-id="'.$row->id.'"><i class="fa fa-times" aria-hidden="true"></i> Eliminar</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="'.base_url().'webadmin/empleado/detalle/'.$row->id.'"><i class="fa fa-eye" aria-hidden="true"></i> Ver Detalle</a></li>
            </ul>
            </div>
            </td>
            </tr>';
          }
        }
      }
      return $bloqHTML;
    }

    public function getPrecioVal($fecha_actual,$idprod)
    {
      $fecha_entrada = strtotime("15-05-2019 23:00:00");
      if($fecha_actual > $fecha_entrada){
        $precios = array('', 3200, 5200);
        return $precios[$idprod];
      }else{
        $precios = array('', 2700, 4500);
        return $precios[$idprod];
      }
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

    public function do_Ticket($uniq_id)
    {
      $this->load->library('Pdf');

      $custom_layout = array(105, 150);
      $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, $custom_layout, true, 'UTF-8', false);
      //$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

      $pdf->SetCreator(PDF_CREATOR);
      $pdf->SetAuthor('Foro Go Innovation');
      $pdf->SetTitle('Información de Pago');
      $pdf->SetSubject('Foro Go Innovation - Información de Pago');
      $pdf->SetKeywords('ForoGo, Pago, Banco');

      // remove default header/footer
      $pdf->setPrintHeader(false);
      $pdf->setPrintFooter(false);

      // set default monospaced font
      $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

      // set margins
      $pdf->SetMargins(0, 0, 0);

      // set auto page breaks
      $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

      // set image scale factor
      $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

      $pdf->setViewerPreferences( array('PrintScaling'=>'None', 'CenterWindow' => true) );
      // ---------------------------------------------------------

      // set font
      $dir = getcwd();
      $font = TCPDF_FONTS::addTTFfont($dir.'/assets/css/font/intro_bold_1-webfont.ttf', 'intro_normal', '', 32);
      $pdf->SetFont($font,'',10);


      $row = $this->db->where('uniq_id', $uniq_id)->get('go_registros_usuarios')->row();
      $boleto = ($row->tipo_paquete == 1)?'boleto-general.jpg':'boleto-vip.jpg';

      // Formato de la Pagina
      //$pdf->AddPage('P', 'A6');
      $pdf->AddPage();

      // Imagen de Fondo
      // get the current page break margin
      $bMargin = $pdf->getBreakMargin();
      // get current auto-page-break mode
      $auto_page_break = $pdf->getAutoPageBreak();
      // disable auto-page-break
      $pdf->SetAutoPageBreak(false, 0);
      // set bacground image
      $img_file = K_PATH_IMAGES.$boleto;
      //echo 'img_file: '.$img_file;
      $pdf->Image($img_file, 0, 0, 105, 150, '', '', '', false, 300, '', false, false, 0);
      // restore auto-page-break status
      $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
      // set the starting point for the page content
      $pdf->setPageMark();

      // HTML
      $hojas = '';
      $data['DIR'] = base_url();

      $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
      $repl = array('Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ');

      $nombre = str_replace ($find, $repl, $row->nombre);
      $apellido = str_replace ($find, $repl, $row->apellido);

      $data['NOMBRE'] = strtoupper($nombre);
      $data['APELLIDO'] = strtoupper($apellido);
      $data['UNIQ_ID'] = $row->uniq_id;
      $hojas = $this->parser->parse('layouts/ticket',$data, true);
      $pdf->writeHTML($hojas, true, false, true, false, '');

      // define barcode style
      $style = array(
        'position' => 'C',
        'align' => 'C',
        'stretch' => false,
        'fitwidth' => true,
        'cellfitalign' => '',
        'border' => true,
        'hpadding' => 'auto',
        'vpadding' => 'auto',
        'fgcolor' => array(0,0,0),
        'bgcolor' => false, //array(255,255,255),
        'text' => true,
        'font' => 'helvetica',
        'fontsize' => 8,
        'stretchtext' => 4
      );
      // CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9.
      $pdf->write1DBarcode($uniq_id, 'C39', '', '', '', 18, 0.4, $style, 'N');

      $nom_archivo = 'forogo-'.strtolower(url_title('ticket')).'-'.$uniq_id;

      $pdf->Output($dir.'/media/files/tickets/'.$nom_archivo.'.pdf', 'F'); //crear
      //$pdf->Output($nom_archivo.'.pdf', 'I');    // Leer

      return $nom_archivo.'.pdf';
    }

    public function doConstancia($nombre,$uniq_id){

      $this->load->library('Pdf');

      $custom_layout = array(280, 216);
      $pdf = new TCPDF('L', 'mm', $custom_layout, true, 'UTF-8', false);

      $pdf->SetCreator(PDF_CREATOR);
      $pdf->SetAuthor('Foro Go Innovation');
      $pdf->SetTitle('Información de Pago');
      $pdf->SetSubject('Foro Go Innovation - Información de Pago');
      $pdf->SetKeywords('ForoGo, Pago, Banco');

      // remove default header/footer
      $pdf->setPrintHeader(false);
      $pdf->setPrintFooter(false);

      // set default monospaced font
      $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

      // set margins
      $pdf->SetMargins(0, 0, 0);

      // set auto page breaks
      $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

      // set image scale factor
      $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

      $pdf->setViewerPreferences( array('PrintScaling'=>'None', 'CenterWindow' => true) );

      // // ---------------------------------------------------------

      // set font
      $dir = getcwd();
      $font = TCPDF_FONTS::addTTFfont($dir.'/assets/css/font/intro_bold_1-webfont.ttf', 'intro_normal', '', 32);
      $pdf->SetFont($font,'',10);


      // Formato de la Pagina
      $pdf->AddPage();

      // Imagen de Fondo
      // get the current page break margin
      $bMargin = $pdf->getBreakMargin();
      // get current auto-page-break mode
      $auto_page_break = $pdf->getAutoPageBreak();
      // disable auto-page-break
      $pdf->SetAutoPageBreak(false, 0);
      // set bacground image
      $img_file = K_PATH_IMAGES.'constancia.jpg';
      //echo 'img_file: '.$img_file;
      $pdf->Image($img_file, 0, 0, 280, 216, '', '', '', false, 300, '', false, false, 0);
      // restore auto-page-break status
      $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
      // set the starting point for the page content
      $pdf->setPageMark();

      // HTML
      $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
      $repl = array('Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ');

      $nombre = str_replace($find, $repl, $nombre);

      $data['NOMBRE'] = strtoupper($nombre);
      $data['DIR'] = base_url();

      $hojas = $this->parser->parse('layouts/constancia',$data, true);
      $pdf->writeHTML($hojas, true, false, true, false, '');

      $nom_archivo = 'forogo-'.strtolower(url_title('constancia')).'-'.$uniq_id;

      $pdf->Output($dir.'/media/files/constancias/'.$nom_archivo.'.pdf', 'F'); //crear
      //$pdf->Output($nom_archivo.'.pdf', 'I');    // Leer

      return $nom_archivo.'.pdf';
    }

    public function getDepartamento(){
      $query = $this->db->query('SELECT * FROM dan_departamentos');
      if($query->num_rows() > 0){
        foreach ($query->result() as $row) {
          $departamentos[] = array('id' => $row->id, 'nombre' => $row->nombre);
        }
        return $departamentos;
      }
    }


  }
