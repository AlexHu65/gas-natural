<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site {

  var $title      = 'Luis Quero';
  var $keywords   = '';
  var $description  = '';
  var $favicon    = 'favicon.png';

  var $meta_title = '';
  var $meta_description  = '';
  var $meta_image = '';
  var $site       = 'Luis Quero';
  var $url        = '';

  var $analytics  = '';

  public function view_front($page = '', $data = array(), $section, $idioma)
  {
    $CI =& get_instance();
    if(empty($data)) $data = array('DIR'=>$CI->config->base_url());
    $site['DIR'] = base_url();

    $site['TITLE']        = $this->title;
    $site['KEYWORDS']     = $this->keywords;
    $site['DESCRIPTION']  = $this->description;
    $site['FAVICON']      = $this->favicon;

    $site['META_TITLE']   = $this->meta_title;
    $site['META_IMAGE']   = $this->meta_image;
    $site['META_DESCRIPTION'] = $this->meta_description;
    $site['SITE']         = $this->site;
    $site['URL']          = $this->url;

    $site['ANALYTICS'] = "";

    // FONDO NAV BAR
    $bg = '';
    if($section == 'login'){$bg = 'bg1';}
    if($section == 'home'){$bg = 'bg2';}
    if($section == 'videos'){$bg = 'bg3';}
    if($section == 'elearning'){$bg = 'bg3';}
    $site['FONDO'] = $bg;

    // $site['MENU'] = $CI->parser->parse('layouts/menu', $data, TRUE);
    // $site['FOOTER'] = $CI->parser->parse('layouts/footer', $data, TRUE);

    $carpeta = ($idioma == 1)?'pages':'pages_eng';
    $site['CONTENT'] = $CI->parser->parse($carpeta.'/'.$page, $data, TRUE);
    return $CI->parser->parse('site_front', $site);
  }

  public function header($data=array()) {
    if(isset($data['title']) && $data['title'] != '')
    $this->title = $data['title'];
    if(isset($data['keywords']) && $data['keywords'] != '')
    $this->keywords = $data['keywords'];
    if(isset($data['description']) && $data['description'] != '')
    $this->description = $data['description'];
    if(isset($data['favicon']) && $data['favicon'] != '')
    $this->favicon = $data['favicon'];

    if(isset($data['meta_title']) && $data['meta_title'] != '')
    $this->meta_title = $data['meta_title'];
    if(isset($data['site']) && $data['site'] != '')
    $this->site = $data['site'];
    if(isset($data['meta_description']) && $data['meta_description'] != '')
    $this->meta_description = $data['meta_description'];
    if(isset($data['meta_image']) && $data['meta_image'] != '')
    $this->meta_image = $data['meta_image'];
    if(isset($data['url']) && $data['url'] != '')
    $this->url = $data['url'];

    if(isset($data['analytics']) && $data['analytics'] != '')
    $this->analytics = $data['analytics'];
  }

}
