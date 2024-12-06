<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    public $template = array();
    public $data = array();
    public $middle = '';
    public $render_data = '';
    private $admin_data;

    function __construct()
    {

        parent::__construct();

        $this->data['message'] = '';

        $this->load->helper(array('form', 'language', 'url', 'date'));

        $this->data['admin_data'] = NULL;
    }

    public function render($middleParam = '', $title  = '', $data = [])
    {

        if ($middleParam == '') {
            $middleParam = $this->middle;
        }
        $this->template['title'] = $title;
        $this->template['headerscripts'] = $this->load->view('Home/HeaderScripts.php', $this->data, true);
        $this->template['header'] = $this->load->view('Home/HeaderNavigation.php', $this->data, true);
        $this->template['middle'] = $this->load->view($middleParam . '.php', $this->data, true);
        $this->template['footer'] = $this->load->view('Home/FooterNavigation.php', $this->data, true);
        $this->template['endlinks'] = $this->load->view('Home/FooterScripts.php', $this->data, true);

        $this->load->view('Layout/Front', $this->template);
    }

    public function render_login($middleParam = '', $title = '', $data = [])
    {

        if ($middleParam == '') {
            $middleParam = $this->middle;
        }

        if (empty($data)) {
            $data = $this->data;
        }

        $this->template['title'] = $title;
        $this->template['headerscripts'] = $this->load->view('Login/HeaderScripts.php', $this->data, true);
        $this->template['middle'] = $this->load->view($middleParam . '.php', $this->data, true);
        $this->template['footerscripts'] = $this->load->view('Login/FooterScripts.php', $this->data, true);

        $this->load->view('Layout/LoginFront', $this->template, $data);
    }

    public function render_booking($middleParam = '', $title  = '', $data = [])
    {

        if ($middleParam == '') {
            $middleParam = $this->middle;
        }
        $this->template['title'] = $title;
        $this->template['headerscripts'] = $this->load->view('Booking/HeaderScripts.php', $this->data, true);
        $this->template['middle'] = $this->load->view($middleParam . '.php', $this->data, true);
        $this->template['footerscripts'] = $this->load->view('Booking/FooterScripts.php', $this->data, true);

        $this->load->view('Layout/BookingFront', $this->template, $data);
    }
}
