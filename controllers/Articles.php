<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller {

	function __construct(){

		parent::__construct();
		// we are using this to load a library and a helper
		// libraries and helpers are extensions of the core functionality
		$this->load->helper('form'); // loading this for the entire class/controller
		$this->load->library('form_validation'); // loading this for the entire class/controller
		$this->load->database(); // loading this for the entire class/controller
	}

	public function index()
	{
		$this->load->helper('text');
		// the index function runs automatically
		// echo "CRUD";
		// grab content from DB to pass to the Model
		$data['heading'] = "Articles";
		$this->load->model('articles_model');
		$data['results'] = $this->articles_model->get_articles();

		//echo "<pre>";
		//print_r($data);
		//echo "</pre>";

		$this->load->view('includes/header', $data);
		$this->load->view('articles_read_view', $data);
		$this->load->view('includes/footer');
	}

	 public function detail($id){  // CONTROLLER - reads the ID from the URL
	 	// We need to add some security and a "graceful exit"
	 	// in case of url manipulation or other errors that prevent us from geting the required $id

	 	if(!is_numeric($id)){
	 		// if this parameter is missing or in the wrong format...
	 		// best to redirect
	 		redirect('/', 'location');
	 	}
	 	$this->load->library('typography');
	 	$data['heading'] = "";
	 	$this->load->model('articles_model');
	 	$data['results'] = $this->articles_model->get_article_details($id);  // sends the ID to a function in the Model
	 	// This is a failed attempt to get the username
	 	//$data['moreresults'] = $this->articles_model->get_username($id);


	 	$this->load->view('includes/header', $data);
	 	$this->load->view('articles_detail_view', $data);
	 	$this->load->view('includes/footer');
	 }

	 public function write(){
	 	// Authentication using ion auth library
	 	if (!$this->ion_auth->logged_in()){
	 	 	redirect('/auth/login/');
	 	}
	 	else{
	 	 	$data['author_id'] = $this->ion_auth->user()->row()->id;
		

	 	// Styling 
	 	$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
	 	//Validation
	 	$this->form_validation->set_rules('article_name', 'Article Name','required|min_length[3]|max_length[40]');
	 	$this->form_validation->set_rules('description', 'Description', 'required|min_length[20]|max_length[2000]');

	 	// Validation Library was loaded in the constructor
	 	// This IF statement checks to see if the validation has passed or not
	 	if($this->form_validation->run() == FALSE){
	 		// IF $this->form_validation->run() == FALSE, then validation has NOT passed
	 		// which means either we’re just loading the page or else user has not filled out everything correctly
	 		$this->load->view('includes/header');
			$this->load->view('articles_write_view');
	 		$this->load->view('includes/footer');
	 	}
	 	else {
	 		// in the else statement, the validation HAS passed and we can insert data in our table
	 		// echo "SUCCESS";
	 		$data['article_name'] = $this->input->post('article_name');
	 		$data['description']= $this->input->post('description');
	 		$this->load->model('articles_model');
	 		$this->articles_model->insert_article($data);

	 		// give user a message
	 		$this->session->set_flashdata('message', 'Insert Successful');

	 		// will redirect the user instead of just generating a blank page
	 		redirect("articles/index", 'location');

	 	}
	 }
	 }

	 public function edit($id){ // we change the name to edit from write and we add the $id parameter

	 	// First, check to make sure that if the ID is a number, if not, redirect
	 	if(!is_numeric($id)){
	 		redirect('/', 'location');
	 	}

	 	$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
	 	$this->form_validation->set_rules('article_name', 'Article Name', 'required|min_length[3]|max_length[40]');
	 	$this->form_validation->set_rules('description', 'Description', 'required|min_length[20]|max_length[2000]');

	 	$this->load->model('articles_model'); // just moved this up so we can call the model function
	 	// we need the model function sooner here than in insert

	 	if ($this->form_validation->run() == FALSE) {
	 		// Get the animal details from the Model, get_article_details() method
	 		$data['results'] = $this->articles_model->get_article_details($id);

			$this->load->view('includes/header');
			$this->load->view('articles_edit_view', $data); // move details to the edit view to populate form
			$this->load->view('includes/footer');
		}
		else {
			$data['article_name'] = $this->input->post('article_name');
			$data['description'] = $this->input->post('description');
			$this->articles_model->edit_article($data, $id);

			$this->session->set_flashdata('message', 'Edit Successful');
 			redirect('articles/edit/' . $id, 'location');

			// $this->load->model('articles_model');
			//$this->articles_model->insert_animal($data); // make sure we remove this from our copy/paste of write
			// and comment out or remove any redirects, etc. so we can see errors as we test
			//$this->session->set_flashdata('message', 'Insert Successful');
			//redirect('articles/index', 'location');
		}
	}


	public function delete($id){

		// First, check to make sure that if the ID is a number, if not, redirect
		if(!is_numeric($id)){
			redirect('/', 'location');
		}

		$this->load->model('articles_model');
		$this->articles_model->delete_article($id);
		$this->session->set_flashdata('message', 'Delete Successful');
 		redirect('articles/index');
	}

	public function logout(){

    if($this->ion_auth->logged_in())
    {
        $this->ion_auth->logout();
        redirect('articles/index', 'location');
    }

	}

// note that there is no php closing tag cause of parsing problems
}