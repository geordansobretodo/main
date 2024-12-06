<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

	public function __construct() {
		parent::__construct();
		
        $this->load->library('Set_views');
	}

	public function index() {
		$this->home();
	}

	public function home() {
        // if ($this->session->userdata('log') != 'logged') {
        //     redirect('Login/index');
        // } else {
            $this->render($this->set_views->home(), 'Home');
        // }
	}

    public function about() {
        // if ($this->session->userdata('log') != 'logged') {
        //     redirect('Login/index');
        // } else {
		    $this->render($this->set_views->about(), 'About');
        // }
	}

	public function services() {
        // if ($this->session->userdata('log') != 'logged') {
        //     redirect('Login/index');
        // } else {
		    $this->render($this->set_views->services(), 'Services');
        // }
	}

	public function blog() {
        // if ($this->session->userdata('log') != 'logged') {
        //     redirect('Login/index');
        // } else {
		    $this->render($this->set_views->blog(), 'Blog');
        // }
	}

	public function booking() {
        // if ($this->session->userdata('log') != 'logged') {
        //     redirect('Login/index');
        // } else {
		    $this->render($this->set_views->booking(), 'Booking');
        // }
	}

	public function contact() {
        // if ($this->session->userdata('log') != 'logged') {
        //     redirect('Login/index');
        // } else {
		    $this->render($this->set_views->contact(), 'Contact');
        // }
	}

	public function destination() {
		$this->render($this->set_views->destination(), 'Home');
	}

	public function gallery() {
        // if ($this->session->userdata('log') != 'logged') {
        //     redirect('Login/index');
        // } else {
		    $this->render($this->set_views->galleries(), 'Gallery');
        // }
	}

	public function guides() {
        // if ($this->session->userdata('log') != 'logged') {
        //     redirect('Login/index');
        // } else {
		    $this->render($this->set_views->guides(), 'Guides');
        // }
	}

	public function packages() {
        // if ($this->session->userdata('log') != 'logged') {
        //     redirect('Login/index');
        // } else {
		    $this->render($this->set_views->packages(), 'Packages');
        // }
	}
	
	public function sample() {
        // if ($this->session->userdata('log') != 'logged') {
        //     redirect('Login/index');
        // } else {
		    $this->render($this->set_views->sample(), 'Sample');
        // }
	}

	public function testimonial() {
        // if ($this->session->userdata('log') != 'logged') {
        //     redirect('Login/index');
        // } else {
		    $this->render($this->set_views->testimonial(), 'Testimonial');
        // }
	}

	public function tour() {
        // if ($this->session->userdata('log') != 'logged') {
        //     redirect('Login/index');
        // } else {
		    $this->render($this->set_views->tour(), 'Tour');
        // }
	}

	public function form() {
        // if ($this->session->userdata('log') != 'logged') {
        //     redirect('Login/index');
        // } else {
		    $this->render($this->set_views->form(), 'Booking');
        // }
	}
}
