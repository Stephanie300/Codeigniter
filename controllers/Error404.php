<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error404 extends CI_Controller {

	public function index()
	{
		$data['heading'] = "Error 404 - Page Not Found";
		// $data['picture'] = "owl.jpg";
		$data['message'] = "<p>Sorry, it seems the page you are looking for does not exist.</p> <p>Please enjoy this owl in trying times.</p>";

		// the index function runs automatically
		$this->load->view('includes/header');
		$this->load->view('error_view', $data);  // we need to PASS the array to the VIEW
		$this->load->view('includes/footer');
	}

}

// note that there is no php closing tag cause of parsing problems