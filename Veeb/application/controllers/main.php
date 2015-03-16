<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
              
		$this->load->view('home');
                
                
	}
        public function kontakt()
	{
              
		$this->load->view('kontakt');
                
                
	}
        public function kuulutused()
	{
              
		$this->load->view('kuulutused');
                
                
	}
        public function home()
	{
              
		$this->load->view('home');
                
                
	}
        public function n6uded()
	{
              
		$this->load->view('n6uded');
                
                
	}
        public function hinnakiri()
	{
              
		$this->load->view('hinnakiri');
                
                
	}
        public function reklaam()
	{
              
		$this->load->view('reklaam');
                
                
	}
         public function login()
	{
              
		$this->load->view('login');
                
                
	}
        public function register()
	{
              
		$this->load->view('register');
                
                
	}
        public function forgot()
	{
              
		$this->load->view('forgot');
                
                
	}
}
