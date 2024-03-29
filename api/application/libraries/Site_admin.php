<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_admin {

  var $meta       = 'Panel de Control';
  var $title      = 'Panel de Control';
  var $main_title = 'Panel de Control';
  var $site       = 'Panel de Control';
  var $image_site = '';
  var $keywords   = '';
  var $favicon    = '';
  var $url        = '';
  var $analytics  = '';

  public function view($page = '', $data = array(), $section = '')
  {

    $CI =& get_instance();
    if(empty($data)) $data = array('DIR'=>$CI->config->base_url());
    $site['DIR'] = base_url();
    $site['BACKGROUND'] = (isset($data['BACKGROUND']) ? $data['BACKGROUND'] : "");
    $site['META'] = $this->meta;
    $site['TITLE'] = $this->title;
    $site['MAIN_TITLE'] = $this->main_title;
    $site['SITE'] = $this->site;
    $site['IMAGE_SITE'] = $this->image_site;
    $site['KEYWORDS'] = $this->keywords;
    $site['FAVICON'] = $this->favicon;
    $site['URL'] = base_url();
    $site['ANALYTICS'] = $this->analytics;

    $site['ALERT'] = ($CI->session->flashdata('alert')!=''?$CI->parser->parse('layouts/alert', array('EVENT'=>$CI->session->flashdata('alert'),'TEXT'=>$CI->session->flashdata('text_alert')), true):'');
    $site['MENU'] = ($section == 'login')?'':$this->getMenu();
    $site['BARRA_TOP'] = ''; //($section == 'login')?'':$this->getBarraTop();

    $site['CONTENT'] = $CI->parser->parse($page, $data, TRUE);
    return $CI->parser->parse('pages/admin/site', $site);
  }

  public function header($data=array()) {
    if(isset($data['meta']) && $data['meta'] != '')
    $this->meta = $data['meta'];
    if(isset($data['title']) && $data['title'] != '')
    $this->title = $data['title'];
    if(isset($data['main_title']) && $data['main_title'] != '')
    $this->main_title = $data['main_title'];
    if(isset($data['site']) && $data['site'] != '')
    $this->site = $data['site'];
    if(isset($data['image_site']) && $data['image_site'] != '')
    $this->image_site = $data['image_site'];
    if(isset($data['keywords']) && $data['keywords'] != '')
    $this->keywords = $data['keywords'];
    if(isset($data['favicon']) && $data['favicon'] != '')
    $this->favicon = $data['favicon'];
    if(isset($data['url']) && $data['url'] != '')
    $this->url = $data['url'];
    if(isset($data['analytics']) && $data['analytics'] != '')
    $this->analytics = $data['analytics'];
  }
  public function getMenu($data=array()) {
    $CI =& get_instance();
    if($CI->session->userdata('tipo')!==FALSE&&$CI->session->userdata('tipo')==8){
      $menu = '';
    }else{
      $menu = '<nav class="main-menu">
      <div class="logo"></div>
      <div class="settings">MENU</div>
      <ul>
      <li>
      <a href="'.base_url().'webadmin">
      <i class="fas fa-home fa-lg"></i>
      <span class="nav-text">Home</span>
      </a>
      </li>
      <li>
      <a href="'.base_url().'webadmin/listado/">
      <i class="fas fa-briefcase fa-lg"></i>
      <span class="nav-text">Listado</span>
      </a>
      </li>
      </ul>
      <ul class="logout">
      <li>
      <a href="'.base_url().'webadmin/logout">
      <i class="fas fa-times"></i>
      <span class="nav-text">Salir</span>
      </a>
      </li>
      </ul>
      </nav>';
    }
    return $menu;
  }

}
