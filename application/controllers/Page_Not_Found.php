<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Page_Not_Found extends CI_Controller {

    public function index() {

        $this->load->view('templates/header');

        $this->load->view('pages/404');

        $this->load->view('templates/footer');

    }

}
