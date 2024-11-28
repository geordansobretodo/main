<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home_controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('pages/index');
		$this->load->view('templates/footer');

	}

	public function about()
	{
		$this->load->view('templates/header');
		$this->load->view('pages/about');
		$this->load->view('templates/footer');
	}

	public function services()
	{
		$this->load->view('templates/header');
		$this->load->view('pages/services');
		$this->load->view('templates/footer');
	}

	public function blog() {
		$this->load->view('templates/header');
		$this->load->view('pages/blog');
		$this->load->view('templates/footer');
	}

	public function booking() {
		$this->load->view('templates/header');
		$this->load->view('pages/booking');
		$this->load->view('templates/footer');
	}

	public function contact() {
		$this->load->view('templates/header');
		$this->load->view('pages/contact');
		$this->load->view('templates/footer');
	}

	public function destination() {
		$this->load->view('templates/header');
		$this->load->view('pages/destination');
		$this->load->view('templates/footer');
	}

	public function gallery() {
		$this->load->view('templates/header');
		$this->load->view('pages/gallery');
		$this->load->view('templates/footer');
	}

	public function guides() {
		$this->load->view('templates/header');
		$this->load->view('pages/guides');
		$this->load->view('templates/footer');
	}

	public function packages() {
		$this->load->view('templates/header');
		$this->load->view('pages/packages');
		$this->load->view('templates/footer');
	}
	
	public function sample() {
		$this->load->view('templates/header');
		$this->load->view('pages/sample');
		$this->load->view('templates/footer');
	}

	public function testimonial() {
		$this->load->view('templates/header');
		$this->load->view('pages/testimonial');
		$this->load->view('templates/footer');
	}

	public function tour() {
		$this->load->view('templates/header');
		$this->load->view('pages/tour');
		$this->load->view('templates/footer');
	}

	/*** Form page */
	public function form() {
		# $this->load->view('templates/header');
		$this->load->view('pages/form');
		# $this->load->view('templates/footer');
	}

}
