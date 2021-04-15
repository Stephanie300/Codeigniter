<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		// the index function runs automatically
		$this->load->view('includes/header');
		// this will load another file
		$this->load->view('home_view');  // we dont need the extension
		//
		$this->load->view('includes/footer');

		//echo "<h1>This is Home</h1>";
	}

	public function test(){
		$this->load->view('includes/header');
		$this->load->view('test_view');
		$this->load->view('includes/footer');
		//echo "<h1>This is the TEST function in the Home controller</h1>";
	}
}

// note that there is no php closing tag cause of parsing problems