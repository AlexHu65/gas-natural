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
    // Obtenemos los datos requeridos para el admin
    $categorias = $this->init_model->getCategorias();
    $contacto  = $this->adm_registros_model->getContactInfo();
    $homeBanner =  $this->adm_registros_model->getHomeBanner();

    $data['POST'] = $this->init_model->getPosts();
    $data['DIR'] = base_url();
    $data['CATEGORIAS'] = $categorias;
    $data['CONTACTO'] = $contacto;
    $data['ADMIN'] = $this->session->userdata("tipo");
    $data['BANNER'] = $homeBanner;

    // Validamos si el usuario es admin
    if($data['ADMIN'] == 1){
      $this->site_admin->view('pages/admin/home', $data);
    }else {
      redirect('/');
    }
  }

  public function listado(){

    $data['POST'] = $this->init_model->getPosts();
    $data['DIR'] = base_url();
    $data['ADMIN'] = $this->session->userdata("tipo");
    // Obtenemos el listado de todos las entradas
    $data['LISTADO'] = $this->adm_registros_model->getRegistros();

    // Validamos si el usuario es admin
    if($data['ADMIN'] == 1){
      $this->site_admin->view('pages/admin/posts/listado', $data);
    }else {
      redirect('/');
    }
  }

  // Retorna todos los post mediante ajax
  public function ajaxPost(){
    if(!$this->input->is_ajax_request())
    {
      show_404();

    } else {

      $htmlBloque = "";
      if($this->input->post("id") == "default"){
        // Default es el valor del select input
        print_r("ok");

      }else{

        $post = FALSE;
        $id = $this->input->post("id");
        $post   = $this->init_model->getSinglePost($id);

        if($post){
          // Cargamos el html del formulario para dicho post
          $categorias = $this->init_model->getCategorias();
          $htmlBloque = '<div class="form-group">
          <input type="hidden" name="idPost" id="idPost" value="'.$post[0]['id'].'">
          <label for="tipo">Tipo</label>
          <select '.($this->input->post("delete") != null ? "disabled" : "" ).'  class="form-control" name="tipo" id="tipo">
          <option value="img">Imágen</option>
          <option value="video">Video</option>
          </select>
          </div>
          <div class="form-group">
          <div class="img-button text-center" id="'.($this->input->post("delete") != null ? "" : "img-button2" ).'">
          <img id="folder-open2" src='.base_url().'media/img/posts/'.$post[0]['img_post'].' alt="open">
          </div>
          <small id="emailHelp" class="form-text text-muted">Selecciona un archivo para tu entrada (solo se permiten archivos png y jpg).</small>
          <input type="file" name="imagen" id="imagen2" '.($this->input->post("delete") != null ? "disabled" : "" ).'  class="form-control dn imagen-update" accept="image/jpeg image/x-png">
          </div>
          <div class="form-group">
          <label for="titulo">Título</label>
          <input type="text" name="titulo" id="titulo" '.($this->input->post("delete") != null ? "disabled" : "" ).' class="form-control" value="'.$post[0]['titulo'].'">
          </div>
          <div class="form-group">
          <label for="titulo">Contenido</label>
          <textarea name="contenido" id="contenido" rows="8" cols="80" '.($this->input->post("delete") != null ? "disabled" : "" ).' class="form-control" >'.$post[0]['contenido'].'</textarea>
          </div>';

          // Agregamos las categorias al formulario
          $htmlBloque.='<div class="form-group">
          <label for="titulo">Categoría</label>
          <select '.($this->input->post("delete") != null ? "disabled" : "" ).' class="form-control" name="categoria" id="categoria">';

          for ($i=0; $i <count($categorias); $i++) {
            $htmlBloque.='<option value="'.$categorias[$i]['id'].'">'.$categorias[$i]['nombre'].'</option>';
          }
          $htmlBloque.="</select></div>";
          echo $htmlBloque;
        }
      }
    }
  }

  // Borrado de datos solicitados por ajax
  public function delete(){
    if(!$this->input->is_ajax_request())
    {
      show_404();

    } else {
      // Recibimos el id del post
      $id = $this->input->post("post");
      $resultset = "";

      // Validamos el id
      if($id ==  "default"){
        $resultset =  array("band" => 0 , "msg" => "No se selecciono post a eliminar");
      }else{
        $table ="lq_entradas";
        $resultset = $this->adm_registros_model->deleteInfo($id, $table);
      }
      // Retornamos el json del modelo
      echo json_encode($resultset);
    }
  }

  public function addRecurso(){

    if (isset($_FILES)) {

      $file =  $this->updloadFile($_FILES, FALSE, "", TRUE);
      // si se pudo subir el archivo
      if($file['band'] == 1){

        $data = array(
          "titulo" => $this->input->post("titulo") ,
          "descripcion" => $this->input->post("descripcion"),
          "source" => $file['file'],
          "tipo" => $file['tipo'],
          "fecha" => date('Y-m-d')
        );

        // Retornamos la respuesta del modelo
        $table = 'lq_recursos';
        $resultset =  $this->adm_registros_model->addInfo($data,$table);
        echo json_encode($resultset);

      }else {
        return json_encode($file);
      }
    }
  }

  // Funcion para agregar entradas de post
  public function addAjax(){

    if(!$this->input->is_ajax_request())
    {
      show_404();

    } else {

      // Como default el archivo vacio
      $file = "lq_empty_b.png";
      $post = $this->init_model->getPosts();

      // Si enviamos el FILE del form
      if(isset($_FILES)){

        $file  =  $this->updloadFile($_FILES, FALSE, $post);
        $fileToDb  = $file['file'];

      }else{
        $fileToDb = $file;
      }

      // Data para subir el post
      $data = array(
        "titulo" => $this->input->post("titulo") ,
        "contenido" => $this->input->post("contenido"),
        "img_post" => $fileToDb,
        "video_post" => "",
        "fecha" => date('Y-m-d'),
        "id_categoria" => $this->input->post("categoria"),
        "tipo" => $this->input->post("tipo"),
      );

      // Retornamos la respuesta del modelo
      $table = "lq_entradas";
      $resultset =  $this->adm_registros_model->addInfo($data, $table);
      echo json_encode($resultset);
    }
  }

  // Agregamos categorias con ajax
  public function addAjaxCategoria(){

    if(!$this->input->is_ajax_request())
    {
      show_404();

    } else {
      // Data del las categorias del formulario
      $data = array(
        "nombre" => $this->input->post("nombreCategoria")
      );

      // Retornamos la respuesta del modelo
      $resultset =  $this->adm_registros_model->addCategorias($data);
      echo json_encode($resultset);
    }
  }

  // Actualizar mediante ajax
  public function updateAjax(){

    if(!$this->input->is_ajax_request())
    {
      show_404();

    } else {

      $id = $this->input->post("id");
      $post = $this->init_model->getPosts($id, FALSE, FALSE);
      $file = $post[0]['img_post'];

      if(isset($_FILES["img"]) && (!empty($_FILES))){

        $file  =  $this->updloadFile($_FILES, TRUE, $post);
        $fileToDb  = $file['file'];

      }else{
        $fileToDb = $file;
      }
      // Data del post a actualizar
      $data = array(
        "titulo" => $this->input->post("titulo") ,
        "contenido" => $this->input->post("contenido"),
        "img_post" => $fileToDb,
        "video_post" => "",
        "id_categoria" => $this->input->post("categoria"),
        "tipo" => $this->input->post("tipo"),
      );

      $resultset =  $this->adm_registros_model->updatePost($data, $this->input->post("id"));
      echo json_encode($resultset);
    }

  }

  // Subimos el banner con ajax
  public function updateAjaxBanner(){

    if(!$this->input->is_ajax_request())
    {
      show_404();

    } else {

      // Obtenemos el banner
      $banner = json_decode($this->ajaxBanner(), true);
      $file = $banner[0]['source'];

      if(isset($_FILES)){

        $file  =  $this->updloadBanner($_FILES, $banner);
        // El string para la base de datos
        $fileToDb  = $file['file'];

      }else{

        $fileToDb = $file;
      }

      // subir el post si retornamos un true
      if($file['band'] == 1){

        $data = array(
          "source" => $fileToDb
        );

        $resultset =  $this->adm_registros_model->updateBanner($data);
        echo json_encode($resultset);

      }else {
        echo json_encode($file);
      }
    }

  }

  // Dependencia de updateAjaxBanner
  public function ajaxBanner(){
    // Retornamos la información del banner home
    return json_encode($this->adm_registros_model->getHomeBanner());
  }

  // Subimos el banner
  public function updloadBanner($file, $banner){

    // Obtenemos un nombre random
    $random = mt_rand(100, 999);

    // Configuramos el directorio para subir archivo
    $directory =  "./assets/img/";
    $imageFileType = $file["img"]["type"];
    // Flag para validar el archivo
    $uploadOk = 1;

    //Validamos las Extensiones
    $valid_extensions = array("image/jpg", "image/jpeg", "image/png");

    // Validamos si la extension es valida
    if (!in_array(strtolower($imageFileType), $valid_extensions)) {
      $uploadOk = 0;
    }
    if ($uploadOk == 0) {
      // Si no se puede subir retornamos el array a la vista
      return array('band' => 0 ,'msg' => 'No se pudo subir la imagen , verifica el tipo de archivo');

    } else {

      $sourceimg = getimagesize($file['img']['tmp_name']);
      $imgType = $sourceimg[2];
      $ext = pathinfo($file['img']['name'], PATHINFO_EXTENSION);
      $file = $file['img']['tmp_name'];

      $fileNewName = $random;

      switch ($imgType) {

        // IMAGENES PNG

        case IMAGETYPE_PNG:

        $imageResourceId = imagecreatefrompng($file);
        $targetLayer = $this->imageResizeBanner($imageResourceId, $sourceimg[0], $sourceimg[1]);

        if(file_exists($directory . $fileNewName . $ext)){
          // Si ya existe el banner con el random name
          unlink($directory . $fileNewName . $ext);
        }

        if(imagepng($targetLayer, $directory . $fileNewName . "_thump." . $ext)){

          // Si ya se valido que el archivo se actualizo, se borra el anterior
          unlink($directory . $banner[0]['source']);
          // Se retorna el nombre de archivo con la validación
          return array("band" => 1 , "msg" => "Imagen subida con exito" , "file" => $fileNewName . "_thump." . $ext);

        }else{
          // Si ha fallado la subida de archivos
          return array("band" => 0 , "msg" => "No se pudo subir la imágen");

        }

        // IMAGEN JPG Y JPEG
        case IMAGETYPE_JPEG:

        $imageResourceId = imagecreatefromjpeg($file);
        $targetLayer = $this->imageResizeBanner($imageResourceId, $sourceimg[0], $sourceimg[1]);

        if(file_exists($directory .$fileNewName . $ext)){
          unlink($directory . $fileNewName . $ext);
        }

        if(imagejpeg($targetLayer, $directory . $fileNewName . "_thump." . $ext)){
          unlink($directory . $banner[0]['source']);
          return array("band" => 1 , "msg" => "Imagen subida con exito" , "file" => $fileNewName . "_thump." . $ext);
        }else{
          return array("band" => 0 , "msg" => "No se pudo subir la imágen");
        }
        break;
      }
    }

  }

  // Funcion para subir imagenes
  public function updloadFile($file, $update =  FALSE, $post = "", $pdf = FALSE, $video = FALSE){

    /* Getting file name */
    $random = mt_rand(100, 999);

    $directory =  "./media/img/posts/";

    define('KB', 1024);
    define('MB', 1048576);
    define('GB', 1073741824);
    define('TB', 1099511627776);

    if($pdf || $video){
      // validamos el tamaño
      if($file['recurso']['size'] > 20*MB){
        return array("band" => 0, "msg" => "Archivo con peso no permito");
      }

      if($file['recurso']['type'] == "application/pdf"){

        $tipo =  "pdf";
        // nombre para la base de datos
        $name = strtolower(str_replace(" ", "_", $file['recurso']['name']));
        // nombre que se sue a la bbdd
        $directory =  "./media/recurso/" . strtolower(str_replace(" ", "_", $file['recurso']['name']));
        // subimos archivo
        if(move_uploaded_file($file['recurso']['tmp_name'], $directory)){
          return array("band" => 1, "msg" => "Archivo subido con éxito", "file" => $name, "tipo" => $tipo);
        }else {
          return array("band" => 0, "msg" => "No se pudo subir el archivo");
        }

      }else if($file['recurso']['type'] == "video/mp4"){

        // validamos el tamaño
        if($file['recurso']['size'] > 20*MB){
          return array("band" => 0, "msg" => "Archivo con peso no permito");
        }

        $tipo =  "mp4";
        // nombre para la base de datos
        $name = strtolower(str_replace(" ", "_", $file['recurso']['name']));
        // nombre que se sue a la bbdd
        $directory =  "./media/recurso/" . strtolower(str_replace(" ", "_", $file['recurso']['name']));
        // subimos archivo
        if(move_uploaded_file($file['recurso']['tmp_name'], $directory)){
          return array("band" => 1, "msg" => "Archivo subido con éxito", "file" => $name, "tipo" => $tipo);
        }else {
          return array("band" => 0, "msg" => "No se pudo subir el archivo");
        }
      }else{
        return array("band" => 0, "msg" => "No se pudo subir el archivo");
      }
    }


    if(!file_exists($directory)){
      mkdir($directory, 0755);
    }

    $uploadOk = 1;
    $imageFileType = $file["img"]["type"];

    // Validamos la extension del archivo
    $valid_extensions = array("image/jpg", "image/jpeg", "image/png,");

    // Validamos si es una extension aceptada
    if (!in_array(strtolower($imageFileType), $valid_extensions)) {
      $uploadOk = 0;
    }
    if ($uploadOk == 0) {
      return array('band' => 0 ,'msg' => 'No se puede subir la imagen , verifica el tipo de archivo');
    } else {

      // Obtenemos el tamaño de la imagen
      $sourceimg = getimagesize($file['img']['tmp_name']);
      // El tipo de la imagen
      $imgType = $sourceimg[2];
      // Extensión del archivo enviado
      $ext = pathinfo($file['img']['name'], PATHINFO_EXTENSION);
      $file = $file['img']['tmp_name'];

      $fileNewName = $random;

      switch ($imgType) {
        // IMAGENES PNG

        case IMAGETYPE_PNG:

        $imageResourceId = imagecreatefrompng($file);
        $targetLayer = $this->imageResize($imageResourceId, $sourceimg[0], $sourceimg[1]);

        // Validamos si es una actualizacion
        if($update){
          if(file_exists($directory . $fileNewName . $ext)){
            unlink($directory . $fileNewName . $ext);
          }
        }

        if(imagepng($targetLayer, $directory . $fileNewName . "_thump." . $ext)){
          // Borramos la imagen anterior si es un update
          if($update){
            unlink($directory . $post[0]['img_post']);
          }
          return array("band" => 1 , "msg" => "Imagen subida con exito" , "file" => $fileNewName . "_thump." . $ext);
        }else{
          return array("band" => 0 , "msg" => "No se pudo subir la imágen");
        }

        // IMAGEN JPG Y JPEG
        case IMAGETYPE_JPEG:

        $imageResourceId = imagecreatefromjpeg($file);
        $targetLayer = $this->imageResize($imageResourceId, $sourceimg[0], $sourceimg[1]);

        // Validamos update de la imágen
        if($update){
          if(file_exists($directory .$fileNewName . $ext)){
            unlink($directory . $fileNewName . $ext);
          }
        }

        if(imagejpeg($targetLayer, $directory . $fileNewName . "_thump." . $ext)){
          // Validamos si es una actualizacion
          if($update){
            unlink($directory . $post[0]['img_post']);
          }
          return array("band" => 1 , "msg" => "Imagen subida con exito" , "file" => $fileNewName . "_thump." . $ext);
        }else{
          return array("band" => 0 , "msg" => "No se pudo subir la imágen");
        }
        break;
      }
    }

  }

  // actualizacion de información de contacto
  public function updateContact(){
    if(!$this->input->is_ajax_request())
    {
      show_404();

    } else {
      // Recibimos la data del formulario

      $data = array(
        'telefono' => $this->input->post('telefono'),
        'email'  => $this->input->post('email'),
        'direccion'  => $this->input->post('direccion'),
        'estado'  => $this->input->post('estado'),
        'ciudad'  => $this->input->post('ciudad'),
        'facebook'  => $this->input->post('facebook'),
        'instagram'  => $this->input->post('instagram'),
        'linkedin'  => $this->input->post('linkedin'),
      );
      // Retornamos la respuesta
      echo json_encode($this->adm_registros_model->updateInfo($data));
    }

  }

  // TODO: Refactorizar imageSize para recubir tamaño objetivo
  public function imageResize($imageResourceId, $width, $height)
  {
    $targetWidth = 300;
    $targetHeight = 250;
    $targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);
    imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);

    return $targetLayer;
  }

  public function imageResizeBanner($imageResourceId, $width, $height)
  {
    $targetWidth = 1920;
    $targetHeight = 700;
    $targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);
    imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);

    return $targetLayer;
  }


}
