<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Language_controller extends CI_Controller
{
    public function __construct() {
        parent::__construct();
    }
    // create language Switcher method
    public function switchLang($language = null) {
        //echo $language;
        $language = ($language != null) ? $language : "english";
        $this->session->set_userdata('site_lang', $language);
        redirect($_SERVER['HTTP_REFERER']);
    }
}
?>